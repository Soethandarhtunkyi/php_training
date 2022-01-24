<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\StudentLists;


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

    /**
     * To upload csv file
     * @return File Upload CSV file
     */
    public function uploadCSV()
    {
        return $this->studentDao->uploadCSV();
    }

    /**
     * To search student lists
     * @return $array of students
     */
    public function searchStudent(Request $request)
    {
        return $this->studentDao->searchStudent($request);
    }

    /**
     * To send email to created student
     */
    public function sendEmail()
    {
        $details = [

            'title' => 'Registration Successfully!',

            'body' => 'You data is created successfully!'
        ];
        $email = request()->email;
        Mail::to("$email")->send(new SendMail($details));
    }

    /**
     * Send email with student form
     */
    public function sendEmailForm()
    {
        $students = $this->studentDao->sendEmailForm();
        $email = request()->email;
        return Mail::to("$email")->send(new StudentLists($students));
    }
}
