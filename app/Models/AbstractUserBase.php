<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\Utils;

abstract class AbstractUserBase implements UserBase
{
    private const NO_AUTH_IDENTIFIER_NAME_MESSAGE = 'No auth identifier name is set';
    private const NO_PASSWORD_MESSAGE = 'No password is set';
    private const NO_REMEMBER_TOKEN_MESSAGE = "Do not remember cookie's";

    private string $jwt;

    public function getJwt(bool $jsonified = false): ?string
    {
        if ($jsonified) {
            return Utils::jsonifyJwt($this->jwt ?? '');
        }
        return $this->jwt;
    }

    public function setJwt(string $jwt): void
    {
        $this->jwt = $jwt;
    }

    public function toArray(): array
    {
        return Utils::jwtToArray($this->jwt ?? '');
    }

    public function getAuthIdentifierName(): string
    {
        throw new \RuntimeException(self::NO_AUTH_IDENTIFIER_NAME_MESSAGE);
    }

    public function getAuthPassword(): string
    {
        throw new \RuntimeException(self::NO_PASSWORD_MESSAGE);
    }

    public function getAuthPasswordName()
    {
        throw new \RuntimeException(self::NO_PASSWORD_MESSAGE);
    }

    public function getRememberToken(): string
    {
        throw new \RuntimeException(self::NO_REMEMBER_TOKEN_MESSAGE);
    }

    public function setRememberToken($value): void
    {
        throw new \RuntimeException(self::NO_REMEMBER_TOKEN_MESSAGE);
    }

    public function getRememberTokenName(): string
    {
        throw new \RuntimeException(self::NO_REMEMBER_TOKEN_MESSAGE);
    }
}
