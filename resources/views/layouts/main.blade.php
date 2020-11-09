<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="{{ asset('template/dist/css/ionicons.min.css') }}"> --}}
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown mr-2">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->email }} <i class="fas fa-user mr-2 ml-2"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('template/index3.html') }}" class="brand-link elevation-4">
      <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Monitoring</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link{{ request()->is('home') ? ' active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('server') }}" class="nav-link{{ request()->is('server') ? ' active' : '' }}">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Server
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('cekstatus') }}" class="nav-link{{ request()->is('cekstatus') ? ' active' : '' }}">
              <i class="nav-icon fas fa-microchip"></i>
              <p>
                Cek Status
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('processor') }}" class="nav-link{{ request()->is('processor') ? ' active' : '' }}">
              <i class="nav-icon fas fa-microchip"></i>
              <p>
                Processor 
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{ url('memory') }}" class="nav-link{{ request()->is('memory') ? ' active' : '' }}">
              <i class="nav-icon fas fa-memory"></i>
              <p>
                Memory 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('storage') }}" class="nav-link{{ request()->is('storage') ? ' active' : '' }}">
              <i class="nav-icon fas fa-hdd"></i>
              <p>
                Storage 
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ url('system') }}" class="nav-link{{ request()->is('system') ? ' active' : '' }}">
              <i class="nav-icon fas fa-database"></i>
              <p>
                System 
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('cek') }}" class="nav-link{{ request()->is('cek') ? ' active' : '' }}">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Monitoring 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('monitoring') }}" class="nav-link{{ request()->is('monitoring') ? ' active' : '' }}">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Monitor
              </p>
            </a>
          </li> --}}
      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    @yield('breadcumbs')

    @yield('content')

    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      {{-- <b>Version</b> 3.0.5 --}}
    </div>
    <strong>Copyright &copy; <?= DATE('Y'); ?> <a href="#"></a>Sistem Manajemen Balancing Server
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- jQuery Knob -->
<script src="{{ asset('template/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('template/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/dist/js/demo.js') }}"></script>
<script src="{{ asset('template/dist/js/knob.js') }}"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



</body>
</html>
