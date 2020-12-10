<?php
declare(strict_types=1);

namespace App\Analytics;

use App\Types\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Referer\Referer;

/**
 * @property string $page
 * @property string $uri
 * @property string|null $os
 * @property string|null $lang
 * @property string|null $country
 * @property string|null $referer
 * @property string|null $ip
 */
class Metric extends DataModel
{
    protected array $fillable = [
        'page',
        'uri',
        'os',
        'lang',
        'country',
        'referer',
        'ip',
    ];

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    public static function fromRequest(Request $request): ?Metric
    {
        $route = $request->route();
        if (!$route) {
            return null;
        }

        $routeName = $route->getName();
        if (!$routeName) {
            return null;
        }

        return new static([
            'page'    => trim($routeName),
            'uri'     => $request->getUri(),
            'os'      => static::getOperatingSystem($request->userAgent()),
            'lang'    => strtolower(static::getLang($request)),
            'country' => strtolower(static::getCountry($request)),
            'referer' => static::getReferer(),
            'ip'      => $request->ip(),
        ]);
    }

    private static function getOperatingSystem(string $useragent): string
    {
        $patterns = [
            '/windows|win32|win16|win95/i'      => 'Windows',
            '/iphone/i'                         => 'iPhone',
            '/ipad/i'                           => 'iPad',
            '/macintosh|mac os x|mac_powerpc/i' => 'macOS',
            '/(?=.*mobile)android/i'            => 'AndroidMobile',
            '/(?!.*mobile)android/i'            => 'AndroidTablet',
            '/android/i'                        => 'Android',
            '/blackberry/i'                     => 'BlackBerry',
            '/linux/i'                          => 'Linux',
        ];

        foreach ($patterns as $regex => $value) {
            if (preg_match($regex, $useragent ?? '')) {
                return $value;
            }
        }

        return __('Unknown');
    }

    private static function getLang(Request $request): string
    {
        $language = $request->getPreferredLanguage();
        if (false !== $position = strpos($language, '_')) {
            $language = substr($language, 0, $position);
        }
        return $language;
    }

    private static function getReferer(): ?string
    {
        return app(Referer::class)->get();
    }

    private static function getCountry(Request $request): ?string
    {
        try {
            return geoip($request->ip())->iso_code;
        } catch (\Exception $e) {
            Log::error('Could not lookup geoip', format_log_context($e));
            return null;
        }
    }
}
