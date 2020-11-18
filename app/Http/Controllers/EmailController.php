<?php

namespace App\Http\Controllers;

use App\Mail\AccountDetailsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    private static array $mailables = [
        'account.details' => AccountDetailsMail::class,
    ];

    public function index()
    {
        return response()->json(array_keys(static::$mailables));
    }

    public function show(Request $request, string $mailable)
    {
        if (!array_key_exists($mailable, static::$mailables)) {
            return response()->json(['error' => 'not_found'], 404);
        }

        if (Str::contains($mailable, 'account')) {
            return new static::$mailables[$mailable](auth()->user());
        }

        return new static::$mailables[$mailable];
    }
}
