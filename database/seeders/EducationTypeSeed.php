<?php

namespace Database\Seeders;

use App\Models\EducationType;
use Illuminate\Database\Seeder;

class EducationTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (EducationType::count() > 0) {
            return;
        }

        EducationType::create([
            'title'      => 'IT-Supporter',
            'short_name' => 'IT-Supporter',
        ]);

        EducationType::create([
            'title'      => 'Datatekniker med speciale i programmering',
            'short_name' => 'Datatekniker / Programmering',
        ]);

        EducationType::create([
            'title'      => 'Datatekniker med speciale i infrastruktur',
            'short_name' => 'Datatekniker / Infrastruktur',
        ]);
    }
}
