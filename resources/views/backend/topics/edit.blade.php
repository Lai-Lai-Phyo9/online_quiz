@extends('btemplate')
@section('title','Subjects')
@section('content')
	<div class="container shadow p-4">
		<h2>Edit Topic</h2>
	<form method="post" action="{{route('topics.update',$topic->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group row col-md-6 text-center">
			<label for="inputName" class="col-form-label">Name of topics</label>
			<input type="text" class="form-control" id="inputName" name="name" value="{{$topic->name}}">
		</div>
		<div class="form-group row col-md-6 text-center">
			<label for="inputPhoto" class="col-form-label">Choose Photo</label>
			<input type="file" class="form-control" id="inputPhoto" name="photo">
			<img src="{{ asset($topic->photo) }}" width="100" height="100">
			<input type="hidden" name="old_photo" value="{{$topic->photo}}">
		</div>
		{{-- subject id --}}
		<div class="form-group row">
			<label for="inputSubject" class="col-sm-2 col-form-label">Subject</label>
				<select name="subject" class="form-control">
						<optgroup label="Choose Subject">
							@foreach($subjects as $subject)
							<option value="{{$subject->id}}">{{$subject->name}}</option>
							@endforeach
						</optgroup>
				</select>
		</div>
		{{-- level id --}}
		<div class="form-group row">
			<label for="inputLevel" class="col-sm-2 col-form-label">Level</label>

				<select name="level" class="form-control">
						<optgroup label="Choose Level">
							@foreach($levels as $level)
							<option value="{{$level->id}}">{{$level->name}}</option>
							@endforeach
						</optgroup>
				</select>

		</div>
		{{-- creater user id --}}
		<div class="form-group row">
			<label for="inputUser" class="col-sm-2 col-form-label">User</label>

				<select name="user" class="form-control">
						<optgroup label="Choose User">
							@foreach($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</optgroup>
				</select>

		</div>
		<div class="form-group row col-md-6">
			<input name=" btnsubmit"type="submit" class="btn btn-info w-25" value="Update">
		</div>
	</form>
	</div>
@endsection

