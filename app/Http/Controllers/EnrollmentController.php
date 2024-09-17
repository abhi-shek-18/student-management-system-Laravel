<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Enrollment;
use App\Models\Batch;
use App\Models\Student;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollment=Enrollment::all();
        return view('enrollments.index')->with(compact('enrollment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batch=Batch::pluck('name','id');
        $student=Student::pluck('name','id');
        return view('enrollments.create')->with(compact('batch','student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'enroll_no' => 'required|string|max:255',
            'batch_id' => 'required',
            'student_id' => 'required',
            'join_date' => 'required | date',
            'fee' => 'required'
        ]);
    
       
        $input = $request->all();
        Enrollment::create($input);
    
        return redirect('enrollments')->with('success', 'Enrolled Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollment = Enrollment::find( $id);
    return view( 'enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batch=Batch::pluck('name','id');
        $student=Student::pluck('name','id');
        $enrollment=Enrollment::find($id);
        return view('enrollments.edit',compact('enrollment','batch','student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $request->validate([
            'enroll_no' => 'required|string|max:255',
            'batch_id' => 'required',
            'student_id' => 'required',
            'join_date' => 'required | date',
            'fee' => 'required'
        ]);
        $enrollment=Enrollment::find($id);
        $input=$request->all();
        $enrollment->update($input);
        return redirect('enrollments')->with('flash_message',"Enrollment updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'Enrollment deleted!');
    }
}
