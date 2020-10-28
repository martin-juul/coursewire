<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CourseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(File::get(base_path('database/seeders/data/dk_courses.json')), true, 512, JSON_THROW_ON_ERROR);

        $courses = [];

        foreach ($data['RECORDS'] as $course) {
            $course = Course::make([
                'title'     => $course['name'],
                'course_no' => $course['course_no'],
                'overview'  => $course['internship_desc'],
                'about'     => $course['school_attendance_desc'],
            ]);
            $courses[] = $course;
        }

        DB::transaction(function () use ($courses) {
            /** @var Course $course */
            foreach ($courses as $course) {
                $course->saveOrFail();
            }
        });
    }
}
