<?php

namespace App\Http\Controllers;

use App\Models\{Course, EducationType};
use Illuminate\Http\Request;

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
            ->select(['id', 'title', 'course_no', 'overview', 'about'])
            ->firstOrFail();

        return view('course-show', [
            'title'     => $item->title,
            'courseNo'  => $item->course_no,
            'overview'  => $item->overview ?? 'Fag på data og kommunikationsuddannelsen.',
            'about'     => $item->about,
        ]);
    }

    public function educations()
    {
        return view('educations');
    }

    public function showEducation(Request $request, string $slug)
    {
        $item = EducationType::whereSlug($slug)->firstOrFail();

        return view('education-show', [
            'title' => $item->title,
            'slug'  => $item->slug,
            'image' => $item->getImageUrl(),
        ]);
    }

    public function studentTypes()
    {
        return view('student-types');
    }
}
