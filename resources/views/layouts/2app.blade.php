<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('misl/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('misl/css/login.css')}}">
	
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo/ch-ico.jpg') }}">
	<title><?php echo translate('system_name'); ?></title>
</head>
<body class="img js-fullheight" style='background-image: url("<?php echo asset('images/img/admin-login-bg.jpg') ?>");'>
<div class="loader">
    <div class="loader-in">
        <div class="innerx one"></div>
        <div class="innerx two"></div>
        <div class="innerx three"></div>
    </div>
</div>
<div id="app" style="display: none">
    <main class="">
        <?php echo session()->get('name'); ?>
        @yield('content')
    </main>
</div>
</body>
</html>
<script src="{{asset('misl/js/jquery.min.js')}}"></script>
<script src="{{asset('misl/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('misl/js/login.js')}}" type="text/javascript"></script>
<script>
    $(window).on('load', function() {
        preloader();
    });
</script>

<script>
    function preloader() {
        $(".loader-in").fadeOut();
        $(".loader").delay(5000).fadeOut("fast");
        $(".wrapper").fadeIn("fast");
        $("#app").fadeIn("fast");
    }
</script>
