<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PrivacyStatementController;
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

// Change the language of the page
Route::get('change-language/{locale}', LanguageController::class)->name('change-language');
Route::get('privacy-statement', PrivacyStatementController::class)->name('privacy-statement');

Route::middleware(['guest'])->group(function () {
    Route::get('/', IndexController::class)
        ->name('index');
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])
        ->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
