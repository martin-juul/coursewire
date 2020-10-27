<?php

namespace App\Models;

/**
 * App\Models\CourseSemester
 *
 * @property string $id
 * @property string $course_id
 * @property string|null $semester_id
 * @property int $duration
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\Semester|null $semester
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereSemesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseSemester whereUserId($value)
 * @mixin \Eloquent
 */
class CourseSemester extends AbstractModel
{
    use HasCreatedBy;

    protected $table = 'course_semester';

    protected $fillable = [
        'duration',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

}
