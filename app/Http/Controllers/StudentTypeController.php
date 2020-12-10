<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\StudentType;

class StudentTypeController extends Controller
{
    public function index()
    {
        $items = StudentType::all();

        return \App\Http\Resources\StudentType::collection($items);
    }
}
