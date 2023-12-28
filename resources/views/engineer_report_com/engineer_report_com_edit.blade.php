@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">EngineerReportCom</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">EngineerReportCom Edit</li>
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
                    <h3 class="card-title">EngineerReportCom</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('engineer_report_com.update',$engineer_report_com->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                             
                <div class="col-sm-6">
                <label>Month</label>
                    <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                        <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>
                        <option value="01-01-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                        <option value="01-02-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                        <option value="01-03-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                        <option value="01-04-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                        <option value="01-05-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                        <option value="01-06-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                        <option value="01-07-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                        <option value="01-08-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                        <option value="01-09-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                        <option value="01-10-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                        <option value="01-11-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                        <option value="01-12-{{date('Y')}}" @if(date('m',strtotime($engineer_report_com->date)) =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('user_id') ? 'has-error' : '' }}">
                        <label for="user_id">User </label>
                        <select name="user_id" id="user_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select User</option>
                            @foreach($users as $user)
                             <option value="{{$user->id}}"  @if($user->id == $engineer_report_com->user_id){{"selected"}} @endif >{{$user->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('user_id'))
                            <span class="help-block"><strong>{{ $errors->first('user_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('report_actual') ? 'has-error' : '' }}">
                        <label for="report_actual">Report actual</label>
                        <input name="report_actual" type="number" id="report_actual" class="form-control"   value="{{$engineer_report_com->report_actual}}"    autofocus step="any"  required  placeholder="Report actual"     >
                        @if ($errors->has('report_actual'))
                            <span class="help-block"><strong>{{ $errors->first('report_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('app_dashboard_actual') ? 'has-error' : '' }}">
                        <label for="app_dashboard_actual">App dashboard actual</label>
                        <input name="app_dashboard_actual" type="number" id="app_dashboard_actual" class="form-control"   value="{{$engineer_report_com->app_dashboard_actual}}"    autofocus step="any"  required  placeholder="App dashboard actual"     >
                        @if ($errors->has('app_dashboard_actual'))
                            <span class="help-block"><strong>{{ $errors->first('app_dashboard_actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('team_coordination_actual') ? 'has-error' : '' }}">
                        <label for="team_coordination_actual">Team coordination actual</label>
                        <input name="team_coordination_actual" type="number" id="team_coordination_actual" class="form-control"   value="{{$engineer_report_com->team_coordination_actual}}"    autofocus step="any"  required  placeholder="Team coordination actual"     >
                        @if ($errors->has('team_coordination_actual'))
                            <span class="help-block"><strong>{{ $errors->first('team_coordination_actual') }}</strong></span>
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

<script>document.title = 'EngineerReportCom | Edit';</script>
@endsection
