@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Department</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Department Edit</li>
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
                    <h3 class="card-title">Department</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('department.update',$department->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                             
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('business_unit_id') ? 'has-error' : '' }}">
                        <label for="business_unit_id">Business unit </label>
                        <select name="business_unit_id" id="business_unit_id" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                            <option value="">Select Business unit</option>
                            @foreach($business_units as $business_unit)
                             <option value="{{$business_unit->id}}"  @if($business_unit->id == $department->business_unit_id){{"selected"}} @endif >{{$business_unit->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('business_unit_id'))
                            <span class="help-block"><strong>{{ $errors->first('business_unit_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Name</label>
                        <input name="name" type="text" id="name" class="form-control"   value="{{$department->name}}"   required autofocus max="191"  placeholder="Name"     >
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                        <label for="code">Code</label>
                        <input name="code" type="text" id="code" class="form-control"   value="{{$department->code}}"   required autofocus max="191"  placeholder="Code"     >
                        @if ($errors->has('code'))
                            <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                        @endif
                    </div>
                </div>

                            </div>

                     <div class="card-footer">
                       <button type="submit" class="btn btn-info float-right btn-flat">Edit</button>
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

<script>document.title = 'Department | Edit';</script>
@endsection
