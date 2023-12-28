@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserKpiDetail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserKpiDetail Create</li>
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
              <h3 class="card-title">UserKpiDetail Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_detail->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>User kpi</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_detail->user_kpi->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Kpi topic</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_detail->kpi_topic->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Target</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_detail->target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Actual</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_detail->actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Weight</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_detail->weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Score</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_detail->score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>F score</strong></div>
                   <div class="col-md-8"><p>{{$user_kpi_detail->f_score}}</p></div>
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
<script>document.title = 'UserKpiDetail | Show';</script>
@endsection
