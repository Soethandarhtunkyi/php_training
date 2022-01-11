<?php

use App\Http\Controllers\Student\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index']);
Route::get('/students/search', [StudentController::class, 'search']);
Route::get('/create', [StudentController::class, 'create']);
Route::post('/store', [StudentController::class, 'store']);
Route::get('/edit/{id}', [StudentController::class, 'edit']);
Route::put('/update/{id}', [StudentController::class, 'update']);
Route::delete('/delete/{id}', [StudentController::class, 'destory']);
Route::get('/importExportView', [StudentController::class, 'importExportView']);
Route::get('/export', [StudentController::class, 'export'])->name('export');
Route::post('/import', [StudentController::class, 'import'])->name('import');
Route::get('/api', function () {
    return view('api.index');
});
Route::get('/api/create', function () {
    return view('api.create');
});
Route::get('/api/students/edit/{id}', function () {
    return view('api.edit');
});
