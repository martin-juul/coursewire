<?php

namespace App\Nova;

use App\Nova\Concerns\StoreImageAttachment;
use App\Nova\Enums\ResourceGroup;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

/**
 * @mixin \App\Models\EducationType
 */
class EducationType extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\EducationType::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

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
        'title',
    ];

    public static function label()
    {
        return 'Uddannelse';
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
            Text::make(__('Titel'), 'title')->required(),
            Text::make(__('Kort navn'), 'short_name')->required(),
            Text::make(__('ISCO-08'), 'occupational_category')
                ->required()
                ->help('https://www.ilo.org/public/english/bureau/stat/isco/isco08/'),
            Image::make('Billede', 'image_path')
                ->disk('spaces')
                ->prunable()
                ->preview(function ($value, $disk) {
                    return $value ?
                        config('app.cdn_url') . '/' . $value
                        : null;
                })->store(new StoreImageAttachment),
            Trix::make('Om', 'about'),
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
