@section('contentfooter')

<footer class="bg-dgray pl-5 pr-5 pt-5" >
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-3 text-center text-sm-left">
        <a class="navbar-brand" href="{{route('homePage')}}">
            <img class="brand-logo" src="{{asset('assets/images/logo.png')}}">
              </a>
              <div class="footer-icon">
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
               
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 pt-4 pt-sm-0 text-center text-sm-left">
            <h2 class="font-20 color-r font-eb">Get To Know Us</h2>
            <ul class="pl-0 pl-sm-0">
            <li class="p-style font-18 nav-link pl-0 pl-sm-0"><a href="{{route('aboutUs')}}" class="color-b">About Us</a></li>
            </ul>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 pt-sm-4 pt-lg-0 text-center text-sm-left">
            <h2 class="font-20 color-r font-eb">Get Help</h2>
            <ul class="pl-0 pl-sm-0">
            <li class="p-style font-18 nav-link pl-0 pl-sm-0"><a href="{{route('contactUs')}}" class="color-b">Contact Us</a></li>
                <li class="p-style font-18 nav-link pl-0 pl-sm-0"><a href="{{route('feedback')}}" class="color-b">Send Feedback</a></li>
            </ul>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 text-center">
            <form class="form-style" action="{{route('subscribe')}}" method="POST">
                @csrf

                <div class="form-group">
                    <input type="email" id="subscribeEmail" class="form-control color-b" placeholder="@ Enter Your Email"  name="subEmail" required>
                </div>
                <input type="submit" id="submit" name="signup" value="Subscribe" class="btn-suscribe">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p class="p-style font-b"><i class="fas fa-copyright"></i> Rights Reserved | <a href="#" class="color-b">RISKORY</a></p>
        </div>
    </div>

    @error('subEmail')
    <script>
        toastr.
    </script>
    @enderror
</footer>