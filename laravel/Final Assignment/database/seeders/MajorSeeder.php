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
        $names = ['Computer Science', 'Engineering', 'Business Management', 'Psychology'];
        foreach ($names as $name) {
            DB::table('majors')->insert([
                'name' => $name
            ]);
        }
    }
}

?>