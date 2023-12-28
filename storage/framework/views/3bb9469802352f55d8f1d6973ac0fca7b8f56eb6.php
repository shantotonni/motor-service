<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(asset('img/loading.gif')); ?>" rel="icon" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/datatables-bs4/css/dataTables.bootstrap4.css')); ?>"> -->
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/custom-radio/custom-radio.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin_template\plugins\chart.js\Chart.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/jqvmap/jqvmap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/dist/css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/summernote/summernote-bs4.min.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <!-- jQuery 3.4-->
    <script src="<?php echo e(asset('admin_template/plugins/jquery/jquery.min.js')); ?>"></script>

    <!-- Tostr -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/toastr/toastr.min.css')); ?>">
    <script src="<?php echo e(asset('admin_template/plugins/toastr/toastr.min.js')); ?>"></script>
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

    <!-- flatpickr datetimepicker-->
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/plugins/flatpickr/flatpickr.min.css')); ?>">
    <script src="<?php echo e(asset('js/chain-select.js')); ?>"></script>

     <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('admin_template/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_template/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('admin_template/dist/js/adminlte.min.js')); ?>"></script>
    <!-- DataTables -->
    <!-- <script src="<?php echo e(asset('admin_template/plugins/datatables/jquery.dataTables.js')); ?>"></script> -->
    <!-- <script src="<?php echo e(asset('admin_template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script> -->
    <!-- Select2 -->
    <script src="<?php echo e(asset('admin_template/plugins/select2/js/select2.full.min.js')); ?>"></script>
    <!-- flatpickr datetimepicker-->
    <script src="<?php echo e(asset('admin_template/plugins/flatpickr/flatpickr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_template\plugins\chart.js\Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lightbox2.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lightbox2.min.css')); ?>">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.0/js/buttons.print.min.js"></script>
    <!--datatable end -->

    <link rel="stylesheet" href="<?php echo e(asset('admin_template/dist/js/adminlte.js')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin_template/dist/js/demo.js')); ?>">
    <script src="<?php echo e(asset('admin_template/dist/js/pages/dashboard.js')); ?>"></script>

    <style>
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
          position: fixed;
          left: 0px;
          top: 0px;
          width: 100%;
          height: 100%;
          z-index: 9999;
          background: url("<?php echo e(asset('img/loading.gif')); ?>") center no-repeat #fff;
        }
        /* .note-editable { background-color: black !important; color: white !important; } */

        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
            border: 0px solid #c5c5c5;
            background: cornflowerblue;
            font-weight: normal;
            color: white;
        }
        .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
            border: 0px solid #003eff;
            background: burlywood;
            font-weight: normal;
            color: #ffffff;
        }
        .ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
            border: 0px solid #dad55e;
            background: mediumvioletred;
            color: white;
        }
        .ui-datepicker table {
            width: 100%;
            font-size: .9em;
            border-collapse: collapse;
            margin: 0 0 .4em;
            background-color: aliceblue;
            color: dodgerblue;
        }
        .ui-datepicker .ui-datepicker-header {
            position: relative;
            padding: .2em 0;
            background-color: aliceblue;
        }
        .ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year {
            width: 45%;
            background-color: aliceblue;
        }
        .sidebatr ul li{
            font-size: 12px;
        }
       </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="se-pre-con"></div>
<div class="wrapper">
  <?php if(Session::has('success')): ?>
  <script>toastr["success"]("<?php echo e(Session::get('success')); ?>", "Succss");</script>
  <?php endif; ?>
  <?php if(Session::has('danger')): ?>
  <script>toastr["error"]("<?php echo e(Session::get('danger')); ?>", "Error");</script>
  <?php endif; ?>
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
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #214365!important;">
    <a href="<?php echo e(url('/home')); ?>" class="brand-link">
      <img src="<?php echo e(asset('logo.png')); ?>" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ACI</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="<?php echo e(url('/profile')); ?>"><img src="<?php echo e(asset('admin_template/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image"></a>
        </div>
        <div class="info">
          <?php if(Auth::check()): ?>
                <a href="<?php echo e(url('/profile')); ?>" class="d-block"><?php echo e(Auth::user()->name); ?></a>
          <?php endif; ?>
        </div>
      </div>
      <div class="row-flud">
          <a  href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <button class="btn btn-danger btn" type="button" style="width:100%">Log Out</button>
          </a>
          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
          </form>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 sidebatr">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="<?php echo e(url('/home')); ?>" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    Dashboard </a>
            </li>
            <?php
                //$userMenus = \App\Http\Controllers\AdminController::getUserMenu();
            ?>























           <?php if(Auth::check()): ?>
              <?php if(Auth::user()->role_id == 1): ?>
                <li class="nav-item">
                  <a href="#" class="nav-link"><i class="fas fa-bullseye nav-icon"></i><p>Setting<i class="right fas fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item"><a href="<?php echo e(url('/admin')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Admin</p></a></li>
                    <?php if(Auth::user()->id == 1): ?>
                    <li class="nav-item"><a href="<?php echo e(url('/group')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Group</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/company')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Company</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/district')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>District</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/upazila')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Upazila</p></a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a href="<?php echo e(url('/area')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Area</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/territory')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Territory</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/user_area')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Engineer Area</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/user_territory')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Technician Territory</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/designation')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Designation</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/service-income-category')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Service Inc Category</p></a></li>
                    </ul>
                </li>
             <?php endif; ?>
            <?php if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2): ?>
            <li class="nav-item"><a href="<?php echo e(url('/target')); ?>?date=<?php echo e(date('d-m-Y')); ?><?php if(Auth::user()->role_id == 2): ?><?php if(Auth::user()->user_area): ?>&area_id=<?php echo e(Auth::user()->user_area->area_id); ?><?php endif; ?> <?php endif; ?>" class="nav-link"><i class="fas fa-award nav-icon"></i><p>Target</p></a></li>


              <li class="nav-item">
                  <a href="#" class="nav-link"><i class="fas fa-user-md nav-icon"></i><p>Job Card<i class="right fas fa-angle-left"></i></p></a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item"><a href="<?php echo e(url('/pending_job_card')); ?>" class="nav-link <?php echo e(request()->routeIs('pending_job_card') ? 'active' : ''); ?>"><i class="fas fa-user-md nav-icon"></i><p>Pending Job Card</p></a></li>
                      <li class="nav-item"><a href="<?php echo e(url('/approve_job_card')); ?>" class="nav-link <?php echo e(request()->routeIs('approve_job_card') ? 'active' : ''); ?>"><i class="fas fa-user-md nav-icon"></i><p>Approve Job Card</p></a></li>
                  </ul>
              </li>

            <li class="nav-item"><a href="<?php echo e(url('/engineer_team')); ?>" class="nav-link"><i class="fas fa-users-cog nav-icon"></i><p>Engineer Team</p></a></li>
            <li class="nav-item"><a href="<?php echo e(url('/operator-list')); ?>" class="nav-link"><i class="fas fa-users-cog nav-icon"></i><p>Operator List</p></a></li>
            <?php endif; ?>
            <?php if(Auth::user()->role_id == 1): ?>
            <li class="nav-item"><a href="<?php echo e(url('/admin_dashboard')); ?>" class="nav-link"><i class="fas fa-home nav-icon"></i><p>Admin Dashboard</p></a></li>
            <?php endif; ?>

              <?php if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2): ?>
                <li class="nav-item">
                  <a href="#" class="nav-link"><i class="fas fa-file-alt nav-icon"></i><p>Report<i class="right fas fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                     <li class="nav-item"><a href="<?php echo e(url('/report')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Report</p></a></li>
                    </ul>
                </li>
              <?php endif; ?>

              <?php if(Auth::user()->role_id == 1 || Auth::user()->role_id == 4 || Auth::user()->role_id == 5 || Auth::user()->role_id == 6): ?>
                  <li class="nav-item">
                      <a href="#" class="nav-link"><i class="fas fa-file-alt nav-icon"></i><p>Sales Inquiry<i class="right fas fa-angle-left"></i></p></a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item"><a href="<?php echo e(url('/sales-inquiry')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Sales Inquiry</p></a></li>
                          <li class="nav-item"><a href="<?php echo e(url('/ssr-expense')); ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>SSR Expense</p></a></li>
                          <li class="nav-item"><a href="<?php echo e(url('/ssr-salary-list')); ?>" class="nav-link"><i class="fas fa-users-cog nav-icon"></i><p>SSR Salary</p></a></li>
                          <li class="nav-item"><a href="<?php echo e(url('/ssr-salary-module')); ?>" class="nav-link"><i class="fas fa-users-cog nav-icon"></i><p>SSR Salary Module</p></a></li>
                          <li class="nav-item"><a href="<?php echo e(route('recovery')); ?>" class="nav-link"><i class="fas fa-taxi nav-icon"></i><p>Recovery</p></a></li>
                      </ul>
                  </li>
              <?php endif; ?>

            <?php if(Auth::user()->role_id == 1): ?>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>KPI<i class="right fas fa-angle-left"></i></p></a>
                <ul class="nav nav-treeview">
                  <li class="nav-item"><a href="<?php echo e(url('/kpi-master')); ?>" class="nav-link <?php echo e(request()->routeIs('kpi_master*') ? 'active font-weight-bolder' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>KPI Master</p></a></li>
                  <li class="nav-item"><a href="<?php echo e(url('/month-wise-kpi-report')); ?>" class="nav-link <?php echo e(request()->routeIs('month-wise-kpi-report*') ? 'active font-weight-bolder' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>Month Wise KPI Report</p></a></li>
                  <li class="nav-item"><a href="<?php echo e(url('/kpi-summary-view')); ?>" class="nav-link <?php echo e(request()->routeIs('kpi_summary') ? 'active font-weight-bolder' : ''); ?>"><i class="far fa-circle nav-icon"></i><p>KPI Summary Report</p></a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php endif; ?>

            <?php if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2): ?>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-tractor"></i><p>Periodic Service<i class="right fas fa-angle-left"></i></p></a>
                <ul class="nav nav-treeview">
                    <li class="nav-item"><a href="<?php echo e(route('periodic-service.dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('periodic-service.dashboard') ? 'active font-weight-bolder' : ''); ?>"><i class="fas far fa-circle nav-icon"></i><p>Dashboard</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(route('periodic-service.list')); ?>" class="nav-link <?php echo e(request()->routeIs('periodic-service.list') ? 'active font-weight-bolder' : ''); ?>"><i class="fas far fa-circle nav-icon"></i><p>Customer List</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(route('show.next.service.info.page')); ?>" class="nav-link <?php echo e(request()->routeIs('show.next.service.info.page') ? 'active font-weight-bolder' : ''); ?>"><i class="fas far fa-circle nav-icon"></i><p>Estimated Service Info</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(route('show.periodic.service.page')); ?>" class="nav-link <?php echo e(request()->routeIs('show.periodic.service.page') ? 'active font-weight-bolder' : ''); ?>"><i class="fas far fa-circle nav-icon"></i><p>Periodic Service History</p></a></li>
                    <li class="nav-item"><a href="<?php echo e(route('show.periodic.report')); ?>" class="nav-link <?php echo e(request()->routeIs('show.periodic.report') ? 'active font-weight-bolder' : ''); ?>"><i class="fas far fa-circle nav-icon"></i><p>Report</p></a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2): ?>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-truck-monster nav-icon"></i><p>Tractor Service<i class="right fas fa-angle-left nav-icon"></i></p></a>
                <ul class="nav nav-treeview">
                    <?php if(Auth::user()->id == 1 || Auth::user()->role_id == 2): ?>
                        <li class="nav-item"><a href="<?php echo e(route('customers.index')); ?>" class="nav-link <?php echo e(request()->routeIs('customers*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-tractor nav-icon"></i><p>Customers</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('import.chassis')); ?>" class="nav-link <?php echo e(request()->routeIs('import.chassis') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-tractor nav-icon"></i><p>Import Customer</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('showrooms.index')); ?>" class="nav-link <?php echo e(request()->routeIs('showrooms.index') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-store nav-icon"></i><p>Showroom Centre</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('sales-product-category.index')); ?>" class="nav-link <?php echo e(request()->routeIs('sales-product-category.index') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-store nav-icon"></i><p>Sales Product Category</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('sales-products.index')); ?>" class="nav-link <?php echo e(request()->routeIs('sales-products.index') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-store nav-icon"></i><p>Sales Products</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('sales-manager-info.index')); ?>" class="nav-link <?php echo e(request()->routeIs('sales-manager-info.index') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-store nav-icon"></i><p>Sales Manager Info</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('service-manager.index')); ?>" class="nav-link <?php echo e(request()->routeIs('service-manager.index') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-store nav-icon"></i><p>Service Manager</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('service_type.index')); ?>" class="nav-link <?php echo e(request()->routeIs('service_type*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-text-height nav-icon"></i><p>Service Type</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('servicing_type.index')); ?>" class="nav-link <?php echo e(request()->routeIs('servicing_type*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-text-height nav-icon"></i><p>Servicing Type</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('sections.index')); ?>" class="nav-link <?php echo e(request()->routeIs('sections*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-directions nav-icon"></i><p>Sections</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('topics.index')); ?>" class="nav-link <?php echo e(request()->routeIs('topics*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-drum-steelpan nav-icon"></i><p>Topics</p></a></li>

                        <li class="nav-item"><a href="<?php echo e(route('product.index')); ?>" class="nav-link <?php echo e(request()->routeIs('product*') ? 'active font-weight-bolder' : ''); ?>"><i class="fab fa-product-hunt nav-icon"></i><p>Product</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('product_model.index')); ?>" class="nav-link <?php echo e(request()->routeIs('product_model*') ? 'active font-weight-bolder' : ''); ?>"><i class="fab fa-product-hunt nav-icon"></i><p>Product Model</p></a></li>

                        <li class="nav-item"><a href="<?php echo e(route('tractor_part.index')); ?>" class="nav-link <?php echo e(request()->routeIs('tractor_part*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-drum-steelpan nav-icon"></i><p>Tractor Parts</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('tractor-service-details.index')); ?>" class="nav-link <?php echo e(request()->routeIs('tractor-service-details*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-taxi nav-icon"></i><p>Tractor Details</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('service-center.index')); ?>" class="nav-link <?php echo e(request()->routeIs('service-center*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-concierge-bell nav-icon"></i><p>Service Center</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('tips.index')); ?>" class="nav-link <?php echo e(request()->routeIs('tips*') ? 'active font-weight-bolder' : ''); ?>"><i class="fab fa-accusoft nav-icon"></i><p>Service Tips</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('service_request.index')); ?>" class="nav-link <?php echo e(request()->routeIs('service_request*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-taxi nav-icon"></i><p>Service Request</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('happy-customer.index')); ?>" class="nav-link <?php echo e(request()->routeIs('happy-customer*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-taxi nav-icon"></i><p>Happy Customer Feedback</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('dealer-point.index')); ?>" class="nav-link <?php echo e(request()->routeIs('dealer-point*') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-taxi nav-icon"></i><p>Dealer Point</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('order_list')); ?>" class="nav-link <?php echo e(request()->routeIs('order_list') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-taxi nav-icon"></i><p>Order List</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('visit.result')); ?>" class="nav-link <?php echo e(request()->routeIs('visit.result') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-taxi nav-icon"></i><p>Visit Result</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('demonstration.list')); ?>" class="nav-link <?php echo e(request()->routeIs('demonstration.list') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-taxi nav-icon"></i><p>Demonstration</p></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('create.notification')); ?>" class="nav-link <?php echo e(request()->routeIs('create.notification') ? 'active font-weight-bolder' : ''); ?>"><i class="fas fa-taxi nav-icon"></i><p>Push Notification</p></a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
               <li class="nav-item"><a href="http://apps.eacibd.com/application/32" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Apk Link</p></a></li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php echo $__env->yieldContent('content'); ?>
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
  <strong>Copyright &copy; <?php echo e(date('Y')); ?> <a href="<?php echo e(url('/')); ?>">ACI Limited</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="<?php echo e(asset('js/common.js')); ?>"></script>
<script>
    $(window).on("load", function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
            // $(".se-pre-con").show();
      });
</script>

<?php echo $__env->yieldContent('script'); ?>


<script>

function exportF(elem,table_id,report_name) {
  var table = document.getElementById(table_id);
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel;charset=utf-8,' + escape(html); // Set your html table into url
  elem.setAttribute("href", url);
  elem.setAttribute("download", report_name+".xls"); // Choose the file name
  return false;
}


$(document).ready(function() {
    $('#table_export').DataTable( {
        dom: 'Bfrtip',
        paging:true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
           // 'pdfHtml5'
        ]
    } );
} );
</script>

<script>
    $('.select2').select2()
</script>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\motor-service\resources\views/layouts/master.blade.php ENDPATH**/ ?>