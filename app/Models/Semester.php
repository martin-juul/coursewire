<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Semester
 *
 * @property string $id
 * @property string $education_id
 * @property string $student_type_id
 * @property int $semester
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\Education $education
 * @property-read \App\Models\StudentType $studentType
 * @method static \Illuminate\Database\Eloquent\Builder|Semester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Semester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Semester query()
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereEducationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereStudentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereUserId($value)
 * @mixin \Eloquent
 */
class Semester extends AbstractModel
{
    use HasCreatedBy, HasFactory;

    protected $fillable = [
        'semester'
    ];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function studentType()
    {
        return $this->belongsTo(StudentType::class);
    }
}
