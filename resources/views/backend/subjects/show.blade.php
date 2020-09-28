@extends('btemplate')
@section('title','Subjects')
@section('content')
	<div class="container-fluid">
		<h2 class="text-center">Subject Detail</h2>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="{{ asset($subject->photo) }}" width="100" height="100">	
				</div>
				<div class="col-md-8">
					<table class="table">
					  </thead>
					  <tbody>
					    <tr><td>Subject Name</td>
					    	<td>{{$subject->name}}</td>
					    </tr>
					  </tbody>
					</table>
				</div>	
			</div>
		<div>
	</div>
@endsection