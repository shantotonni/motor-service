@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Showroom Centre</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Showroom Show</li>
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
              <h3 class="card-title">Showroom Centre Show</h3>
              <a href="{{route('showrooms.index')}}" class="btn btn-primary float-right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="row">Id</th>
                            <td>{{$showroom->id}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{$showroom->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mobile</th>
                            <td>{{$showroom->mobile_number}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Area</th>
                            <td>{{$showroom->area->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td>{{$showroom->address}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Lat</th>
                            <td>{{$showroom->lat}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Lon</th>
                            <td>{{$showroom->lon}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<script>document.title = 'Showroom | Show';</script>
@endsection
