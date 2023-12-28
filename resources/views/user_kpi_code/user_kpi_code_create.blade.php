@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserKpiCode</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserKpiCode Create</li>
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
                    <h3 class="card-title">UserKpiCode</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('user_kpi_code.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('user_id') ? 'has-error' : '' }}">
                        <label for="user_id">User </label>
                        <select name="user_id" id="user_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select User</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if($user->id == old("user_id")){{"selected"}} @endif">{{$user->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('user_id'))
                            <span class="help-block"><strong>{{ $errors->first('user_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_code') ? 'has-error' : '' }}">
                        <label for="service_income_code">Service income code</label>
                        <input name="service_income_code" type="text" id="service_income_code" class="form-control"   value="{{ old('service_income_code') }}"    autofocus max="191"  placeholder="Service income code"     >
                        @if ($errors->has('service_income_code'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_code') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('tractor_spare_parts_code') ? 'has-error' : '' }}">
                        <label for="tractor_spare_parts_code">Tractor spare parts code</label>
                        <input name="tractor_spare_parts_code" type="text" id="tractor_spare_parts_code" class="form-control"   value="{{ old('tractor_spare_parts_code') }}"    autofocus max="191"  placeholder="Tractor spare parts code"     >
                        @if ($errors->has('tractor_spare_parts_code'))
                            <span class="help-block"><strong>{{ $errors->first('tractor_spare_parts_code') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('tractor_sonalika_lub_code') ? 'has-error' : '' }}">
                        <label for="tractor_sonalika_lub_code">Tractor sonalika lub code</label>
                        <input name="tractor_sonalika_lub_code" type="text" id="tractor_sonalika_lub_code" class="form-control"   value="{{ old('tractor_sonalika_lub_code') }}"    autofocus max="191"  placeholder="Tractor sonalika lub code"     >
                        @if ($errors->has('tractor_sonalika_lub_code'))
                            <span class="help-block"><strong>{{ $errors->first('tractor_sonalika_lub_code') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('tractor_power_oil_code') ? 'has-error' : '' }}">
                        <label for="tractor_power_oil_code">Tractor power oil code</label>
                        <input name="tractor_power_oil_code" type="text" id="tractor_power_oil_code" class="form-control"   value="{{ old('tractor_power_oil_code') }}"    autofocus max="191"  placeholder="Tractor power oil code"     >
                        @if ($errors->has('tractor_power_oil_code'))
                            <span class="help-block"><strong>{{ $errors->first('tractor_power_oil_code') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('nm_spare_parts_code') ? 'has-error' : '' }}">
                        <label for="nm_spare_parts_code">Nm spare parts code</label>
                        <input name="nm_spare_parts_code" type="text" id="nm_spare_parts_code" class="form-control"   value="{{ old('nm_spare_parts_code') }}"    autofocus max="191"  placeholder="Nm spare parts code"     >
                        @if ($errors->has('nm_spare_parts_code'))
                            <span class="help-block"><strong>{{ $errors->first('nm_spare_parts_code') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('nm_power_oil_code') ? 'has-error' : '' }}">
                        <label for="nm_power_oil_code">Nm power oil code</label>
                        <input name="nm_power_oil_code" type="text" id="nm_power_oil_code" class="form-control"   value="{{ old('nm_power_oil_code') }}"    autofocus max="191"  placeholder="Nm power oil code"     >
                        @if ($errors->has('nm_power_oil_code'))
                            <span class="help-block"><strong>{{ $errors->first('nm_power_oil_code') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('pt_spare_parts_code') ? 'has-error' : '' }}">
                        <label for="pt_spare_parts_code">Pt spare parts code</label>
                        <input name="pt_spare_parts_code" type="text" id="pt_spare_parts_code" class="form-control"   value="{{ old('pt_spare_parts_code') }}"    autofocus max="191"  placeholder="Pt spare parts code"     >
                        @if ($errors->has('pt_spare_parts_code'))
                            <span class="help-block"><strong>{{ $errors->first('pt_spare_parts_code') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('pt_power_oil_code') ? 'has-error' : '' }}">
                        <label for="pt_power_oil_code">Pt power oil code</label>
                        <input name="pt_power_oil_code" type="text" id="pt_power_oil_code" class="form-control"   value="{{ old('pt_power_oil_code') }}"    autofocus max="191"  placeholder="Pt power oil code"     >
                        @if ($errors->has('pt_power_oil_code'))
                            <span class="help-block"><strong>{{ $errors->first('pt_power_oil_code') }}</strong></span>
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

<script>document.title = 'UserKpiCode | Create';</script>
@endsection
