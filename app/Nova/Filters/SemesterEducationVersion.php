<?php
declare(strict_types=1);

namespace App\Nova\Filters;

use App\Models\Education;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SemesterEducationVersion extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public $name = 'Version';

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
        return $query->whereHas('education', fn($query) => $query->where('version', $value));
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $res = Education::select(['version'])->distinct()->pluck('version')->toArray();

        $options = [];

        foreach ($res as $val) {
            $options[] = ['name' => $val, 'value' => $val];
        }

        return $options;
    }
}
