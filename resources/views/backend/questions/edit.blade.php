@extends('btemplate')
@section('title','Subjects')
@section('content')
	<div class="container shadow p-4">
		<h2>Edit Question</h2>
	<form method="post" action="{{route('questions.update',$question->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		{{-- topic id --}}
		<div class="form-group row col-md-6 text-center">
			<label for="inputSubject" class="col-sm-2 col-form-label">Topic</label>
				<select name="subject" class="form-control">
						<optgroup label="Choose Subject">
							@foreach($topics as $topic)
							<option value="{{$topic->id}}">{{$topic->name}}</option>
							@endforeach
						</optgroup>
				</select>
		</div>
		<div class="form-group row col-md-6 text-center">
			<label for="inputSubject" class="col-sm-2 col-form-label">Questiontype</label>
				<select name="subject" class="form-control">
						<optgroup label="Choose Subject">
							@foreach($questions as $question)
							<option value="{{$question->id}}">{{$question->questiontype}}</option>
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

