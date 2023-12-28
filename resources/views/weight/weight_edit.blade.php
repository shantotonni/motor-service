@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Weight</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Weight Edit</li>
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
                    <h3 class="card-title">Weight</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('weight.update',$weight->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                             
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('kpi_type_id') ? 'has-error' : '' }}">
                        <label for="kpi_type_id">Kpi type </label>
                        <select name="kpi_type_id" id="kpi_type_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus required     >
                            <option value="">Select Kpi type</option>
                            @foreach($kpi_types as $kpi_type)
                             <option value="{{$kpi_type->id}}"  @if($kpi_type->id == $weight->kpi_type_id){{"selected"}} @endif >{{$kpi_type->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('kpi_type_id'))
                            <span class="help-block"><strong>{{ $errors->first('kpi_type_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_ws_weight') ? 'has-error' : '' }}">
                        <label for="service_ratio_ws_weight">Service ratio ws weight</label>
                        <input name="service_ratio_ws_weight" type="number" id="service_ratio_ws_weight" class="form-control"   value="{{$weight->service_ratio_ws_weight}}"    autofocus placeholder="Service ratio ws weight"     >
                        @if ($errors->has('service_ratio_ws_weight'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_ws_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_pws_weight') ? 'has-error' : '' }}">
                        <label for="service_ratio_pws_weight">Service ratio pws weight</label>
                        <input name="service_ratio_pws_weight" type="number" id="service_ratio_pws_weight" class="form-control"   value="{{$weight->service_ratio_pws_weight}}"    autofocus placeholder="Service ratio pws weight"     >
                        @if ($errors->has('service_ratio_pws_weight'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_pws_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_six_weight') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_six_weight">Satisfaction index six weight</label>
                        <input name="satisfaction_index_six_weight" type="number" id="satisfaction_index_six_weight" class="form-control"   value="{{$weight->satisfaction_index_six_weight}}"    autofocus placeholder="Satisfaction index six weight"     >
                        @if ($errors->has('satisfaction_index_six_weight'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_six_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_csi_weight') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_csi_weight">Satisfaction index csi weight</label>
                        <input name="satisfaction_index_csi_weight" type="number" id="satisfaction_index_csi_weight" class="form-control"   value="{{$weight->satisfaction_index_csi_weight}}"    autofocus placeholder="Satisfaction index csi weight"     >
                        @if ($errors->has('satisfaction_index_csi_weight'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_csi_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_weight') ? 'has-error' : '' }}">
                        <label for="service_income_weight">Service income weight</label>
                        <input name="service_income_weight" type="number" id="service_income_weight" class="form-control"   value="{{$weight->service_income_weight}}"    autofocus placeholder="Service income weight"     >
                        @if ($errors->has('service_income_weight'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('report_submission_weight') ? 'has-error' : '' }}">
                        <label for="report_submission_weight">Report submission weight</label>
                        <input name="report_submission_weight" type="number" id="report_submission_weight" class="form-control"   value="{{$weight->report_submission_weight}}"    autofocus placeholder="Report submission weight"     >
                        @if ($errors->has('report_submission_weight'))
                            <span class="help-block"><strong>{{ $errors->first('report_submission_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('app_monitor_weight') ? 'has-error' : '' }}">
                        <label for="app_monitor_weight">App monitor weight</label>
                        <input name="app_monitor_weight" type="number" id="app_monitor_weight" class="form-control"   value="{{$weight->app_monitor_weight}}"    autofocus placeholder="App monitor weight"     >
                        @if ($errors->has('app_monitor_weight'))
                            <span class="help-block"><strong>{{ $errors->first('app_monitor_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('team_co_weight') ? 'has-error' : '' }}">
                        <label for="team_co_weight">Team co weight</label>
                        <input name="team_co_weight" type="number" id="team_co_weight" class="form-control"   value="{{$weight->team_co_weight}}"    autofocus placeholder="Team co weight"     >
                        @if ($errors->has('team_co_weight'))
                            <span class="help-block"><strong>{{ $errors->first('team_co_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_weight') ? 'has-error' : '' }}">
                        <label for="sp_tractor_weight">Sp tractor weight</label>
                        <input name="sp_tractor_weight" type="number" id="sp_tractor_weight" class="form-control"   value="{{$weight->sp_tractor_weight}}"    autofocus placeholder="Sp tractor weight"     >
                        @if ($errors->has('sp_tractor_weight'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_weight') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_weight">Sp nmpt weight</label>
                        <input name="sp_nmpt_weight" type="number" id="sp_nmpt_weight" class="form-control"   value="{{$weight->sp_nmpt_weight}}"    autofocus placeholder="Sp nmpt weight"     >
                        @if ($errors->has('sp_nmpt_weight'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_weight') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_weight">Sp tractor plus nmpt weight</label>
                        <input name="sp_tractor_plus_nmpt_weight" type="number" id="sp_tractor_plus_nmpt_weight" class="form-control"   value="{{$weight->sp_tractor_plus_nmpt_weight}}"    autofocus placeholder="Sp tractor plus nmpt weight"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_weight'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_weight') }}</strong></span>
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

<script>document.title = 'Weight | Edit';</script>
@endsection
