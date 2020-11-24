<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeExtensionProvider extends ServiceProvider
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
        Blade::directive('duskroute', function () {
            if ($this->app->environment('production')) {
                return '<?php ?>';
            }

            $route = request()->route()->getName();
            return "<?php echo dusk=\"{$route}\" ?>";
        });
    }
}
