<?php
declare(strict_types=1);

namespace App\Providers;

use App\Http\Composers\ConfigComposer;
use App\Http\Composers\JsonLdComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('layouts.app', ConfigComposer::class);
        \View::composer('layouts.app', JsonLdComposer::class);
    }
}
