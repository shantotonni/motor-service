@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Service Manager Information</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Service Manager Information Edit</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Service Manager Information</h3>
                        <a href="{{route('service-manager.index')}}" class="btn btn-primary float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form class="" role="form" method="POST" action="{{ route('service-manager.update',$serviceManager->id) }}">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" class="form-control" value="{{ $serviceManager->name }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : '' }}">
                                        <label for="mobile_number">Mobile</label>
                                        <input name="mobile_number" type="text" id="mobile_number" class="form-control" value="{{ $serviceManager->mobile_number }}" required autofocus">
                                        @if ($errors->has('mobile_number'))
                                            <span class="help-block"><strong>{{ $errors->first('mobile_number') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
                                        <label for="area_id">Area </label>
                                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select">
                                            <option value="">Select Area</option>
                                            @foreach($areas as $area)
                                                @if ($serviceManager->area_id == $area->id)
                                                    <option value="{{$area->id}}" selected>{{$area->name}}</option>
                                                @else
                                                    <option value="{{$area->id}}">{{$area->name}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('area_id'))
                                            <span class="help-block"><strong>{{ $errors->first('area_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info float-right btn-flat">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'Service Manager Info | Edit';</script>
@endsection
