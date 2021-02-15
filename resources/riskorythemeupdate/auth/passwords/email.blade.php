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
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p class="p-style font-18 font-b color-n">Please Enter your Email to Send verification link</p>
                    <form class="form-style-forget" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="submit" id="submit" name="signup" value="Confirm" class="btn-submit-forget">
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection