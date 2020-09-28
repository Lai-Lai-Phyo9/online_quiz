@extends('btemplate')
@section('title','Topics')
@section('content')
<div class="container shadow p-4 mt-5">
	<h2>Topic Create Form</h2>
	<form method="post" action="{{ route('topics.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputName" name="name">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
			<div class="col-sm-10">
				<input type="file" class="form-control" id="inputPhoto" name="photo">
			</div>
		</div>
		{{-- subject id --}}
		<div class="form-group row">
			<label for="inputSubject" class="col-sm-2 col-form-label">Subject</label>
			<div class="col-sm-10">
				<select name="subject" class="form-control">
						<optgroup label="Choose Subject">
							@foreach($subjects as $subject)
							<option value="{{$subject->id}}">{{$subject->name}}</option>
							@endforeach
						</optgroup>
				</select>
			</div>
		</div>
		{{-- level id --}}
		<div class="form-group row">
			<label for="inputLevel" class="col-sm-2 col-form-label">Level</label>
			<div class="col-sm-10">
				<select name="level" class="form-control">
						<optgroup label="Choose Level">
							@foreach($levels as $level)
							<option value="{{$level->id}}">{{$level->name}}</option>
							@endforeach
						</optgroup>
				</select>
			</div>
		</div>
		{{-- creater user id --}}
		<div class="form-group row">
			<label for="inputUser" class="col-sm-2 col-form-label">User</label>
			<div class="col-sm-10">
				<select name="user" class="form-control">
						<optgroup label="Choose User">
							@foreach($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</optgroup>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<input name="btnsubmit"type="submit" class="btn btn-primary" value="Save">
			</div>
		</div>
	</form>
</div>
@endsection