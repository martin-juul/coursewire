<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UiController@home')->name('home');

Route::get('/fag', 'UiController@courses')->name('courses');
