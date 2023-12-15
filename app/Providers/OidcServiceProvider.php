<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Responses\OidcLoginResponseHandler;
use App\Services\OidcExceptionHandler;
use App\Services\Uzi\JweDecryptService;
use Illuminate\Support\ServiceProvider;
use Jose\Component\Core\JWKSet;
use Jose\Component\KeyManagement\JWKFactory;
use MinVWS\OpenIDConnectLaravel\Http\Responses\LoginResponseHandlerInterface;
use MinVWS\OpenIDConnectLaravel\Services\ExceptionHandlerInterface;
use MinVWS\OpenIDConnectLaravel\Services\JWE\JweDecryptInterface;

class OidcServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LoginResponseHandlerInterface::class, OidcLoginResponseHandler::class);
        $this->app->bind(ExceptionHandlerInterface::class, OidcExceptionHandler::class);

        $this->registerJweDecryptInterface();
    }

    protected function registerJweDecryptInterface(): void
    {
        $this->app->singleton(JweDecryptInterface::class, function () {
            $decryptionKeySet = $this->parseDecryptionKeySet();
            if ($decryptionKeySet === null) {
                return null;
            }

            return new JweDecryptService(decryptionKeySet: $decryptionKeySet);
        });
    }

    /**
     * Parse decryption keys from config
     * @return ?JWKSet
     */
    protected function parseDecryptionKeySet(): ?JWKSet
    {
        $value = config('oidc.decryption_key_path');
        if (empty($value)) {
            return null;
        }

        $keys = [];

        $paths = explode(',', $value);
        foreach ($paths as $path) {
            $keys[] = JWKFactory::createFromKeyFile($path);
        }

        return new JWKSet($keys);
    }
}
