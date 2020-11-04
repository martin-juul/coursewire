<?php

namespace App\Providers;

use App\Http\Composers\ConfigComposer;
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
    }
}