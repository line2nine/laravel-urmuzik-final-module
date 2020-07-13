<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('css/error.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer-avatar.css')}}">
    <link rel="stylesheet" href="{{asset('css/like.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
    @notify_css
    @notify_js
    <title>URMUZIK</title>
</head>
<body>
@include('sweetalert::alert')
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

@include('home.core.header')

@include('home.core.nav')

@yield('content')
@yield('login')
@yield('register')
@yield('playlist')

@include('home.core.footer')

@notify_render
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
<!-- All Plugins js -->
<script src="{{asset('js/plugins/plugins.js')}}"></script>
<!-- Active js -->
<script src="{{asset('js/active.js')}}"></script>
<script src="{{asset('js/like.js')}}"></script>
<script>
    $("audio").on("play", function() {
        var id = $(this).attr('id');

        $("audio").not(this).each(function(index, audio) {
            audio.pause();
        });
    });
</script>
</body>
</html>
