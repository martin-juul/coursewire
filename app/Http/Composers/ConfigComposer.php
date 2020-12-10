<?php
declare(strict_types=1);

namespace App\Http\Composers;

use Illuminate\View\View;

class ConfigComposer implements ViewComposer
{
    public function compose(View $view): void
    {
        $view->with('config', [
            'appName'         => config('app.name'),
            'customer'        => nova_get_setting('branding.name', config('branding.name')),
            'customerAcronym' => nova_get_setting('branding.acronym', config('branding.acronym')),
            'customerUrl'     => nova_get_setting('branding.url', config('branding.url')),
            'env'             => config('app.env'),
            'baseUrl'         => config('app.url'),
        ]);
    }
}
