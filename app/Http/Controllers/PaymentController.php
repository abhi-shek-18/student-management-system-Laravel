<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\Payment;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment=Payment::all();
        return view('payments.index')->with(compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollment=Enrollment::pluck('enroll_no','id');
    
        return view('payments.create')->with(compact('enrollment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { $request->validate([
        'enrollment_id' => 'required|string',
        'pay_date' => 'required | date',
        'amount' => 'required'
    ]);

   
    $input = $request->all();
    Payment::create($input);

    return redirect('payments')->with('success', 'Payment Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::find( $id);
        return view( 'payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment=Payment::find($id);
        $enrollment=Enrollment::pluck('enroll_no','id');
        return view('payments.edit',compact('payment','enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'enrollment_id' => 'required|string',
            'pay_date' => 'required | date',
            'amount' => 'required'
        ]);
        
        $payment=Payment::find($id);
        $input=$request->all();
        $payment->update($input);
        return redirect('payments')->with('flash_message',"Payment updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'Payment deleted!');
    }
}
