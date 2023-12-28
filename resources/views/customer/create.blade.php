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
            <li class="breadcrumb-item active">Customer Create</li>
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
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Customer</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('customers.store') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" class="form-control" value="{{ old('name') }}" required autofocus placeholder="Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                        <label for="code">Code</label>
                                        <input name="code" type="text" id="code" class="form-control" value="{{ old('code') }}" required autofocus placeholder="Code">
                                        @if ($errors->has('code'))
                                            <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                        <label for="mobile">Mobile</label>
                                        <input name="mobile" type="text" id="mobile" class="form-control" value="{{ old('mobile') }}" required autofocus placeholder="mobile">
                                        @if ($errors->has('mobile'))
                                            <span class="help-block"><strong>{{ $errors->first('mobile') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('chassis') ? 'has-error' : '' }}">
                                        <label for="chassis">Chassis</label>
                                        <input name="chassis" type="text" id="chassis" class="form-control" value="{{ old('chassis') }}" required autofocus placeholder="chassis">
                                        @if ($errors->has('chassis'))
                                            <span class="help-block"><strong>{{ $errors->first('chassis') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('chassis') ? 'has-error' : '' }}">
                                        <label for="product_id">Tractor Model</label>
                                        <select name="product_id" id="product_id" class="form-control">
                                            <option value="">Select Tractor Model</option>
                                            @foreach($models as $model)
                                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('product_id'))
                                            <span class="help-block"><strong>{{ $errors->first('product_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('service_hour') ? 'has-error' : '' }}">
                                        <label for="service_hour">Service Hour</label>
                                        <input name="service_hour" type="number" id="service_hour" class="form-control" value="{{ old('service_hour') }}" required autofocus placeholder="service_hour">
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
                                             <option value="{{$area->id}}">{{$area->name}}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('area_id'))
                                            <span class="help-block"><strong>{{ $errors->first('area_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="password">Password</label>
                                        <input name="password" type="text" id="password" class="form-control"   value="{{ old('password') }}"    autofocus max="191"  required  placeholder="Password"     >
                                        @if ($errors->has('password'))
                                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                        <label for="password">Password confirm</label>
                                        <input name="password_confirmation" type="text" id="password_confirmation" class="form-control"   value=""    autofocus max="191"  required  placeholder="password_confirmation"     >
                                        @if ($errors->has('password'))
                                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                         <div class="card-footer">
                           <button type="submit" class="btn btn-info float-right btn-flat">Create</button>
                         </div>
                       </form>
                    </div>
                </div>
            </div>
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<style>
    .help-block{
        color: red;
    }
</style>

<script>document.title = 'Company | Create';</script>
@endsection
