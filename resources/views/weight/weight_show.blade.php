@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Weight</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Weight Create</li>
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
              <h3 class="card-title">Weight Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$weight->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Kpi type</strong></div>
                   <div class="col-md-8"><p>{{$weight->kpi_type->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio ws weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->service_ratio_ws_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio pws weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->service_ratio_pws_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index six weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->satisfaction_index_six_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index csi weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->satisfaction_index_csi_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->service_income_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Report submission weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->report_submission_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>App monitor weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->app_monitor_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Team co weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->team_co_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->sp_tractor_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->sp_nmpt_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt weight</strong></div>
                   <div class="col-md-8"><p>{{$weight->sp_tractor_plus_nmpt_weight}}</p></div>
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
<script>document.title = 'Weight | Show';</script>
@endsection
