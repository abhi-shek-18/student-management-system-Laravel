@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Create New Enrollment</div>
  <div class="card-body">
      
    <form action="{{ url('enrollments') }}" method="post">
      {!! csrf_field() !!}
      
      <div class="form-group">
        <label for="enroll_no">Enrollment Number</label>
        <input type="text" name="enroll_no" id="enroll_no" class="form-control @error('enroll_no') is-invalid @enderror" value="{{ old('enroll_no') }}">
        @error('enroll_no')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="batch_id">Batch Name</label>
        <!-- <input type="text" name="course_id" id="course_id" class="form-control @error('course_id') is-invalid @enderror" value="{{ old('course_id') }}"> -->
         <select name="batch_id" id="batch_id" class="form-control @error('batch_id') is-invalid @enderror">
          <option value="">{{"--Choose Batch--"}}</option>
          @foreach ($batch as $id=>$item )
            <option value="{{$id}}">{{$item}}</option>
          @endforeach
         </select>
        @error('batch_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="student_id">Student Name</label>
        <!-- <input type="text" name="course_id" id="course_id" class="form-control @error('course_id') is-invalid @enderror" value="{{ old('course_id') }}"> -->
         <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror">
          <option value="">{{"--Choose Batch--"}}</option>
          @foreach ($student as $id=>$item )
            <option value="{{$id}}">{{$item}}</option>
          @endforeach
         </select>
        @error('student_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="join_date">Join Date</label>
        <input type="date" name="join_date" id="join_date" class="form-control @error('join_date') is-invalid @enderror" value="{{ old('join_date') }}">
        @error('join_date')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="fee">Fee</label>
        <input type="double" name="fee" id="fee" class="form-control @error('fee') is-invalid @enderror" value="{{ old('fee') }}">
        @error('fee')
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