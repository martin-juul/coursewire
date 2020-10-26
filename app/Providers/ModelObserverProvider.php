<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Education;
use App\Observers\CourseObserver;
use App\Observers\EducationObserver;
use Illuminate\Support\ServiceProvider;

class ModelObserverProvider extends ServiceProvider
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
        Course::observe(CourseObserver::class);
        Education::observe(EducationObserver::class);
    }
}
