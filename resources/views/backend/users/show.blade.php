@extends('btemplate')
@section('title','Topics')
@section('content')
	<div class="container my-5">
		<h4 class="text-center mt-3 mb-5">Detail Table</h4>
		<div class="row offset-3">
{{-- 			<div class="col-12 col-md-6">
				<img src="{{ asset($user->photo) }}" class="w-100 h-100">
			</div> --}}
			<div class="col-12 col-md-6">
				<table class="table">
					  <tbody>
					    <tr>
					    	<td>User Name</td>
					    	<td>{{$user->name}}</td>
					    </tr>
					    <tr>
					    	<td>Role</td>
					    	<td>{{$user->getRoleNames()->first()}}</td>
					    </tr>
					    <tr>
					    	<td>University Name</td>
					    	<td>{{$user->university_school}}</td>
					    </tr>
{{-- 					    <tr>
					    	<td>Work Name</td>
					    	<td>{{$user->work_organization}}</td>
					    </tr> --}}
					  </tbody>
					</table>
			</div>
		</div>	
	</div>
@endsection