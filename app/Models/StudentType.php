<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\StudentType
 *
 * @property string $id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $createdBy
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereUserId($value)
 * @mixin \Eloquent
 */
class StudentType extends AbstractModel
{
    use HasCreatedBy, HasFactory, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'title',
        'overview',
        'description',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title'],
            ],
        ];
    }
}
