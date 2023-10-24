<?php

declare(strict_types=1);

namespace App\Http\Controllers\Ziekenboeg;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('ziekenboeg.home');
    }
}
