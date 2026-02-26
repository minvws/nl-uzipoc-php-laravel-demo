<?php

declare(strict_types=1);

namespace App\Services;

class Utils
{
    /**
     * Converts a JWT string into an associative array.
     * @return array<string, mixed>
     * @throws \InvalidArgumentException
     * @throws \JsonException
     */
    public static function jwtToArray(string $jwt): array
    {
        $parts = explode('.', $jwt);

        if (count($parts) !== 3) {
            throw new \InvalidArgumentException('Invalid JWT format');
        }

        $payload = base64_decode(strtr($parts[1], '-_', '+/'));
        return json_decode($payload, true, 512, JSON_THROW_ON_ERROR);
    }

    public static function jsonifyJwt(string $jwt): string
    {
        return json_encode(self::jwtToArray($jwt), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
    }
}
