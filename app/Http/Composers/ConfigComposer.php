<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class ConfigComposer implements ViewComposer
{
    public function compose(View $view): void
    {
        $view->with('config', [
            'appName'         => config('app.name'),
            'customer'        => config('app.customer'),
            'customerAcronym' => config('app.customer_acronym'),
            'customerUrl'     => config('app.customer_url'),
            'env'             => config('app.env'),
            'baseUrl'         => config('app.url'),
        ]);
    }
}
