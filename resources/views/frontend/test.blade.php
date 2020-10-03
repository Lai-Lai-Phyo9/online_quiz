@extends('frontendtemplate')
@section('title','test Page')
@section('content')

    <div class="container my-5" style="display: none;">
      @php
        $count=0;
      @endphp
      @foreach ($carts as $count)
        @if ($carts->answerid==$carts->userinput){
            @php
              $count++;
            @endphp
        }
        @endif
      @endforeach
      <h2>No of right answer is <span>{{$count}}</span></h2>
    </div>

@endsection