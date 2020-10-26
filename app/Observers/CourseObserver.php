<?php

namespace App\Observers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseObserver
{
    /**
     * Handle the course "created" event.
     *
     * @param \App\Models\Course $course
     *
     * @return void
     */
    public function created(Course $course)
    {
        //
    }

    public function creating(Course $course)
    {
        if (!$course->user_id) {
            $course->user_id = Auth::user()->id;
        }
    }

    /**
     * Handle the course "updated" event.
     *
     * @param \App\Models\Course $course
     *
     * @return void
     */
    public function updated(Course $course)
    {
        //
    }

    /**
     * Handle the course "deleted" event.
     *
     * @param \App\Models\Course $course
     *
     * @return void
     */
    public function deleted(Course $course)
    {
        //
    }

    /**
     * Handle the course "restored" event.
     *
     * @param \App\Models\Course $course
     *
     * @return void
     */
    public function restored(Course $course)
    {
        //
    }

    /**
     * Handle the course "force deleted" event.
     *
     * @param \App\Models\Course $course
     *
     * @return void
     */
    public function forceDeleted(Course $course)
    {
        //
    }
}
