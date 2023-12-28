@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tips</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Tips Create</li>
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
              <h3 class="card-title">Tips Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$tip->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Title</strong></div>
                   <div class="col-md-8"><p>{{$tip->title}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Type</strong></div>
                   <div class="col-md-8"><p>{{$tip->type}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Description</strong></div>
                   <div class="col-md-8"><p>{{$tip->description}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Image</strong></div>
                   <div class="col-md-8"><p>{{$tip->image}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Video link</strong></div>
                   <div class="col-md-8"><p>{{$tip->video_link}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Is active</strong></div>
                   <div class="col-md-8"><p>{{$tip->is_active}}</p></div>
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
<script>document.title = 'Tips | Show';</script>
@endsection
