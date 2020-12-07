<?php

namespace App\Http\Controllers;

use App\Models\{Course, EducationType};
use Illuminate\Http\Request;
use Spatie\SchemaOrg\EducationalOrganization;
use Spatie\SchemaOrg\Schema;

class UiController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function courses()
    {
        return view('courses');
    }

    public function showCourse(Request $request, string $courseNo)
    {
        $item = Course::whereCourseNo($courseNo)
            ->firstOrFail();

        $jsonLd = $item->jsonLd()
            ->provider($this->jsonLdOrg());


        return view('course-show', [
            'title'    => $item->title,
            'courseNo' => $item->course_no,
            'overview' => $item->overview ?? 'Fag på data og kommunikationsuddannelsen.',
            'jsonld'   => $jsonLd->jsonSerialize(),
        ]);
    }

    public function educations()
    {
        $educations = EducationType::select(['id', 'slug'])->get();
        $items = [];

        foreach ($educations as $index => $item) {
            $items[] = Schema::listItem()
                ->position($index + 1)
                ->url(route('educations.show', ['slug' => $item->slug]));
        }

        $jsonLd = Schema::itemList()->itemListElement($items);

        return view('educations', ['jsonld' => $jsonLd]);
    }

    public function showEducation(Request $request, string $slug)
    {
        $item = EducationType::whereSlug($slug)->firstOrFail();

        $jsonLd = $item->jsonLd()
            ->provider($this->jsonLdOrg());

        return view('education-show', [
            'title'  => $item->title,
            'slug'   => $item->slug,
            'image'  => $item->getImageUrl(),
            'jsonld' => $jsonLd->jsonSerialize(),
        ]);
    }

    public function studentTypes()
    {
        return view('student-types');
    }

    private function jsonLdOrg(): EducationalOrganization
    {
        return Schema::educationalOrganization()
            ->name(config('branding.name'))
            ->alternateName(config('branding.acronym'))
            ->url(config('branding.url'))
            ->email(config('branding.email'))
            ->telephone(config('branding.phone'))
            ->address(
                Schema::postalAddress()
                    ->streetAddress(config('branding.address.street'))
                    ->addressLocality(config('branding.address.locality'))
                    ->postalCode(config('branding.address.postal_code'))
                    ->addressCountry(config('branding.address.country'))
            );
    }
}
