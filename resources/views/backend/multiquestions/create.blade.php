@extends('btemplate')
@section('title','MultiQuestions')
@section('style')
<style type="text/css">
	label{
		font-size:19px;
		/*color: green;*/
	}
</style>
@endsection
@section('content')
<div class="container shadow p-4 mt-5">
	<h2>MultiQuestion Create Form</h2>
	<form method="post" action="{{ route('multiquestions.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="inputName" class="ml-3">Name</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="name" placeholder="Write your question here!">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPhoto" class="ml-3">Photo</label>
			<div class="col-12">
				<input type="file" class="form-control border-0 bg-light" id="inputPhoto" name="photo" >
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Choice One</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="choice1">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Choice Two</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="choice2">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Choice Three</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="choice3">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Choice Four</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="choice4">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="ml-3">Answer</label>
			<div class="col-12">
				<input type="text" class="form-control py-4" id="inputName" name="answer">
			</div>
		</div>		
		<div class="form-group">
			<label for="inputLevel" class="ml-3">Question</label>
			<div class="col-12">
				<select name="question" class="form-control ">
					<optgroup label="Choose QuestionType">
						@foreach($questions as $question)
						<option value="{{$question->id}}">{{$question->id}}</option>
						@endforeach
					</optgroup>
				</select>
			</div>
		</div>
		<div class="form-group text-right">
			<div class="col-sm-10">
				<input name="btnsubmit"type="submit" class="btn btn-md btn-primary" value="Save">
			</div>
		</div>
	</form>
</div>
@endsection