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
            'occupational_category' => '3512',

        ]);

        EducationType::create([
            'title'      => 'Datatekniker med speciale i programmering',
            'short_name' => 'Datatekniker / Programmering',
            'occupational_category' => '2512',
        ]);

        EducationType::create([
            'title'      => 'Datatekniker med speciale i infrastruktur',
            'short_name' => 'Datatekniker / Infrastruktur',
            'occupational_category' => '3513',
        ]);
    }
}
