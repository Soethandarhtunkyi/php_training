<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Service class for student.
 */
class StudentService implements StudentServiceInterface
{
    /**
     * student dao
     */
    private $studentDao;
    /**
     * Class Constructor
     * @param StudentDaoInterface
     * @return
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * To get student lists
     * @return $array of students
     */
    public function getStudents()
    {
        return $this->studentDao->getStudents();
    }

    /**
     * To get major lists
     * @return $array of majors
     */
    public function getMajors()
    {
        return $this->studentDao->getMajors();
    }

    /**
     * To save student
     * @param Request $request request with inputs
     * @return Object saved student
     */
    public function saveStudent(Request $request)
    {
        return $this->studentDao->saveStudent($request);
    }

    /**
     * To update student
     * @param Request $request request with inputs
     * @param Student $student
     * @return Object saved student
     */
    public function updateStudent(Request $request, Student $student)
    {
        return $this->studentDao->updateStudent($request, $student);
    }

    /**
     * To delete student
     * @param Student $student
     * @return Object saved student
     */
    public function deleteStudent(Student $student)
    {
        return $this->studentDao->deleteStudent($student);
    }

    public function importView(Request $request){
        return $this->studentDao->importView($request);
      }
      
    public function import(Request $request){
      
      return $this->studentDao->import($request);
      }
    public function export(Request $request){
      
      return $this->studentDao->export($request);
      }
}
?>