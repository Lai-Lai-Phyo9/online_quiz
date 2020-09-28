@extends('btemplate')
@section('title','MultiQuestions')
@section('content')
<div class="container my-5">
	<h4 class="text-center mt-3 mb-5">Multiquestion Detail</h4>
	<div class="row">
		<div class="col-12 col-md-6">
			<img src="{{asset($multiquestion->photo) }}" class="w-100 h-100">
		</div>
			<div class="col-12 col-md-6">
				<table class="table">
					<tr>
						<td>Multi Name</td>
						<td>{{$multiquestion->name}}</td>
					</tr>
					<tr>
						<td>Choice One</td>
						<td>{{$multiquestion->choice1}}</td>
					</tr>					    
					<tr>
						<td>Choice Two</td>
						<td>{{$multiquestion->choice2}}</td>
					</tr>					    
					<tr>
						<td>Choice Three</td>
						<td>{{$multiquestion->choice3}}</td>
					</tr>					    
					<tr>
						<td>Choice Four</td>
						<td>{{$multiquestion->choice4}}</td>
					</tr>
					<tr>
						<td>Answer</td>
						<td>{{$multiquestion->answer}}</td>
					</tr>					    
					<tr>
						<td>Question Type</td>
						<td>{{$multiquestion->question->questiontype}}</td>
					</tr>
				</table>
			</div>
		</div>	
	</div>

	@endsection