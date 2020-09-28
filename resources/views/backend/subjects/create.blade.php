@extends('btemplate')
@section('title','Subjects')
@section('content')
<div class="container shadow p-4 mt-5">
	<h2>Create Subject</h2>
	<form method="post" action="{{route('subjects.store')}}">
		@csrf
		<div class="form-group row col-md-6 text-center">
			<label for="inputName" class="col-form-label">1. Name of subjects</label>
			<input type="text" class="form-control" id="inputName" name="name">
		</div>
		<div class="form-group row col-md-6">
			<input name=" btnsubmit"type="submit" class="btn btn-info w-25" value="Save">
		</div>
	</form>
</div>
@endsection

