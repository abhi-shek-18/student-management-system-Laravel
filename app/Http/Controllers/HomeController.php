<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Enrollment;

class HomeController extends Controller
{
    public function index(){
        $student=Student::all();
        $teacher=Teacher::all();
        $course=Course::all();
        $enrollment=Enrollment::all();
        return view('home')->with(compact('student','teacher','course','enrollment'));
    }
}
