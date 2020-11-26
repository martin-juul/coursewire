<?php

namespace App\PageVisits\Pages;

class PageFactory
{
    private static $mapping = [
        'courses'         => CoursesPage::class,
        'courses.show'    => CoursePage::class,
        'educations'      => EducationsPage::class,
        'educations.show' => EducationPage::class,
        'home'            => HomePage::class,
        'student-types'   => StudentTypePage::class,
    ];

    public static function make(string $route): ?Page
    {
        $page = static::$mapping[$route] ?? null;

        if (!$page) {
            return null;
        }

        return new $page;
    }
}
