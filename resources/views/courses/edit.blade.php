@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Course Details</div>
  <div class="card-body">
      
      <form action="{{ url('courses/' .$course->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$course->id}}" id="id" />
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$course->name}}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="address">Syllabus</label>
        <input type="text" name="syllabus" id="syllabus" class="form-control @error('syllabus') is-invalid @enderror" value="{{ $course->syllabus }}">
        @error('syllabus')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="mobile">Duration</label>
        <input type="text" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ $course->duration}}">
        @error('duration')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop