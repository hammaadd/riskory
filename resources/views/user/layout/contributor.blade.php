@include('user.inc.header')

@include('user.inc.bootstrapScript')

@include('user.inc.toastr')

@yield('confirmJs')
@yield('star-rating')

@yield('tree')
<body class="bg-white" style="overflow-x:hidden; ">
	<div class="d-flex w-100 flex-column">
        @include('user.inc.navbarUser')

        <main role="main" class="inner">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                    @include('user.inc.contributorSidebar')
                </div>
            </div>
        </main>
		@include('user.inc.contentfooter')
	</div>

 @include('user.inc.logoutModal')

 <script>
    @if(session()->get('success'))
    toastr.success("{{session()->get('success')}}");
    @elseif(session()->get('error'))
    toastr.error("{{session()->get('error')}}");
    @endif
</script>
<script src="{{asset('js/rc.js')}}"></script>
@yield('script')
	<!-- jQuery, Popper.js, and Bootstrap JS -->
    <script>
        $(window).on('load',function () {
            $(function () {
    $('[data-toggle="popover"]').popover()
  });

                $("#loader").fadeOut("slow");
            });

      </script>
      <script>
          $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
      </script>

 @yield('reveal')
 <script>
    $(document).mouseup(function(e){
   var container = $("#search---dropdown");

   // If the target of the click isn't the container
   if(!container.is(e.target) && container.has(e.target).length === 0){
       container.hide();
   }
});
</script>
 @livewireScripts
</body>
</html>
