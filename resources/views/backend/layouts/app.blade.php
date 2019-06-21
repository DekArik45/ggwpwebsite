<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>TBTN | Dashboard</title>
  <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/morris.js/morris.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link rel="stylesheet" href="{{asset('backend/mystyle.css')}}">
  

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  @include('sweet::alert')
  <header class="main-header">
    <!-- Logo -->
    <a href="/admin" class="logo">
      
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="    text-align: left;"><img style="float: left;
        margin-left: 10px;
        width: 45px;" src="{{asset('images/logo-white.png')}}" alt=""><b style="    margin-left: 5px;">TBTN</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" id="notif" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              @php
                  $count = 0;
              @endphp
              @foreach (Auth::guard('admin')->user()->unreadNotifications as $notification)
                  @php
                      $count += 1;
                  @endphp
              @endforeach
              @if ($count == 0)
              @else
                <span class="label label-warning">{{$count}}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{$count}} notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->

                <ul class="menu">
                  @foreach (Auth::guard('admin')->user()->unreadNotifications as $notification)
                    <li>
                      {{-- <a href="#"> --}}
                        {!! $notification->data !!}
                      {{-- </a> --}}
                    </li>
                  @endforeach
                  
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs" style="text-transform:capitalize;">{{Auth::guard('admin')->user()->nama}}</span>
            </a>
            <ul class="dropdown-menu">
              
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p style="text-transform: capitalize;">
                  {{Auth::guard('admin')->user()->nama}} - Admin
                  <small>Member since 2019</small>
                </p>
              </li> 
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="text-transform: capitalize;">{{Auth::guard('admin')->user()->nama}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="@yield('dashboard')">
          <a href="{{route('admin.home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="@yield('master') treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('agama')"><a href="/admin/agama"><i class="fa fa-circle-o"></i> Agama</a></li>
            <li class="@yield('prodi')"><a href="/admin/prodi"><i class="fa fa-circle-o"></i> Prodi</a></li>
            <li class="@yield('jabatan')"><a href="/admin/jabatan"><i class="fa fa-circle-o"></i> Jabatan</a></li>
            <li class="@yield('user')"><a href="/admin/user"><i class="fa fa-circle-o"></i> User Admin</a></li>
            <li class="@yield('periode_pendaftaran')"><a href="/admin/periode_pendaftaran"><i class="fa fa-circle-o"></i> Periode Pendaftaran</a></li>
            <li class="@yield('fasilitas')"><a href="/admin/fasilitas"><i class="fa fa-circle-o"></i> Fasilitas TBTN</a></li>
          </ul>
        </li>

        <li class="@yield('pengumuman')">
            <a href="/admin/pengumuman"><i class="fa fa-circle-o"></i> Pengumuman</a>
        </li>

        <li class="@yield('peserta') treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Peserta</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('data_peserta')"><a href="/admin/peserta"><i class="fa fa-circle-o"></i> Peserta</a></li>
            <li class="@yield('transaksi_peserta')"><a href="/admin/transaksi_peserta"><i class="fa fa-circle-o"></i> Transaksi Peserta</a></li>
          </ul>
        </li>

        <li class="@yield('galery') treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Galery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('foto')"><a href="/admin/foto"><i class="fa fa-circle-o"></i> Photo</a></li>
            <li class="@yield('video')"><a href="/admin/video"><i class="fa fa-circle-o"></i> Video</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    @yield('content')

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 SMFT TBTN
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('backend/bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.8.7/dist/sweetalert2.all.min.js"></script> --}}

<script>

function formatRupiah(angka, prefix){
    var number_string = angka.toString().replace(/[^,\d]/g, ''),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

  $(document).on('click', "#notif", function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          type: 'GET',
          url: '/admin/clear-notif',
          success: function(data){
              console.log("Success "+data);
          },
          error: function (data, textStatus, errorThrown) {
              console.log(data);
          },
      });

    });
</script>

@yield('script')
</body>
</html>
