@extends( 'layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Enrollment's Page</div>
  <div class="card-body">
        <div class="card-body"> 
           
         <p class="card-title">Id:{{$enrollment->id}}</p>   
        <h5 class="card-title">Enrollment Number : {{ $enrollment->enroll_no }}</h5>
        <p class="card-text">Batch Id : {{ $enrollment->batch->name }}</p>
        <p class="card-text">Student Id : {{ $enrollment->student->name}}</p> 
        <p class="card-text">Join Date : {{ $enrollment->join_date }}</p> 
        <p class="card-text">Fee : {{ $enrollment->fee }}</p> 
       
  </div> 
    </hr>
  </div>
</div>
@endsection