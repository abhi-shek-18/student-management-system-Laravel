@extends( 'layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Student's Page</div>
  <div class="card-body">
        <div class="card-body"> 
           
         <p class="card-title">Id:{{$student->id}}</p>   
        <h5 class="card-title">Name : {{ $student->name }}</h5>
        <p class="card-text">Address : {{ $student->address }}</p>
        <p class="card-text">Mobile : {{ $student->mobile }}</p> 
       
  </div> 
    </hr>
  </div>
</div>
@endsection