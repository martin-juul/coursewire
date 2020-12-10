<?php
declare(strict_types=1);

if (!function_exists('format_log_context')) {
    function format_log_context(\Throwable $e, array $with = []): array
    {
        return array_merge($with, [
            'e.message' => $e->getMessage(),
            'e.code'    => $e->getCode(),
            'e.file'    => $e->getFile(),
            'e.line'    => $e->getLine(),
        ]);
    }
}
