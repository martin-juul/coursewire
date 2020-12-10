<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Http\Resources\EducationTypeResource;
use App\Models\EducationType;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $items = EducationType::all();

        return EducationTypeResource::collection($items);
    }

    public function show(Request $request, string $slug)
    {
        $item = EducationType::whereSlug($slug)->firstOrFail();

        return new EducationTypeResource($item);
    }

    public function getVersions(Request $request, string $educationTypeSlug)
    {
        $type = EducationType::whereSlug($educationTypeSlug)->firstOrFail();
        $educations = $type->educations()->get();

        return EducationResource::collection($educations);
    }

    public function getVersion(Request $request, string $educationTypeSlug)
    {
        $type = EducationType::whereSlug($educationTypeSlug)->firstOrFail();
        $education = null;
        $version = $request->query('version');

        if ($version) {
            $education = $type->educations()->where('version', '=', $version)->firstOrFail();
        } else {
            $education = $type->educations()->orderBy('version', 'desc')->firstOrFail();
        }

        return new EducationResource($education);
    }
}
