<?php

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Major;

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
}
?>