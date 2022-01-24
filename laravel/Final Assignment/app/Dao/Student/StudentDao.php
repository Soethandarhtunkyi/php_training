<?php

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Major;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

/**
 * Data Access Object for Student
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * To get student lists
     * @return $array of students
     */
    public function getStudents()
    {
        return Student::with('major')->orderBy('created_at', 'asc')->get();
    }

    /**
     * To get major lists
     * @return $array of majors
     */
    public function getMajors()
    {
        return Major::all();
    }

    /**
     * To save student
     * @param Request $request request with inputs
     * @return Object saved student
     */
    public function saveStudent(Request $request)
    {
        return Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'major_id' => $request->major
        ]);
    }

    /**
     * To update student
     * @param Request $request request with inputs
     * @param App\Models\Student $student
     * @return Object saved student
     */
    public function updateStudent(Request $request, Student $student)
    {
        return $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'major_id' => $request->major
        ]);
    }

    /**
     * To delete student
     * @param App\Models\Student $student
     * @return Object saved student
     */
    public function deleteStudent(Student $student)
    {
        return $student->delete();
    }

    /**
     * To upload csv file
     * @return File upload csv
     */
    public function uploadCSV()
    {
        return Excel::import(new StudentsImport, request()->file('file'));
    }

    /**
     * To search student lists
     * @return $array of students
     */
    public function searchStudent(Request $request)
    {
        $name = $request->name;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $students = DB::table('students')
            ->join('majors', 'students.major_id', '=', 'majors.id')
            ->whereNull('students.deleted_at')
            ->select('students.*', 'majors.name as major');
        if ($name) {
            $students->where('students.name', 'LIKE', '%' . $name . '%');
        }
        if ($start_date) {
            $students->whereDate('students.created_at', '>=', $start_date);
        }
        if ($end_date) {
            $students->whereDate('students.created_at', '<=', $end_date);
        }
        return $students->get()->except('students.deleted_at');
    }

    /**
     * Send email with student form
     */
    public function sendEmailForm()
    {
        $students = DB::table('students')
            ->join('majors', 'students.major_id', '=', 'majors.id')
            ->whereNull('students.deleted_at')
            ->select('students.*', 'majors.name as major');
        return $students->get();
    }
}
