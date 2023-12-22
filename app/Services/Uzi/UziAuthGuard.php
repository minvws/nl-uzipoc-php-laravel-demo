<?php

declare(strict_types=1);

namespace App\Services\Uzi;

use App\Models\UziUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Session\Session;

class UziAuthGuard implements Guard
{
    protected const SESSION_KEY = 'uzi_user';

    public function __construct(
        protected Session $session
    ) {
    }

    public function check(): bool
    {
        return $this->session->has(self::SESSION_KEY);
    }

    public function guest(): bool
    {
        return !$this->check();
    }

    public function user(): UziUser | null
    {
        if (!$this->check()) {
            return null;
        }

        return $this->session->get(self::SESSION_KEY);
    }

    public function id(): string | null
    {
        return $this->user()?->uziId;
    }

    /**
     * @param array<mixed> $credentials
     * @return mixed
     */
    public function validate(array $credentials = [])
    {
        throw new \RuntimeException('Not implemented UziAuthGuard::validate() method');
    }

    public function hasUser()
    {
        throw new \RuntimeException('Not implemented UziAuthGuard::hasUser() method');
    }

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
