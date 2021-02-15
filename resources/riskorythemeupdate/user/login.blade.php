@extends('user.layout.visitor')
@section('SiteTitle','Login || Riskory')
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
            <div class="col-12 col-sm-7 col-md-7 text-center">
                <img class="img-80" src="assets/images/Mask-Group-1.svg" width="100%">
            </div>
            <div class="col-12 col-sm-5 col-md-5 text-center pb-2 pb-sm-3">

                <div class="bg-lgray br-7 mt-3 p-5 box-shadow">
                  <p class="p-style font-18 font-b color-n">Login With</p>
                  <div class="signup-icon">
                    <a class="tw--icon" href="#"><i class="fab fa-twitter"></i> Twitter</a>
                    <a class="fb--icon" href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a class="gl--icon" href="{{route('googleLogin')}}"><i class="fab fa-google"></i> Google</a>
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

                      <p class="p-style font-16 mb-3 text-left"><input type="checkbox" class="form-check-inline" name="agree" required>By Sign In You Agree To Our <a class="color-g text-underl" href="#">Service Terms</a> And <a class="color-g text-underl" href="#">Privacy Policy</a></p>
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
<script>
    function showPassword(id){
        if('password' == $('#'+id).attr('type')){
             $('#'+id).prop('type', 'text');
             $('#showPassword').toggleClass('active');
             $("#showIcon").removeClass();
             $("#showIcon").toggleClass('fas fa-eye-slash');
        }else{
             $('#'+id).prop('type', 'password');
             $('#showPassword').toggleClass('active');
             $("#showIcon").removeClass();
             $("#showIcon").toggleClass('fas fa-eye');
        }
    }
</script>
@endsection