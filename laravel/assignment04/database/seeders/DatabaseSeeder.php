<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Major;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        // \App\Models\Major::factory(5)->create();
        Major::factory()->count(5)->create();

        // \App\Models\Student::factory(100)->create();
        Student::factory()->count(100)->create();
    }
}
