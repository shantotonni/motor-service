@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserKpiCode</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserKpiCode Create</li>
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
              <h3 class="card-title">UserKpiCode Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>User</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->user->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income code</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->service_income_code}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Tractor spare parts code</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->tractor_spare_parts_code}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Tractor sonalika lub code</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->tractor_sonalika_lub_code}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Tractor power oil code</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->tractor_power_oil_code}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Nm spare parts code</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->nm_spare_parts_code}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Nm power oil code</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->nm_power_oil_code}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Pt spare parts code</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->pt_spare_parts_code}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Pt power oil code</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_code->pt_power_oil_code}}</p></div>
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
<script>document.title = 'UserKpiCode | Show';</script>
@endsection
