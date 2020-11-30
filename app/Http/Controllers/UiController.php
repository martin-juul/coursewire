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
            ->select(['id', 'title', 'course_no'])
            ->firstOrFail();

        return view('course-show', [
            'courseTitle' => $item->title,
            'courseNo'    => $item->course_no,
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
        ]);
    }

    public function studentTypes()
    {
        return view('student-types');
    }
}
