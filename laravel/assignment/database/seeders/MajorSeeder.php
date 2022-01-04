<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Computer Science', 'Computer Technology', 'Civil Engineering', 'Business Management', 'HR'];
        foreach ($names as $name) {
            DB::table('majors')->insert([
                'name' => $name,
            ]);
        }
    }
}

?>