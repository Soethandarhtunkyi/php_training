<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect to student list
//Route::get('/', function () {
//    return redirect()->route('students.create');
//});

//Route::get('/', function () {
//    
//    $students = Student::all();
//    return view('student.index', compact('students') );
//});


Route::get('/', function () {
    
    return view('student.index',[
        'students' => App\Models\Student::all()
        
    ]);
});

// Students list resource route
Route::resource('students', StudentController::class);


Route::get('/file-import',[StudentController::class,'importView'])->name('import-view');
Route::post('/import',[StudentController::class,'import'])->name('import');
Route::get('/export-students',[StudentController::class,'export'])->name('export');
Route::get('/file-search',[StudentController::class,'studentSearch'])->name('student-search');