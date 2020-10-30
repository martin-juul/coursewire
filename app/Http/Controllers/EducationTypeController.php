<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationTypeResource;
use App\Models\EducationType;
use Illuminate\Http\Request;

class EducationTypeController extends Controller
{
    public function index()
    {
        $items = EducationType::all();

        return EducationTypeResource::collection($items);
    }
}
