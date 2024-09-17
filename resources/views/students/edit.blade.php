@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Student Details</div>
  <div class="card-body">
      
      <form action="{{ url('students/' .$student->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$student->id}}" id="id" />
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$student->name}}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $student->address }}">
        @error('address')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="text" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ $student->mobile}}">
        @error('mobile')
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