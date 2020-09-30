@extends('frontendtemplate')
@section('title','Login Page')
@section('content')
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                    {{-- <p v-if="auth=='fail'" class="text-danger">{{errMsg}}</p> --}}
                    <form v-on:submit.prevent="Login">
                      <div class="form-group text-left">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" v-model="email">
                      </div>
                      <div class="form-group text-left">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" v-model="password">
                      </div>
                      <div class="form-group form-check text-left">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Login</button>
                      <a class="nav-link" href="{{ route('login')}}">Login</a>
                  {{-- <a href="{{ route('logout')}}" class="dropdown-item">Logout</a> --}}
                  <form id="logout-form" action="{{ route('login') }}" method="POST" >
                      @csrf
                  </form>
                    </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
@endsection