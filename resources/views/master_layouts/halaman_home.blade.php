<!DOCTYPE HTML>
<html>
    <head>
	     @include('halaman_user.layouts_home.head')

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	
	{{-- Navbar --}}
     @include('halaman_user.layouts_home.navbar')

     
    @yield('content')

    {{-- @include('halaman_user.layouts_home.newsletter') --}}

    @include('halaman_user.layouts_home.footer')
	</div>

	
	
    @include('halaman_user.layouts_home.script')

	</body>
</html>

