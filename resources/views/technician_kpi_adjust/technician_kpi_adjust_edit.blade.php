@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">TechnicianKpiAdjust</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">TechnicianKpiAdjust Edit</li>
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
                    <h3 class="card-title">TechnicianKpiAdjust</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('technician_kpi_adjust.update',$technician_kpi_adjust->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                             
              
                <div class="col-sm-6">
                    <label>Month</label>
                    <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                        <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>
                        <option value="01-01-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                        <option value="01-02-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                        <option value="01-03-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                        <option value="01-04-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                        <option value="01-05-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                        <option value="01-06-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                        <option value="01-07-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                        <option value="01-08-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                        <option value="01-09-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                        <option value="01-10-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                        <option value="01-11-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                        <option value="01-12-{{date('Y')}}" @if(date('m',strtotime($technician_kpi_adjust->date)) =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('user_id') ? 'has-error' : '' }}">
                        <label for="user_id">User </label>
                        <select name="user_id" id="user_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select User</option>
                            @foreach($users as $user)
                             <option value="{{$user->id}}"  @if($user->id == $technician_kpi_adjust->user_id){{"selected"}} @endif >{{$user->username}} - {{$user->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('user_id'))
                            <span class="help-block"><strong>{{ $errors->first('user_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_ws_actual') ? 'has-error' : '' }}">
                        <label for="service_ratio_ws_actual">Service ratio ws actual</label>
                        <input name="service_ratio_ws_actual" type="number" id="service_ratio_ws_actual" class="form-control"   value="{{$technician_kpi_adjust->service_ratio_ws_actual}}"    autofocus step="any"  placeholder="Service ratio ws actual"     >
                        @if ($errors->has('service_ratio_ws_actual'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_ws_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_ratio_pws_actual') ? 'has-error' : '' }}">
                        <label for="service_ratio_pws_actual">Service ratio pws actual</label>
                        <input name="service_ratio_pws_actual" type="number" id="service_ratio_pws_actual" class="form-control"   value="{{$technician_kpi_adjust->service_ratio_pws_actual}}"    autofocus step="any"  placeholder="Service ratio pws actual"     >
                        @if ($errors->has('service_ratio_pws_actual'))
                            <span class="help-block"><strong>{{ $errors->first('service_ratio_pws_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_six_actual') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_six_actual">Satisfaction index six actual</label>
                        <input name="satisfaction_index_six_actual" type="number" id="satisfaction_index_six_actual" class="form-control"   value="{{$technician_kpi_adjust->satisfaction_index_six_actual}}"    autofocus step="any"  placeholder="Satisfaction index six actual"     >
                        @if ($errors->has('satisfaction_index_six_actual'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_six_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_six_target') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_six_target">Satisfaction index six target</label>
                        <input name="satisfaction_index_six_target" type="number" id="satisfaction_index_six_target" class="form-control"   value="{{$technician_kpi_adjust->satisfaction_index_six_target}}"    autofocus step="any"  placeholder="Satisfaction index six target"     >
                        @if ($errors->has('satisfaction_index_six_target'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_six_target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_csi_actual') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_csi_actual">Satisfaction index csi actual</label>
                        <input name="satisfaction_index_csi_actual" type="number" id="satisfaction_index_csi_actual" class="form-control"   value="{{$technician_kpi_adjust->satisfaction_index_csi_actual}}"    autofocus step="any"  placeholder="Satisfaction index csi actual"     >
                        @if ($errors->has('satisfaction_index_csi_actual'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_csi_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('satisfaction_index_csi_target') ? 'has-error' : '' }}">
                        <label for="satisfaction_index_csi_target">Satisfaction index csi target</label>
                        <input name="satisfaction_index_csi_target" type="number" id="satisfaction_index_csi_target" class="form-control"   value="{{$technician_kpi_adjust->satisfaction_index_csi_target}}"    autofocus step="any"  placeholder="Satisfaction index csi target"     >
                        @if ($errors->has('satisfaction_index_csi_target'))
                            <span class="help-block"><strong>{{ $errors->first('satisfaction_index_csi_target') }}</strong></span>
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

<script>document.title = 'TechnicianKpiAdjust | Edit';</script>
@endsection
