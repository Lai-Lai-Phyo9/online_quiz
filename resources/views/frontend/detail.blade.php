@extends('frontendtemplate')
@section('style')
<style type="text/css">
	.home_banner_area{
		display: none;
	}
	.home_banner_area{
	display: none;
	}
</style>
@endsection
@section('title','topic Detail')
	@section('content')
		<div class="container my-5">
			<div class="row mb-3">
				@php
					{{ $i=1;}}
				@endphp

				@if($questiontype=="truefalse")
					@foreach ($detail as $row)
						<div class="col-12 bg-light shadow mb-2 p-3 pb-4">
							<h2 class="text-success my-3 text-center mb-4">Question 
								<span>{{$i++}}</span>
							</h2>
							<div class="d-flex">
								<div class="img">
									<img src="{{ asset($row->photo) }}" style="width: 300px; height: 200px;">
								</div>
								<div class="question-title pt-5">
									<h4 class="text-secondary my-2 ml-3 pt-2" style="font-weight:normal; font-size: 25px;letter-spacing: 1px; font-style: italic;">{{$row->name}}<span class="ml-2">?</span></h4>
									<div class="d-flex ml-4 pt-3" style="font-size: 20px;">
										<div class="form-check mr-4">
										  <input class="form-check-input" type="radio" name="answer[]" id="exampleRadios1" value="1">
										  <label class="form-check-label" for="exampleRadios1">
										   True
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="answer[]" id="exampleRadios2" value="0">
										  <label class="form-check-label" for="exampleRadios2">
										    False
										  </label>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach

				@elseif($questiontype=="short")
					@foreach ($detail as $row)
						<div class="col-12 bg-light shadow mb-2 p-3 pb-4">
							<h2 class="text-success my-3 text-center mb-4">Question 
								<span>{{$i++}}</span>
							</h2>
							<div class="d-flex">
								<div class="img">
									<img src="{{ asset($row->photo) }}" style="width: 300px; height: 200px;">
								</div>
								<div class="question-title pt-5">
									<h4 class="text-secondary my-2 ml-3 pt-2" style="font-weight:normal; font-size: 25px;letter-spacing: 1px; font-style: italic;">{{$row->name}}<span class="ml-2">?</span></h4>
									<div class="d-flex ml-4 pt-3" style="font-size: 20px;">
										<div class="form-check mr-4">
											<input type="text" class="form-control py-4" id="inputName" name="answer[]">
										</div>
										<form class="d-inline-block" method="post" action="{{ route('answers',$row->id) }}">
											@csrf
											<button type="submit" class="btn btn-success mb-2" style="width: 120px;"><i class="far fa-trash-alt p-1 btn-sm Btn"></i>Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					@endforeach

				@else	
					@foreach ($detail as $row)
						<div class="col-12 bg-light shadow mb-2 p-3 pb-4">
							<h2 class="text-success my-3 text-center mb-4">Question 
								<span>{{$i++}}</span>
							</h2>
							<div class="d-flex">
								<div class="img">
									<img src="{{ asset($row->photo) }}" style="width: 300px; height: 200px;">
								</div>
								<div class="question-title pt-5">
									<h4 class="text-secondary my-2 ml-3 pt-2" style="font-weight:normal; font-size: 25px;letter-spacing: 1px; font-style: italic;">{{$row->name}}<span class="ml-2">?</span></h4>
									<div class="ml-3" style="font-size: 20px;">
										<div class="form-check mr-4 mb-2">
										  <input class="form-check-input" type="radio" name="answer" id="exampleRadios1" value="1" checked>
										  <label class="form-check-label" for="exampleRadios1">
										   {{$row->choice1}}
										  </label>
										</div>
										<div class="form-check mb-2">
										  <input class="form-check-input" type="radio" name="answer" id="exampleRadios2" value="2">
										  <label class="form-check-label" for="exampleRadios2">
										    {{$row->choice2}}
										  </label>
										</div>
										<div class="form-check mb-2">
										  <input class="form-check-input" type="radio" name="answer" id="exampleRadios1" value="3">
										  <label class="form-check-label" for="exampleRadios1">
										   {{$row->choice3}}
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="answer" id="exampleRadios2" value="4">
										  <label class="form-check-label" for="exampleRadios2">
										    {{$row->choice4}}
										  </label>
										</div>
										<form class="d-inline-block" method="post" action="{{ route('answers',$row->id) }}">
											@csrf
											<button type="submit" class="btn btn-success mb-2" style="width: 120px;"><i class="far fa-trash-alt p-1 btn-sm Btn"></i>Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				@endif	
			</div>
		</div>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('frontendtemplate/js/custom.js') }}">	
</script>
@endsection
