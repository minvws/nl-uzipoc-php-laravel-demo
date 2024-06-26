<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::if('isZiekenboegUsersPage', function () {
            return request()->is('ziekenboeg/users/*');
        });

        Blade::if('notZiekenboegUsersPage', function () {
            return !request()->is('ziekenboeg/users/*');
        });
    }
}
