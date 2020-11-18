<?php

namespace App\Enums;

class Queue
{
    public const EMAIL = 'email';
    public const DEFAULT = 'default';

    public static function values(): array
    {
        return [
            self::EMAIL,
            self::DEFAULT,
        ];
    }
}
