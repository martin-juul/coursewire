<?php

namespace Database\Seeders;

use App\Models\StudentType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StudentTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(File::get(base_path('database/seeders/data/dk_student_types.json')), true, 512, JSON_THROW_ON_ERROR);

        $studentTypes = [];

        foreach ($data['RECORDS'] as $studentType) {
            $studentType = StudentType::make([
                'title'       => $studentType['title'],
                'overview'    => $studentType['overview'],
                'description' => $studentType['description'],
            ]);
            $studentTypes[] = $studentType;
        }

        DB::transaction(function () use ($studentTypes) {
            /** @var StudentType $course */
            foreach ($studentTypes as $studentType) {
                $studentType->saveOrFail();
            }
        });
    }
}
