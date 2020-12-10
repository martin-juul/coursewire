<?php
declare(strict_types=1);

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Nova\Actions\Actionable;

/**
 * App\Models\Education
 *
 * @property string $id
 * @property string $slug
 * @property string $version
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $education_type_id
 * @property-read \App\Models\EducationType $educationType
 * @method static \Illuminate\Database\Eloquent\Builder|Education findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereEducationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereVersion($value)
 * @mixin \Eloquent
 */
class Education extends AbstractModel
{
    use Actionable, HasFactory, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'version',
    ];

    protected $with = ['educationType'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['educationType.title', 'version'],
            ],
        ];
    }

    public function educationType()
    {
        return $this->belongsTo(EducationType::class);
    }
}
