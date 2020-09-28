@extends('btemplate')
@section('title','ShortQuestions')
@section('content')
<div class="container shadow p-4 mt-5">
	<h2>ShortQuestion Create</h2>
	<form method="post" action="{{ route('shortquestions.store') }}" enctype="multipart/form-data">
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
		<div class="form-group row">
			<label for="inputLevel" class="col-sm-2 col-form-label">Question</label>
			<div class="col-sm-10">
				<select name="question" class="form-control">
					<optgroup label="Choose QuestionType">
						@foreach($questions as $question)
						<option value="{{$question->id}}">{{$question->questiontype}}</option>
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