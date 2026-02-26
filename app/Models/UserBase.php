<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

interface UserBase extends Authenticatable
{
    /**
     * Get the name of the user.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the JWT for the user.
     * @param bool $jsonified Whether to serialize the JWT to JSON before returning it.
     * @return string|null
     */
    public function getJwt(bool $jsonified = false);

    /**
     * Set the JWT for the user.
     * @param string $jwt
     * @return void
     */
    public function setJwt(string $jwt);

    /**
     * Export as array
     * @return array<string, mixed>
     */
    public function toArray();

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName();

    /**
     * Get the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifier();

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword();

    /**
     * Get the name of the password attribute for the user.
     *
     * @return string
     */
    public function getAuthPasswordName();

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken();

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value);

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName();
}
