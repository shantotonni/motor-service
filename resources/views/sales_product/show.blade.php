@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Sales Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Sales Product Create</li>
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
              <h3 class="card-title">Sales Product Show</h3>
              <a href="{{route('sales-products.index')}}" class="btn btn-warning float-right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
              <div class="col-md-6">
                 <div class="col-md-4"><strong>Image</strong></div>
                 <div class="col-md-8"><img height="150px" width="250px" src="{{asset('/uploads')}}/{{$product->image}}"></div>
              </div>
              <br><br>
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$product->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Name</strong></div>
                   <div class="col-md-8"><p>{{$product->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Category</strong></div>
                   <div class="col-md-8"><p>{{$product->sales_product_category_id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Details</strong></div>
                   <div class="col-md-8"  style="text-indent: 10%;"><p>{!! $product->detail !!}</p></div>
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
<script>document.title = 'Sales Product | Show';</script>
@endsection
