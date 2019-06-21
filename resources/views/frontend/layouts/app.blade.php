<!DOCTYPE html>
 <html class="" lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="format-detection" content="telephone=no">
    <!-- GOOGLE FONT -->

    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!-- CSS LIBRARY -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('user_asset/css/lib/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('user_asset/css/lib/font-awesome.min.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('user_asset/css/awe-fonts.css')}}">
    <!-- AWE FONT -->
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('user_asset/css/style.css') }}">
    
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
</head>

<body class="@yield('class_body')">
<!-- PRELOADER -->

<div class="preloader">

    <div class="inner">

        <div class="item item1"></div>

        <div class="item item2"></div>

        <div class="item item3"></div>

    </div>

</div>

<!-- END / PRELOADER -->

<!-- PAGE WRAP -->

<div id="page-wrap">
    
    <header id="header" class="header header-1 header-sticky">

        <div class="container">

            <!-- LOGO -->

            <div class="logo" style="    padding-top: 5px;
            padding-bottom: 0px;">
                <a href="/">
                    <img style="width: 55px;
                    max-height: 100px;" src="{{asset('images/logo-white.png')}}" alt=""> 
                    <p style="color:white;    display: inline-block;
                    color: white;
                    margin-bottom: 0px;
                    float: right;
                    margin-top: 12px;
                    font-size: 24px;
                    font-family: serif;
                    margin-left: 5px;">TBTN</p>
                </a>
            </div>
            <!-- END / LOGO -->
            <!-- OPEN MENU MOBILE -->

            <div class="open-menu-mobile">

                <span>Toggle menu mobile</span>

            </div>

            <!-- END / OPEN MENU MOBILE -->

            <!-- NAVIGATION -->

            <nav class="navigation text-right" data-menu-type="1200">

                <!-- NAV -->

                <ul class="nav text-uppercase">
                    <li class="@yield('home')">
                        <a href="/">Home</a>
                    </li>
                    <li class="@yield('pengumuman')"><a href="/pengumuman">Pengumuman</a></li>
                    <li class="menu-item-has-children @yield('galery')">
                        <a href="#page-top">Galery</a>
                        <ul class="sub-menu">
                            <li class="@yield('foto')"><a href="/foto">Foto</a></li>
                            <li class="@yield('video')"><a href="/video">Video</a></li>
                        </ul>
                    </li>
                    <li class="@yield('tentang_tbtn')"><a href="/tentang_tbtn">Tentang TBTN</a></li>
                    <li class="@yield('daftar_tbtn')"><a href="/daftar">Daftar TBTN</a></li>
                    @if (Auth::guard('user')->check())
                        <li class="@yield('profile')"><a href="/profile">Profile</a></li>
                    @else   
                        <li><a href="/viewlogin">Login</a></li>
                    @endif
                </ul>
                <!-- END / NAV -->
            </nav>
            <!-- END / NAVIGATION -->
        </div>

    </header>

    <!-- END / HEADER -->

    @yield('content')

    <!-- FOOTER -->

    <footer id="footer" class="footer">

        <div class="divider divider-1 divider-color"></div>

        <div class="awe-color"></div>

        <div class="container">

            <div class="copyright text-center">

                © 2019 TBTN SMFT

            </div>

        </div>

    </footer>

    <!-- END / FOOTER -->


</div>

<!-- END / PAGE WRAP -->



<!-- LOAD JQUERY -->

<script src="{{asset('user_asset/js/jquery.min.js')}}"></script>
@if (Session::has('error_pendaftaran'))
<script>
    jQuery(document).ready(function ($) {
        $(function(){
            swal("Error", "{{Session::get('error_pendaftaran')}}", "error");
        });
    });
</script>
@endif
<!-- GOOGLE MAP -->
<script type="text/javascript" src="{{asset('user_asset/js/lib/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/lib/perfect-scrollbar.min.js')}}"></script>

@yield('script')

<script type="text/javascript" src="{{asset('user_asset/js/scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('user_asset/js/scripts_external.js')}}"></script>

@yield('script2')

</body>
</html>