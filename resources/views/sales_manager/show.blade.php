@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Sales Manager Information</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Sales Manager Information Show</li>
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
              <h3 class="card-title">Sales Manager Information Show</h3>
              <a href="{{route('sales-manager-info.index')}}" class="btn btn-primary float-right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="row">Id</th>
                            <td>{{$salesManager->id}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{$salesManager->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mobile</th>
                            <td>{{$salesManager->mobile_number}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Area</th>
                            <td>{{$salesManager->area->name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<script>document.title = 'Sales Manager Info | Show';</script>
@endsection
