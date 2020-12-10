<?php
declare(strict_types=1);

namespace App\Nova\Filters;

use App\Models\EducationType;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SemesterEducationType extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public $name = 'Uddannelse';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->whereHas('education', function ($query) use ($value) {
            return $query->whereHas('educationType', function ($query) use ($value) {
                return $query->whereId($value);
            });
        });
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $types = EducationType::get();
        $options = [];

        foreach ($types as $type) {
            $options[] = [
                'name' => $type->title,
                'value' => $type->id,
            ];
        }

        return $options;
    }
}
