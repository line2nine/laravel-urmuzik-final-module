<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

    <link rel="shortcut icon" href="{{asset('img/icons/icon-48x48.png')}}"/>

    <title>Admin Dashboard</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/customer-profile.css')}}" rel="stylesheet">
    <link href="{{asset('css/customer-avatar.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    @notify_css
    @notify_js
</head>

<body>
@include('sweetalert::alert')
<div class="wrapper">
    @include('admin.core.nav')

    <div class="main">
        @include('admin.core.header')
        <main class="content">
            <div class="container-fluid p-0">
                @yield('content')
            </div>
        </main>
        @include('admin.core.footer')
    </div>

</div>

@notify_render
<script src="{{asset('js/vendor.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
