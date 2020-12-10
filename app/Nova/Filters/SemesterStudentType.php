<?php
declare(strict_types=1);

namespace App\Nova\Filters;

use App\Models\StudentType;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SemesterStudentType extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public $name = 'Elev type';

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
        return $query->where('student_type_id', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $res = StudentType::get();
        $options = [];

        foreach ($res as $studentType) {
            $options[] = [
                'name' => $studentType->title,
                'value' => $studentType->id,
            ];
        }

        return $options;
    }
}
