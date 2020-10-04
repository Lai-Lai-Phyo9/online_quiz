@extends('frontendtemplate')
@section('title','Home Page')
@section('style')
	<style type="text/css">
		.home_banner_area,.hi{
			display: none;
		}
		/*.section_gap_top{
			display: none;
		}*/
	</style>
@endsection
@section('content')
	<div class="container d-flex" style="position: relative;">
		<div class="content">
			<div class="d-flex mb-2">
				<span class="mr-2">Name:</span>
				<span>{{Auth::user()->name}}</span>
			</div>
			<div class="d-flex mb-2">
				<span class="mr-2">Email:</span>
				<span>{{Auth::user()->email}}</span>
			</div>
			<div class="d-flex mb-2">
				<span class="mr-2">University:</span>
				<span>{{Auth::user()->university_school}}</span>
			</div>
		</div>
		<div class="titlerecent" style=" position: absolute;right: 10px; top: 15px;">
			<h3 class="t">Your Recent Scores</h3>
		</div>

	</div>
 	<div class="container mb-5">
 		<div class="row">
 			{{-- @if ($users=="multi_user") --}}
	 			<div class="col-12 my-4">
	 				<h2 class="text-center my-5">Multiquestion Recent Information</h2>
	 				<table class="table table-bordered table-hover">
	 					<tr class=" text-light" style="background: #012346;">
	 						<th>No</th>
	 						<th>Mark</th>
	 						<td>Total Number of Questions</td>
	 						<th>Date</th>
	 					</tr>
	 						@php
	 							$count=1;
	 						@endphp
	 						@foreach ($users as $user)
	 						<tr>
	 							<td>{{$count++}}</td>
	 							<td>{{$user->mark}}</td>
	 							<td>{{$user->count}}</td>
	 							<td>{{$user->created_at}}</td>
	 						</tr>
	 						@endforeach
	 				</table>
	 			</div>
	 		{{-- @else --}}
	 			<div class="col-12 my-4">
	 				<h2 class="text-center my-5">True/False Recent Information</h2>
	 				<table class="table table-bordered table-hover">
	 					<tr class="text-light" style="background: #012346;">
	 						<th>No</th>
	 						<th>Mark</th>
	 						<td>Total Number of Questions</td>
	 						<th>Date</th>
	 					</tr>
	 						@php
	 							$count=1;
	 						@endphp
	 						@foreach ($tfusers as $user)
	 						<tr>
	 							<td>{{$count++}}</td>
	 							<td>{{$user->mark}}</td>
	 							<td>{{$user->count}}</td>
	 							<td>{{$user->created_at}}</td>
	 						</tr>
	 						@endforeach
	 				</table>
	 			</div>
	 		{{-- @endif --}}
 		</div>
 	</div>
@endsection