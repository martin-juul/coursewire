<?php

namespace App\Nova;

use App\Nova\Enums\ResourceGroup;
use App\Nova\Lenses\CourseLens;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;

/**
 * @mixin \App\Models\Course
 */
class Course extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Course::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'course_no';

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
        'course_no',
        'title',
    ];

    public static function label()
    {
        return 'Fag';
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->course_no . ' - ' . $this->title;
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
            Text::make(__('Fag Nr'), 'course_no')->required()->sortable(),
            Text::make(__('Titel'), 'title')->required(),
            Markdown::make(__('Oversigt'), 'overview')->hideFromIndex(),
            Markdown::make(__('Beskrivelse'), 'about')->hideFromIndex(),
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
        return [
            CourseLens::make(),
        ];
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
