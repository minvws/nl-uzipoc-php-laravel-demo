<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('index');
    }
}
