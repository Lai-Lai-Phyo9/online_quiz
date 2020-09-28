@extends('btemplate')
@section('title','Topics')
@section('content')
	<div class="container my-5">
		<h4 class="text-center mt-3 mb-5">Detail Table</h4>
		<div class="row">
			<div class="col-12 col-md-6">
				<img src="{{ asset($topic->photo) }}" class="w-100 h-100">
			</div>
			<div class="col-12 col-md-6">
				<table class="table">
					  <tbody>
					    <tr>
					    	<td>Topic Name</td>
					    	<td>{{$topic->name}}</td>
					    </tr>
					   	<tr>
					    	<td>Subject Name</td>
					    	<td>{{$topic->subject->name}}</td>
					    </tr>
					    <tr>
					    	<td>Level Name</td>
					    	<td>{{$topic->level->name}}</td>
					    </tr>
					    <tr>
					    	<td>User Name</td>
					    	<td>{{$topic->user->name}}</td>
					    </tr>
					    <tr>
					    	<td>University Name</td>
					    	<td>{{$topic->user->university_school}}</td>
					    </tr>
					  </tbody>
					</table>

			</div>
		</div>	
	</div>
@endsection