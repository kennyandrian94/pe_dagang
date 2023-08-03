<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">
        <title>{{ config('app.name') }} | Login</title>
        <link rel="apple-touch-icon" href="{{ asset('images/logo-penta.png') }}">
        <link rel="shortcut icon" href="{{ asset('images/logo-penta.png') }}">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('global/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/css/bootstrap-extend.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/assets/css/site.min.css') }}">
        <!-- Plugins -->
        <link rel="stylesheet" href="{{ asset('global/vendor/animsition/animsition.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/asscrollable/asScrollable.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/switchery/switchery.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/intro-js/introjs.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/slidepanel/slidePanel.css') }}">
        <link rel="stylesheet" href="{{ asset('global/vendor/flag-icon-css/flag-icon.css') }}">
        <link rel="stylesheet" href="{{ asset('global/assets/examples/css/pages/login-v3.css') }}">
        <style type="text/css">
            .page {
                background-color: #000 !important;
                /*background: url('{{ asset('images/bg.jpg') }}');*/
                /*background-repeat: no-repeat;*/
                /*background-size: cover;*/
            }
            .brand .brand-img {
                max-width: 50%;
                /*filter: drop-shadow(1px 1px 1px #000);*/
            }
            .btn-login {
                color: #FFF;
                border-color: #000;
                background-color: #000;
                font-weight: 500;
                letter-spacing: 1px;
            }
            .page-copyright {
                color: #FFF;
                font-weight: 500;
                letter-spacing: 1px;
            }
            .form-material .form-control.focus~.floating-label, .form-material .form-control:focus~.floating-label {
                color: #000;
            }
            .form-material .form-control, .form-material .form-control.focus, .form-material .form-control:focus {
                background-image: linear-gradient(#000,#000),linear-gradient(#e4eaec,#e4eaec);
            }
         </style>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('global/fonts/web-icons/web-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('global/fonts/brand-icons/brand-icons.min.css') }}">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <!--[if lt IE 9]>
        <script src="{{ asset('global/vendor/html5shiv/html5shiv.min.js') }}"></script>
        <![endif]-->
        <!--[if lt IE 10]>
        <script src="{{ asset('global/vendor/media-match/media.match.min.js') }}"></script>
        <script src="{{ asset('global/vendor/respond/respond.min.js') }}"></script>
        <![endif]-->
        <!-- Scripts -->
        <script src="{{ asset('global/vendor/breakpoints/breakpoints.js') }}"></script>
        <script>
            Breakpoints();
        </script>
    </head>
    <body class="animsition page-login-v3 layout-full">
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Page -->
        <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
                <div class="panel">
                    <div class="panel-body">
                        <div class="brand">
                            <img class="brand-img" src="{{ asset('images/logo-penta.png') }}" alt="...">
                            {{-- <h2 class="brand-text font-size-18">{{ config('app.name') }}</h2> --}}
                        </div>
                        <form method="POST" action="{{ route('admin.login') }}"> @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                @foreach ($errors->all() as $error)
                                <div class="alert-text">{{ $error }}</div>
                                <div class="alert-close">
                                    <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                <input type="email" class="form-control" name="email" />
                                <label class="floating-label">Email</label>
                            </div>
                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                <input type="password" class="form-control" name="password" />
                                <label class="floating-label">Password</label>
                            </div>
                            <button type="submit" class="btn btn-login btn-block btn-lg m-t-40">Sign in</button>
                        </form>
                    </div>
                </div>
                <footer class="page-copyright page-copyright-inverse">
                    <p>WEBSITE BY PENTACODE DIGITAL</p>
                    <p>© 2021. All RIGHT RESERVED.</p>
                </footer>
            </div>
        </div>
        <!-- End Page -->
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
        <script src="{{ asset('global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
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
        <script src="{{ asset('global/js/Plugin/jquery-placeholder.js') }}"></script>
        <script src="{{ asset('global/js/Plugin/material.js') }}"></script>
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