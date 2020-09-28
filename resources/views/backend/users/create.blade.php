@extends('btemplate')
@section('title','Users')
@section('content')
<div class="container shadow p-4 mt-5">
	<h2>Create User</h2>
	<form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="name" name="name">
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" id="email" name="email">
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" id="password" name="password">
			</div>
		</div>
		<div class="form-group row py-3">
			<div class="form-check mr-2" style="margin-left: 200px;">
			  <input class="form-check-input" type="radio" name="role" id="exampleRadios1" value="quiz maker" checked>
			  <label class="form-check-label" for="exampleRadios1">
			    Quiz Maker
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="participant">
			  <label class="form-check-label" for="exampleRadios2">
			    Participant
			  </label>
			</div>
		</div>
		<div class="form-group row">
		    <label for="image" class="col-sm-2 col-form-label">Photo</label>
		    <div class="col-sm-10">
				<input type="file" class="form-control border-0 bg-light" id="image" name="image" >
		    </div>
		</div>
		<div class="form-group row">
		    <label for="university_school" class="col-sm-2 col-form-label">University</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="university_school" name="university_school">
		    </div>
	  	</div>
		<div class="form-group row">
			<label for="work_organization" class="col-sm-2 col-form-label">Work Organization</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="work_organization" name="work_organization">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
			  <button type="submit" class="btn btn-primary">Save</button>
			</div>
		</div>
	</form>
</div>
@endsection

