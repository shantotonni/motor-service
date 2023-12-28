@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserKpi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserKpi Create</li>
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
                    <h3 class="card-title">UserKpi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('user_kpi.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                        <label for="date">Date</label>
                        <input name="date" type="text" id="date"class="form-control datepicker"  value="{{ old('date') }}"    autofocus required  placeholder="Date"  autocomplete="off"       >
                        @if ($errors->has('date'))
                            <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                        @endif
                    </div>
                </div>

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
                    <div class="form-group {{ $errors->has('total_kpi_target') ? 'has-error' : '' }}">
                        <label for="total_kpi_target">Total kpi target</label>
                        <input name="total_kpi_target" type="number" id="total_kpi_target" class="form-control"   value="{{ old('total_kpi_target') }}"    autofocus step="any"  required  placeholder="Total kpi target"     >
                        @if ($errors->has('total_kpi_target'))
                            <span class="help-block"><strong>{{ $errors->first('total_kpi_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('total_kpi_ach') ? 'has-error' : '' }}">
                        <label for="total_kpi_ach">Total kpi ach</label>
                        <input name="total_kpi_ach" type="number" id="total_kpi_ach" class="form-control"   value="{{ old('total_kpi_ach') }}"    autofocus step="any"  required  placeholder="Total kpi ach"     >
                        @if ($errors->has('total_kpi_ach'))
                            <span class="help-block"><strong>{{ $errors->first('total_kpi_ach') }}</strong></span>
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

<script>document.title = 'UserKpi | Create';</script>
@endsection
