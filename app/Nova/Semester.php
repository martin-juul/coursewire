<?php
declare(strict_types=1);

namespace App\Nova;

use App\Nova\Enums\ResourceGroup;
use App\Nova\Filters\SemesterEducationType;
use App\Nova\Filters\SemesterEducationVersion;
use App\Nova\Filters\SemesterStudentType;
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

    public static $group = ResourceGroup::EDUCATION;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'semester',
    ];

    public static function label()
    {
        return 'Hovedforløb';
    }

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
            BelongsTo::make('Uddannelse', 'education', 'App\Nova\Education'),

            Text::make(__('Hovedforløb'), 'semester')->sortable()->required(),
            BelongsTo::make('Elev Type', 'studentType', 'App\Nova\StudentType')->required(),

            BelongsToMany::make(__('Fag'), 'courses', 'App\Nova\Course')
                ->fields(function () {
                    return [
                        Number::make(__('Days'), 'duration')
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
        return [
            new SemesterEducationType,
            new SemesterStudentType,
            new SemesterEducationVersion,
        ];
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
