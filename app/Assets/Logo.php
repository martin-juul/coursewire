<?php
declare(strict_types=1);

namespace App\Assets;

class Logo
{
    public static function banner(): string
    {
        $path = nova_get_setting('logo.banner', null);
        if ($path) {
            return static::withCdn($path);
        }

        return '/branding/sde/sde-logo-large.png';
    }

    public static function favicon(): string
    {
        $path = nova_get_setting('logo.favicon', null);
        if ($path) {
            return static::withCdn($path);
        }

        return '/branding/sde/favicon.png';
    }

    public static function icon(): string
    {
        $path = nova_get_setting('logo.icon', null);
        if ($path) {
            return static::withCdn($path);
        }

        return '/branding/sde/sde-brand.svg';
    }

    public static function withCdn(string $path): string
    {
        return config('app.cdn_url') . '/' . $path;
    }
}
