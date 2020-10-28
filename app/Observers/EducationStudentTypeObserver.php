<?php

namespace App\Observers;

use App\Models\EducationStudentType;
use Illuminate\Support\Facades\Auth;

class EducationStudentTypeObserver
{
    /**
     * Handle the education student type "created" event.
     *
     * @param  \App\Models\EducationStudentType  $educationStudentType
     * @return void
     */
    public function created(EducationStudentType $educationStudentType)
    {
        //
    }

    /**
     * Handle the education student type "updated" event.
     *
     * @param  \App\Models\EducationStudentType  $educationStudentType
     * @return void
     */
    public function updated(EducationStudentType $educationStudentType)
    {
        //
    }

    /**
     * Handle the education student type "deleted" event.
     *
     * @param  \App\Models\EducationStudentType  $educationStudentType
     * @return void
     */
    public function deleted(EducationStudentType $educationStudentType)
    {
        //
    }

    /**
     * Handle the education student type "restored" event.
     *
     * @param  \App\Models\EducationStudentType  $educationStudentType
     * @return void
     */
    public function restored(EducationStudentType $educationStudentType)
    {
        //
    }

    /**
     * Handle the education student type "force deleted" event.
     *
     * @param  \App\Models\EducationStudentType  $educationStudentType
     * @return void
     */
    public function forceDeleted(EducationStudentType $educationStudentType)
    {
        //
    }
}
