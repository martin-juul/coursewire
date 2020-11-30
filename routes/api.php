<?php

Route::get('courses', 'CourseController@index')
    ->name('api.courses.index');

Route::get('courses/{courseNo}', 'CourseController@show')
    ->name('api.courses.show');

Route::get('educations', 'EducationController@index')
    ->name('api.education.index');

Route::get('educations/type/{slug}', 'EducationController@show')
    ->name('api.educations.show');

Route::get('educations/{educationTypeSlug}', 'EducationController@getVersions')
    ->name('api.educations.versions');

Route::get('educations/{educationTypeSlug}/version', 'EducationController@getVersion')
    ->name('api.educations.version');

Route::get('student-types', 'StudentTypeController@index')
    ->name('api.student-type.index');

Route::get('semesters/{educationSlug}/{studentTypeSlug}', 'SemesterController@getSemesters')
    ->name('api.semesters');
