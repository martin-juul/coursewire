<?php
declare(strict_types=1);

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Nova\Actions\Actionable;

/**
 * App\Models\StudentType
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string|null $overview
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ActionEvent[] $actions
 * @property-read int|null $actions_count
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType findSimilarSlugs($attribute, $config, $slug)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|StudentType newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|StudentType newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|StudentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractModel withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class StudentType extends AbstractModel
{
    use Actionable, HasFactory, Sluggable, SluggableScopeHelpers;

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
