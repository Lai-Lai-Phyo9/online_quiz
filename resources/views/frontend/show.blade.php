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
	</style>
@endsection
@section('content')
	<div class="container">
		<div class="popular_courses">
	      <div class="container">
	        <div class="row justify-content-center">
	          <div class="col-lg-5">
	            <div class="main_title">
	              <h2 class="mb-3">Our Popular Courses</h2>
	              <p>
	                Replenish man have thing gathering lights yielding shall you
	              </p>
	            </div>
	          </div>
	        </div>
	        <div class="row">
	          <!-- single course -->
	          <div class="col-lg-12">
	            <div class="owl-carousel active_course">
	              @foreach ($multiquestions as $multiquestion)
		              <div class="single_course">
		                <div class="course_head">
		                  <img class="img-fluid" src="{{$multiquestion->photo}}" alt="" />
		                </div>
		                <div class="course_content">
		                  {{-- <span class="price">{{$multiquestion->price}}</span> --}}
		                  <span class="tag mb-4 d-inline-block">{{$multiquestion->choice1}}</span>
		                  <h4 class="mb-3">
		                    <a href="course-details.html">{{$multiquestion->name}}</a>
		                  </h4>
		                  <p>
		                  	{{$multiquestion->choice1}}
		                  	{{$multiquestion->choice2}}
		                  	{{$multiquestion->choice3}}
		                  	{{$multiquestion->choice4}}
		                  </p>
		                  <div
		                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
		                  >
		                  </div>
		                </div>
		              </div>
	              @endforeach
	            </div>
	          </div>
	        </div>
	      </div>
    	</div>
	</div>