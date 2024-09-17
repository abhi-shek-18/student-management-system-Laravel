@extends( 'layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Course Page</div>
  <div class="card-body">
        <div class="card-body"> 
           
         <p class="card-title">Id:{{$batch->id}}</p>   
        <h5 class="card-title">Batch Name : {{ $batch->name }}</h5>
        <p class="card-text">Course Name : {{ $batch->course->name }}</p>
        <p class="card-text">Start Date : {{ $batch->start_date }}</p> 
       
  </div> 
    </hr>
  </div>
</div>
@endsection