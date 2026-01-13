<?php

declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestIdentitiesController;
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

Route::get('/', IndexController::class)->name('index');

// Change the language of the page
Route::get('change-language/{locale}', LanguageController::class)->name('change-language');
Route::get('privacy-statement', PrivacyStatementController::class)->name('privacy-statement');

Route::get('about', AboutController::class)->name('about');
Route::get('test-identities', TestIdentitiesController::class)->name('test-identities');

Route::prefix('ziekenboeg')
    ->group(base_path('routes/web-ziekenboeg.php'));
