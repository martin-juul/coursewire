<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function show(Request $request, string $text)
    {
        return response(view('hero.mandarin', [
            'text' => trim($text),
        ]), 200, [
            'Content-Type' => 'image/svg+xml',
        ]);
    }
}
