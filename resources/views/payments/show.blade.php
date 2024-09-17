@extends( 'layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Payment Page</div>
  <div class="card-body">
        <div class="card-body"> 
           
         <p class="card-title">Id:{{$payment->id}}</p>   
        <h5 class="card-title">Batch Name : {{ $payment->enrollment->enroll_no }}</h5>
        <p class="card-text">Amount : {{ $payment->amount }}</p>
        <p class="card-text">Paid Date : {{ $payment->pay_date }}</p> 
       
  </div> 
    </hr>
  </div>
</div>
@endsection