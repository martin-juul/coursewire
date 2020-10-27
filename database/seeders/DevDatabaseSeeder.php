<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DevDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CourseSeed::class,
            StudentTypeSeed::class,
            EducationSeed::class,
        ]);
    }
}
