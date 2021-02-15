@section('navbarsection')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-sm-5 px-2 pt-sm-2 pt-2">
    <a class="navbar-brand" href="{{URL::route('homePage')}}">
      <img class="brand-logo" src="{{asset('assets/images/logo.png')}}">
          <p class="tagline-top">Every Risk Has A Story</p>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-4 ml-auto">
          {{-- <li class="nav-item active">
            <a class="nav-link nav-link-style" href="{{route('homePage')}}">Home</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link nav-link-style" href="{{route('user')}}">Risk Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-style" href="{{route('aboutUs')}}">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-style" href="{{route('contactUs')}}">Contact Us</a>
          </li>
        </ul>
      </div>
    </nav>
</header>