<?php

Route::get('educations', 'EducationController@index')
    ->name('api.education.index');

Route::get('educations/{educationTypeSlug}', 'EducationController@getVersion')
    ->name('api.educations.version');

Route::get('student-types', 'StudentTypeController@index')
    ->name('api.student-type.index');

Route::get('semesters/{educationSlug}/{studentTypeSlug}', 'SemesterController@getSemesters')
    ->name('api.semesters');
