@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Territory</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Territory Create</li>
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
                <!-- general form elements disabled -->
                <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Territory</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('territory.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
                        <label for="area_id">Area </label>
                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select Area</option>
                            @foreach($areas as $area)
                            <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('area_id'))
                            <span class="help-block"><strong>{{ $errors->first('area_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Name</label>
                        <input name="name" type="text" id="name" class="form-control"   value="{{ old('name') }}"    autofocus max="191"  required  placeholder="Name"     >
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                        <label for="code">Code</label>
                        <input name="code" type="text" id="code" class="form-control"   value="{{ old('code') }}"    autofocus max="191"  required  placeholder="Code"     >
                        @if ($errors->has('code'))
                            <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                        @endif
                    </div>
                </div>

                        </div>
                     <div class="card-footer">
                       <button type="submit" class="btn btn-info float-right btn-flat">Create</button>
                     </div>
                   </form>
                  </div>
                 <!-- /.card-body -->
                 </div>
                 <!-- /.card -->

            </div> <!-- /.col-12 -->
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'Territory | Create';</script>
@endsection
