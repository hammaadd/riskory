@include('user.inc.header')
@include('user.inc.jqueryScript')
@include('user.inc.toastr')
@yield('tree')
<body class="bg-white">
	<div class="cover-container d-flex w-100 flex-column">
@include('user.inc.visitorNavbar')

@yield('content')

@include('user.inc.homeFooter')

	</div>

	<!-- jQuery, Popper.js, and Bootstrap JS -->

	@include('user.inc.bootstrapScript')
	@yield('script')

	<script>
		@if(session()->get('success'))
		toastr.success("{{session()->get('success')}}");
		@elseif(session()->get('error'))
		toastr.error("{{session()->get('error')}}");
		@endif
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
	</script>
</body>
</html>
