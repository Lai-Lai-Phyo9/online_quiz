@extends('btemplate')
@section('title','Subjects')
@section('content')
	<div class="container shadow p-4">
		<h2>Edit Subject</h2>
	<form method="post" action="{{route('subjects.update',$subject->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group row col-md-6 text-center">
			<label for="inputName" class="col-form-label">1. Name of subjects</label>
			<input type="text" class="form-control" id="inputName" name="name" value="{{$subject->name}}">
		</div>
{{-- 		<div class="form-group row col-md-6 text-center">
			<label for="inputName" class="col-form-label">2. Choose relevant subject</label>
			<ul class="list-group list-group-horizontal-sm">
			  <a href="" class="list-group-item">Myanmar</a>
			  <a href="" class="list-group-item">English</a>
			  <a href="" class="list-group-item">Japan</a>
			  <a href="" class="list-group-item">Chinese</a>
			  <a href="" class="list-group-item">Korea</a>
			  <a href="" class="list-group-item">Thai</a>
			</ul>
		</div> --}}
		<div class="form-group row col-md-6">
			<input name=" btnsubmit"type="submit" class="btn btn-info w-25" value="Update">
		</div>
	</form>
	</div>
@endsection

