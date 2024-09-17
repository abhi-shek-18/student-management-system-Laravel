<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student=Student::all();
        return view('students.index')->with(compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|digits:10|numeric',
        ]);
    
       
        $input = $request->all();
        Student::create($input);
    
        return redirect('students')->with('success', 'Student Added Successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $student = Student::find( $id);
    return view( 'students.show', compact('student'));
}
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $student=Student::find($id);
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|digits:10|numeric',
        ]);
        $student=Student::find($id);
        $input=$request->all();
        $student->update($input);
        return redirect('students')->with('flash_message',"Student data updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Student deleted!');  
    }
}
