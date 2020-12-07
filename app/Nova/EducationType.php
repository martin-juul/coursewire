<?php

namespace App\Nova;

use App\Nova\Concerns\StoreImageAttachment;
use App\Nova\Enums\ResourceGroup;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use OptimistDigital\MultiselectField\Multiselect;

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

            new Panel('Detaljer', $this->resourceDetailFields()),

            new Panel('Løn', $this->salaryFields()),

            Image::make('Billede', 'image_path')
                ->disk('spaces')
                ->prunable()
                ->hideFromIndex()
                ->preview(function ($value, $disk) {
                    return $value ?
                        config('app.cdn_url') . '/' . $value
                        : null;
                })->store(new StoreImageAttachment),


            Markdown::make('Om', 'about'),
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

    /**
     * Get the salary fields for the resource
     *
     * @return array
     */
    protected function salaryFields()
    {
        return [
            Text::make(__('Lærling timeløn'), 'training_salary')
                ->help('I Danske Kr.')
                ->hideFromIndex(),
            Text::make(__('Svend timeløn'), 'completion_salary')
                ->help('I Danske Kr.')
                ->hideFromIndex(),
        ];
    }

    /**
     * Get the detail fields for the resource
     *
     * @return array
     */
    protected function resourceDetailFields()
    {
        return [
            Text::make(__('ISCO-08 Kategori'), 'occupational_category')
                ->required()
                ->help('https://www.ilo.org/public/english/bureau/stat/isco/isco08/'),

            Text::make(__('Længde'), 'time_to_complete'),
            Text::make(__('Svendebrev'), 'credential_awarded'),
            Text::make(__('Uddannelse påkrævet'), 'program_prerequisites'),
            Text::make(__('Hovedforløbs længde'), 'term_duration')->hideFromIndex(),

            Select::make(__('Undervisning'), 'educational_program_mode')
                ->options([
                    'IN_PERSON' => 'Fysisk',
                    'ONLINE'    => 'Online',
                ])->hideFromIndex(),


            Select::make(__('Finansering'), 'financial_aid_eligible')
                ->options([
                    'PUBLIC_AID' => 'Offentlig',
                    'PRIVATE'    => 'Privat',
                ])->hideFromIndex(),

            Multiselect::make(__('Hovedforløb Uge dage'), 'day_of_week')
                ->hideFromIndex()
                ->options([
                    'Monday'    => __('Monday'),
                    'Tuesday'   => __('Tuesday'),
                    'Wednesday' => __('Wednesday'),
                    'Thursday'  => __('Thursday'),
                    'Friday'    => __('Friday'),
                    'Saturday'  => __('Saturday'),
                    'Sunday'    => __('Sunday'),
                ])->placeholder('Uge dage')
                ->saveAsJSON(),
        ];
    }
}
