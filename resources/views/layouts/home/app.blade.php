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

    <!-- style  css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home_files/css/style.css') }}">

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

    <!-- min filestyle  search -->
    <script src="{{ asset('home_files/plugins/filestyle/bootstrap-filestyle.min.js') }}"></script>

    <!-- min clipboard  search -->
    <script src="{{ asset('home_files/plugins/clipboard/clipboard.min.js') }}"></script>

    {{--jquery number--}}
    <script src="{{ asset('dashboard_files/js/jquery.number.min.js') }}"></script>

    @stack('welcome')

    @stack('cart')

    <script type="text/javascript">

        $(".fileing").filestyle({
            dragdrop: true,
            htmlIcon: ' <span class="fa fa-image"></span> ',
            text: "@lang('home.click_here')",
            btnClass: "btn-outline-danger",
            placeHolder: 'My file text',
            size: "lg",
            badge: true,
            buttonBefore: true
        });

        $(document).ready(function() {

            $(".copy-here").click(function(e) {
                e.preventDefault();
                
                swal({
                    title: "@lang('dashboard.copy_successfully')",
                    type: "success",
                    buttons: false,
                    timer: 1500
                }); //end of  swal

                new ClipboardJS('.copy-here', {
                    text: function () {
                        return "{{ setting('bank_account') }}";
                    },
                });

            });


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
                    icon: "{{ asset('home_files/images/success.png') }}",
                    buttons: false,
                    timer: 15000
                }); //end of  swal

                $.ajax({
                    url: url,
                    method: method,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data) {

                    }, 
                    error: function(data) {
                        console.log(data);
                    },
                });//end of ajax

            });//end of click


            setInterval(function() {

                $("#cart-content").load(window.location.href + " #cart-content");
        
            }, 1000);

           $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
              var src = $(this).attr('src');
              var modal;

              function removeModal() {
                modal.remove();
                $('body').off('keyup.modal-close');
              }
              modal = $('<div>').css({
                background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                backgroundSize: 'contain',
                width: '100%',
                height: '100%',
                position: 'fixed',
                zIndex: '10000',
                top: '0',
                left: '0',
                cursor: 'zoom-out'
              }).click(function() {
                removeModal();
              }).appendTo('body');
              //handling ESC
              $('body').on('keyup.modal-close', function(e) {
                if (e.key === 'Escape') {
                  removeModal();
                }
              });
            });//end of data full screen image

        });//end of document
        
        function openSearch() {
          document.getElementById("myOverlay").style.display = "block";
        }

        function closeSearch() {
          document.getElementById("myOverlay").style.display = "none";
        }
    </script>

    <script type="text/javascript">
        // Image to Lightbox Overlay 
        $('.images').on('click', function() {
          $('#overlay')
            .css({backgroundImage: `url(${this.src})`})
            .addClass('open')
            .one('click', function() { $(this).removeClass('open'); });
        });

        var loca    = "{{ app()->getLocale() }}";
        var options = {
            
            url: function (search) {

                return "/autocomplete?search=" + search  + "&format=json";
            },

            getValue: function(search) 
            {   
                if (loca == 'ar') 
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

                    iconSrc: "image_path",

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