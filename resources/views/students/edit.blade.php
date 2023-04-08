@extends('students.layout')
@section('content')
<div class="card">
  <div class="card-header">Contacts Page</div>
  <div class="card-body">
      
      <form action="{{ url('student/' .$students->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$students->id}}" id="id" />
        <label>First Name</label></br>
        <input type="text" name="fname" id="fname" value="{{$students->fname}}" class="form-control"></br>
		<label>Last Name</label></br>
        <input type="text" name="lname" id="lname" value="{{$students->lname}}" class="form-control"></br>
        <label>Course</label></br>
		<input type="text" name="course" id="course" value="{{$students->course}}" class="form-control"></br>
		<label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control"></br>
		<label>E-mail</label></br>
        <input type="text" name="email" id="email" value="{{$students->email}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop