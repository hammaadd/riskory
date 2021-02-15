@section('homeFooter')

<footer class="mt-auto footer-style">
    <div class="icon-bar">
      <a class="active" href="#"><i class="fab fa-linkedin-in"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-facebook-f"></i></a>
    </div>
    <div class="footer-button">
        <button class="footer-btn" onclick="return parent.location='{{route('rc.all')}}'">Browse Risk Controls <i class="fas fa-arrow-right"></i></i></button>
    </div>
</footer>