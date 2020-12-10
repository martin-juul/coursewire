<?php
declare(strict_types=1);

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
