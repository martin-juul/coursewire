<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Education
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $user_id
 * @property string|null $overview
 * @property string|null $about
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $createdBy
 * @method static \Illuminate\Database\Eloquent\Builder|Education findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUserId($value)
 * @mixin \Eloquent
 */
class Education extends AbstractModel
{
    use HasCreatedBy, HasFactory, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'title',
        'overview',
        'about',
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
