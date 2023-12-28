@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">BaseLine</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">BaseLine Create</li>
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
              <h3 class="card-title">BaseLine Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$base_line->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Kpi type</strong></div>
                   <div class="col-md-8"><p>{{$base_line->kpi_type->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income base line</strong></div>
                   <div class="col-md-8"><p>{{$base_line->service_income_base_line}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor base line</strong></div>
                   <div class="col-md-8"><p>{{$base_line->sp_tractor_base_line}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt base line</strong></div>
                   <div class="col-md-8"><p>{{$base_line->sp_nmpt_base_line}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt base line</strong></div>
                   <div class="col-md-8"><p>{{$base_line->sp_tractor_plus_nmpt_base_line}}</p></div>
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
<script>document.title = 'BaseLine | Show';</script>
@endsection
