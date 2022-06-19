<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController; 




// Student Routes 
Route::get('student', [ StudentController::class, 'index' ]) -> name('student.index');
Route::get('student-create', [ StudentController::class, 'create' ]) -> name('student.create');
Route::get('student-show/{id}', [ StudentController::class, 'show' ]) -> name('student.show');
Route::post('student', [ StudentController::class, 'store' ]) -> name('student.store'); 
Route::get('student-delete/{id}', [ StudentController::class, 'destroy' ]) -> name('student.destroy'); 
Route::get('student-edit/{id}', [ StudentController::class, 'edit' ]) -> name('student.edit'); 
Route::post('student-update/{id}', [ StudentController::class, 'update' ]) -> name('student.update');


// Staff routes 
Route::resource('staff', StaffController::class);










