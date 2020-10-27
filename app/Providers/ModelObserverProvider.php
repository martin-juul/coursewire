<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\CourseSemester;
use App\Models\Education;
use App\Models\EducationStudentType;
use App\Models\Semester;
use App\Models\StudentType;
use App\Observers\CourseObserver;
use App\Observers\CourseSemesterObserver;
use App\Observers\EducationObserver;
use App\Observers\EducationStudentTypeObserver;
use App\Observers\SemesterObserver;
use App\Observers\StudentTypeObserver;
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
        CourseSemester::observe(CourseSemesterObserver::class);
        Education::observe(EducationObserver::class);
        EducationStudentType::observe(EducationStudentTypeObserver::class);
        Semester::observe(SemesterObserver::class);
        StudentType::observe(StudentTypeObserver::class);
    }
}
