<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TestIdentitiesController extends Controller
{
    public function __invoke()
    {
        return view('test-identities');
    }
}