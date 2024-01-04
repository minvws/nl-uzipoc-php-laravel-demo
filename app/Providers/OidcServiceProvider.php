<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Responses\OidcLoginResponseHandler;
use App\Services\OidcExceptionHandler;
use App\Services\Uzi\JweDecryptService;
use MinVWS\OpenIDConnectLaravel\Http\Responses\LoginResponseHandlerInterface;
use MinVWS\OpenIDConnectLaravel\OpenIDConnectServiceProvider;
use MinVWS\OpenIDConnectLaravel\Services\ExceptionHandlerInterface;
use MinVWS\OpenIDConnectLaravel\Services\JWE\JweDecryptInterface;

class OidcServiceProvider extends OpenIDConnectServiceProvider
{
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

    protected function registerExceptionHandler(): void
    {
        $this->app->bind(ExceptionHandlerInterface::class, OidcExceptionHandler::class);
    }

    protected function registerResponseHandler(): void
    {
        $this->app->bind(LoginResponseHandlerInterface::class, OidcLoginResponseHandler::class);
    }

    protected function registerRoutes(): void
    {
        // We don't want to register the routes from the package, because we want to use our own controller.
    }
}
