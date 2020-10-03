@extends('frontendtemplate')
@section('title','Home Page')
@section('style')
	<style type="text/css">
		.home_banner_area,.hi{
			display: none;
		}
	</style>
@endsection
@section('content')
	 	<div class="container my-5">
	 		@foreach ($dateList as $time)
	 			
	 				<h3>{{$time}}</h3>
	 		@endforeach
	 		
	 		<div class="row">
	 			<div class="col-12">
	 				<table class="table table-striped text-uppercase table-hover" >
		 				<tr class="bg-dark text-light">
		 					<th>No</th>
		 					<th>mark</th>
		 					<th>Date</th>
		 				</tr>
		 				@php
		 					$count=1;
		 				@endphp
		 				
	 					@foreach ($user->multiquestions as $row)
	 						@foreach ($dateList as $date)
		 						@if ($date == $row->pivot->created_at->format('Y/m/d'))
		 							@foreach ($timeList as $time)
		 								@if ($time== $row->pivot->created_at->format('H:i:s') && $row->pivot->mark == 1)
		 									<tr>
		 										<td>{{$count++}}</td>
		 									</tr>
		 									
		 								@endif
		 							@endforeach
		 						@endif
	 					@endforeach

	 				@endforeach
		 				{{-- <h3 class="mb-4">Total is <span>{{$total}}</span></h3> --}}
		 			</table>
	 			</div>
	 		</div>
	 	</div>
@endsection