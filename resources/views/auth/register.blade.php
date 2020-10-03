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
</style>
@section('content')
<div class="container">
  <div class="row justify-content-center mb-5">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Register') }}</div>

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                      <div class="col-md-6">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                  </div>
                  <div class="form-group row py-3">
                    <div class="form-check mr-2" style="margin-left: 250px;">
                      <input class="form-check-input" type="radio" name="role" id="exampleRadios1" value="quiz maker" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        Quiz Maker
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="participant">
                      <label class="form-check-label" for="exampleRadios2">
                        Participant
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                      <label for="university_school" class="col-md-4 col-form-label text-md-right">{{ __('University School') }}</label>

                      <div class="col-md-6">
                          <input id="university_school" type="text" class="form-control @error('university_school') is-invalid @enderror" name="university_school" value="{{ old('university_school') }}" required autocomplete="university_school" autofocus>

                          @error('university_school')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

{{--                   <div class="form-group row">
                      <label for="work_organization" class="col-md-4 col-form-label text-md-right">{{ __('Work Organization') }}</label>

                      <div class="col-md-6">
                          <input id="work_organization" type="text" class="form-control @error('work_organization') is-invalid @enderror" name="work_organization" value="{{ old('work_organization') }}" required autocomplete="work_organization" autofocus>

                          @error('work_organization')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>   --}}                      

                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Register') }}
                          </button>
                      </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
