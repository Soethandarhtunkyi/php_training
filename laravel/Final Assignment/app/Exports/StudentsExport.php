<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'Address',
            'Major_id',
            'Created_at',
            'Updated_at'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::select(
            [
                'name',
                'email',
                'phone',
                'address',
                'major_id',
                'created_at',
                'updated_at'
            ])->get();
    }
}
