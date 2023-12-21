<?php

declare(strict_types=1);

namespace App\Http\Controllers\Ziekenboeg\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JwtController extends Controller
{
    public function __invoke(Request $request)
    {
        return response($request->session()->get('oidc_jwt'))
            ->header('Content-Type', 'application/jwt');
    }
}
