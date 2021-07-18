<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('home.redline') }} | @yield('title')</title>
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

    <!-- vendor min  css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_files/plugins/sweetalert/sweetalert2.min.css') }}">

    <!-- vendor min  css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_files/plugins/auto-compolted-search/easy-autocomplete.min.css') }}">

    <style type="text/css">
        .swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right)>.swal2-modal {
                border-radius: 43px;
                background: #1b1b1b!important;
            }
            .swal2-title {
                
                color: #fff!important;
            }
            .aa {
            }
            /*#searching:hover {width: 1200px !important}*/
            /*.search-container .search-input {width: 300px;}*/
    </style>


    <!-- font arbic -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>

<body>

    <!--start of banner section-->
    @include('layouts.home.include._navbar')
    <!--end of banner section-->

    <!--start of content-->

    @yield('content')

    <!--end of content -->

    <!--start of footer section-->
    @include('layouts.home.include._footer')
    <!--end of footer section-->

    <!--start of social section-->
    @include('layouts.home.include._social')
    <!--end of social section-->


    <!-- jquery -->
    <script src="{{ asset('home_files/js/jquery-3.3.1.min.js') }}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('home_files/js/bootstrap.min.js') }}"></script>

    <!-- vendor  js -->
    <script src="{{ asset('home_files/js/vendor.min.js') }}"></script>

    <!-- min scripts -->
    <script src="{{ asset('home_files/js/main.min.js') }}"></script>

        <!-- min sweetalert -->
    <script src="{{ asset('home_files/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>

            <!-- min compolted  search -->
    <script src="{{ asset('home_files/plugins/auto-compolted-search/jquery.easy-autocomplete.min.js') }}"></script>

    @stack('cart')

    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-cart").click(function(e){
                e.preventDefault();
                
                var url     = $(this).data('url');
                var method  = $(this).data('method');

                var count    = +$('#data-count').attr('data-count');
                
                $('#data-count').attr('data-count', count + 1);

                swal({
                    title: "@lang('dashboard.added_successfully')",
                    type: "success",
                    icon: 'success',
                    showCancelButton: false,
                    timer: 1000
                },
                $.ajax({
                    url: url,
                    method: method,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data) {


                    }, error: function(data) {
                        console.log(data);
                    },
                })); //end of ajax  swal
            });//end of click

            var options = {
                data: ["blue", "green", "pink", "red", "yellow"]
            };

            $('.search-input[type="text"]').easyAutocomplete(options);


            setInterval(function() {

                $("#cart-content").load(window.location.href + " #cart-content");
        
            }, 2000);
        });//end of document
    </script>

</body>