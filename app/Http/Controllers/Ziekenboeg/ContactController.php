<?php

declare(strict_types=1);

namespace App\Http\Controllers\Ziekenboeg;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __invoke()
    {
        return view('ziekenboeg.contact');
    }
}