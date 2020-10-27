<?php

namespace App\Models;

trait HasCreatedBy
{
    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }
}
