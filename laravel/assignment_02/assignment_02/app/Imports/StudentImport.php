<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;


class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name' => $row[1],
            'email' => $row[2],
            'phone' => $row[3],
            'address' => $row[4],
            'major_id' => $row[5],

        ]);
    }
}
