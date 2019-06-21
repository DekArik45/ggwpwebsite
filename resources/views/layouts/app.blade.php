<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap material admin template">
  <meta name="author" content="">

  <title>TBTN 2019</title>

  <link rel="shortcut icon" href="{{asset('images/logo.png')}}">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('login/global/css/bootstrap.minfd53.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{asset('login/global/css/bootstrap-extend.minfd53.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{asset('login/assets/css/site.minfd53.css?v4.0.1')}}">

  <!-- Plugins -->
  <link rel="stylesheet" href="{{asset('login/global/vendor/animsition/animsition.minfd53.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{asset('login/global/vendor/asscrollable/asScrollable.minfd53.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{asset('login/global/vendor/switchery/switchery.minfd53.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{asset('login/global/vendor/intro-js/introjs.minfd53.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{asset('login/global/vendor/slidepanel/slidePanel.minfd53.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{asset('login/global/vendor/flag-icon-css/flag-icon.minfd53.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{asset('login/global/vendor/waves/waves.minfd53.css?v4.0.1')}}">

  <!-- Page -->
  <link rel="stylesheet" href="{{asset('login/assets/examples/css/pages/login-v2.minfd53.css?v4.0.1')}}">

  <!-- Fonts -->
  <link rel="stylesheet" href="{{asset('login/global/fonts/material-design/material-design.minfd53.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{asset('login/global/fonts/brand-icons/brand-icons.minfd53.css?v4.0.1')}}">
  <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700">

  <!-- Scripts -->
  <script src="{{asset('login/global/vendor/jquery/jquery.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/vendor/breakpoints/breakpoints.minfd53.js?v4.0.1')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="animsition page-login-v2 layout-full page-dark">


  <!-- Page -->
  <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
        @if (Session::has('verifysuccess'))
          <script>
              jQuery(document).ready(function ($) {
                  $(function(){
                      swal("Success", "{{Session::get('verifysuccess')}}", "success");
                  });
              });
          </script>
        @endif
            @if (Session::has('registersuccess'))
                <script>
                    jQuery(document).ready(function ($) {
                        $(function(){
            swal("Success", "{{Session::get('registersuccess')}}", "success");
                        });
                    });
                </script>
        @endif
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        @if (Session::has('success'))
          <script>
            swal("Success", "{{Session::get('success')}}", "success");
          </script>
        @endif
      <div class="page-brand-info" style="margin-top:160px;">
        <div class="brand">
          <img class="brand-img" style="width:130px;" src="{{asset('images/logo-white.png')}}" alt="...">
          <h2 class="brand-text font-size-32" style="font-size:35px;margin:32px 0 0px 5px;">Teknik Back To Nature</h2>
        </div>
        <p class="font-size-20">Kegiatan yang bertujuan untuk melakukan relaksasi setelah menjalani kehidupan kampus yang berat dengan kembali ke alam, serta untuk melakukan pengabdian ke masyarakat dan menjaga alam bali yang kita cintai</p>
      </div>

	  @yield('content')

    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="{{asset('login/global/vendor/babel-external-helpers/babel-external-helpersfd53.js?v4.0.1')}}"></script>
  
  <script src="{{asset('login/global/vendor/popper-js/umd/popper.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/vendor/bootstrap/bootstrap.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/vendor/animsition/animsition.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/vendor/mousewheel/jquery.mousewheel.minfd53.js?v4.0.1')}}"></script>
  
  <!-- Plugins -->
  <script src="{{asset('login/global/vendor/intro-js/intro.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/vendor/screenfull/screenfull.minfd53.js?v4.0.1')}}"></script>
  
  <!-- Plugins For This Page -->
  <script src="{{asset('login/global/vendor/jquery-placeholder/jquery.placeholder.minfd53.js?v4.0.1')}}"></script>

  <!-- Scripts -->
  <script src="{{asset('login/global/js/Component.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/js/Plugin.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/js/Base.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/js/Config.minfd53.js?v4.0.1')}}"></script>

  <!-- Page -->

  <script src="{{asset('login/assets/js/Site.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/js/Plugin/jquery-placeholder.minfd53.js?v4.0.1')}}"></script>
  <script src="{{asset('login/global/js/Plugin/material.minfd53.js?v4.0.1')}}"></script>


  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>
</body>
</html>