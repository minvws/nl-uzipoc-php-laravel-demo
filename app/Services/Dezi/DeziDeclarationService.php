<?php

declare(strict_types=1);

namespace App\Services\Dezi;

use App\Models\Dezi\DeziDeclaration;
use Illuminate\Support\Facades\Log;
use Jose\Component\Checker\ClaimCheckerManager;
use Jose\Component\Checker\ExpirationTimeChecker;
use Jose\Component\Checker\IssuerChecker;
use Jose\Component\Checker\NotBeforeChecker;
use App\Models\OidcUserLoa;
use App\Exceptions\DeziDeclarationException;
use Illuminate\Support\Facades\Config;

final class DeziDeclarationService
{
    private ClaimCheckerManager $claimChecker;
    private OidcUserLoa $minimumLoa;

    public function __construct(
        private JwsParsingService $jwsParsingService,
    ) {
        $this->minimumLoa = OidcUserLoa::from(Config::get('auth.minimum_loa'));
        $this->claimChecker = new ClaimCheckerManager([
            new ExpirationTimeChecker(),
            new NotBeforeChecker(allowedTimeDrift: 10),
            new IssuerChecker(array_filter([Config::get('oidc.issuer'), Config::get('dezi.issuer')])),
        ]);
    }

    public function createDeclaration(string $jws, string $declarationId): DeziDeclaration
    {
        try {
            $payload = $this->parseJws($jws, $declarationId);
            return $this->createDeclarationFromObject($payload);
        } catch (\Throwable $e) {
            Log::error('Error creating DeziDeclaration: ' . $e->getMessage());
            throw new DeziDeclarationException('Failed to create DeziDeclaration');
        }
    }

    /**
     * @phpstan-return object{
     *     iss: string,
     *     exp: int,
     *     nbf: int,
     *     loaDezi: string,
     *     declarationId: string,
     *     deziNumber: string,
     *     initials: string,
     *     surnamePrefix: string,
     *     surname: string,
     *     subscriberNumber: string,
     *     subscriberName: string,
     *     roleCode: string,
     *     roleName: string,
     *     roleCodeSource: string
     * }
     */
    private function parseJws(string $jws, string $declarationId): object
    {
        try {
            $claims = $this->jwsParsingService->verifyJwsAndGetClaims($jws);
        } catch (DeziDeclarationException $e) {
            Log::error('Error parsing JWS: ' . $e->getMessage());
            throw $e;
        }
        $this->validateClaims($claims, $declarationId);

        return (object) [
            'iss' => $claims['iss'],
            'exp' => $claims['exp'],
            'nbf' => $claims['nbf'],
            'loaDezi' => $claims['loa_dezi'],
            'declarationId' => $claims['verklaring_id'],
            'deziNumber' => $claims['dezi_nummer'],
            'initials' => $claims['voorletters'],
            'surnamePrefix' => $claims['voorvoegsel'],
            'surname' => $claims['achternaam'],
            'subscriberNumber' => $claims['abonnee_nummer'],
            'subscriberName' => $claims['abonnee_naam'],
            'roleCode' => $claims['rol_code'],
            'roleName' => $claims['rol_naam'],
            'roleCodeSource' => $claims['rol_code_bron'],
        ];
    }

    /**
     * @param array<string, mixed> $claims
     * @param string $declarationId
     * @throws DeziDeclarationException
     */
    private function validateClaims(array $claims, string $declarationId): void
    {
        $requiredKeys = [
            'iss',
            'exp',
            'nbf',
            'loa_dezi',
            'verklaring_id',
            'dezi_nummer',
            'voorletters',
            'voorvoegsel',
            'achternaam',
            'abonnee_nummer',
            'abonnee_naam',
            'rol_code',
            'rol_naam',
            'rol_code_bron',
        ];
        $this->claimChecker->check($claims, $requiredKeys);

        if ($claims['verklaring_id'] !== $declarationId) {
            Log::error('Declaration ID mismatch: expected ' . $declarationId . ', got ' . $claims['verklaring_id']);
            throw new DeziDeclarationException('verklaring_id mismatch');
        }

        if (! OidcUserLoa::isEqualOrHigher($this->minimumLoa, OidcUserLoa::from($claims['loa_dezi']))) {
            Log::error('User LoA does not meet minimum requirement: expected ' .
                $this->minimumLoa->value . ', got ' . $claims['loa_dezi']);
            throw new DeziDeclarationException('User LoA does not meet minimum requirement');
        }
    }

    /**
     * @param object{
     *     loaDezi: string,
     *     declarationId: string,
     *     deziNumber: string,
     *     initials: string,
     *     surnamePrefix: string,
     *     surname: string,
     *     subscriberNumber: string,
     *     subscriberName: string,
     *     roleCode: string,
     *     roleName: string,
     *     roleCodeSource: string
     * } $declaration
     */
    private function createDeclarationFromObject(object $declaration): DeziDeclaration
    {
        return new DeziDeclaration(
            $declaration->loaDezi,
            $declaration->declarationId,
            $declaration->deziNumber,
            $declaration->initials,
            $declaration->surnamePrefix,
            $declaration->surname,
            $declaration->subscriberNumber,
            $declaration->subscriberName,
            $declaration->roleCode,
            $declaration->roleName,
            $declaration->roleCodeSource
        );
    }
}
