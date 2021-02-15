@include('user.inc.header')
@include('user.inc.jqueryScript')
@include('user.inc.bootstrapScript')

@include('user.inc.toastr')

@yield('confirmJs')
@yield('star-rating')
@yield('select2')
<body class="bg-white">
	<div class="d-flex w-100 flex-column">
        @include('user.inc.navbarUser')
        
        <main role="main" class="inner">
            <div class="container-fluid row pr-0">
                @yield('content')
                @include('user.inc.contributorSidebar')
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
@yield('script')
	<!-- jQuery, Popper.js, and Bootstrap JS -->
    <script>
        $(window).on('load',function () {
            $(function () {
    $('[data-toggle="popover"]').popover()
  });
          //document.getElementById("loader").style.display = "flex";
                $("#loader").fadeOut("slow");
            });
            // document.onreadystatechange = function() { 
            //     if (document.readyState !== "complete") { 
            //         document.getElementById("loader").style.display = "flex"; 
            //     } else { 
            //         document.getElementById("loader").style.display = "flex";
            //     } 
            // }; 
      </script>
  
 @yield('reveal')
 @livewireScripts
</body>
</html>