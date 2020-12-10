<?php
declare(strict_types=1);

namespace App\Models;

use Laravel\Nova\Actions\Actionable;

/**
 * App\Models\CourseSemester
 *
 * @property string $id
 * @property string $course_id
 * @property string|null $semester_id
 * @property int $duration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $course
 * @property-read int|null $course_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Semester[] $semester
 * @property-read int|null $semester_count
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereSemesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CourseSemester extends AbstractPivot
{
    use Actionable;

    protected $table = 'course_semester';

    protected $fillable = [
        'duration',
    ];

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function semester()
    {
        return $this->hasMany(Semester::class);
    }

}
