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
    label{
      line-height: 35px;
      transition: .5;
      margin-left: 20px;
      /*margin-bottom: 20px;*/
    }
    label:hover{
      color:#32b67a;
      
    }
    .form-control{
      margin-top: 10px;
    }
    bod
</style>
@section('content')
<div class="container-fluid">
  <div class="pb-4 text-center mb-5" style="font-size: 30px;color: #32b67a;">{{ __('Register Now') }}</div>  
  <div class="row justify-content-center mb-5">
      <div class="col-md-8">
          <div class="card" style="border-radius: 30px;">
              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="form-group ">
                      <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                      <div class="">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror shadow" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="border-radius: 60px;line-height: 30px;font-size: 16px;padding: 25px;border: none;">

                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group my-3">
                      <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                      <div class="">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror shadow" name="email" value="{{ old('email') }}" required autocomplete="email" style="border-radius: 60px;line-height: 30px;font-size: 16px;padding: 25px;border: none;">

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                      <div class="">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror shadow" name="password" required autocomplete="new-password" style="border-radius: 60px;line-height: 30px;font-size: 16px;padding: 25px;border: none;">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                      <div class="">
                          <input id="password-confirm" type="password" class="form-control shadow" name="password_confirmation" required autocomplete="new-password" style="border-radius: 60px;line-height: 30px;font-size: 16px;padding: 25px;border: none;">
                      </div>
                  </div>
                  <div class="form-group row py-3">
                    <div class="form-check mr-2" style="margin-left: 20px;">
                      <input class="form-check-input" type="radio" name="role" id="exampleRadios1"  value="participant" checked>
                      <label class="form-check-label" for="exampleRadios1">  
                        Participant
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="quiz maker">
                      <label class="form-check-label" for="exampleRadios2">
                        Quiz Maker
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="university_school" class="col-form-label text-md-right">{{ __('University School') }}</label>

                      <div class="">
                          <input id="university_school" type="text" class="form-control @error('university_school') is-invalid @enderror shadow" name="university_school" value="{{ old('university_school') }}" required autocomplete="university_school" autofocus style="border-radius: 60px;line-height: 30px;font-size: 16px;padding: 25px;border: none;">

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

                  <div class="form-group mt-5">
                      <div class="">
                          <button type="submit" class="btn text-light px-4 py-2" style="background:#32b67a; border-radius: 30px;">
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
