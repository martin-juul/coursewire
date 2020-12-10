<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 25);

        $items = Course::paginate($perPage);

        return CourseResource::collection($items);
    }

    public function show(Request $request, $courseNo)
    {
        $item = Course::whereCourseNo($courseNo)->firstOrFail();

        return new CourseResource($item);
    }
}
