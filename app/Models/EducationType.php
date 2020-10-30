<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\EducationType
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $short_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Education[] $educations
 * @property-read int|null $educations_count
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EducationType extends AbstractModel
{
    use HasFactory, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'title',
        'short_name',
    ];

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['short_name'],
            ],
        ];
    }
}
