@extends('frontendtemplate')
@section('style')
<style type="text/css">
    .home_banner_area{
        display: none;
    }
    .home_banner_area{
    display: none;
    }
    .hi{
    display: none;
    }
    .h{
        color: #32b67a;

    }
</style>
@section('content')
<div class="container">
{{--     <div class="row align-items-center py-5">
        <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="{{ asset('frontendtemplate/img/about.png') }}" alt="" class="img-fluid"></div>
        </div>
        <div class="col-lg-5 px-lg-4">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="{{ asset('frontendtemplate/img/about.png') }}" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base  text-uppercase mb-4 h">Online Quiz</h1>
            {{-- <h2 class="mb-4">Welcome back!</h2> --}}
            <p class="text-muted">Join an activity and find or create your own quizzes and flashcards. ... Sign in. Start your streak, play now!</p>
            <form method="POST" id="loginForm" action="{{ route('login') }}" class="mt-4">
            @csrf
              <div class="form-group mb-4">
                <input id="email" type="email" name="email" placeholder="Email address" class="form-control border-0 shadow form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus style="border-radius: 60px;font-size: 14px;padding: 15px 10px;padding-left: 20px;">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group mb-4">
                <input id="password" type="password" name="password" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet @error('password') is-invalid @enderror" required autocomplete="current-password" style="border-radius: 60px;font-size: 14px;padding: 15px 10px;padding-left: 20px;">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group mb-4">
                <div class="custom-control custom-checkbox">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
              </div>
             <div class="form-group mb-4">
                <button type="submit" class="btn shadow px-5 text-light" style="background: #32b67a;border-radius: 50px;"> {{ __('Login') }}</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #32b67a;">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif 
            </div>
            </form>
          </div>
        </div>
      </div>
    </div> 
</div>
@endsection
