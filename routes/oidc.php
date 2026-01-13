<?php

declare(strict_types=1);

use App\Http\Controllers\Ziekenboeg\Auth\OidcLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| OIDC Route
|--------------------------------------------------------------------------
|
| Registering our custom OpenID Connect login route.
|
*/

Route::middleware(['guest'])
    ->get('oidc/login', OidcLoginController::class)
    ->name('oidc.login');
