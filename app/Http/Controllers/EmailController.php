<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\AccountDetailsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    private static array $mailables = [
        'account.details' => AccountDetailsMail::class,
    ];

    private bool $isDev;

    public function __construct()
    {
        $this->isDev = !app()->environment('production');
    }

    public function index()
    {
        if (!$this->isDev) {
            abort(404);
        }

        return response()->json(array_keys(static::$mailables));
    }

    public function show(Request $request, string $mailable)
    {
        if (!$this->isDev) {
            abort(404);
        }

        if (!array_key_exists($mailable, static::$mailables)) {
            return response()->json(['error' => 'not_found'], 404);
        }

        if (Str::contains($mailable, 'account')) {
            return new static::$mailables[$mailable](auth()->user());
        }

        return new static::$mailables[$mailable];
    }
}
