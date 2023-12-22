<?php

declare(strict_types=1);

namespace App\Http\Controllers\Ziekenboeg\Users;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request): View
    {
        return view('ziekenboeg.users.home')->with('user', $request->user());
    }
}
