<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationResource;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        $items = Education::select(['title', 'slug','version'])->distinct('title')->get();

        return EducationResource::collection($items);
    }
}
