@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserKpi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserKpi Create</li>
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
              <h3 class="card-title">UserKpi Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Date</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi->date}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>User</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi->user->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Kpi type</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi->kpi_type->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Total kpi target</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi->total_kpi_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Total kpi ach</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi->total_kpi_ach}}</p></div>
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
<script>document.title = 'UserKpi | Show';</script>
@endsection
