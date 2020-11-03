<?php

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

    public function getVersion(Request $request, string $educationTypeSlug)
    {
        $type = EducationType::whereSlug($educationTypeSlug)->firstOrFail();
        $education = null;
        $version = $request->query('version');

        if ($version) {
            $education = $type->educations()->where('version', '=', $version);
        } else {
            $education = $type->educations()->orderBy('version')->firstOrFail();
        }

        return new EducationResource($education);
    }
}
