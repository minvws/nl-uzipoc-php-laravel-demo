<?php

declare(strict_types=1);

namespace App\Http\Controllers\Ziekenboeg\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('ziekenboeg.auth.login');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()
            ->route('ziekenboeg.home');
    }
}
