<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher=Teacher::all();
        return view('teachers.index')->with(compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|digits:10|numeric',
        ]);
    
        // After validation, proceed to store the data
        $input = $request->all();
        Teacher::create($input);
    
        return redirect('teachers')->with('success', 'Teacher Added Successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $teacher = Teacher::find( $id);
    return view( 'teachers.show', compact('teacher'));
}
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $teacher=Teacher::find($id);
        return view('teachers.edit',compact('teacher'));
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
        $teacher=Teacher::find($id);
        $input=$request->all();
        $teacher->update($input);
        return redirect('teachers')->with('flash_message',"Teacher data updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        
        Teacher::destroy($id);
        return redirect('teachers')->with('flash_message', 'Teacher deleted!');  
    }
}
