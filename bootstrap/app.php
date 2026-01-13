<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        health: '/up',
        then: function () {
            // Always load OIDC routes
            Route::middleware('web')
                ->group(base_path('routes/oidc.php'));

            // In 'ziekenboeg' mode, only load the ziekenboeg routes
            if (Config::string('app.mode') === 'ziekenboeg') {
                Route::middleware('web')
                    ->group(base_path('routes/web-ziekenboeg.php'));
                return;
            }

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustHosts(static function (): array {
            $trustedHosts = Config::array('app.trusted_hosts');

            /**
             * Convert each trusted host to a pattern to match the specific configured host
             * As Symfony Request::setTrustedHosts expects regex patterns.
             */
            return Arr::map($trustedHosts, static function (string $host) {
                return sprintf('^%s$', preg_quote($host, '/'));
            });
        }, subdomains: false);
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\Locale::class,
        ]);
        $middleware->redirectUsersTo(fn (Request $request) => route('ziekenboeg.users.home'));
        $middleware->redirectGuestsTo(fn (Request $request) => route('ziekenboeg.login'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->reportable(
            function (Throwable $e) {
                //
            }
        );
    })->create();
