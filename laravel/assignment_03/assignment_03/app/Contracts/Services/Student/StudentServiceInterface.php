<?php

namespace App\Contracts\Services\Student;

use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Interface for Student service
 */
interface StudentServiceInterface
{
    /**
     * To get student lists
     * @return $array of students
     */
    public function getStudents();

    /**
     * To get major lists
     * @return $array of majors
     */
    public function getMajors();

    /**
     * To save student
     * @param Request $request request with inputs
     * @return Object saved student
     */
    public function saveStudent(Request $request);

    /**
     * To update student
     * @param Request $request request with inputs
     * @param App\Models\Student $student
     * @return Object saved student
     */
    public function updateStudent(Request $request, Student $student);

    /**
     * To delete student
     * @param App\Models\Student $student
     * @return Object saved student
     */
    public function deleteStudent(Student $student);

    public function importView(Request $request);

    public function import(Request $request);

    public function export(Request $request);
    public function studentSearch(Request $request);
}
?>