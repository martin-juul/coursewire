<?php

namespace App\Http\Composers;

use Illuminate\View\View;

interface ViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view): void;
}
