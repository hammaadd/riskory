@extends('user.layout.visitor')
@section('SiteTitle','Register || Riskory')
@section('alpinejs')
  <script src="{{asset('assets/js/alpine.js')}}"></script>
@endsection
@section('content')
<style>
    html,body {
        min-height: 100%;
        height: 100%;
    }
    .cover-container {
        height: 100%;
    }
    footer.bg-dgray {
      margin-top: auto;
    }
    </style>
<main role="main" class="inner cover pb-5 pb-sm-5 my-auto">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-5 col-lg-6 col-xl-7 text-center">
                <img class="img-80" src="assets/images/Mask-Group-1.svg" width="100%">
            </div>
            <div class="col-12 col-md-7 col-lg-6 col-xl-5 text-center pb-2 pb-sm-3" x-data="{ tab:'register' }">

                <div class="join--tabs bg-lgray br-7 mt-3 px-3 px-md-5 box-shadow">
                  <span class="join--tabs-item" @click="tab='register'" :class="{'active':tab==='register'}">Register</span>
                  <span class="join--tabs-item" @click="tab='login'" :class="{'active':tab==='login'}">Login</span>
                </div>
                <div class="join--tabs-content bg-lgray br-7 mt-2 py-5 px-3 px-md-5 box-shadow" x-show="tab==='register'">
                    <p class="p-style font-18 font-b color-n">Signup With</p>
                    <div class="signup-icon">
                      <a class="tw--icon" href="{{route('twitterLogin')}}">
                        <i class="fab fa-twitter"></i>
                        <span class="ic---text">Twitter</span>
                      </a>
                      <a class="fb--icon" href="{{route('facebookLogin')}}">
                        <i class="fab fa-facebook-f"></i>
                        <span class="ic---text">Facebook</span>
                      </a>
                      <a class="gl--icon" href="{{route('googleLogin')}}">
                        <i class="fab fa-google"></i>
                        <span class="ic---text">Google</span>
                      </a>
                    </div>
                    <p class="p-style font-18 font-b color-n" style="margin-top: 15px;">Or With</p>
                    <form class="form-style" action="{{route('userRegister')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" id="confirmPassword" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group captcha-group">
                            <div class="row">
                                <div class="col-auto order-2">
                                    <div class="captcha">
                                        <span class="captcha-code">{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger captcha-refresh reload" id="reload">&#x21bb;</button>
                                    </div>
                                </div>
                                <div class="col-auto order-1">
                                    <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror captcha-field" placeholder="Enter Captcha" name="captcha" required>
                                    @error('captcha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <p class="p-style font-16 mb-3 text-left"><input type="checkbox" class="form-check-inline" name="agree">By SIGN UP have to agree to our <a class="color-g text-underl" href="{{route('tac')}}">Service Terms</a> & <a class="color-g text-underl" href="{{route('privacy.policy')}}">Privacy Policy</a></p>
                        <input type="submit" id="submit" name="signup" value="Sign Up" class="btn-submit">
                        <p class="p-style font-16 mt-3 mb-0">Already Have Account ! <a href="{{route('userLogin')}}" class="color-b font-weight-bold">Login Here</a></p>
                    </form>
                </div>
                <div class="join--tabs-content bg-lgray br-7 mt-2 py-5 px-3 px-md-5 box-shadow" x-show="tab==='login'">
                  <p class="p-style font-18 font-b color-n">Login With</p>
                  <div class="signup-icon">
                    <a class="tw--icon" href="{{route('twitterLogin')}}">
                      <i class="fab fa-twitter"></i>
                      <span class="ic---text">Twitter</span>
                    </a>
                    <a class="fb--icon" href="{{route('facebookLogin')}}">
                      <i class="fab fa-facebook-f"></i>
                      <span class="ic---text">Facebook</span>
                    </a>
                    <a class="gl--icon" href="{{route('googleLogin')}}">
                      <i class="fab fa-google"></i>
                      <span class="ic---text">Google</span>
                    </a>
                  </div>
                  <p class="p-style font-18 font-b color-n" style="margin-top: 15px;">Or With</p>
                  <form class="form-style" action="{{url('/login')}}" method="POST">
                    @csrf
                      <div class="form-group">
                          <input type="email" id="email" name="email" class="form-control @if($errors->any()) is-invalid @endif" placeholder="Email" required value="{{ old('email') }}" autocomplete="email" autofocus>
                          @if($errors->any())
                          <span class="invalid-feedback" role="alert">
                              <strong>Your Email or Password is incorrect</strong>
                          </span>
                          @endif
                      </div>
                      <div class="form-group">
                          <div class="input-group">
                          <input type="password" id="password" name="password" class="form-control @if ($errors->any()) is-invalid @endif" placeholder="Password" required >
                          <div class="input-group-append">
                              <span class="input-group-text append-inp" id="showPassword" onclick="showPassword('password')"><i class="fas fa-eye" id="showIcon"></i></span>
                            </div>
                          </div>

                          @if($errors->any())
                          <span class="invalid-feedback" role="alert">
                              <strong>Your Email or Password is incorrect</strong>
                          </span>
                          @endif
                          <small id="passwordHelpBlock" class="form-text text-muted mt-2 text-left">
                            <a href="{{ route('password.request') }}" class="color-b">Forgot Your Password ?</a>
                          </small>
                      </div>

                      <p class="p-style font-16 mb-3 text-left"><input type="checkbox" class="form-check-inline" name="agree" required>By Sign In You Agree To Our <a class="color-g text-underl" href="{{route('tac')}}">Service Terms</a> And <a class="color-g text-underl" href="{{route('privacy.policy')}}">Privacy Policy</a></p>
                      <input type="submit" id="submit" name="signup" value="Login" class="btn-submit">
                      <p class="p-style font-16 mt-3 mb-0">Don't Have Account ? <a href="{{route('userRegister')}}" class="color-b font-weight-bold">Sign Up</a></p>
                  </form>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
@endsection
