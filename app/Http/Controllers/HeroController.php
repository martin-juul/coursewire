<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeroController extends Controller
{
    public const THEMES = [
        'mandarin',
    ];

    public function show(Request $request, string $text)
    {
        $default = 'mandarin';
        $theme = $request->query('theme', $default);
        if (!in_array($theme, self::THEMES, true)) {
            $theme = $default;
        }

        return response(view("hero.{$theme}", [
            'text' => trim(base64_decode($text)),
        ]), 200, [
            'Content-Type' => 'image/svg+xml',
        ]);
    }
}
