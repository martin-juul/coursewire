<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UiController@home')->name('home');

Route::group(['prefix' => 'fag'], function () {
    Route::get('', 'UiController@courses')->name('courses');
    Route::get('{courseNo}', 'UiController@showCourse')->name('courses.show');
});

Route::group(['prefix' => 'uddannelserne'], function () {
    Route::get('', 'UiController@educations')->name('educations');
    Route::get('{slug}', 'UiController@showEducation')->name('educations.show');
});

Route::get('/elevtyper', 'UiController@studentTypes')->name('student-types');
