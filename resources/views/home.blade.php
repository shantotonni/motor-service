@extends('layouts.master')
@section('title','Dashboard | Motors Service')
@section('content')
{{--<style>--}}
{{--     .background {--}}
{{--        background-image: url("{{asset('/img/background.png')}}");--}}
{{--        background-repeat: no-repeat;--}}
{{--        background-size: 100% 100%;--}}
{{--    }--}}
{{--</style>--}}
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark" style="background: #2c2b2a;padding: 5px;color: white!important;">Welcome to Admin Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Home</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="row-fluid background" style="height: 500px; text-align:center">
</div>

@endsection




