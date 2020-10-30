<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\EducationType;
use App\Models\User;
use Illuminate\Database\Seeder;

class EducationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Throwable
     */
    public function run()
    {
        if (Education::count() > 0) {
            return;
        }

        $educationTypes = EducationType::all();

        foreach ($educationTypes as $type) {
            $education = Education::make(['version' => '9.1']);
            $education->educationType()->associate($type);
            $education->saveOrFail();
        }
    }
}
