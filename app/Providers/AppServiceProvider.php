<?php

namespace App\Providers;

use App\Services\Markdown;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Markdown::class, function () {
            return new Markdown((new \Parsedown)
                ->setBreaksEnabled(config('parsedown.breaks'))
                ->setMarkupEscaped(config('parsedown.escape'))
                ->setUrlsLinked(config('parsedown.link_urls'))
                ->setSafeMode(config('parsedown.safe_mode')));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
