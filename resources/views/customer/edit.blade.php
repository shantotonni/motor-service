@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Customers</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Customers Edit</li>
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
                        <h3 class="card-title">Customers</h3>
                    </div>
                    <div class="card-body">
                        <form class="" role="form" method="POST" action="{{ route('customers.update',$customer->id) }}">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" class="form-control" value="{{ $customer->name }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                        <label for="code">Code</label>
                                        <input name="code" type="text" id="code" class="form-control" value="{{ $customer->code }}" required autofocus>
                                        @if ($errors->has('code'))
                                            <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                        <label for="mobile">Mobile</label>
                                        <input name="mobile" type="text" id="mobile" class="form-control" value="{{ $customer->mobile }}" required autofocus">
                                        @if ($errors->has('mobile'))
                                            <span class="help-block"><strong>{{ $errors->first('mobile') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('chassis') ? 'has-error' : '' }}">
                                        <label for="chassis">Chassis</label>
                                        <input name="chassis" type="text" id="chassis" class="form-control" value="{{ $customer->chassis }}" required autofocus placeholder="chassis">
                                        @if ($errors->has('chassis'))
                                            <span class="help-block"><strong>{{ $errors->first('chassis') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('chassis') ? 'has-error' : '' }}">
                                        <label for="chassis">Tractor Model</label>
                                        <select name="product_id" id="" class="form-control">
                                            <option value="">Select Tractor Model</option>
                                            @foreach($models as $model)
                                                @if ($customer->product_id == $model->id)
                                                    <option value="{{ $model->id }}" selected>{{ $model->name }}</option>
                                                @else
                                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('chassis'))
                                            <span class="help-block"><strong>{{ $errors->first('chassis') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('service_hour') ? 'has-error' : '' }}">
                                        <label for="service_hour">Service Hour</label>
                                        <input name="service_hour" type="number" id="service_hour" class="form-control" value="{{ $customer->service_hour }}" required autofocus placeholder="service_hour">
                                        @if ($errors->has('service_hour'))
                                            <span class="help-block"><strong>{{ $errors->first('service_hour') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
                                        <label for="area_id">Area </label>
                                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select">
                                            <option value="">Select Area</option>
                                            @foreach($areas as $area)
                                                @if ($customer->area_id == $area->id)
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

<script>document.title = 'Company | Edit';</script>
@endsection
