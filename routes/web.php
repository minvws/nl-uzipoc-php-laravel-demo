<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestIdentitiesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PrivacyStatementController;
use App\Http\Controllers\Ziekenboeg\Auth\AuthController;
use App\Http\Controllers\Ziekenboeg\Auth\OidcLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', IndexController::class)->name('index');

// Change the language of the page
Route::get('change-language/{locale}', LanguageController::class)->name('change-language');
Route::get('privacy-statement', PrivacyStatementController::class)->name('privacy-statement');

Route::get('about', AboutController::class)->name('about');
Route::get('test-identities', TestIdentitiesController::class)->name('test-identities');

Route::prefix('ziekenboeg')
    ->name('ziekenboeg.')
    ->group(function () {
        Route::redirect('/', '/ziekenboeg/home');
        Route::get('home', \App\Http\Controllers\Ziekenboeg\HomeController::class)->name('home');
        Route::get('about', \App\Http\Controllers\Ziekenboeg\AboutController::class)->name('about');
        Route::get('contact', \App\Http\Controllers\Ziekenboeg\ContactController::class)->name('contact');

        Route::middleware(['guest'])->group(function () {
            Route::get('login', [AuthController::class, 'login'])
                ->name('login');
        });

        Route::middleware(['auth'])
            ->prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('home', [\App\Http\Controllers\Ziekenboeg\Users\HomeController::class, 'home'])
                    ->name('home');

                Route::get('jwt', [\App\Http\Controllers\Ziekenboeg\Users\JwtController::class, 'home'])
                    ->name('jwt');

                Route::post('logout', [AuthController::class, 'logout'])
                    ->name('logout');
            });
    });

Route::get('oidc/login', OidcLoginController::class)
    ->name('oidc.login');
