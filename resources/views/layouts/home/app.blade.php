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
            .swal-modal {
                border-radius: 43px;
                background: #1b1b1b!important;
            }
            .swal-title {
                color: #fff!important;
                margin-bottom: 70px !important;
            }
            .swal-text {
                color: #fff !important;
            }
            .swal-button{
                width: 170px;
            }
            .swal-footer{
                display: flex;
                justify-content: space-around!important;
            }
            #searching{
                position: absolute;
            }
            .search-input{
                width: 0px; 
            }
            .search-container {
                width: 300px;
            }
            .fa-map-marker {
                font-size: 40px!important;
            }




            .openBtn {
  background: #f1f1f1;
  border: none;
  padding: 10px 15px;
  font-size: 20px;
  cursor: pointer;
}

.openBtn:hover {
  background: #bbb;
}

.overlay {
  height: 100%;
  width: 100%;
  display: none;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
}

.overlay-content {
  position: relative;
  top: 46%;
  width: 80%;
  text-align: center;
  margin-top: 30px;
  margin: auto;
}

.overlay .closebtn {
  position: absolute;
  top: 0px;
  right: 45px;
  font-size: 60px;
  cursor: pointer;
  color: white;
}

.overlay .closebtn:hover {
  color: #ccc;
}

.overlay input[type=text] {
  padding: 15px;
  font-size: 17px;
  border: none;
  float: left;
  width: 80%;
  background: white;
}

.overlay input[type=text]:hover {
  background: #f1f1f1;
}

.overlay button {
  float: left;
  width: 20%;
  padding: 15px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.overlay button:hover {
  background: #bbb;
}

    .easy-autocomplete-container{
        width: 100%;
        margin-top: -230px;
        margin-right: 0px!important;
    }
    .easy-autocomplete{
        width: 400px!important;
    }
    .easy-autocomplete-container ul{
        padding-right: 0px;
    }
    .eac-icon-right .eac-item img,
    .eac-icon-right .eac-item {
        min-height: 100px;
        font-size: 20px;
        padding-top: 10px;
    }
    .easy-autocomplete input {
         margin-top: -268px; 
    }
    .overlay-content{
        display: flex;
        justify-content: center;
    }

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    @stack('welcome')

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
                    icon: "success",
                    icon: '{{ asset("home_files/images/success.png") }}',
                    buttons: false,
                    timer: 15000
                }); //end of  swal

                $.ajax({
                    url: url,
                    method: method,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data) {

                    }, error: function(data) {
                        console.log(data);
                    },
                });//end of ajax

            });//end of click


            setInterval(function() {

                $("#cart-content").load(window.location.href + " #cart-content");
        
            }, 2000);

        });//end of document
        function openSearch() {
          document.getElementById("myOverlay").style.display = "block";
        }

        function closeSearch() {
          document.getElementById("myOverlay").style.display = "none";
        }
    </script>

    <script type="text/javascript">
        var loca    = "{{ LaravelLocalization::getCurrentLocaleDirection() }}";
        var options = {
            
            url: function (search) {

                return "/autocomplete?search=" + search  + "&format=json";
            },

            getValue: function(search) 
            {   
                if (loca == 'rtl') 
                {
                    return search.name.ar;

                } else {

                    return search.name.en;

                }
            },

            highlightPhrase: false,

            template: {

                type: 'iconRight',

                fields: {

                    iconSrc: "image_path"

                }
            },

            list: {
                onChooseEvent: function () {
                    var product = $('#searching').getSelectedItemData();
                    var url = window.location.origin + '/show/' + product.id;
                    window.location.replace(url);
                }
            },
            
        };//end of options

        $('#searching').easyAutocomplete(options)
    </script>

</body>