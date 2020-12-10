<?php
declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class PageVisitsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::macro('endOfxHours', function ($xhours) {
            if ($xhours > 12) {
                throw new \Exception('12 is the maximum period in xHours feature');
            }
            $h = $this->hour;

            return $this->setTime(
                ($h % $xhours === 0 ? 'min' : 'max')($h - ($h % $xhours), $h - ($h % $xhours) + $xhours),
                59,
                59
            );
        });
    }
}
