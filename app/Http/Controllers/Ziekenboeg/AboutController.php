<?php

declare(strict_types=1);

namespace App\Http\Controllers\Ziekenboeg;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    public function __invoke(): View
    {
        return view('ziekenboeg.about');
    }
}
