<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">
        <title>{{ config('app.name') }} - @section('title') @show </title>
        <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('global/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/css/bootstrap-extend.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/assets/css/site.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/toastr/toastr.min.css') }}">
        <!-- Plugins -->
        <link rel="stylesheet" href="{{ asset('global/vendor/animsition/animsition.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/asscrollable/asScrollable.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/switchery/switchery.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/intro-js/introjs.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/slidepanel/slidePanel.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/flag-icon-css/flag-icon.css') }}">
        <style type="text/css">
            .site-navbar {
                background-color: #FFF;
            }
            .navbar-brand-logo {
                /*filter: drop-shadow(1px 1px .1px #000);*/
            }
            .navbar-brand-text {
                color: #000;
            }
            .pentacode {
                font-weight: bold;
                color: #000;
            }
            .pentacode:hover {
                color: #e32326;
                text-decoration: none;
            }
        </style>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('global/fonts/font-awesome/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/fonts/web-icons/web-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/fonts/brand-icons/brand-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/fonts/material-design/material-design.min.css') }}">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <!--[if lt IE 9]>
        <script src="{{ asset('global/vendor/html5shiv/html5shiv.min.js') }}"></script>
        <![endif]-->
        <!--[if lt IE 10]>
        <script src="{{ asset('global/vendor/media-match/media.match.min.js') }}"></script>
        <script src="{{ asset('global/vendor/respond/respond.min.js') }}"></script>
        <![endif]-->
        @section('style') @show
        <!-- Scripts -->
        <script src="{{ asset('global/vendor/breakpoints/breakpoints.js') }}"></script>
        <script>
            Breakpoints();
        </script>
    </head>
    <body class="animsition">
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        @include('back.layouts.header')
        @include('back.layouts.sidebar')
        <!-- Page -->
        @yield('body')
        <!-- End Page -->
        @include('back.layouts.footer')
        <!-- Core  -->
        <script src="{{ asset('global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
        <script src="{{ asset('global/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('global/vendor/popper-js/umd/popper.min.js') }}"></script>
        <script src="{{ asset('global/vendor/bootstrap/bootstrap.js') }}"></script>
        <script src="{{ asset('global/vendor/animsition/animsition.js') }}"></script>
        <script src="{{ asset('global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
        <script src="{{ asset('global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
        <script src="{{ asset('global/vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
        <!-- Plugins -->
        <script src="{{ asset('global/vendor/switchery/switchery.js') }}"></script>
        <script src="{{ asset('global/vendor/intro-js/intro.js') }}"></script>
        <script src="{{ asset('global/vendor/screenfull/screenfull.js') }}"></script>
        <script src="{{ asset('global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
        <!-- Scripts -->
        <script src="{{ asset('global/js/Component.js') }}"></script>
        <script src="{{ asset('global/js/Plugin.js') }}"></script>
        <script src="{{ asset('global/js/Base.js') }}"></script>
        <script src="{{ asset('global/js/Config.js') }}"></script>
        <script src="{{ asset('global/assets/js/Section/Menubar.js') }}"></script>
        <script src="{{ asset('global/assets/js/Section/GridMenu.js') }}"></script>
        <script src="{{ asset('global/assets/js/Section/Sidebar.js') }}"></script>
        <script src="{{ asset('global/assets/js/Section/PageAside.js') }}"></script>
        <script src="{{ asset('global/assets/js/Plugin/menu.js') }}"></script>
        <script src="{{ asset('global/js/config/colors.js') }}"></script>
        <script src="{{ asset('global/assets/js/config/tour.js') }}"></script>
        <script>Config.set('assets', '../../assets');</script>
        <!-- Page -->
        <script src="{{ asset('global/assets/js/Site.js') }}"></script>
        <script src="{{ asset('global/js/Plugin/asscrollable.js') }}"></script>
        <script src="{{ asset('global/js/Plugin/slidepanel.js') }}"></script>
        <script src="{{ asset('global/js/Plugin/switchery.js') }}"></script>
        <script src="{{ asset('global/vendor/toastr/toastr.min.js') }}"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>
        @section('script') @show 
        <script>
            (function(document, window, $){
              'use strict';
            
              var Site = window.Site;
              $(document).ready(function(){
                Site.run();
              });
            })(document, window, jQuery);
        </script>
    </body>
</html>