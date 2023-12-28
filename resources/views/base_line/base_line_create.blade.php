@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">BaseLine</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">BaseLine Create</li>
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
                    <h3 class="card-title">BaseLine</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('base_line.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('kpi_type_id') ? 'has-error' : '' }}">
                        <label for="kpi_type_id">Kpi type </label>
                        <select name="kpi_type_id" id="kpi_type_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus required     >
                            <option value="">Select Kpi type</option>
                            @foreach($kpi_types as $kpi_type)
                            <option value="{{$kpi_type->id}}" @if($kpi_type->id == old("kpi_type_id")){{"selected"}} @endif">{{$kpi_type->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('kpi_type_id'))
                            <span class="help-block"><strong>{{ $errors->first('kpi_type_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_base_line') ? 'has-error' : '' }}">
                        <label for="service_income_base_line">Service income base line</label>
                        <input name="service_income_base_line" type="number" id="service_income_base_line" class="form-control"   value="{{ old('service_income_base_line') }}"    autofocus placeholder="Service income base line"     >
                        @if ($errors->has('service_income_base_line'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_base_line') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_base_line') ? 'has-error' : '' }}">
                        <label for="sp_tractor_base_line">Sp tractor base line</label>
                        <input name="sp_tractor_base_line" type="number" id="sp_tractor_base_line" class="form-control"   value="{{ old('sp_tractor_base_line') }}"    autofocus placeholder="Sp tractor base line"     >
                        @if ($errors->has('sp_tractor_base_line'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_base_line') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_base_line') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_base_line">Sp nmpt base line</label>
                        <input name="sp_nmpt_base_line" type="number" id="sp_nmpt_base_line" class="form-control"   value="{{ old('sp_nmpt_base_line') }}"    autofocus placeholder="Sp nmpt base line"     >
                        @if ($errors->has('sp_nmpt_base_line'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_base_line') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_base_line') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_base_line">Sp tractor plus nmpt base line</label>
                        <input name="sp_tractor_plus_nmpt_base_line" type="number" id="sp_tractor_plus_nmpt_base_line" class="form-control"   value="{{ old('sp_tractor_plus_nmpt_base_line') }}"    autofocus placeholder="Sp tractor plus nmpt base line"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_base_line'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_base_line') }}</strong></span>
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

<script>document.title = 'BaseLine | Create';</script>
@endsection
