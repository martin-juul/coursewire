<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\SemesterResource;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function getSemesters(Request $request, string $educationSlug, string $studentTypeSlug)
    {
        $semesters = Semester::whereHas('education', function (Builder $q) use ($educationSlug) {
            $q->where('slug', '=', $educationSlug);
        })->whereHas('studentType', function (Builder $q) use ($studentTypeSlug) {
            $q->where('slug', '=', $studentTypeSlug);
        })->with(['courses'])->get();

        return SemesterResource::collection($semesters);
    }
}
