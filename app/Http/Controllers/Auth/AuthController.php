<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): RedirectResponse
    {
        return redirect()
            ->route('oidc.login');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()
            ->route('index');
    }
}
