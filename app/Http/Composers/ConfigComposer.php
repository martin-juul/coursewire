<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class ConfigComposer implements ViewComposer
{
    public function compose(View $view): void
    {
        $view->with('config', [
            'appName'         => config('app.name'),
            'customer'        => config('branding.name'),
            'customerAcronym' => config('branding.acronym'),
            'customerUrl'     => config('branding.url'),
            'env'             => config('app.env'),
            'baseUrl'         => config('app.url'),
        ]);
    }
}
