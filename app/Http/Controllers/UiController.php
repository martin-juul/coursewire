<?php

namespace App\Http\Controllers;

use App\PageVisits\Pages\HomePage;

class UiController extends Controller
{
    public function home()
    {
        visits(HomePage::class)->increment();

        return view('home');
    }

    public function courses()
    {
        return view('home');
    }
}
