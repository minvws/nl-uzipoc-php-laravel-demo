<?php

declare(strict_types=1);

namespace App\Models\Dezi;

use App\Exceptions\DeziLoginException;
use App\Models\Dezi\DeziDeclaration;
use App\Models\AbstractUserBase;
use App\Services\Dezi\DeziDeclarationService;
use Illuminate\Support\Facades\Log;

class DeziUser extends AbstractUserBase
{
    public function __construct(
        public DeziDeclaration $declaration,
        public string $loaAuthn,
    ) {
    }

    /**
     * @param object{
     *     jti: string,
     *     iat: int,
     *     exp: int,
     *     iss: string,
     *     aud: string,
     *     loa_authn: string,
     *     json_schema: string,
     *     verklaring_id: string,
     *     verklaring: string
     * } $oidcResponse
     *
     * @throws DeziLoginException
     */
    public static function deserializeFromObject(object $oidcResponse): DeziUser
    {
        $requiredEnvelopeKeys = ['verklaring', 'verklaring_id', 'loa_authn'];
        $missingKeys = [];
        foreach ($requiredEnvelopeKeys as $key) {
            if (! property_exists($oidcResponse, $key)) {
                $missingKeys[] = $key;
            }
        }
        if (! empty($missingKeys)) {
            Log::error('DEZI envelope has missing required fields: ' . implode(', ', $missingKeys));
            throw new DeziLoginException("Invalid DEZI response received from identity provider.");
        }
        $rawDeclaration = $oidcResponse->verklaring;
        $declarationId = $oidcResponse->verklaring_id;
        $loaAuthn = $oidcResponse->loa_authn;

        $declarationService = app(DeziDeclarationService::class);
        try {
            $declaration = $declarationService->createDeclaration(
                $rawDeclaration,
                $declarationId,
            );
        } catch (\Throwable $e) {
            Log::error('Error deserializing DeziUser: ' . $e->getMessage());
            throw new DeziLoginException("Invalid DEZI response received from identity provider.");
        }

        return new DeziUser(
            $declaration,
            $loaAuthn,
        );
    }

    public function getName(): string
    {
        if (empty($this->declaration->initials) || empty($this->declaration->surname)) {
            return $this->declaration->deziNumber;
        }
        return $this->declaration->initials .
            ($this->declaration->surnamePrefix ? " " .
            $this->declaration->surnamePrefix : "") . " " . $this->declaration->surname;
    }

    public function getAuthIdentifier(): string
    {
        return $this->declaration->deziNumber;
    }
}
