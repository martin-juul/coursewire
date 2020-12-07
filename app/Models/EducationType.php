<?php

namespace App\Models;

use App\Services\Markdown;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\SchemaOrg\Schema;

/**
 * App\Models\EducationType
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $short_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image_path
 * @property string|null $about
 * @property string|null $blur_hash
 * @property string|null $occupational_category
 * @property string|null $time_to_complete
 * @property string|null $credential_awarded
 * @property string|null $program_prerequisites
 * @property array|null $day_of_week
 * @property string|null $term_duration
 * @property int|null $terms_per_year
 * @property string|null $educational_program_mode
 * @property string|null $financial_aid_eligible
 * @property string|null $training_salary
 * @property string|null $completion_salary
 * @property string|null $program_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Education[] $educations
 * @property-read int|null $educations_count
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereBlurHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereCompletionSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereCredentialAwarded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereEducationalProgramMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereFinancialAidEligible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereOccupationalCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereProgramPrerequisites($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereProgramType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereTermDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereTermsPerYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereTimeToComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereTrainingSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EducationType extends AbstractModel implements StructuredData
{
    use HasFactory, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'title',
        'short_name',
        'about',
        'image_path',
        'blur_hash',
        'occupational_category',
        'time_to_complete',
        'credential_awarded',
        'program_prerequisites',
        'day_of_week',
        'term_duration',
        'educational_program_mode',
        'financial_aid_eligible',
        'training_salary',
        'completion_salary',
        'program_type'
    ];

    protected $casts = [
        'day_of_week' => 'json',
    ];

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function getImageUrl()
    {
        if (!$this->image_path) {
            return route('asset.hero', ['text' => base64_encode($this->title)]);
        }

        return config('app.cdn_url') . '/' . $this->image_path;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['short_name'],
            ],
        ];
    }

    public function jsonLd() {
        return Schema::workBasedProgram()
            ->name($this->title)
            ->description(strip_tags(app(Markdown::class)->text($this->about)))
            ->image(route('asset.hero', ['text' => base64_encode($this->title)]))
            ->programType($this->program_type)
            ->occupationalCategory($this->occupational_category)
            ->timeToComplete(Schema::duration()->setProperty('timeToComplete', $this->time_to_complete))
            ->setProperty('dayOfWeek', $this->day_of_week)
            ->programPrerequisites(
                Schema::educationalOccupationalCredential()
                    ->credentialCategory($this->program_prerequisites),
            )
            ->occupationalCredentialAwarded(
                Schema::educationalOccupationalCredential()->credentialCategory($this->credential_awarded)
            )
            ->addProperties([
                'trainingSalary'       => Schema::monetaryAmountDistribution()
                    ->currency('DKK')
                    ->median($this->training_salary),
                'salaryUponCompletion' => Schema::monetaryAmountDistribution()
                    ->currency('DKK')
                    ->median($this->completion_salary),
            ]);
    }
}
