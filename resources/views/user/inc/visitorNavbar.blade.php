@section('visitorNavbar')
<header class="riskory--header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-sm-5 px-2 pt-sm-4 pt-2">
      <a class="navbar-brand" href="{{route('homePage')}}">
      <img class="brand-logo" src="{{asset('assets/images/logo.png')}}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="row col-12 mx-0 navbar--row">


                @include('user.inc.public-search-rc')


        </div>
        <div class="navigation--row">
          <ul class="navbar-nav mr-lg-1 ml-auto align-items-center">
            {{-- <li class="nav-item active">
            <a class="nav-link nav-link-style" href="{{route('homePage')}}">Home</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link nav-link-style" href="{{route('publicCategories')}}">Categories</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link nav-link-style" href="http://skiller.com/" target="_blank">Jobs</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link nav-link-style" href="{{route('aboutUs')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-style" href="{{route('contactUs')}}">Contact Us</a>
            </li>
          </ul>
          <div class="div--btns d-flex align-items-center justify-content-center justify-content-lg-start">
            @if(Auth::user())

            <button class="btn-join-now" onclick="parent.location='{{route('user')}}'" >Dashboard</button>
            @else
            {{-- <button class="btn-join-now m-2" onclick="parent.location='{{route('userRegister')}}'" type="submit">Join Now</button>
            <button class="btn-join-now m-2" onclick="parent.location='{{route('userLogin')}}'" >Login</button> --}}
            <button class="btn-join-now" onclick="parent.location='{{route('userRegister')}}'" >Join</button>
            @endif
          </div>
        </div>
      </div>
    </nav>
</header>
