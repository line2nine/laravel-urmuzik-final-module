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

    <title>URMUZIK &amp; Dashboard</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    @include('admin.core.nav')

    <div class="main">
        @include('admin.core.header')
        @yield('content')
        @include('admin.core.footer')
    </div>
</div>

<script src="{{asset('js/vendor.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    $(function () {
        $("#world_map").vectorMap({
            map: "world_mill",
            normalizeFunction: "polynomial",
            hoverOpacity: .7,
            hoverColor: false,
            regionStyle: {
                initial: {
                    fill: "#e3eaef"
                }
            },
            markerStyle: {
                initial: {
                    "r": 9,
                    "fill": window.theme.primary,
                    "fill-opacity": .95,
                    "stroke": "#fff",
                    "stroke-width": 7,
                    "stroke-opacity": .4
                },
                hover: {
                    "stroke": "#fff",
                    "fill-opacity": 1,
                    "stroke-width": 1.5
                }
            },
            backgroundColor: "transparent",
            zoomOnScroll: false,
            markers: [{
                latLng: [31.230391, 121.473701],
                name: "Shanghai"
            },
                {
                    latLng: [28.704060, 77.102493],
                    name: "Delhi"
                },
                {
                    latLng: [6.524379, 3.379206],
                    name: "Lagos"
                },
                {
                    latLng: [35.689487, 139.691711],
                    name: "Tokyo"
                },
                {
                    latLng: [23.129110, 113.264381],
                    name: "Guangzhou"
                },
                {
                    latLng: [40.7127837, -74.0059413],
                    name: "New York"
                },
                {
                    latLng: [34.052235, -118.243683],
                    name: "Los Angeles"
                },
                {
                    latLng: [41.878113, -87.629799],
                    name: "Chicago"
                },
                {
                    latLng: [51.507351, -0.127758],
                    name: "London"
                },
                {
                    latLng: [40.416775, -3.703790],
                    name: "Madrid"
                }
            ]
        });
        setTimeout(function () {
            $(window).trigger('resize');
        }, 250)
    });
</script>
<script>
    $(function () {
        $('#datetimepicker-dashboard').datetimepicker({
            inline: true,
            sideBySide: false,
            format: 'L'
        });
    });
</script>

</body>
</html>
