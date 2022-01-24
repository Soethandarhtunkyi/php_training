<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['web']], function () {
    Route::get('/create', 'App\Http\Controllers\API\StudentAPIController@create');
    Route::post('/store', 'App\Http\Controllers\API\StudentAPIController@store')->name('savestudent');
    });
    Route::delete('/delete/{id}', 'App\Http\Controllers\API\StudentAPIController@destroy');
    Route::get('/getdata', 'App\Http\Controllers\API\StudentAPIController@index');
    Route::get('students/edit/{student}','App\Http\Controllers\API\StudentAPIController@edit');
    Route::post('students/update/{id}', 'App\Http\Controllers\API\StudentAPIController@update')->name('update');
    