@extends('frontendtemplate')
@section('style')
<style type="text/css">
	.home_banner_area{
		display: none;
	}
	.home_banner_area{
	display: none;
	}
	.form-check-label{
		transition: .5s;
	}
	.form-check-label:hover{
		color: #015DC8;
	}
</style>
@endsection
@section('title','topic Detail')
	@section('content')
		<div class="container my-5">
			<input type="hidden" name="" data-id="{{$userId}}" id="userid">
			<div class="row mb-3">
				@php
					{{ $i=1;}}
				@endphp

				@if($questiontype=="truefalse")
				@php
					$count=0;
				@endphp
				{{-- true false --}}
					@foreach ($random as $randno)
					@php
						// echo $randno;
					@endphp
					@foreach ($detail as $row)
					@if ($randno == $row->id)
						<div class="col-12 bg-light shadow mb-2 p-3 pb-4">
							<h2 class="text-success my-3 text-center mb-4">Question 
								<span>{{$i++}}</span>
							</h2>
							<div class="d-flex">
								<div class="img">
									<img src="{{ asset($row->photo) }}" style="width: 300px; height: 200px;">
								</div>
								<div class="question-title pt-5">
									<h4 class="text-dark my-2 ml-3 pt-2" style="font-weight:normal; font-size: 30px;letter-spacing: 1px; font-style: italic;">{{$row->name}}<span class="ml-2"></span></h4>
									<div class="d-flex ml-4 pt-3" style="font-size: 20px;">
										<div class="form-check mr-4">
										  <input class="form-check-input test" type="radio" name="name{{$count}}" id="id{{$count}}" value="1" data-answer="{{$row->answer}}" data-qid="{{$row->id}}" data-name="name{{$count}}" data-qtype="{{$row->question->questiontype}}">
										  <label class="form-check-label" for="id{{$count}}">
										   True
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input test" type="radio" name="name{{$count}}" value="0" name="name{{$count}}" id="id{{$count}}a" data-answer="{{$row->answer}}" data-qid="{{$row->id}}" data-name="name{{$count}}" data-qtype="{{$row->question->questiontype}}">
										  <label class="form-check-label" for="id{{$count}}a">
										    False
										  </label>
										</div>
									</div>
								</div>
							</div>
						</div>
						@php
							$count++;
						@endphp
						@endif
					@endforeach
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
					{{-- this is multipalequestion --}}
				@else	
					@php
						$count=0;
					@endphp
					@foreach ($random as $randno)
					@php
						// echo $randno;
					@endphp
					@foreach ($detail as $row)
						@if ($randno == $row->id)
						<div class="col-12 bg-light shadow mb-2 p-3 pb-4">
							<h2 class="text-success my-3 text-center mb-4">Question 
								<span>{{$i++}}</span>
							</h2>
							<div class="d-flex">
								<div class="img">
									<img src="{{ asset($row->photo) }}" style="width: 300px; height: 200px;">
								</div>
								<div class="question-title">
									<h4 class="text-dark my-2 ml-3 " style="font-weight:normal; font-size: 30px;letter-spacing: 1px; font-style: italic;">{{$row->name}}</h4>
									<div class="ml-3" style="font-size: 20px;">
										<div class="form-check mr-4 mb-2">
										  <input class="form-check-input test" type="radio" name="name{{$count}}" id="{{$row->choice1}}a" value="1"  data-answer="{{$row->answer}}" data-qid="{{$row->id}}" data-name="name{{$count}}" data-qtype="{{$row->question->questiontype}}">
										  <label class="form-check-label" for="{{$row->choice1}}a">
										   {{$row->choice1}}
										  </label>
										</div>
										<div class="form-check mb-2">
										  <input class="form-check-input test" type="radio" name="name{{$count}}" id="{{$row->choice2}}z" value="2" data-answer="{{$row->answer}}" data-qid="{{$row->id}}" data-name="name{{$count}}" data-qtype="{{$row->question->questiontype}}">
										  <label class="form-check-label" for="{{$row->choice2}}z" >
										    {{$row->choice2}}
										  </label>
										</div>
										<div class="form-check mb-2">
										  <input class="form-check-input test" type="radio" name="name{{$count}}" id="{{$row->choice3}}w" value="3" data-answer="{{$row->answer}}" data-qid="{{$row->id}}" data-name="name{{$count}}" data-qtype="{{$row->question->questiontype}}">
										  <label class="form-check-label" for="{{$row->choice3}}w" >
										   {{$row->choice3}}
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input test" type="radio" name="name{{$count}}" id="{{$row->choice4}}xx" value="4" data-answer="{{$row->answer}}" data-qid="{{$row->id}}" data-name="name{{$count}}" data-qtype="{{$row->question->questiontype}}">
										  <label class="form-check-label" for="{{$row->choice4}}xx" >
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
						@endif
					@endforeach
					@endforeach
				@endif	
			</div>
			<button id="savebtn" class="btn btn-lg btn-success">Check Me</button>
		</div>
		{{-- Show Result and Question --}}
		<div class="container bg-light  shadow" style="position: fixed;width: 600px; height: 500px;top: 26%;left: 30%;z-index: 3;" id="showme">
			<div class="container" style="position: relative;height: 600px;width: 400px;">
				<div class="d-flex pt-5">
					<h2>Correct Mark</h2>
					<h1 class="text-center text-success ml-3"  id="correct"></h1>
				</div>
				<div class="d-flex pt-5">
					<h2>Total Quizz</h2>
					<h1 class="text-center text-success ml-3"  id="wrong"></h1>
				</div>
				<button class="btn btn-success btn-lg" style="position: absolute;bottom: 150px; right: 0px;" id="hideme">close</button>
			</div>
		</div>
		@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function($) {
			let total = 0;
			haha = $('#showme');//show result and question
			haha.hide();
			let rightAnswer = 0;
			var allq=0;
			$('.test').click(function(event) {
				// alert('ok');				
				var userid = $('#userid').data('id');
				var name = $(this).data('name');
				var qid = $(this).data('qid');
				var userinput = parseInt($(this).val());
				var answer = $(this).data('answer');
				var qtype =$(this).data('qtype');
				// alert(name);
				datagp={
					userId : userid,
					qid : qid,
					userinput : userinput,
					answerid : answer,
					name:name,
					qtype:qtype
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
							if (qid == v.qid && qtype==v.qtype) {
								status=true;
								v.userinput = userinput;
							}	
						});
						if(!status){
							qArr.push(datagp);
						}  
	       		localStorage.setItem('quizdata',JSON.stringify(qArr));			
	     	});
	     	
	     	// save in Network (storeanswer)
			$('#savebtn').click(function(event) {

				let qStr = localStorage.getItem('quizdata');

				$.ajaxSetup({ 
					headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}

				});
				
				$.post('/storeanswer',{data:qStr},function(response){
					// alert(response);

				});

				let qarr = JSON.parse(qStr);
				$.each(qarr,function(i,v){
					if(v.answerid==v.userinput){
						total++;
						allq++;
			
					}else{
						allq++;
					}
				});
				// alert(total);
				$('#correct').html(total);
				$('#wrong').html(allq);
				haha.show();
				// $('#showme').css("display","block");
				total=0;
        		localStorage.clear();		
			});
			//answer radio check clear
			$('#hideme').click(function(event) {
				haha.hide();
				location.reload();
			});
		});
	</script>
@endsection
