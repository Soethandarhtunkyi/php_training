<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class StudentsImport implements ToModel, WithHeadingRow, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'name'  => $row['name'],
            'email' => $row['email'],
            'phone'    => $row['phone'],
            'address'    => $row['address'],
            'major_id'    => $row['major_id'],
            'created_at'    => $row['created_at'],
            'updated_at'    => $row['updated_at'],
        ]);
    }
}
