<?php

namespace App\Observers;

use App\Models\Education;
use Illuminate\Support\Facades\Auth;

class EducationObserver
{
    /**
     * Handle the education "created" event.
     *
     * @param  \App\Models\Education  $education
     * @return void
     */
    public function created(Education $education)
    {
        //
    }

    /**
     * Handle the education "updated" event.
     *
     * @param  \App\Models\Education  $education
     * @return void
     */
    public function updated(Education $education)
    {
        //
    }

    /**
     * Handle the education "deleted" event.
     *
     * @param  \App\Models\Education  $education
     * @return void
     */
    public function deleted(Education $education)
    {
        //
    }

    /**
     * Handle the education "restored" event.
     *
     * @param  \App\Models\Education  $education
     * @return void
     */
    public function restored(Education $education)
    {
        //
    }

    /**
     * Handle the education "force deleted" event.
     *
     * @param  \App\Models\Education  $education
     * @return void
     */
    public function forceDeleted(Education $education)
    {
        //
    }
}
