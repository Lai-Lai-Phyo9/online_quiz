@extends('btemplate')
@section('title','ShortQuestions')
@section('content')
	<div class="container my-5">
		<h2 class="text-center mt-3 mb-5">ShortQuestion Detail</h2>
		<div class="row">
			<div class="col-12 col-md-6">
				<img src="{{ asset($shortquestion->photo) }}" class="w-100 h-100">
			</div>
			<div class="col-12 col-md-6">
				<table class="table">
					  <tbody>
					    <tr>
					    	<td>Short Name</td>
					    	<td>{{$shortquestion->name}}</td>
					    </tr>
						<tr>
							<td>Question</td>
							<td>{{$shortquestion->question->questiontype}}</td>
						</tr>					    
					  </tbody>
				</table>

			</div>
			
		</div>
		
	</div>	

@endsection