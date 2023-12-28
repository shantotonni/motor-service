<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ACI</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin_template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin_template/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin_template/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin_template/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_template/plugins/custom-radio/custom-radio.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{asset('admin_template/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Tostr -->
    <link rel="stylesheet" href="{{asset('admin_template/plugins/toastr/toastr.min.css')}}">
    <script src="{{asset('admin_template/plugins/toastr/toastr.min.js')}}"></script>
    <script>
          toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "200",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    {{-- <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
    <!-- flatpickr datetimepicker--> 
    <link rel="stylesheet" href="{{asset('admin_template/plugins/flatpickr/flatpickr.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @if(Session::has('success'))
  <script>toastr["success"]("{{Session::get('success')}}", "Succss");</script>
  @endif
  @if(Session::has('danger'))
  <script>toastr["error"]("{{Session::get('danger')}}", "Error");</script>
  @endif
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
       <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
       </li>
       
    </ul>

      <!-- SEARCH FORM -->
      {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form> --}}


    <!-- Right navbar links -->


    <!-- Right navbar links end -->
    
     
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{asset('admin_template/dist/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ACI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin_template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if(Auth::check())
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
          @endif
        </div>
      </div>
      <div class="row-flud">
          <a  href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <button class="btn btn-danger btn" type="button" style="width:100%">{{ __('Logout') }}</button>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}


            <li class="nav-item has-treeview">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Attendance<i class="right fas fa-angle-left"></i></p></a>
              <ul class="nav nav-treeview">
                <li class="nav-item"><a href="{{url('/portal/leave_application')}}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Leave Application</p></a></li>
                <li class="nav-item"><a href="{{url('/portal/leave_first_approval_list')}}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Leave First Approval</p></a></li>
                <li class="nav-item"><a href="{{url('/portal/leave_second_approval_list')}}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Leave Final Approval</p></a></li> 
                <li class="nav-item"><a href="{{url('/portal/iom')}}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>IOM</p></a></li>
                <li class="nav-item"><a href="{{url('/portal/iom_first_approval_list')}}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>IOM First Approval</p></a></li>
                <li class="nav-item"><a href="{{url('/portal/iom_second_approval_list')}}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>IOM Final Approval</p></a></li>
                <li class="nav-item"><a href="{{url('/portal/raw_attendance')}}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Raw Attendance(test)</p></a></li>
                <li class="nav-item"><a href="{{url('/portal/attendance_search')}}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Attendance Search</p></a></li>
              </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">  
      @yield('content')
  </div><!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Any Query: Ext: 399, Moblie:01704114542 
    </div>
    <!-- Default to the left -->
  <strong>Copyright &copy; {{date('Y')}} <a href="{{url('/')}}">ACI Limited</a>.</strong> All rights reserved.
  </footer>


     
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- Bootstrap 4 -->
<script src="{{asset('admin_template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin_template/dist/js/adminlte.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('admin_template/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin_template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('admin_template/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- flatpickr datetimepicker--> 
<script src="{{asset('admin_template/plugins/flatpickr/flatpickr.min.js')}}"></script>

<script src="{{asset('js/common.js')}}"></script>



</body>
</html>
