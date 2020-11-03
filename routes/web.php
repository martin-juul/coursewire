<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UiController@home')->name('home');

Route::group(['prefix' => 'fag'], function () {
    Route::get('', 'UiController@courses')->name('courses');
    Route::get('{courseNo}', 'UiController@showCourse')->name('courses.show');
});
