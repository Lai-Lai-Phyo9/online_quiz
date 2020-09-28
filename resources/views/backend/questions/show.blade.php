@extends('btemplate')
@section('title','Questions')
@section('content')
	<div class="container my-5 mt-5">
		<h4 class="text-center mt-3 mb-5">Question Table</h4>
		<div class="row">
			<div class="col-12 col-md-6">
				<img src="{{ asset($question->topic->photo) }}" class="w-100 h-100">	
			</div>
			<div class="col-12 col-md-6">
				<table class="table">
					  <tbody>
					   	<tr>
					    	<td>Question Type</td>
					    	<td>{{$question->questiontype}}</td>
					    </tr>
					    <tr>
					    	<td>Topic Name</td>
					    	<td>{{$question->topic->name}}</td>
					    </tr>
					    <tr>
					    	<td>Subject Name</td>
					    	<td>{{$question->topic->subject->name}}</td>
					    </tr>
					    <tr>
					    	<td>Level Name</td>
					    	<td>{{$question->topic->level->name}}</td>
					    </tr>
					    <tr>
					    	<td>User Name</td>
					    	<td>{{$question->topic->user->name}}</td>
					    </tr>
					    <tr>
					    	<td>University Name</td>
					    	<td>{{$question->topic->user->university_school}}</td>
					    </tr>
					  </tbody>
					</table>

			</div>
		</div>	
	</div>

@endsection