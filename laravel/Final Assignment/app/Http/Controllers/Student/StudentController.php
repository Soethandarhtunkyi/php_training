<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Exports\StudentsExport;
use App\Mail\SendMail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * task interface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = $this->studentInterface->getStudents(); 
        $students = $this->studentInterface->searchStudent($request);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = $this->studentInterface->getMajors();

        return view('student.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'address' => 'required',
            'major' => 'required'
        ]);
        $this->studentInterface->saveStudent($request);
        $this->studentInterface->sendEmail();
            return redirect()
                ->route('students.index')
                ->with('success', 'Student created and send email successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $majors = $this->studentInterface->getMajors();

        return view('student.edit', compact('student', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'address' => 'required',
            'major' => 'required'
        ]);

        $result = $this->studentInterface->updateStudent($request, $student);

        if ($result) {
            return redirect()
                ->route('students.index')
                ->with('success', 'Student updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $result = $this->studentInterface->deleteStudent($student);
        if ($result) {
            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');;
        }
    }

    /**
     * To download csv file
     * @return File Download CSV file
     */
    public function downloadCSV()
    {
        return Excel::download(new StudentsExport, 'form.xlsx');
    }

    /**
     * Show the form of upload file
     *
     * @return \Illuminate\Http\Response
     */
    public function showUpload()
    {
        return view('student.upload');
    }

    /**
     * Import the csv file
     * 
     * @param \Illuminate\Http\Request $request 
     * @return \Illuminate\Http\Response
     */
    public function submitUpload(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        if ($this->studentInterface->uploadCSV()) {
            return redirect()
                ->route('students.index')
                ->with('success', 'Successfully Imported CSV File.');
        }
    }

    /**
     * Show the email input form
     * @return \Illuminate\Http\Response
     */
    public function showEmailForm()
    {
        return view('student.emailform');
    }

    /**
     * Send email to student
     * @param \Illuminate\Http\Request $request 
     * @return \Illuminate\Http\Response
     */
    public function sendEmailForm(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        $this->studentInterface->sendEmailForm($request);
            return redirect()->route('students.index')->with('success', 'Email is successfully sent.');
    }
}
