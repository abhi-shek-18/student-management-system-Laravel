@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Create New Batch</div>
  <div class="card-body">
      
    <form action="{{ url('batches') }}" method="post">
      {!! csrf_field() !!}
      
      <div class="form-group">
        <label for="name"> Batch Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="course_id">Course Name</label>
        <!-- <input type="text" name="course_id" id="course_id" class="form-control @error('course_id') is-invalid @enderror" value="{{ old('course_id') }}"> -->
         <select name="course_id" id="course_id" class="form-control @error('course_id') is-invalid @enderror">
          <option value="">{{"--Choose Course--"}}</option>
          @foreach ($course as $id=>$item )
            <option value="{{$id}}">{{$item}}</option>
          @endforeach
         </select>
        @error('course_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
        @error('start_date')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <input type="submit" value="Save" class="btn btn-success">
    </form>
   
  </div>
</div>

 
@stop