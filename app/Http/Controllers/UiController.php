<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\EducationType;
use App\PageVisits\Pages\HomePage;
use Illuminate\Http\Request;

class UiController extends Controller
{
    public function home()
    {
        visits(HomePage::class)->increment();

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
}
