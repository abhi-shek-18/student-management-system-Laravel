<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});



Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::any('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/home',[HomeController::class,'index']);


Route::resource('/students',StudentController::class);


Route::resource('/teachers',TeacherController::class);


Route::resource('/courses',CourseController::class);


Route::resource('/batches',BatchController::class);


Route::resource('/enrollments',EnrollmentController::class);


Route::resource('/payments',PaymentController::class);
