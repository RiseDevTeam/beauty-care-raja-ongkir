<!DOCTYPE html>
<html>

<head>
    @include('halaman_user.layouts_user.css')

    {{-- javasript start --}}
    @include('halaman_user.layouts_user.script')
    {{-- javasript --}}

</head>

<body>
    {{-- header halaman user --}}
    @include('halaman_user.layouts_user.header')
    {{-- !!header halaman user --}}


    @yield('content')

    <!--footer section start-->
    @include('halaman_user.layouts_user.footer')
    <!--footer section end-->
</body>

</html>
