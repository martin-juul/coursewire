<?php
declare(strict_types=1);

namespace App\Providers;

use App\Assets\Logo;
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

        Blade::directive('appbanner', fn() => Logo::banner());
        Blade::directive('appfavicon', fn() => Logo::favicon());
        Blade::directive('appicon', fn() => Logo::icon());
    }
}
