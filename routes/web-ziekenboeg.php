<?php

declare(strict_types=1);

use App\Http\Controllers\Ziekenboeg\AboutController;
use App\Http\Controllers\Ziekenboeg\Auth\AuthController;
use App\Http\Controllers\Ziekenboeg\ContactController;
use App\Http\Controllers\Ziekenboeg\HomeController;
use App\Http\Controllers\Ziekenboeg\Users\HomeController as UsersHomeController;
use App\Http\Controllers\Ziekenboeg\Users\JwtController;
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

Route::name('ziekenboeg.')
    ->group(function () {
        Route::get('/', HomeController::class)->name('home');
        Route::get('about', AboutController::class)->name('about');
        Route::get('contact', ContactController::class)->name('contact');

        Route::middleware(['guest'])->group(function () {
            Route::get('login', [AuthController::class, 'login'])
                ->name('login');

            Route::get('no-relations', [AuthController::class, 'noRelations'])
                ->name('auth.no-relations');
        });

        Route::middleware(['auth'])
            ->prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('home', [UsersHomeController::class, 'home'])
                    ->name('home');

                Route::get('jwt', JwtController::class)
                    ->name('jwt');

                Route::post('logout', [AuthController::class, 'logout'])
                    ->name('logout');
            });
    });
