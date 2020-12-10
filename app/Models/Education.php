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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ActionEvent[] $actions
 * @property-read int|null $actions_count
 * @property-read \App\Models\EducationType $educationType
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|Education findSimilarSlugs($attribute, $config, $slug)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Education newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Education newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereEducationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractModel withCacheCooldownSeconds($seconds = null)
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
