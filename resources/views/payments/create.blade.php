@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Make New Payment</div>
  <div class="card-body">
      
    <form action="{{ url('payments') }}" method="post">
      {!! csrf_field() !!}
      
      <div class="form-group">
        <label for="enrollment_id"> Enrollment Id</label>
        <!-- <input type="text" name="enrollment_id" id="enrollment_id" class="form-control @error('enrollment_id') is-invalid @enderror" value="{{ old('enrollment_id') }}"> -->
        <select name="enrollment_id" id="enrollment_id" class="form-control @error('enrollment_id') is-invalid @enderror">
          <option value="">{{"--Choose Enrollment--"}}</option>
          @foreach ($enrollment as $id=>$item )
            <option value="{{$id}}">{{$item}}</option>
          @endforeach
         </select>
        @error('enrollment_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="amount">Amount</label>
        <input type="double" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}">
     
        @error('amount')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="pay_date">Paid Date</label>
        <input type="date" name="pay_date" id="pay_date" class="form-control @error('pay_date') is-invalid @enderror" value="{{ old('pay_date') }}">
        @error('pay_date')
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