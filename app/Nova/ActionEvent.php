<?php
declare(strict_types=1);

namespace App\Nova;

use App\Nova\Enums\ResourceGroup;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\ActionResource;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\MorphToActionTarget;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class ActionEvent extends ActionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\ActionEvent::class;


    public static $group = ResourceGroup::SYSTEM;

    public static $title = 'name';

    public static $globallySearchable = false;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Text::make(__('Action Name'), 'name', function ($value) {
                return __($value);
            }),

            Text::make(__('Action Initiated By'), function () {
                return $this->user->name ?? $this->user->email ?? __('Nova User');
            }),

            MorphToActionTarget::make(__('Action Target'), 'target'),

            Status::make(__('Action Status'), 'status', function ($value) {
                return __(ucfirst($value));
            })->loadingWhen([__('Waiting'), __('Running')])->failedWhen([__('Failed')]),

            $this->when(isset($this->original), function () {
                return KeyValue::make(__('Original'), 'original');
            }),

            $this->when(isset($this->changes), function () {
                return KeyValue::make(__('Changes'), 'changes');
            }),

            Textarea::make(__('Exception'), 'exception'),

            DateTime::make(__('Action Happened At'), 'created_at')->exceptOnForms(),
        ];
    }
}
