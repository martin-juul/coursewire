<?php
declare(strict_types=1);

namespace App\Models;

use Laravel\Nova\Actions\Actionable;

/**
 * App\Models\EducationStudentType
 *
 * @property string $id
 * @property string $education_id
 * @property string $student_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\Education $education
 * @property-read \App\Models\StudentType $studentType
 * @method static \Illuminate\Database\Eloquent\Builder|EducationStudentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationStudentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationStudentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationStudentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationStudentType whereEducationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationStudentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationStudentType whereStudentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationStudentType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EducationStudentType extends AbstractPivot
{
    use Actionable;

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function studentType() {
        return $this->belongsTo(StudentType::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }
}
