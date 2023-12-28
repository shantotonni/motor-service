@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Customer Show</li>
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
              <h3 class="card-title">Customer Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="row">Id</th>
                            <td>{{$customer->id}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{$customer->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Code</th>
                            <td>{{$customer->code}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mobile</th>
                            <td>{{$customer->mobile}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Service Hour</th>
                            <td>{{$customer->service_hour}}</td>
                        </tr>
                        <tr>
                            <th scope="row">chassis</th>
                            <td>{{$customer->chassis}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Area</th>
                            <td>{{$customer->area->name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<script>document.title = 'Company | Show';</script>
@endsection
