@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserKpiBaseLine</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserKpiBaseLine Create</li>
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
                    <h3 class="card-title">UserKpiBaseLine</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('user_kpi_base_line.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('user_kpi_id') ? 'has-error' : '' }}">
                        <label for="user_kpi_id">User kpi </label>
                        <select name="user_kpi_id" id="user_kpi_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select User kpi</option>
                            @foreach($user_kpis as $user_kpi)
                            <option value="{{$user_kpi->id}}" @if($user_kpi->id == old("user_kpi_id")){{"selected"}} @endif">{{$user_kpi->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('user_kpi_id'))
                            <span class="help-block"><strong>{{ $errors->first('user_kpi_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('kpi_group_id') ? 'has-error' : '' }}">
                        <label for="kpi_group_id">Kpi group </label>
                        <select name="kpi_group_id" id="kpi_group_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select Kpi group</option>
                            @foreach($kpi_groups as $kpi_group)
                            <option value="{{$kpi_group->id}}" @if($kpi_group->id == old("kpi_group_id")){{"selected"}} @endif">{{$kpi_group->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('kpi_group_id'))
                            <span class="help-block"><strong>{{ $errors->first('kpi_group_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                        <label for="amount">Amount</label>
                        <input name="amount" type="number" id="amount" class="form-control"   value="{{ old('amount') }}"    autofocus required  placeholder="Amount"     >
                        @if ($errors->has('amount'))
                            <span class="help-block"><strong>{{ $errors->first('amount') }}</strong></span>
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

<script>document.title = 'UserKpiBaseLine | Create';</script>
@endsection
