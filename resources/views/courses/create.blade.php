@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Create New Course</div>
  <div class="card-body">
      
    <form action="{{ url('courses') }}" method="post">
      {!! csrf_field() !!}
      
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="syllabus">Syllabus</label>
        <input type="text" name="syllabus" id="syllabus" class="form-control @error('syllabus') is-invalid @enderror" value="{{ old('syllabus') }}">
        @error('syllabus')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="duration">Duration</label>
        <input type="text" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration') }}">
        @error('duration')
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