<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\AuthGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if (config('app.force_https')) {
            URL::forceScheme('https');
        }

        Blade::if('isZiekenboegUsersPage', function () {
            return Route::is('ziekenboeg.users.*');
        });

        Blade::if('notZiekenboegUsersPage', function () {
            return !Route::is('ziekenboeg.users.*');
        });

        $this->bootAuth();
    }

    public function bootAuth(): void
    {
        Auth::extend('oidc', function (Application $app, string $name, array $config) {
            return new AuthGuard($app->make('session')->driver());
        });
    }
}
