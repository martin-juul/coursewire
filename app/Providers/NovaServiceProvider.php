<?php

namespace App\Providers;

use App\Analytics\Repository;
use App\Models\User;
use Coroowicaksono\ChartJsIntegration\AreaChart;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

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
}
