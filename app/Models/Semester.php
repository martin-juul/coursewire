<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
