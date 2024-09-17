<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Batch;
use App\Models\Course;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batch = Batch::all();
        $course=Course::get(['id','name']);
        return view('batches.index')->with(compact('batch','course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course=Course::pluck('name','id');
        return view('batches.create')->with(compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required',
            'start_date' => 'required| date',
        ]);


        $input = $request->all();
        Batch::create($input);

        return redirect('batches')->with('success', ' New Batch Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batch = Batch::find($id);
        $course=Course::get(['id','name']);
        return view('batches.show', compact('batch','course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batch = Batch::find($id);
        // $course=Course::get(['id','name']);
        return view('batches.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required',
            'start_date' => 'required| date',
        ]);
        $batch = Batch::find($id);
        $input = $request->all();
        $batch->update($input);
        return redirect('batches')->with('flash_message', "Batch data updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'Batch deleted!');
    }
}
