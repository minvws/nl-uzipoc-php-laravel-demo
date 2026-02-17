<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Session\Session;

class AuthGuard implements Guard
{
    protected const SESSION_KEY = 'user';


    public function __construct(
        protected Session $session
    ) {
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check(): bool
    {
        return $this->session->has(self::SESSION_KEY);
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest(): bool
    {
        return !$this->check();
    }

    /**
     * Get the currently authenticated user.
     *
     * @return Authenticatable|null
     */
    public function user(): Authenticatable | null
    {
        if (!$this->check()) {
            return null;
        }

        return $this->session->get(self::SESSION_KEY);
    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|string|null
     */
    public function id(): int|string|null
    {
        return $this->user()?->getAuthIdentifier();
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array<string, mixed>  $credentials
     * @return bool
     */
    public function validate(array $credentials = []): bool
    {
        throw new \RuntimeException('Not implemented AuthGuard::validate() method');
    }

    /**
     * Determine if the guard has a user instance.
     *
     * @return bool
     */
    public function hasUser(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Set the current user.
     *
     * @param  Authenticatable  $user
     * @return $this
     */
    public function setUser(Authenticatable $user): static
    {
        $this->session->put(self::SESSION_KEY, $user);
        $this->session->migrate(true);
        return $this;
    }

    /**
     * Logs out the current user.
     *
     * @return void
     */
    public function logout(): void
    {
        $this->session->remove(self::SESSION_KEY);
        $this->session->migrate(true);
    }
}
