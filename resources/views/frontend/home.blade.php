@extends('frontendtemplate')
@section('title','Home Page')
@section('style')
	<style type="text/css">
		.owl-prev,.owl-next{
			visibility: hidden;
		}
		#hello .card {
			transition: .5s;
		}
		#hello .card:hover{
			 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}
		.home_banner_area{
			display: none;
		}
		.home_banner_area{
		display: none;
		}
		#grade .no{
			/*background: green;*/
			border-radius: 50%;
			padding: 10px 15px;
			color: white;
			font-weight: 300;
			/*margin-bottom: 20px;*/
		}
		#grade h2{
			font-size: 40px;
		}
		#grade p{
			font-size: 20px;
			line-height: 30px;
			font-weight: lighter;
		}
		#grade .content{
			width: 400px;
		}
		#myInput{
			width: 100%;
			line-height: 30px;
			padding: 5px;
			border-radius: 30px;
			font-size: 14px;
			border: 1px solid gray;
			padding-left: 20px;
		}
		#search1 ul{
			width: 100%;
			/*background:#F8F9F9;*/
			border: 1px solid gray;
			margin-top:1px;
			list-style: none;
			padding: 0px;
			/*padding-left: 10px;*/
		}
		#search1 ul li{
			line-height: 25px;
			/*padding: 5px;*/
			letter-spacing: 2px;
			color: #34495E;
		}
		#search1 ul li a{
			display: block;
			color: #34495E;
			line-height: 35px;
			padding-left: 10px;
			border-bottom:1px solid gray;

		}
		#search1 ul li a:hover{
			color: white;
			background-color: #34495E;
			border-bottom:1px solid white;

		}
		#search_input_box{
			display: none;
		}
	</style>
@endsection
@section('content')
	<section class="feature_area section_gap_top">
      <div class="container hi">
        <div class="row justify-content-center">
          <div class="col-lg-5 hello">
            <div class="main_title">
              <h2 class="mb-3" style="line-height: 40px;">Improved Your Skills</h2>
              <p>
                Replenish man have thing gathering lights yielding shall you
              </p>
            </div>
          </div>
        </div>
        <div class="row">
        	<div class="col-12 col-md-8 offset-md-2" id="search1">
        			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Here.." title="Search here">
        			<div class="">
        				<ul id="myUL">
						  @foreach ($data as $question)
						  	<li><a href="{{ route('detail',$question->id) }}">{{$question->name}}</a></li>
						  @endforeach
						</ul>
        			</div>
        	</div>
        </div>
      </div>
    </section>
	<section class="feature_area section_gap_top">
      <div class="container hi">
        <div class="row justify-content-center">
          <div class="col-lg-5 hello">
            <div class="main_title">
              <h2 class="mb-3" style="line-height: 40px;">Never grade another worksheet</h2>
              <p>
                Replenish man have thing gathering lights yielding shall you
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 d-none d-md-block col-md-6 p-0">
          	<div class="img m-0">
          		<img src="https://cf.quizizz.com/img/landing/desktop-main_illustration.png" class="w-100 h-75">
          	</div>
          </div>
          <div class="col-12 col-md-6 py-5" id="grade">
          	<div class="row mt-md-5">
          		<div class="col-12 col-md-12 mb-5">
          			<div class="content">
          				<span class="no mb-4" style="background: #2d70ae;">1</span>
          				<h2 class="my-4">Pick the perfect quiz or create your own</h2>
          				<p>Choose from millions of free teacher-created quizzes or quickly make your own.</p>
          			</div>
          		</div>
          		<div class="col-12 col-md-12 mb-5">
          			<div class="content">
          				<span class="no mb-4" style="background: #efa929;">2</span>
          				<h2 class="my-4">Students engage at their own pace</h2>
          				<p>Play a Live Game together or use Homework Mode. Students use any device and progress independently.</p>
          			</div>
          		</div>
          		<div class="col-12 col-md-12 mb-4">
          			<div class="content">
          				<span class="no mb-4" style="background: #d5546d;">3</span>
          				<h2 class="my-4">Put feedback to work, no grading required</h2>
          				<p>Students have a blast, we do the grading, and you see what they know now and where you'll take them next.</p>
          			</div>
          		</div>
          	</div>
          </div>
        </div>
      </div>
    </section>
	<div class="container">
		<div class="popular_courses">
	      <div class="container">
	        <div class="row justify-content-center">
	          <div class="col-lg-5">
	            <div class="main_title">
	              <h2 class="mb-3">Our Popular Quiz</h2>
	              <p>
	                Replenish man have thing gathering lights yielding shall you
	              </p>
	            </div>
	          </div>
	        </div>
			<div class="container my-5" id="hello">
				<div class="row">
					<div class="col-12 col-md-12 mb-3">
						<h3 c>Beginner</h3>
					</div>
					@foreach ($data as $question)
						@if ($question->levelname=='Beginner')
							<div class="col-12 col-md-3 mb-5">
								<div class="card rounded p-0 pb-3" style="position: relative;">
									<div class="card-img-top mb-0 p-1">
										<img class="img-fluid" src="{{$question->photo}}" alt="" />
									</div>
										<h5 class="text-left ml-2 mt-2">{{$question->name}}</h5>
										<h5 class="text-left ml-2 mt-2">{{$question->questiontype}}</h5>
										{{-- <h5 class="text-left ml-2 mt-2">{{$question->levelname}}</h5> --}}
										<p class="bg-secondary rounded px-2 text-light"style="position: absolute;top:54%;left: 5px;">15Q</p>
										<p class="px-2 bg-secondary rounded text-light" style="position: absolute; top: 54%;right: 3px;">11k plays</p>
										{{-- @auth --}}
											<a href="{{ route('detail',$question->id) }}" class="btn btn-primary btn-sm click" style="position: absolute;width: 100%;height: 100%;background: rgba(0,0,0,.04);border:none;" type="submit"></a>
										{{-- @endauth--}}
								</div>
							</div>							
						@endif	
					@endforeach
					<div class="col-12 col-md-12 mb-3">
						<h3>Intermediate</h3>
					</div>
					@foreach ($data as $question)
						@if ($question->levelname=='Intermediate')
							<div class="col-12 col-md-3 mb-5">
								<div class="card rounded p-0 pb-3" style="position: relative;">
									<div class="card-img-top mb-0 p-1">
										<img class="img-fluid" src="{{$question->photo}}" alt="" />
									</div>
										<h5 class="text-left ml-2 mt-2">{{$question->name}}</h5>
										<h5 class="text-left ml-2 mt-2">{{$question->questiontype}}</h5>
										{{-- <h5 class="text-left ml-2 mt-2">{{$question->levelname}}</h5> --}}
										<p class="bg-secondary rounded px-2 text-light"style="position: absolute;top:54%;left: 5px;">15Q</p>
										<p class="px-2 bg-secondary rounded text-light" style="position: absolute; top: 54%;right: 3px;">11k plays</p>
										{{-- @auth --}}
											<a href="{{ route('detail',$question->id) }}" class="btn btn-primary btn-sm click" style="position: absolute;width: 100%;height: 100%;background: rgba(0,0,0,.04);border:none;" type="submit"></a>
										{{-- @endauth--}}
								</div>
							</div>							
						@endif	
					@endforeach
				</div>
			</div>
	      </div>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function( ) {
			$('#myUL').hide();
			var val;
			$('#myInput').keyup(function(event) {
				$('#myUL').show();
				val = $(this).val();
				if(!val){
					$('#myUL').hide();
				}
			});
		});
		function myFunction() {
		    var input, filter, ul, li, a, i, txtValue;
		    input = document.getElementById("myInput");
		    filter = input.value.toUpperCase();
		    ul = document.getElementById("myUL");
		    li = ul.getElementsByTagName("li");
		    for (i = 0; i < li.length; i++) {
		        a = li[i].getElementsByTagName("a")[0];
		        txtValue = a.textContent || a.innerText;
		        if (txtValue.toUpperCase().indexOf(filter) > -1) {
		            li[i].style.display = "";
		        } else {
		            li[i].style.display = "none";
		        }
		    }
		}
	</script>
@endsection