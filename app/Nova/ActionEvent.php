<?php

namespace App\Nova;

use App\Nova\Enums\ResourceGroup;
use Laravel\Nova\Actions\ActionResource;

class ActionEvent extends ActionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\ActionEvent::class;


    public static $group = ResourceGroup::SYSTEM;
}
