@extends('btemplate')
@section('title','Levels')
@section('content')
	<div class="container-fluid">
		<h2 class="text-center">Level Detail</h2>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="{{ asset($level->photo) }}" width="100" height="100">	
				</div>
				<div class="col-md-8">
					<table class="table">
					  </thead>
					  <tbody>
					    <tr><td>Level Name</td>
					    	<td>{{$level->name}}</td>
					    </tr>
					  </tbody>
					</table>
				</div>	
			</div>
		<div>
	</div>
@endsection