@extends('btemplate')
@section('title','MultiQuestions')
@section('content')
		<div class="container my-5">
			<h2 class="text-center mt-3 mb-5">TrueFalseQuestion Detail</h2>
			<div class="row">
				<div class="col-12 col-md-6">
					<img src="{{ asset($truefalsequestion->photo) }}" class="w-100 h-100">
				</div>
				<div class="col-12 col-md-6">
					<table class="table">
					  <tbody>
					    <tr>
					    	<td>TrueFalse Name</td>
					    	<td>{{$truefalsequestion->name}}</td>
					    </tr>
					   	<tr>
					    	<td>Answer</td>
					    	<td>{{$truefalsequestion->answer}}</td>
					    </tr>					    
					   	<tr>
					    	<td>Question</td>
					    	<td>{{$truefalsequestion->question->questiontype}}</td>
					    </tr>
					  </tbody>
					</table>
				</div>	
			</div>
		</div>
@endsection