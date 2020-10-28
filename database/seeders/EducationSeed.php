<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\User;
use Illuminate\Database\Seeder;

class EducationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educations = [
            ['title' => 'Datatekniker med speciale i Programmering'],
            ['title' => 'Datatekniker med speciale i Infrastruktur'],
            ['title' => 'IT-Supporter'],
        ];

        foreach ($educations as $edu) {
            Education::make(['title' => $edu['title'], 'version' => '9.1']);
        }
    }
}
