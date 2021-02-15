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
                <img class="img-80" src="{{asset('assets/images/Mask-Group-1.svg')}}" width="100%">
            </div>
            <div class="col-12 col-sm-5 col-md-5 text-center pb-2 pb-sm-3">

                <div class="bg-lgray br-7 mt-3 p-5 box-shadow">
                    <form class="form-style" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <!-- <label for="email" class="float-left">Email</label> -->
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <!-- <label for="password" class="float-left">New Password</label> -->
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your new password">
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm your new password">
                        </div>
                        <input type="submit" id="submit" name="signup" value="Confirm" class="btn-submit">
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection