@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">KpiaDetail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">KpiaDetail Edit</li>
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
                    <h3 class="card-title">KpiaDetail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('kpia_detail.update',$kpia_detail->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                             
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('kpia_id') ? 'has-error' : '' }}">
                        <label for="kpia_id">Kpia </label>
                        <select name="kpia_id" id="kpia_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select Kpia</option>
                            @foreach($kpia as $kpium)
                             <option value="{{$kpium->id}}"  @if($kpium->id == $kpia_detail->kpia_id){{"selected"}} @endif >{{$kpium->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('kpia_id'))
                            <span class="help-block"><strong>{{ $errors->first('kpia_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_ws_target') ? 'has-error' : '' }}">
                        <label for="service_ratio_ws_target">Service ratio ws target</label>
                        <input name="service_ratio_ws_target" type="number" id="service_ratio_ws_target" class="form-control"   value="{{$kpia_detail->service_ratio_ws_target}}"    autofocus step="any"  placeholder="Service ratio ws target"     >
                        @if ($errors->has('service_ratio_ws_target'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_ws_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_ws_actual') ? 'has-error' : '' }}">
                        <label for="service_ratio_ws_actual">Service ratio ws actual</label>
                        <input name="service_ratio_ws_actual" type="number" id="service_ratio_ws_actual" class="form-control"   value="{{$kpia_detail->service_ratio_ws_actual}}"    autofocus step="any"  placeholder="Service ratio ws actual"     >
                        @if ($errors->has('service_ratio_ws_actual'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_ws_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_ws_weight') ? 'has-error' : '' }}">
                        <label for="service_ratio_ws_weight">Service ratio ws weight</label>
                        <input name="service_ratio_ws_weight" type="number" id="service_ratio_ws_weight" class="form-control"   value="{{$kpia_detail->service_ratio_ws_weight}}"    autofocus placeholder="Service ratio ws weight"     >
                        @if ($errors->has('service_ratio_ws_weight'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_ws_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_ws_score') ? 'has-error' : '' }}">
                        <label for="service_ratio_ws_score">Service ratio ws score</label>
                        <input name="service_ratio_ws_score" type="number" id="service_ratio_ws_score" class="form-control"   value="{{$kpia_detail->service_ratio_ws_score}}"    autofocus step="any"  placeholder="Service ratio ws score"     >
                        @if ($errors->has('service_ratio_ws_score'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_ws_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_ws_f_score') ? 'has-error' : '' }}">
                        <label for="service_ratio_ws_f_score">Service ratio ws f score</label>
                        <input name="service_ratio_ws_f_score" type="number" id="service_ratio_ws_f_score" class="form-control"   value="{{$kpia_detail->service_ratio_ws_f_score}}"    autofocus step="any"  placeholder="Service ratio ws f score"     >
                        @if ($errors->has('service_ratio_ws_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_ws_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_pws_target') ? 'has-error' : '' }}">
                        <label for="service_ratio_pws_target">Service ratio pws target</label>
                        <input name="service_ratio_pws_target" type="number" id="service_ratio_pws_target" class="form-control"   value="{{$kpia_detail->service_ratio_pws_target}}"    autofocus step="any"  placeholder="Service ratio pws target"     >
                        @if ($errors->has('service_ratio_pws_target'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_pws_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_pws_actual') ? 'has-error' : '' }}">
                        <label for="service_ratio_pws_actual">Service ratio pws actual</label>
                        <input name="service_ratio_pws_actual" type="number" id="service_ratio_pws_actual" class="form-control"   value="{{$kpia_detail->service_ratio_pws_actual}}"    autofocus step="any"  placeholder="Service ratio pws actual"     >
                        @if ($errors->has('service_ratio_pws_actual'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_pws_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_pws_weight') ? 'has-error' : '' }}">
                        <label for="service_ratio_pws_weight">Service ratio pws weight</label>
                        <input name="service_ratio_pws_weight" type="number" id="service_ratio_pws_weight" class="form-control"   value="{{$kpia_detail->service_ratio_pws_weight}}"    autofocus placeholder="Service ratio pws weight"     >
                        @if ($errors->has('service_ratio_pws_weight'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_pws_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_pws_score') ? 'has-error' : '' }}">
                        <label for="service_ratio_pws_score">Service ratio pws score</label>
                        <input name="service_ratio_pws_score" type="number" id="service_ratio_pws_score" class="form-control"   value="{{$kpia_detail->service_ratio_pws_score}}"    autofocus step="any"  placeholder="Service ratio pws score"     >
                        @if ($errors->has('service_ratio_pws_score'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_pws_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_pws_f_score') ? 'has-error' : '' }}">
                        <label for="service_ratio_pws_f_score">Service ratio pws f score</label>
                        <input name="service_ratio_pws_f_score" type="number" id="service_ratio_pws_f_score" class="form-control"   value="{{$kpia_detail->service_ratio_pws_f_score}}"    autofocus step="any"  placeholder="Service ratio pws f score"     >
                        @if ($errors->has('service_ratio_pws_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_pws_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_six_target') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_six_target">Satisfaction index six target</label>
                        <input name="satisfaction_index_six_target" type="number" id="satisfaction_index_six_target" class="form-control"   value="{{$kpia_detail->satisfaction_index_six_target}}"    autofocus step="any"  placeholder="Satisfaction index six target"     >
                        @if ($errors->has('satisfaction_index_six_target'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_six_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_six_actual') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_six_actual">Satisfaction index six actual</label>
                        <input name="satisfaction_index_six_actual" type="number" id="satisfaction_index_six_actual" class="form-control"   value="{{$kpia_detail->satisfaction_index_six_actual}}"    autofocus step="any"  placeholder="Satisfaction index six actual"     >
                        @if ($errors->has('satisfaction_index_six_actual'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_six_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_six_weight') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_six_weight">Satisfaction index six weight</label>
                        <input name="satisfaction_index_six_weight" type="number" id="satisfaction_index_six_weight" class="form-control"   value="{{$kpia_detail->satisfaction_index_six_weight}}"    autofocus placeholder="Satisfaction index six weight"     >
                        @if ($errors->has('satisfaction_index_six_weight'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_six_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_six_score') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_six_score">Satisfaction index six score</label>
                        <input name="satisfaction_index_six_score" type="number" id="satisfaction_index_six_score" class="form-control"   value="{{$kpia_detail->satisfaction_index_six_score}}"    autofocus step="any"  placeholder="Satisfaction index six score"     >
                        @if ($errors->has('satisfaction_index_six_score'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_six_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_six_f_score') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_six_f_score">Satisfaction index six f score</label>
                        <input name="satisfaction_index_six_f_score" type="number" id="satisfaction_index_six_f_score" class="form-control"   value="{{$kpia_detail->satisfaction_index_six_f_score}}"    autofocus step="any"  placeholder="Satisfaction index six f score"     >
                        @if ($errors->has('satisfaction_index_six_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_six_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_csi_target') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_csi_target">Satisfaction index csi target</label>
                        <input name="satisfaction_index_csi_target" type="number" id="satisfaction_index_csi_target" class="form-control"   value="{{$kpia_detail->satisfaction_index_csi_target}}"    autofocus step="any"  placeholder="Satisfaction index csi target"     >
                        @if ($errors->has('satisfaction_index_csi_target'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_csi_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_csi_actual') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_csi_actual">Satisfaction index csi actual</label>
                        <input name="satisfaction_index_csi_actual" type="number" id="satisfaction_index_csi_actual" class="form-control"   value="{{$kpia_detail->satisfaction_index_csi_actual}}"    autofocus step="any"  placeholder="Satisfaction index csi actual"     >
                        @if ($errors->has('satisfaction_index_csi_actual'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_csi_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_csi_weight') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_csi_weight">Satisfaction index csi weight</label>
                        <input name="satisfaction_index_csi_weight" type="number" id="satisfaction_index_csi_weight" class="form-control"   value="{{$kpia_detail->satisfaction_index_csi_weight}}"    autofocus placeholder="Satisfaction index csi weight"     >
                        @if ($errors->has('satisfaction_index_csi_weight'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_csi_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_csi_score') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_csi_score">Satisfaction index csi score</label>
                        <input name="satisfaction_index_csi_score" type="number" id="satisfaction_index_csi_score" class="form-control"   value="{{$kpia_detail->satisfaction_index_csi_score}}"    autofocus step="any"  placeholder="Satisfaction index csi score"     >
                        @if ($errors->has('satisfaction_index_csi_score'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_csi_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_csi_f_score') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_csi_f_score">Satisfaction index csi f score</label>
                        <input name="satisfaction_index_csi_f_score" type="number" id="satisfaction_index_csi_f_score" class="form-control"   value="{{$kpia_detail->satisfaction_index_csi_f_score}}"    autofocus step="any"  placeholder="Satisfaction index csi f score"     >
                        @if ($errors->has('satisfaction_index_csi_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_csi_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_target') ? 'has-error' : '' }}">
                        <label for="service_income_target">Service income target</label>
                        <input name="service_income_target" type="number" id="service_income_target" class="form-control"   value="{{$kpia_detail->service_income_target}}"    autofocus step="any"  placeholder="Service income target"     >
                        @if ($errors->has('service_income_target'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_actual') ? 'has-error' : '' }}">
                        <label for="service_income_actual">Service income actual</label>
                        <input name="service_income_actual" type="number" id="service_income_actual" class="form-control"   value="{{$kpia_detail->service_income_actual}}"    autofocus step="any"  placeholder="Service income actual"     >
                        @if ($errors->has('service_income_actual'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_weight') ? 'has-error' : '' }}">
                        <label for="service_income_weight">Service income weight</label>
                        <input name="service_income_weight" type="number" id="service_income_weight" class="form-control"   value="{{$kpia_detail->service_income_weight}}"    autofocus placeholder="Service income weight"     >
                        @if ($errors->has('service_income_weight'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_score') ? 'has-error' : '' }}">
                        <label for="service_income_score">Service income score</label>
                        <input name="service_income_score" type="number" id="service_income_score" class="form-control"   value="{{$kpia_detail->service_income_score}}"    autofocus step="any"  placeholder="Service income score"     >
                        @if ($errors->has('service_income_score'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_f_score') ? 'has-error' : '' }}">
                        <label for="service_income_f_score">Service income f score</label>
                        <input name="service_income_f_score" type="number" id="service_income_f_score" class="form-control"   value="{{$kpia_detail->service_income_f_score}}"    autofocus step="any"  placeholder="Service income f score"     >
                        @if ($errors->has('service_income_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('report_submission_weight') ? 'has-error' : '' }}">
                        <label for="report_submission_weight">Report submission weight</label>
                        <input name="report_submission_weight" type="number" id="report_submission_weight" class="form-control"   value="{{$kpia_detail->report_submission_weight}}"    autofocus placeholder="Report submission weight"     >
                        @if ($errors->has('report_submission_weight'))
                            <span class="help-block"><strong>{{ $errors->first('report_submission_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('report_submission_score') ? 'has-error' : '' }}">
                        <label for="report_submission_score">Report submission score</label>
                        <input name="report_submission_score" type="number" id="report_submission_score" class="form-control"   value="{{$kpia_detail->report_submission_score}}"    autofocus step="any"  placeholder="Report submission score"     >
                        @if ($errors->has('report_submission_score'))
                            <span class="help-block"><strong>{{ $errors->first('report_submission_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('report_submission_f_score') ? 'has-error' : '' }}">
                        <label for="report_submission_f_score">Report submission f score</label>
                        <input name="report_submission_f_score" type="number" id="report_submission_f_score" class="form-control"   value="{{$kpia_detail->report_submission_f_score}}"    autofocus step="any"  placeholder="Report submission f score"     >
                        @if ($errors->has('report_submission_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('report_submission_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('app_monitor_weight') ? 'has-error' : '' }}">
                        <label for="app_monitor_weight">App monitor weight</label>
                        <input name="app_monitor_weight" type="number" id="app_monitor_weight" class="form-control"   value="{{$kpia_detail->app_monitor_weight}}"    autofocus placeholder="App monitor weight"     >
                        @if ($errors->has('app_monitor_weight'))
                            <span class="help-block"><strong>{{ $errors->first('app_monitor_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('app_monitor_score') ? 'has-error' : '' }}">
                        <label for="app_monitor_score">App monitor score</label>
                        <input name="app_monitor_score" type="number" id="app_monitor_score" class="form-control"   value="{{$kpia_detail->app_monitor_score}}"    autofocus step="any"  placeholder="App monitor score"     >
                        @if ($errors->has('app_monitor_score'))
                            <span class="help-block"><strong>{{ $errors->first('app_monitor_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('app_monitor_f_score') ? 'has-error' : '' }}">
                        <label for="app_monitor_f_score">App monitor f score</label>
                        <input name="app_monitor_f_score" type="number" id="app_monitor_f_score" class="form-control"   value="{{$kpia_detail->app_monitor_f_score}}"    autofocus step="any"  placeholder="App monitor f score"     >
                        @if ($errors->has('app_monitor_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('app_monitor_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('team_co_weight') ? 'has-error' : '' }}">
                        <label for="team_co_weight">Team co weight</label>
                        <input name="team_co_weight" type="number" id="team_co_weight" class="form-control"   value="{{$kpia_detail->team_co_weight}}"    autofocus placeholder="Team co weight"     >
                        @if ($errors->has('team_co_weight'))
                            <span class="help-block"><strong>{{ $errors->first('team_co_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('team_co_score') ? 'has-error' : '' }}">
                        <label for="team_co_score">Team co score</label>
                        <input name="team_co_score" type="number" id="team_co_score" class="form-control"   value="{{$kpia_detail->team_co_score}}"    autofocus step="any"  placeholder="Team co score"     >
                        @if ($errors->has('team_co_score'))
                            <span class="help-block"><strong>{{ $errors->first('team_co_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('team_co_f_score') ? 'has-error' : '' }}">
                        <label for="team_co_f_score">Team co f score</label>
                        <input name="team_co_f_score" type="number" id="team_co_f_score" class="form-control"   value="{{$kpia_detail->team_co_f_score}}"    autofocus step="any"  placeholder="Team co f score"     >
                        @if ($errors->has('team_co_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('team_co_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_base_line') ? 'has-error' : '' }}">
                        <label for="service_income_base_line">Service income base line</label>
                        <input name="service_income_base_line" type="number" id="service_income_base_line" class="form-control"   value="{{$kpia_detail->service_income_base_line}}"    autofocus placeholder="Service income base line"     >
                        @if ($errors->has('service_income_base_line'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_base_line') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_f_score_total') ? 'has-error' : '' }}">
                        <label for="service_f_score_total">Service f score total</label>
                        <input name="service_f_score_total" type="number" id="service_f_score_total" class="form-control"   value="{{$kpia_detail->service_f_score_total}}"    autofocus step="any"  placeholder="Service f score total"     >
                        @if ($errors->has('service_f_score_total'))
                            <span class="help-block"><strong>{{ $errors->first('service_f_score_total') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_f_score_percent') ? 'has-error' : '' }}">
                        <label for="service_f_score_percent">Service f score percent</label>
                        <input name="service_f_score_percent" type="number" id="service_f_score_percent" class="form-control"   value="{{$kpia_detail->service_f_score_percent}}"    autofocus step="any"  placeholder="Service f score percent"     >
                        @if ($errors->has('service_f_score_percent'))
                            <span class="help-block"><strong>{{ $errors->first('service_f_score_percent') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income_total_incentive') ? 'has-error' : '' }}">
                        <label for="service_income_total_incentive">Service income total incentive</label>
                        <input name="service_income_total_incentive" type="number" id="service_income_total_incentive" class="form-control"   value="{{$kpia_detail->service_income_total_incentive}}"    autofocus step="any"  placeholder="Service income total incentive"     >
                        @if ($errors->has('service_income_total_incentive'))
                            <span class="help-block"><strong>{{ $errors->first('service_income_total_incentive') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_target') ? 'has-error' : '' }}">
                        <label for="sp_tractor_target">Sp tractor target</label>
                        <input name="sp_tractor_target" type="number" id="sp_tractor_target" class="form-control"   value="{{$kpia_detail->sp_tractor_target}}"    autofocus step="any"  placeholder="Sp tractor target"     >
                        @if ($errors->has('sp_tractor_target'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_actual') ? 'has-error' : '' }}">
                        <label for="sp_tractor_actual">Sp tractor actual</label>
                        <input name="sp_tractor_actual" type="number" id="sp_tractor_actual" class="form-control"   value="{{$kpia_detail->sp_tractor_actual}}"    autofocus step="any"  placeholder="Sp tractor actual"     >
                        @if ($errors->has('sp_tractor_actual'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_weight') ? 'has-error' : '' }}">
                        <label for="sp_tractor_weight">Sp tractor weight</label>
                        <input name="sp_tractor_weight" type="number" id="sp_tractor_weight" class="form-control"   value="{{$kpia_detail->sp_tractor_weight}}"    autofocus placeholder="Sp tractor weight"     >
                        @if ($errors->has('sp_tractor_weight'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_score') ? 'has-error' : '' }}">
                        <label for="sp_tractor_score">Sp tractor score</label>
                        <input name="sp_tractor_score" type="number" id="sp_tractor_score" class="form-control"   value="{{$kpia_detail->sp_tractor_score}}"    autofocus step="any"  placeholder="Sp tractor score"     >
                        @if ($errors->has('sp_tractor_score'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_f_score') ? 'has-error' : '' }}">
                        <label for="sp_tractor_f_score">Sp tractor f score</label>
                        <input name="sp_tractor_f_score" type="number" id="sp_tractor_f_score" class="form-control"   value="{{$kpia_detail->sp_tractor_f_score}}"    autofocus step="any"  placeholder="Sp tractor f score"     >
                        @if ($errors->has('sp_tractor_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_base_line') ? 'has-error' : '' }}">
                        <label for="sp_tractor_base_line">Sp tractor base line</label>
                        <input name="sp_tractor_base_line" type="number" id="sp_tractor_base_line" class="form-control"   value="{{$kpia_detail->sp_tractor_base_line}}"    autofocus placeholder="Sp tractor base line"     >
                        @if ($errors->has('sp_tractor_base_line'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_base_line') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_f_score_total') ? 'has-error' : '' }}">
                        <label for="sp_tractor_f_score_total">Sp tractor f score total</label>
                        <input name="sp_tractor_f_score_total" type="number" id="sp_tractor_f_score_total" class="form-control"   value="{{$kpia_detail->sp_tractor_f_score_total}}"    autofocus step="any"  placeholder="Sp tractor f score total"     >
                        @if ($errors->has('sp_tractor_f_score_total'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_f_score_total') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_f_score_percent') ? 'has-error' : '' }}">
                        <label for="sp_tractor_f_score_percent">Sp tractor f score percent</label>
                        <input name="sp_tractor_f_score_percent" type="number" id="sp_tractor_f_score_percent" class="form-control"   value="{{$kpia_detail->sp_tractor_f_score_percent}}"    autofocus step="any"  placeholder="Sp tractor f score percent"     >
                        @if ($errors->has('sp_tractor_f_score_percent'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_f_score_percent') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_total_incentive') ? 'has-error' : '' }}">
                        <label for="sp_tractor_total_incentive">Sp tractor total incentive</label>
                        <input name="sp_tractor_total_incentive" type="number" id="sp_tractor_total_incentive" class="form-control"   value="{{$kpia_detail->sp_tractor_total_incentive}}"    autofocus step="any"  placeholder="Sp tractor total incentive"     >
                        @if ($errors->has('sp_tractor_total_incentive'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_total_incentive') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_target') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_target">Sp nmpt target</label>
                        <input name="sp_nmpt_target" type="number" id="sp_nmpt_target" class="form-control"   value="{{$kpia_detail->sp_nmpt_target}}"    autofocus step="any"  placeholder="Sp nmpt target"     >
                        @if ($errors->has('sp_nmpt_target'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_actual') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_actual">Sp nmpt actual</label>
                        <input name="sp_nmpt_actual" type="number" id="sp_nmpt_actual" class="form-control"   value="{{$kpia_detail->sp_nmpt_actual}}"    autofocus step="any"  placeholder="Sp nmpt actual"     >
                        @if ($errors->has('sp_nmpt_actual'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_weight') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_weight">Sp nmpt weight</label>
                        <input name="sp_nmpt_weight" type="number" id="sp_nmpt_weight" class="form-control"   value="{{$kpia_detail->sp_nmpt_weight}}"    autofocus placeholder="Sp nmpt weight"     >
                        @if ($errors->has('sp_nmpt_weight'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_score') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_score">Sp nmpt score</label>
                        <input name="sp_nmpt_score" type="number" id="sp_nmpt_score" class="form-control"   value="{{$kpia_detail->sp_nmpt_score}}"    autofocus step="any"  placeholder="Sp nmpt score"     >
                        @if ($errors->has('sp_nmpt_score'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_f_score') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_f_score">Sp nmpt f score</label>
                        <input name="sp_nmpt_f_score" type="number" id="sp_nmpt_f_score" class="form-control"   value="{{$kpia_detail->sp_nmpt_f_score}}"    autofocus step="any"  placeholder="Sp nmpt f score"     >
                        @if ($errors->has('sp_nmpt_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_base_line') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_base_line">Sp nmpt base line</label>
                        <input name="sp_nmpt_base_line" type="number" id="sp_nmpt_base_line" class="form-control"   value="{{$kpia_detail->sp_nmpt_base_line}}"    autofocus placeholder="Sp nmpt base line"     >
                        @if ($errors->has('sp_nmpt_base_line'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_base_line') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_f_score_total') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_f_score_total">Sp nmpt f score total</label>
                        <input name="sp_nmpt_f_score_total" type="number" id="sp_nmpt_f_score_total" class="form-control"   value="{{$kpia_detail->sp_nmpt_f_score_total}}"    autofocus step="any"  placeholder="Sp nmpt f score total"     >
                        @if ($errors->has('sp_nmpt_f_score_total'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_f_score_total') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_f_score_percent') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_f_score_percent">Sp nmpt f score percent</label>
                        <input name="sp_nmpt_f_score_percent" type="number" id="sp_nmpt_f_score_percent" class="form-control"   value="{{$kpia_detail->sp_nmpt_f_score_percent}}"    autofocus step="any"  placeholder="Sp nmpt f score percent"     >
                        @if ($errors->has('sp_nmpt_f_score_percent'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_f_score_percent') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_nmpt_total_incentive') ? 'has-error' : '' }}">
                        <label for="sp_nmpt_total_incentive">Sp nmpt total incentive</label>
                        <input name="sp_nmpt_total_incentive" type="number" id="sp_nmpt_total_incentive" class="form-control"   value="{{$kpia_detail->sp_nmpt_total_incentive}}"    autofocus step="any"  placeholder="Sp nmpt total incentive"     >
                        @if ($errors->has('sp_nmpt_total_incentive'))
                            <span class="help-block"><strong>{{ $errors->first('sp_nmpt_total_incentive') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_target') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_target">Sp tractor plus nmpt target</label>
                        <input name="sp_tractor_plus_nmpt_target" type="number" id="sp_tractor_plus_nmpt_target" class="form-control"   value="{{$kpia_detail->sp_tractor_plus_nmpt_target}}"    autofocus step="any"  placeholder="Sp tractor plus nmpt target"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_target'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_actual') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_actual">Sp tractor plus nmpt actual</label>
                        <input name="sp_tractor_plus_nmpt_actual" type="number" id="sp_tractor_plus_nmpt_actual" class="form-control"   value="{{$kpia_detail->sp_tractor_plus_nmpt_actual}}"    autofocus step="any"  placeholder="Sp tractor plus nmpt actual"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_actual'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_weight') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_weight">Sp tractor plus nmpt weight</label>
                        <input name="sp_tractor_plus_nmpt_weight" type="number" id="sp_tractor_plus_nmpt_weight" class="form-control"   value="{{$kpia_detail->sp_tractor_plus_nmpt_weight}}"    autofocus placeholder="Sp tractor plus nmpt weight"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_weight'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_score') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_score">Sp tractor plus nmpt score</label>
                        <input name="sp_tractor_plus_nmpt_score" type="number" id="sp_tractor_plus_nmpt_score" class="form-control"   value="{{$kpia_detail->sp_tractor_plus_nmpt_score}}"    autofocus step="any"  placeholder="Sp tractor plus nmpt score"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_score'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_f_score') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_f_score">Sp tractor plus nmpt f score</label>
                        <input name="sp_tractor_plus_nmpt_f_score" type="number" id="sp_tractor_plus_nmpt_f_score" class="form-control"   value="{{$kpia_detail->sp_tractor_plus_nmpt_f_score}}"    autofocus step="any"  placeholder="Sp tractor plus nmpt f score"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_f_score'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_f_score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_base_line') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_base_line">Sp tractor plus nmpt base line</label>
                        <input name="sp_tractor_plus_nmpt_base_line" type="number" id="sp_tractor_plus_nmpt_base_line" class="form-control"   value="{{$kpia_detail->sp_tractor_plus_nmpt_base_line}}"    autofocus placeholder="Sp tractor plus nmpt base line"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_base_line'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_base_line') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_f_score_total') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_f_score_total">Sp tractor plus nmpt f score total</label>
                        <input name="sp_tractor_plus_nmpt_f_score_total" type="number" id="sp_tractor_plus_nmpt_f_score_total" class="form-control"   value="{{$kpia_detail->sp_tractor_plus_nmpt_f_score_total}}"    autofocus step="any"  placeholder="Sp tractor plus nmpt f score total"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_f_score_total'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_f_score_total') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_f_score_percent') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_f_score_percent">Sp tractor plus nmpt f score percent</label>
                        <input name="sp_tractor_plus_nmpt_f_score_percent" type="number" id="sp_tractor_plus_nmpt_f_score_percent" class="form-control"   value="{{$kpia_detail->sp_tractor_plus_nmpt_f_score_percent}}"    autofocus step="any"  placeholder="Sp tractor plus nmpt f score percent"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_f_score_percent'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_f_score_percent') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sp_tractor_plus_nmpt_total_incentive') ? 'has-error' : '' }}">
                        <label for="sp_tractor_plus_nmpt_total_incentive">Sp tractor plus nmpt total incentive</label>
                        <input name="sp_tractor_plus_nmpt_total_incentive" type="number" id="sp_tractor_plus_nmpt_total_incentive" class="form-control"   value="{{$kpia_detail->sp_tractor_plus_nmpt_total_incentive}}"    autofocus step="any"  placeholder="Sp tractor plus nmpt total incentive"     >
                        @if ($errors->has('sp_tractor_plus_nmpt_total_incentive'))
                            <span class="help-block"><strong>{{ $errors->first('sp_tractor_plus_nmpt_total_incentive') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('incentive_101_115_mul') ? 'has-error' : '' }}">
                        <label for="incentive_101_115_mul">Incentive 101 115 mul</label>
                        <input name="incentive_101_115_mul" type="number" id="incentive_101_115_mul" class="form-control"   value="{{$kpia_detail->incentive_101_115_mul}}"    autofocus step="any"  placeholder="Incentive 101 115 mul"     >
                        @if ($errors->has('incentive_101_115_mul'))
                            <span class="help-block"><strong>{{ $errors->first('incentive_101_115_mul') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('incentive_116_140_mul') ? 'has-error' : '' }}">
                        <label for="incentive_116_140_mul">Incentive 116 140 mul</label>
                        <input name="incentive_116_140_mul" type="number" id="incentive_116_140_mul" class="form-control"   value="{{$kpia_detail->incentive_116_140_mul}}"    autofocus step="any"  placeholder="Incentive 116 140 mul"     >
                        @if ($errors->has('incentive_116_140_mul'))
                            <span class="help-block"><strong>{{ $errors->first('incentive_116_140_mul') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('incentive_141_above_mul') ? 'has-error' : '' }}">
                        <label for="incentive_141_above_mul">Incentive 141 above mul</label>
                        <input name="incentive_141_above_mul" type="number" id="incentive_141_above_mul" class="form-control"   value="{{$kpia_detail->incentive_141_above_mul}}"    autofocus step="any"  placeholder="Incentive 141 above mul"     >
                        @if ($errors->has('incentive_141_above_mul'))
                            <span class="help-block"><strong>{{ $errors->first('incentive_141_above_mul') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('incentive_101_115_amount') ? 'has-error' : '' }}">
                        <label for="incentive_101_115_amount">Incentive 101 115 amount</label>
                        <input name="incentive_101_115_amount" type="number" id="incentive_101_115_amount" class="form-control"   value="{{$kpia_detail->incentive_101_115_amount}}"    autofocus step="any"  placeholder="Incentive 101 115 amount"     >
                        @if ($errors->has('incentive_101_115_amount'))
                            <span class="help-block"><strong>{{ $errors->first('incentive_101_115_amount') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('incentive_116_140_amount') ? 'has-error' : '' }}">
                        <label for="incentive_116_140_amount">Incentive 116 140 amount</label>
                        <input name="incentive_116_140_amount" type="number" id="incentive_116_140_amount" class="form-control"   value="{{$kpia_detail->incentive_116_140_amount}}"    autofocus step="any"  placeholder="Incentive 116 140 amount"     >
                        @if ($errors->has('incentive_116_140_amount'))
                            <span class="help-block"><strong>{{ $errors->first('incentive_116_140_amount') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('incentive_141_above_amount') ? 'has-error' : '' }}">
                        <label for="incentive_141_above_amount">Incentive 141 above amount</label>
                        <input name="incentive_141_above_amount" type="number" id="incentive_141_above_amount" class="form-control"   value="{{$kpia_detail->incentive_141_above_amount}}"    autofocus step="any"  placeholder="Incentive 141 above amount"     >
                        @if ($errors->has('incentive_141_above_amount'))
                            <span class="help-block"><strong>{{ $errors->first('incentive_141_above_amount') }}</strong></span>
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

<script>document.title = 'KpiaDetail | Edit';</script>
@endsection
