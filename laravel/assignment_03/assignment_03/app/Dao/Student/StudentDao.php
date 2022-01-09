<?php

namespace App\Dao\Student;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Dao\Student\StudentDaoInterface;

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
    public function importView(Request $request){
        $students = Student::all();
        return view('importFile',compact('students'));
    }

    public function import(Request $request){
        Excel::import(new StudentImport, $request->file('file'));
        return redirect()->back()->with('success','Data Imported Successfully');
    }

    public function export(Request $request){
        return Excel::download(new StudentExport, 'students.xlsx');
    }
    public function studentSearch(Request $request){
        

        $data = Student::when(isset(request()->name,request()->start_date,request()->end_date),function($query){
            $query->orWhere('name','like','%'.request()->name.'%')->orWhere('created_at',request()->start_date)->orWhere('updated_at',request()->end_date);
        })->latest('id')->get();
       
        
        return view('search', compact('data'));

    }
}
?>