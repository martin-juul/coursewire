<?php

Route::get('education-types', 'EducationTypeController@index')
    ->name('api.education-type.index');

Route::get('educations', 'EducationController@index')
    ->name('api.education.index');

Route::get('student-types', 'StudentTypeController@index')
    ->name('api.student-type.index');
