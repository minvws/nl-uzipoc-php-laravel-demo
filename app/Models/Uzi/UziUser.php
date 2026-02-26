<?php

declare(strict_types=1);

namespace App\Models\Uzi;

use App\Exceptions\UziNoUziNumberException;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\AbstractUserBase;
use App\Models\RoleService;

class UziUser extends AbstractUserBase
{
    /**
     * @param string|null $initials
     * @param string|null $surname
     * @param string|null $surnamePrefix
     * @param string $uziId
     * @param string|null $loaAuthn
     * @param string $loaUzi
     * @param UziRelation[] $uras
     * @param string $email
     */
    public function __construct(
        public string|null $initials,
        public string|null $surname,
        public string|null $surnamePrefix,
        public string $uziId,
        public string|null $loaAuthn,
        public string $loaUzi,
        public array $uras,
        public string $email = '',
    ) {
        if (empty($email)) {
            $this->email = $uziId . '@uzi.pas';
        }
    }

    /**
     * @param object{
     *     relations: array<int, object{entity_name: string, ura: string, roles: string[]}>,
     *     initials: ?string,
     *     surname: ?string,
     *     surname_prefix: ?string,
     *     uzi_id: string,
     *     loa_uzi: string,
     *     loa_authn: string
     * } $oidcResponse
     * @throws UziNoUziNumberException
     */
    public static function deserializeFromObject(object $oidcResponse): UziUser
    {
        $requiredKeys = ["relations", "initials", "surname", "surname_prefix", "uzi_id", "loa_uzi"];
        $missingKeys = [];
        foreach ($requiredKeys as $key) {
            if (!property_exists($oidcResponse, $key)) {
                $missingKeys[] = $key;
            }
        }
        if (!empty($missingKeys)) {
            Log::error("Uzi user missing required fields: " . implode(", ", $missingKeys));
            throw new UziNoUziNumberException();
        }


        $uras = [];
        try {
            foreach ($oidcResponse->relations ?? [] as $ura) {
                if (
                    !property_exists($ura, "entity_name")
                    || !property_exists($ura, "ura")
                    || !property_exists($ura, "roles")
                ) {
                    Log::error("Uzi relation missing required fields: entity_name, ura or roles.", [$ura]);
                    continue;
                }

                $uras[] = new UziRelation($ura->entity_name, $ura->ura, self::getRolesByCodes($ura->roles));
            }

            return new UziUser(
                $oidcResponse->initials,
                $oidcResponse->surname,
                $oidcResponse->surname_prefix,
                $oidcResponse->uzi_id,
                $oidcResponse->loa_authn ?? null,
                $oidcResponse->loa_uzi,
                $uras
            );
        } catch (Exception $e) {
            report($e);
            Log::error("Trying to build an uzi user from userinfo failed", [$e]);
            throw new UziNoUziNumberException();
        }
    }

    /**
     * @param string[] $roleCodes
     * @return UziRelationRole[]
     */
    public static function getRolesByCodes(array $roleCodes): array
    {
        $roles = [];
        foreach ($roleCodes as $roleCode) {
            $roles[] = new UziRelationRole(
                code: $roleCode,
                name: RoleService::getRoleName($roleCode),
            );
        }
        return $roles;
    }

    public function getName(): string
    {
        if (empty($this->initials) || empty($this->surname)) {
            return $this->uziId;
        }
        return $this->initials . ($this->surnamePrefix ? " " . $this->surnamePrefix : "") . " " . $this->surname;
    }

    public function hasRelations(): bool
    {
        return count($this->uras) > 0;
    }

    public function getAuthIdentifier(): string
    {
        return $this->uziId;
    }
}
