<?php

namespace App\Models;

class CourseSemester extends AbstractPivot
{
    use HasCreatedBy;

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
