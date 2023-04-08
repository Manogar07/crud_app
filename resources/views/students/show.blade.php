@extends('students.layout')
@section('content')
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">First Name : {{ $students->fname }}</h5>
		<h5 class="card-title">Last Name : {{ $students->lname }}</h5>
		<h5 class="card-title">Course : {{ $students->course }}</h5>
        <p class="card-text">Address : {{ $students->address }}</p>
		<p class="card-text">E-Mail : {{ $students->email }}</p>
        <p class="card-text">Mobile : {{ $students->mobile }}</p>
  </div>
      
    </hr>
  
  </div>
</div>