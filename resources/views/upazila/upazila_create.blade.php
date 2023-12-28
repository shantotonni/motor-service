@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Upazila</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Upazila Create</li>
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
                    <h3 class="card-title">Upazila</h3>
                    <a class="btn btn-primary float-right" href="/motor-service/upazila">Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('upazila.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Name</label>
                        <input name="name" type="text" id="name" class="form-control"   value="{{ old('name') }}"   required autofocus max="100"  placeholder="Name"     >
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('name_bn') ? 'has-error' : '' }}">
                        <label for="name_bn">Name (Bengali)</label>
                        <input name="name_bn" type="text" id="name_bn" class="form-control"   value="{{ old('name_bn') }}"   required autofocus max="100"  placeholder="Name in Bangla"     >
                        @if ($errors->has('name_bn'))
                            <span class="help-block"><strong>{{ $errors->first('name_bn') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                        <label for="code">Code</label>
                        <input name="code" type="text" id="code" class="form-control"   value="{{ old('code') }}"   required autofocus max="20"  placeholder="Code"     >
                        @if ($errors->has('code'))
                            <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                        @endif
                    </div>
                </div>
                

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('district_id') ? 'has-error' : '' }}">
                        <label for="district_id">District </label>
                        <select name="district_id" id="district_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select District</option>
                            @foreach($districts as $dis)
                            <option value="{{$dis->id}}">{{$dis->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('district_id'))
                            <span class="help-block"><strong>{{ $errors->first('district_id') }}</strong></span>
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

<script>document.title = 'Company | Create';</script>
@endsection