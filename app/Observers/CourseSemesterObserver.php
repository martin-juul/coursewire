<?php

namespace App\Observers;

use App\Models\CourseSemester;
use Illuminate\Support\Facades\Auth;

class CourseSemesterObserver
{
    /**
     * Handle the course semester "created" event.
     *
     * @param  \App\Models\CourseSemester  $courseSemester
     * @return void
     */
    public function created(CourseSemester $courseSemester)
    {
        //
    }

    public function creating(CourseSemester $courseSemester)
    {
        if (!$courseSemester->user_id) {
            $courseSemester->user_id = Auth::user()->id;
        }
    }

    /**
     * Handle the course semester "updated" event.
     *
     * @param  \App\Models\CourseSemester  $courseSemester
     * @return void
     */
    public function updated(CourseSemester $courseSemester)
    {
        //
    }

    /**
     * Handle the course semester "deleted" event.
     *
     * @param  \App\Models\CourseSemester  $courseSemester
     * @return void
     */
    public function deleted(CourseSemester $courseSemester)
    {
        //
    }

    /**
     * Handle the course semester "restored" event.
     *
     * @param  \App\Models\CourseSemester  $courseSemester
     * @return void
     */
    public function restored(CourseSemester $courseSemester)
    {
        //
    }

    /**
     * Handle the course semester "force deleted" event.
     *
     * @param  \App\Models\CourseSemester  $courseSemester
     * @return void
     */
    public function forceDeleted(CourseSemester $courseSemester)
    {
        //
    }
}
