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
				<div class="container my-5" id="hello">
					<div class="row">
						@foreach ($data as $question)
						<div class="col-12 col-md-3 mb-5">
							<div class="card rounded p-0 pb-3" style="position: relative;">
								<div class="card-img-top mb-0 p-1">
									<img class="img-fluid" src="{{$question->photo}}" alt="" />
								</div>
									<h5 class="text-left ml-2 mt-2">{{$question->name}}</h5>
									<h5 class="text-left ml-2 mt-2">{{$question->questiontype}}</h5>
									<p class="bg-secondary rounded px-2 text-light"style="position: absolute;top:50%;left: 5px;">15Q</p>
									<p class="px-2 bg-secondary rounded text-light" style="position: absolute; top: 50%;right: 3px;">11k plays</p>
									{{-- @auth --}}
										<a href="{{ route('detail',$question->id) }}" class="btn btn-primary btn-sm click" style="position: absolute;width: 100%;height: 100%;background: rgba(0,0,0,.04);border:none;" type="submit"></a>
									{{-- @endauth	 --}}
							</div>
						</div>
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
		$('.this').click(function() {
			// alert('helo');
			/* Act on the event */
			$('.click').click();
		});	
	});
</script>
@endsection