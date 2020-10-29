<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Juul\Fields\BelongsToMany;
use Laravel\Nova\Fields\{BelongsTo, Number, Text};

class Semester extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Semester::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'semester';

    /**
     * Indicates whether Nova should prevent the user from leaving an unsaved form, losing their data.
     *
     * @var bool
     */
    public static $preventFormAbandonment = true;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'semester',
    ];


    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('Education'),

            Text::make(__('Semester'), 'semester')->sortable()->required(),
            BelongsTo::make('StudentType')->required(),

            BelongsToMany::make(__('Fag'), 'courses', 'App\Nova\Course')
                ->fields(function () {
                    return [
                        Number::make(__('Dage'), 'duration')
                            ->rules('required', 'numeric'),
                    ];
                })->pivots(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
