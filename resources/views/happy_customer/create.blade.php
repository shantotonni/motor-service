@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Happy Customers Feedback</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Happy Customers Feedback Create</li>
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
                        <h3 class="card-title">Happy Customers Feedback</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('happy-customer.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                                        <label for="customer_name">Customer Name</label>
                                        <input name="customer_name" type="text" id="customer_name" class="form-control" value="{{ old('customer_name') }}" placeholder="Customer name">
                                        @if ($errors->has('customer_name'))
                                            <span class="help-block"><strong>{{ $errors->first('customer_name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('customer_mobile') ? 'has-error' : '' }}">
                                        <label for="customer_mobile">Customer Mobile</label>
                                        <input name="customer_mobile" type="text" id="customer_mobile" class="form-control" value="{{ old('customer_mobile') }}" placeholder="Customer mobile">
                                        @if ($errors->has('customer_mobile'))
                                            <span class="help-block"><strong>{{ $errors->first('customer_mobile') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                        <label for="address">Customer Address</label>
                                        <input name="address" type="text" id="address" class="form-control" value="{{ old('address') }}" placeholder="Customer Address">
                                        @if ($errors->has('address'))
                                            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('video_url') ? 'has-error' : '' }}">
                                        <label for="video_url">Video Url(Embeded Video Url)</label>
                                        <input name="video_url" type="text" id="video_url" class="form-control" value="{{ old('video_url') }}" required placeholder="Embeded Video Url">
                                        @if ($errors->has('video_url'))
                                            <span class="help-block"><strong>{{ $errors->first('video_url') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('thumbnail_image') ? 'has-error' : '' }}">
                                        <label for="thumbnail_image">Thumbnail Image</label>
                                        <input name="thumbnail_image" type="file" id="thumbnail_image" class="form-control" value="{{ old('thumbnail_image') }}" required placeholder="Thumbnail image">
                                        @if ($errors->has('thumbnail_image'))
                                            <span class="help-block"><strong>{{ $errors->first('thumbnail_image') }}</strong></span>
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

<script>document.title = 'Happy Customer Feedback | Create';</script>
@endsection
