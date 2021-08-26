<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">{{-- <html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"> --}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('home_files/images/icon.PNG') }}" rel="icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">
{{--  --}}
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE-rtl.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/rtl.css') }}">

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    @endif
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <style>
        .navbar-nav>.notifications-menu>.dropdown-menu>li .menu>li>a, .navbar-nav>.messages-menu>.dropdown-menu>li .menu>li>a, .navbar-nav>.tasks-menu>.dropdown-menu>li .menu>li>a
        {
            color: red !important
        }
        .aa{
            color: #fff!important;
            background: #1e282c!important;
            border-left-color: #3c8dbc!important;
        }
        .mr-2{
            margin-right: 5px;
        }

        .skin-blue .main-header .navbar {
            background-color: #dd4b39;
        }
        .skin-blue .main-header .navbar .sidebar-toggle:hover,
        .skin-blue .main-header .logo:hover {
            background-color: #ee796b;
        }
        .skin-blue .main-header li.user-header {
            background-color: #dd4b39;

        }
        .skin-blue .main-header .logo {
            background-color: #f05744;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
            animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

    </style>
    {{-- jQuery 3 --}}
    <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{--morris--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/morris/morris.css') }}">

    {{-- iCheck --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/icheck/all.css') }}">

    {{-- pace --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/pace/pace.min.css') }}">

    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">

        {{--<!-- Logo -->--}}
        <a href="{{ asset('dashboard') }}" class="logo">
            {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
            <span class="logo-mini"><b>R</b>LC</span>
            <span class="logo-lg"><b>RedLine</b></span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small>
                                                    <i class="fa fa-clock-o"></i> 5 mins
                                                </small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">See All Messages</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Notifications: style can be found in dropdown.less -->


                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu text-lang">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="text-dark">
                                            <a rel="alternate" class="text-dark" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- User Account: style can be found in dropdown.less --}}
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ auth()->user()->image_path }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu" style="margin-top: 13px;">

                            {{-- !User image  --}}
                            <li class="user-header">
                                <img src="{{ auth()->user()->image_path }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                    {{-- <small>Member since 2 days</small> --}}
                                </p>
                            </li>

                             {{-- Menu Footer --}}
                            <li class="user-footer">
                                
                                @if (auth()->user()->id == 1)
                                    
                                    <a href="{{ route('dashboard.admin.edit',auth()->user()->id) }}" class="btn btn-default btn-flat">@lang('dashboard.edit_admin')</a>

                                @endif

                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">@lang('dashboard.logout')</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <a href="/" class="btn btn-default btn-flat">@lang('home.home')</a>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    @include('layouts.dashboard.include._slider')
    
    @yield('content')

    @include('partials._session')

</div><!-- end of wrapper -->

{{-- Bootstrap 3.3.7 --}}
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>

{{-- FastClick --}}
<script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>

{{-- AdminLTE App --}}
<script src="{{ asset('dashboard_files/js/adminlte.min.js') }}"></script>

{{--ckeditor standard--}}
<script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script>

{{--jquery number--}}
<script src="{{ asset('dashboard_files/js/jquery.number.min.js') }}"></script>

{{--print this--}}
<script src="{{ asset('dashboard_files/js/printThis.js') }}"></script>

{{--morris --}}
<script src="{{ asset('dashboard_files/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('dashboard_files/plugins/morris/raphael.min.js') }}"></script>

{{--custom js--}}
<script src="{{ asset('dashboard_files/js/custom/image_preview.js') }}"></script>
<script src="{{ asset('dashboard_files/js/custom/order.js') }}"></script>

{{-- pace --}}
<script src="{{ asset('dashboard_files/plugins/pace/pace.min.js') }}"></script>

<script>
    $(document).ready(function () {

        $('.sidebar-menu').tree();

        //icheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        //delete
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('dashboard.confirm_delete')",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("@lang('dashboard.yes')", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("@lang('dashboard.no')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete

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

        CKEDITOR.config.language =  "{{ app()->getLocale() }}";

    });//end of ready
    
</script>
@stack('welcome')
</body>
</html>
