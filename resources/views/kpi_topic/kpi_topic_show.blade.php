@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">KpiTopic</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">KpiTopic Create</li>
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
              <h3 class="card-title">KpiTopic Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Name</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Kpi type</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->kpi_type->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Kpi group</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->kpi_group->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sl</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->sl}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Mark</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->mark}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Ach from</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->ach_from}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Ach to</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->ach_to}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Weight</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Multiplication factor</strong></div>
                   <div class="col-md-8"><p>{{$kpi_topic->multiplication_factor}}</p></div>
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
<script>document.title = 'KpiTopic | Show';</script>
@endsection
