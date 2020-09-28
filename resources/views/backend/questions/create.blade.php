@extends('btemplate')
@section('title','Levels')
@section('content')
<div class="container shadow p-4 mt-5">
	<h2 class="mb-3">Create Question</h2>
	<form method="post" action="{{route('questions.store')}}">
		@csrf
		{{-- topic id --}}
		<div class="form-group row col-md-6 text-center">
			<label for="inputLevel" class="col-form-label">Topic</label>
				<select name="topic" class="form-control">
					<optgroup label="Choose Level">
						@foreach($topics as $topic)
						<option value="{{$topic->id}}">{{$topic->name}}</option>
						@endforeach
					</optgroup>
				</select>
		</div>
		<label for="inputLevel" class="col-form-label mb-2">Choose For questiontype:</label>	
		<div class="form-group row col-md-6 text-center mb-2">	
			<div class="form-check mr-5 pl-3 mb-3">
			  <input class="form-check-input" type="radio" name="name" id="exampleRadios2" value="multichoice">
			  <label class="form-check-label" for="exampleRadios2">
			    MultiQuestion
			  </label>
			</div>
			<div class="form-check mr-5 pl-3">
			  <input class="form-check-input" type="radio" name="name" id="exampleRadios2" value="truefalse">
			  <label class="form-check-label" for="exampleRadios2">
			    TrueFalseQuestion
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="name" id="exampleRadios2" value="short">
			  <label class="form-check-label" for="exampleRadios2">
			    ShortQuestion
			  </label>
			</div>
		</div>
		<div class="form-group row col-md-6">
			<input name=" btnsubmit"type="submit" class="btn btn-info w-25" value="Save">
		</div>
	</form>
</div>
@endsection

