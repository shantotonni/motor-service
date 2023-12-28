@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">TechnicianKpiAdjust</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">TechnicianKpiAdjust Create</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">TechnicianKpiAdjust Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$technician_kpi_adjust->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Date</strong></div>
                   <div class="col-md-8"><p>{{$technician_kpi_adjust->date}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>User</strong></div>
                   <div class="col-md-8"><p>{{$technician_kpi_adjust->user->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio ws actual</strong></div>
                   <div class="col-md-8"><p>{{$technician_kpi_adjust->service_ratio_ws_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio pws actual</strong></div>
                   <div class="col-md-8"><p>{{$technician_kpi_adjust->service_ratio_pws_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index six actual</strong></div>
                   <div class="col-md-8"><p>{{$technician_kpi_adjust->satisfaction_index_six_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index six target</strong></div>
                   <div class="col-md-8"><p>{{$technician_kpi_adjust->satisfaction_index_six_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index csi actual</strong></div>
                   <div class="col-md-8"><p>{{$technician_kpi_adjust->satisfaction_index_csi_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index csi target</strong></div>
                   <div class="col-md-8"><p>{{$technician_kpi_adjust->satisfaction_index_csi_target}}</p></div>
                </div>
                

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
<script>document.title = 'TechnicianKpiAdjust | Show';</script>
@endsection
