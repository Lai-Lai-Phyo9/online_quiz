@extends('btemplate')
@section('title','Subjects')
@section('content')
	<div class="container shadow p-4">
		<h2>Edit Topic</h2>
	<form method="post" action="{{route('topics.update',$topic->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group row col-md-6 text-center">
			<label for="inputName" class="col-form-label">1. Name of topics</label>
			<input type="text" class="form-control" id="inputName" name="name" value="{{$topic->name}}">
		</div>
		<div class="form-group row col-md-6 text-center">
			<label for="inputName" class="col-form-label">2. Choose Photo</label>
			<input type="file" class="form-control" id="inputPhoto" name="photo">
			<img src="{{ asset($topic->photo) }}" width="100" height="100">
			<input type="hidden" name="old_photo" value="{{$topic->photo}}">
		</div>
		<div class="form-group row col-md-6">
			<input name=" btnsubmit"type="submit" class="btn btn-info w-25" value="Update">
		</div>
	</form>
	</div>
@endsection

