@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tractor Part</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Tractor Part Create</li>
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
              <h3 class="card-title">Tractor Part Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$tractor_part->id}}</p></div>
                </div>
                
                <!-- <div class="col-md-6">
                   <div class="col-md-4"><strong>Code</strong></div>
                   <div class="col-md-8"><p>{{$tractor_part->code}}</p></div>
                </div> -->

                <div class="col-md-6">
                    <div class="col-md-4"><strong>Name</strong></div>
                    <div class="col-md-8"><p>{{$tractor_part->custom_name}}</p></div>
                </div>
                
                <div class="col-md-6">
                    <div class="col-md-4"><strong>Model Name</strong></div>
                    <div class="col-md-8"><p>{{$tractor_part->productModel['model_name_bn']}}</p></div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-4"><strong>Image</strong></div>
                    <div class="col-md-8"><p><img height="50px" width="50px" src="{{asset('/part_image')}}/{{$tractor_part->image}}"></p></div>
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
<script>document.title = 'Tractor Part | Show';</script>
@endsection
