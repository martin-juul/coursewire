<?php
declare(strict_types=1);

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Nova\Actions\Actionable;
use Spatie\SchemaOrg\Schema;

/**
 * App\Models\Course
 *
 * @property string $id
 * @property string $course_no
 * @property string $title
 * @property string $slug
 * @property string|null $overview
 * @property string|null $about
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ActionEvent[] $actions
 * @property-read int|null $actions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Semester[] $semesters
 * @property-read int|null $semesters_count
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractModel disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|Course findSimilarSlugs($attribute, $config, $slug)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Course newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Course newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbstractModel withCacheCooldownSeconds($seconds = null)
 * @mixin \Eloquent
 */
class Course extends AbstractModel implements StructuredData
{
    use Actionable, HasFactory, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'title',
        'course_no',
        'overview',
        'about',
    ];

    protected $primaryKey = 'id';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'course_no'],
            ],
        ];
    }

    public function semesters()
    {
        return $this->belongsToMany(Semester::class)
            ->using(CourseSemester::class)
            ->withPivot(['duration']);
    }

    public function jsonLd(): \Spatie\SchemaOrg\Course
    {
        return Schema::course()
            ->name($this->title)
            ->description(strip_tags($this->overview))
            ->courseCode($this->course_no)
            ->image(route('asset.hero', ['text' => base64_encode($this->title)]))
            ->teaches($this->about);
    }
}
