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
									</div>
								</div>
							</div>
						</div>
					@endforeach

				@else	
					@php
						$count=0;
					@endphp
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
										  <input class="form-check-input test" type="radio" name="name{{$count}}" id="{{$row->choice1}}" value="1"  data-answer="{{$row->answer}}" data-qid="{{$row->question_id}}" data-name="name{{$count}}">
										  <label class="form-check-label" for="{{$row->choice1}}">
										   {{$row->choice1}}
										  </label>
										</div>
										<div class="form-check mb-2">
										  <input class="form-check-input test" type="radio" name="name{{$count}}" id="{{$row->choice2}}" value="2" data-answer="{{$row->answer}}" data-qid="{{$row->question_id}}" data-name="name{{$count}}">
										  <label class="form-check-label" for="{{$row->choice2}}" >
										    {{$row->choice2}}
										  </label>
										</div>
										<div class="form-check mb-2">
										  <input class="form-check-input test" type="radio" name="name{{$count}}" id="{{$row->choice3}}" value="3" data-answer="{{$row->answer}}" data-qid="{{$row->question_id}}" data-name="name{{$count}}">
										  <label class="form-check-label" for="{{$row->choice3}}" >
										   {{$row->choice3}}
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input test" type="radio" name="name{{$count}}" id="{{$row->choice4}}" value="4" data-answer="{{$row->answer}}" data-qid="{{$row->question_id}}" data-name="name{{$count}}">
										  <label class="form-check-label" for="{{$row->choice4}}" >
										    {{$row->choice4}}
										  </label>
										</div>
										{{-- <form class="d-inline-block" method="post" action="{{ route('answers',$row->id) }}">
											@csrf
											<button type="submit" class="btn btn-success mb-2" style="width: 120px;"><i class="far fa-trash-alt p-1 btn-sm Btn"></i>Submit</button>
										</form> --}}
									</div>
								</div>
							</div>
						</div>
						@php
							$count++;
						@endphp
					@endforeach
				@endif	
			</div>
			<button id="test" class="btn btn-lg btn-success">click</button>
		</div>
		@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function($) {
			$('.test').click(function(event) {
				/* Act on the event */
				// alert('ok');
				var name = $(this).data('name');
				var qid = $(this).data('qid');
				var userdata = $(this).val();
				var answer = $(this).data('answer');
				// alert(name);
				datagp={
					qid : qid,
					userdataid : userdata,
					answerid : answer,
					name:name
				}
				// console.log(datagp);
				let qStr = localStorage.getItem('quizdata');
				let qArr;
				let status = false;
				if (qStr==null) {
            qArr = Array();
          }
        else{
          	qArr = JSON.parse(qStr);
          }
           $.each(qArr,function(i, v) {
							if (name==v.name) {
								status=true;
								v.userdataid = userdata;
							}	
						});
						if(!status){
							qArr.push(datagp);
						}  
         localStorage.setItem('quizdata',JSON.stringify(qArr));			
       });
		});
	</script>
@endsection
