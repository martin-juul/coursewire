<?php

namespace App\Observers;

use App\Models\Semester;
use Illuminate\Support\Facades\Auth;

class SemesterObserver
{
    /**
     * Handle the semester "created" event.
     *
     * @param  \App\Models\Semester  $semester
     * @return void
     */
    public function created(Semester $semester)
    {
        //
    }

    public function creating(Semester $semester)
    {
        if (!$semester->user_id) {
            $semester->user_id = Auth::user()->id;
        }
    }

    /**
     * Handle the semester "updated" event.
     *
     * @param  \App\Models\Semester  $semester
     * @return void
     */
    public function updated(Semester $semester)
    {
        //
    }

    /**
     * Handle the semester "deleted" event.
     *
     * @param  \App\Models\Semester  $semester
     * @return void
     */
    public function deleted(Semester $semester)
    {
        //
    }

    /**
     * Handle the semester "restored" event.
     *
     * @param  \App\Models\Semester  $semester
     * @return void
     */
    public function restored(Semester $semester)
    {
        //
    }

    /**
     * Handle the semester "force deleted" event.
     *
     * @param  \App\Models\Semester  $semester
     * @return void
     */
    public function forceDeleted(Semester $semester)
    {
        //
    }
}
