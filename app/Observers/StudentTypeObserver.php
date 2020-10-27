<?php

namespace App\Observers;

use App\Models\StudentType;
use Illuminate\Support\Facades\Auth;

class StudentTypeObserver
{
    /**
     * Handle the student type "created" event.
     *
     * @param  \App\Models\StudentType  $studentType
     * @return void
     */
    public function created(StudentType $studentType)
    {
        //
    }

    public function creating(StudentType $studentType)
    {
        if (!$studentType->user_id) {
            $studentType->user_id = Auth::user()->id;
        }
    }

    /**
     * Handle the student type "updated" event.
     *
     * @param  \App\Models\StudentType  $studentType
     * @return void
     */
    public function updated(StudentType $studentType)
    {
        //
    }

    /**
     * Handle the student type "deleted" event.
     *
     * @param  \App\Models\StudentType  $studentType
     * @return void
     */
    public function deleted(StudentType $studentType)
    {
        //
    }

    /**
     * Handle the student type "restored" event.
     *
     * @param  \App\Models\StudentType  $studentType
     * @return void
     */
    public function restored(StudentType $studentType)
    {
        //
    }

    /**
     * Handle the student type "force deleted" event.
     *
     * @param  \App\Models\StudentType  $studentType
     * @return void
     */
    public function forceDeleted(StudentType $studentType)
    {
        //
    }
}
