<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course=Course::all();
        return view('courses.index')->with(compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'syllabus' => 'required|string|max:255',
            'duration' => 'required',
        ]);
    
       
        $input = $request->all();
        Course::create($input);
    
        return redirect('courses')->with('success', ' New Course Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find( $id);
        return view( 'courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course=Course::find($id);
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'syllabus' => 'required|string|max:255',
            'duration' => 'required',
        ]);
        $course=Course::find($id);
        $input=$request->all();
        $course->update($input);
        return redirect('courses')->with('flash_message',"Course data updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'Course deleted!');  
    }
}
