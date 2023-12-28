@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Designation</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Designation Edit</li>
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
                    <h3 class="card-title">Designation</h3>
                    <a href="{{url('/designation')}}" class="btn btn-primary float-right">Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('designation.update',$designation->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                             
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Name</label>
                        <input name="name" type="text" id="name" class="form-control"   value="{{$designation->name}}"   required autofocus max="50"  placeholder="Name"     >
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                        <label for="code">Code</label>
                        <input name="code" type="text" id="code" class="form-control"   value="{{$designation->code}}"   required autofocus max="50"  placeholder="Code"     >
                        @if ($errors->has('code'))
                            <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_base_amount') ? 'has-error' : '' }}">
                        <label for="service_base_amount">Service base amount</label>
                        <input name="service_base_amount" type="number" id="service_base_amount" class="form-control"   value="{{$designation->service_base_amount }}"   required autofocus   placeholder="Service base amount"     >
                        @if ($errors->has('service_base_amount'))
                            <span class="help-block"><strong>{{ $errors->first('service_base_amount') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('tractor_parts_base_amount') ? 'has-error' : '' }}">
                        <label for="tractor_parts_base_amount">Tractor parts base amount</label>
                        <input name="tractor_parts_base_amount" type="number" id="tractor_parts_base_amount" class="form-control"   value="{{ $designation->tractor_parts_base_amount }}"   required autofocus  placeholder="Tractor parts base amount"     >
                        @if ($errors->has('tractor_parts_base_amount'))
                            <span class="help-block"><strong>{{ $errors->first('tractor_parts_base_amount') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('nm_parts_base_amount') ? 'has-error' : '' }}">
                        <label for="nm_parts_base_amount">NM/PTDE parts base amount</label>
                        <input name="nm_parts_base_amount" type="number" id="nm_parts_base_amount" class="form-control"   value="{{ $designation->nm_parts_base_amount }}"   required autofocus   placeholder="NM/PTDE parts base amount"     >
                        @if ($errors->has('nm_parts_base_amount'))
                            <span class="help-block"><strong>{{ $errors->first('nm_parts_base_amount') }}</strong></span>
                        @endif
                    </div>
                </div>

                            </div>

                     <div class="card-footer">
                       <button type="submit" class="btn btn-info float-right btn-flat">Update</button>
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

<script>document.title = 'Designation | Edit';</script>
@endsection
