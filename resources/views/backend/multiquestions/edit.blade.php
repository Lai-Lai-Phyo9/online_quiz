@extends('btemplate')
@section('title','Subjects')
@section('content')
	<div class="container shadow p-4">
		<h2>Edit multiquestion</h2>
	<form method="post" action="{{route('multiquestions.update',$multiquestion->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group row col-md-6 text-center">
			<label for="inputName" class="col-form-label">1. Name of multiquestions</label>
			<input type="text" class="form-control" id="inputName" name="name" value="{{$multiquestion->name}}">
		</div>
		<div class="form-group row col-md-6 text-center">
			<label for="inputName" class="col-form-label">2. Choose Photo</label>
			<input type="file" class="form-control" id="inputPhoto" name="photo">
			<img src="{{ asset($multiquestion->photo) }}" width="100" height="100">
			<input type="hidden" name="old_photo" value="{{$multiquestion->photo}}">
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Choice One</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="choice1" value="{{$multiquestion->choice1}}">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Choice Two</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="choice2" value="{{$multiquestion->choice2}}">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Choice Three</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="choice3" value="{{$multiquestion->choice3}}">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Choice Four</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="choice4" value="{{$multiquestion->choice4}}">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Answer</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="answer" value="{{$multiquestion->answer}}">
			</div>
		</div>					
		<div class="form-group row col-md-6">
			<input name=" btnsubmit"type="submit" class="btn btn-info w-25" value="Update">
		</div>
	</form>
	</div>
@endsection

