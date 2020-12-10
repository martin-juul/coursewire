<?php
declare(strict_types=1);

namespace App\Providers;

use App\Analytics\Repository;
use App\Assets\Logo;
use App\Models\User;
use Coroowicaksono\ChartJsIntegration\AreaChart;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use OptimistDigital\NovaSettings\NovaSettings;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::style('cw-dash', base_path('public/css/dashboard.css'));

        static::bootSettings();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user instanceof User;
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        $repository = app(Repository::class);
        $today = $repository->getToday();
        $scores = [];

        foreach ($today as $page => $score) {
            $scores[] = ['label' => ucfirst($page), 'data' => [$score]];
        }

        return [
            (new AreaChart())
                ->title('Besøg')
                ->animations([
                    'enabled' => true,
                    'easing'  => 'easeinout',
                ])->series($scores)
                ->options([
                    'xaxis' => [
                        'categories' => ['Visits'],
                    ],
                ])->width('2/3'),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \Mastani\NovaPasswordReset\NovaPasswordReset,
            new \OptimistDigital\NovaSettings\NovaSettings,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected static function bootSettings()
    {
        NovaSettings::addSettingsFields([
            Image::make('Banner', 'banner')
                ->disk('spaces')
                ->prunable()
                ->preview(function ($value, $disk) {
                    return $value ?
                        config('app.cdn_url') . '/' . $value
                        : Logo::banner();
                }),

            Image::make('Favicon', 'favicon')
                ->disk('spaces')
                ->prunable()
                ->preview(function ($value, $disk) {
                    return $value ?
                        config('app.cdn_url') . '/' . $value
                        : Logo::favicon();
                }),

            Image::make('Ikon', 'icon')
                ->disk('spaces')
                ->prunable()
                ->preview(function ($value, $disk) {
                    return $value ?
                        config('app.cdn_url') . '/' . $value
                        : Logo::icon();
                }),
        ], [], 'Logo');

        NovaSettings::addSettingsFields([
            Text::make('Navn', 'name'),
            Text::make('Akronym', 'acronym'),
            Text::make('E-Mail', 'email'),
            Text::make('Telefon nr.', 'phone'),
            Text::make('Hjemmeside', 'url'),
            Text::make('Vej', 'street'),
            Text::make('By', 'locality'),
            Text::make('Post nr', 'postal_code'),
            Text::make('Landekode', 'country'),
        ], [], 'Branding');
    }
}
