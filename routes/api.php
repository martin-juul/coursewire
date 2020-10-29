<?php

Route::get('student-types', 'StudentTypeController@index')
    ->name('api.student-type.index');

Route::get('educations', 'EducationController@index')
    ->name('api.education.index');
