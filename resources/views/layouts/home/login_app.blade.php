<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    <!--Link Icon Title-->
    <link href="{{ asset('home_files/images/icon.PNG') }}" rel="icon">

    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_files/css/font-awesome.min.css') }}">

    @if (app()->getLocale() == 'ar')
        
        <!-- Bootstrap RTL -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_files/css/rtl/bootstrap-rtl.min.css') }}">

    <!-- min styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_files/css/rtl/min-rtl.min.css') }}">

    @else

    <!-- Bootstrap LTE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_files/css/bootstrap.min.css') }}">

    <!-- min styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_files/css/min.min.css') }}">

    @endif

    <!--font google-->
    <link href=" https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

    <!--google font-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

    <!-- vendor min  css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_files/css/vendor.min.css') }}">


    <!-- font arbic -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>

<body>

    <!--start of content-->

    @yield('content')

    <!--end of content -->

    <!-- jquery -->
    <script src="{{ asset('home_files/js/jquery-3.3.1.min.js') }}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('home_files/js/bootstrap.min.js') }}"></script>

    <!-- vendor  js -->
    <script src="{{ asset('home_files/js/vendor.min.js') }}"></script>

    <!-- min scripts -->
    <script src="{{ asset('home_files/js/main.min.js') }}"></script>

</body>