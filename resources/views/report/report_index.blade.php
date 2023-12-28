@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Report

            <div  class="spinner-border text-primary loading_process" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <span class="loading_process success" style="color:red">Processing Please Do Not Close !!!!!!!!</span>

        </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Report</li>
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
          <!-- /.card -->
          <div class="card">

            <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                            <h4>Area Wise Monthly</h4>
                            <form class="" target="_blank" id="area_wise_report" role="form" method="GET" action="{{url('/report/area_wise_report')}}" style="width:100%;">
                                 @csrf
                                <div class="row">
                                    <div class="col-sm-10" >
                                        <label>Month</label>
                                        <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                            <option value="01-1-{{date('Y',strtotime('-1 years'))}}" >January-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-2-{{date('Y',strtotime('-1 years'))}}" >February-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-3-{{date('Y',strtotime('-1 years'))}}" >March-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-4-{{date('Y',strtotime('-1 years'))}}" >April-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-5-{{date('Y',strtotime('-1 years'))}}" >May-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-6-{{date('Y',strtotime('-1 years'))}}" >June-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-7-{{date('Y',strtotime('-1 years'))}}" >July-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-8-{{date('Y',strtotime('-1 years'))}}" >August-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-9-{{date('Y',strtotime('-1 years'))}}" >September-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-10-{{date('Y',strtotime('-1 years'))}}" >October-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-11-{{date('Y',strtotime('-1 years'))}}" >November-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>

                                            <option value="01-01-{{date('Y')}}" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                            <option value="01-02-{{date('Y')}}" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                            <option value="01-03-{{date('Y')}}" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                            <option value="01-04-{{date('Y')}}" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                            <option value="01-05-{{date('Y')}}" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                            <option value="01-06-{{date('Y')}}" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                            <option value="01-07-{{date('Y')}}" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                            <option value="01-08-{{date('Y')}}" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                            <option value="01-09-{{date('Y')}}" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                            <option value="01-10-{{date('Y')}}" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                            <option value="01-11-{{date('Y')}}" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                            <option value="01-12-{{date('Y')}}" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                        </select>
                                        <!-- <input name="date" type="text" class="form-control datepicker" value="@if(request()->get('date')){{request()->get('from_date')}}@endif"> -->
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Show</label>
                                        <br>
                                        <button onclick="event.preventDefault();  document.getElementById('area_wise_report').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="col-sm-6">
                                <h4>Territory Wise Monthly</h4>
                                <form class="" target="_blank" id="territory_wise_report" role="form" method="GET" action="{{url('/report/territory_wise_report')}}" style="width:100%;">
                                    @csrf
                                    <div class="row">
                                    <div class="col-sm-5" >
                                        <label>Month</label>
                                        <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                            <option value="01-1-{{date('Y',strtotime('-1 years'))}}" >January-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-2-{{date('Y',strtotime('-1 years'))}}" >February-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-3-{{date('Y',strtotime('-1 years'))}}" >March-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-4-{{date('Y',strtotime('-1 years'))}}" >April-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-5-{{date('Y',strtotime('-1 years'))}}" >May-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-6-{{date('Y',strtotime('-1 years'))}}" >June-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-7-{{date('Y',strtotime('-1 years'))}}" >July-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-8-{{date('Y',strtotime('-1 years'))}}" >August-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-9-{{date('Y',strtotime('-1 years'))}}" >September-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-10-{{date('Y',strtotime('-1 years'))}}" >October-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-11-{{date('Y',strtotime('-1 years'))}}" >November-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>

                                            <option value="01-01-{{date('Y')}}" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                            <option value="01-02-{{date('Y')}}" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                            <option value="01-03-{{date('Y')}}" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                            <option value="01-04-{{date('Y')}}" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                            <option value="01-05-{{date('Y')}}" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                            <option value="01-06-{{date('Y')}}" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                            <option value="01-07-{{date('Y')}}" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                            <option value="01-08-{{date('Y')}}" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                            <option value="01-09-{{date('Y')}}" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                            <option value="01-10-{{date('Y')}}" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                            <option value="01-11-{{date('Y')}}" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                            <option value="01-12-{{date('Y')}}" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                        </select>
                                        <!-- <input name="date" type="text" class="form-control datepicker" value="@if(request()->get('date')){{request()->get('from_date')}}@endif"> -->
                                    </div>
                                    <div class="col-sm-5">
                                        <label>Area</label>
                                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                            @if(Auth::user()->role_id==1)
                                            <option value="all">ALL</option>
                                            @endif
                                            @foreach($areas as $area)
                                            <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <label>Show</label>
                                        <br>
                                        <button onclick="event.preventDefault();  document.getElementById('territory_wise_report').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>
                                    </div>
                                </div>
                                </form>
                            </div> <!-- row fluid end -->
                        </div> <!-- row end -->

                        <hr class="row-fluid">



                        <div class="row">
                            <div class="col-sm-6">
                            <h4>Technician Wise Monthly</h4>
                            <form class="" target="_blank" id="technitian_wise_monthly_report" role="form" method="GET" action="{{url('/report/technitian_wise_monthly_report')}}" style="width:100%;">
                                 @csrf
                                <div class="row">
                                    <div class="col-sm-5" >
                                        <label>Month</label>
                                        <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                            <option value="01-1-{{date('Y',strtotime('-1 years'))}}" >January-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-2-{{date('Y',strtotime('-1 years'))}}" >February-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-3-{{date('Y',strtotime('-1 years'))}}" >March-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-4-{{date('Y',strtotime('-1 years'))}}" >April-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-5-{{date('Y',strtotime('-1 years'))}}" >May-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-6-{{date('Y',strtotime('-1 years'))}}" >June-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-7-{{date('Y',strtotime('-1 years'))}}" >July-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-8-{{date('Y',strtotime('-1 years'))}}" >August-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-9-{{date('Y',strtotime('-1 years'))}}" >September-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-10-{{date('Y',strtotime('-1 years'))}}" >October-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-11-{{date('Y',strtotime('-1 years'))}}" >November-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>

                                            <option value="01-01-{{date('Y')}}" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                            <option value="01-02-{{date('Y')}}" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                            <option value="01-03-{{date('Y')}}" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                            <option value="01-04-{{date('Y')}}" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                            <option value="01-05-{{date('Y')}}" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                            <option value="01-06-{{date('Y')}}" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                            <option value="01-07-{{date('Y')}}" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                            <option value="01-08-{{date('Y')}}" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                            <option value="01-09-{{date('Y')}}" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                            <option value="01-10-{{date('Y')}}" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                            <option value="01-11-{{date('Y')}}" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                            <option value="01-12-{{date('Y')}}" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                        </select>
                                        <!-- <input name="date" type="text" class="form-control datepicker" value="@if(request()->get('date')){{request()->get('from_date')}}@endif"> -->
                                    </div>
                                    <div class="col-sm-5">
                                        <label>Area</label>
                                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                            @if(Auth::user()->role_id==1)
                                            <option value="all">ALL</option>
                                            @endif
                                            @foreach($areas as $area)
                                            <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <label>Show</label>
                                        <br>
                                        <button onclick="event.preventDefault();  document.getElementById('technitian_wise_monthly_report').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="col-sm-6">
                                <h4>Technician Wise Daily</h4>
                                <form class="" target="_blank" id="technitian_wise_daily_report" role="form" method="GET" action="{{url('/report/technitian_wise_daily_report')}}" style="width:100%;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-5" >
                                            <label>Date</label>
                                            <input name="date" type="text" class="form-control datepicker" value="@if(request()->get('date')){{request()->get('from_date')}}@endif">
                                        </div>
                                        <div class="col-sm-5">
                                            <label>Area</label>
                                            <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                                @if(Auth::user()->role_id==1)
                                                <option value="all">ALL</option>
                                                @endif
                                                @foreach($areas as $area)
                                                <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Show</label>
                                            <br>
                                            <button onclick="event.preventDefault();  document.getElementById('technitian_wise_daily_report').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div> <!-- row end -->


                        <hr class="row-fluid">

                        <div class="row">
                            <div class="col-sm-6">
                            <h4>Technician Wise CSI(For All)</h4>
                            <form class="" target="_blank" id="technitian_wise_monthly_csi" role="form" method="GET" action="{{url('/report/technitian_wise_monthly_csi')}}" style="width:100%;">
                                 @csrf
                                <div class="row">
                                  <div class="col-sm-4" >
                                    <label>Month</label>
                                        <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                            <option value="01-1-{{date('Y',strtotime('-1 years'))}}" >January-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-2-{{date('Y',strtotime('-1 years'))}}" >February-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-3-{{date('Y',strtotime('-1 years'))}}" >March-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-4-{{date('Y',strtotime('-1 years'))}}" >April-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-5-{{date('Y',strtotime('-1 years'))}}" >May-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-6-{{date('Y',strtotime('-1 years'))}}" >June-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-7-{{date('Y',strtotime('-1 years'))}}" >July-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-8-{{date('Y',strtotime('-1 years'))}}" >August-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-9-{{date('Y',strtotime('-1 years'))}}" >September-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-10-{{date('Y',strtotime('-1 years'))}}" >October-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-11-{{date('Y',strtotime('-1 years'))}}" >November-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>

                                            <option value="01-01-{{date('Y')}}" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                            <option value="01-02-{{date('Y')}}" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                            <option value="01-03-{{date('Y')}}" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                            <option value="01-04-{{date('Y')}}" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                            <option value="01-05-{{date('Y')}}" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                            <option value="01-06-{{date('Y')}}" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                            <option value="01-07-{{date('Y')}}" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                            <option value="01-08-{{date('Y')}}" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                            <option value="01-09-{{date('Y')}}" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                            <option value="01-10-{{date('Y')}}" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                            <option value="01-11-{{date('Y')}}" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                            <option value="01-12-{{date('Y')}}" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                        </select>
                                        <!-- <input name="date" type="text" class="form-control datepicker" value="@if(request()->get('date')){{request()->get('from_date')}}@endif"> -->
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Area</label>
                                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                                            @if(Auth::user()->role_id==1)
                                            <option value="all">ALL</option>
                                            @endif
                                            @foreach($areas as $area)
                                            <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Type</label>
                                        <select name="TypeName" id="TypeName" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                                            <option value="">Select Type</option>
                                            <option value="Tractor">Tractor</option>
                                            <option value="Harvester">Harvester</option>
                                            <option value="Diesel Engine">Diesel Engine</option>
                                            <option value="Power Tiller">Power Tiller</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Show</label>
                                        <br>
                                        <button onclick="event.preventDefault();  document.getElementById('technitian_wise_monthly_csi').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>
                                    </div>
                                </div>
                            </form>
                            </div>

{{--                            <div class="col-sm-4">--}}
{{--                                <h4>Technician Wise CSI(For Harvester)</h4>--}}
{{--                                <form class="" target="_blank" id="technitian_wise_monthly_csi_for_harvester" role="form" method="GET" action="{{url('/report/technitian_wise_monthly_csi_for_harvester')}}" style="width:100%;">--}}
{{--                                    @csrf--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-sm-5" >--}}
{{--                                            <label>Month</label>--}}
{{--                                            <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >--}}
{{--                                                <option value="01-1-{{date('Y',strtotime('-1 years'))}}" >January-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-2-{{date('Y',strtotime('-1 years'))}}" >February-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-3-{{date('Y',strtotime('-1 years'))}}" >March-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-4-{{date('Y',strtotime('-1 years'))}}" >April-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-5-{{date('Y',strtotime('-1 years'))}}" >May-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-6-{{date('Y',strtotime('-1 years'))}}" >June-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-7-{{date('Y',strtotime('-1 years'))}}" >July-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-8-{{date('Y',strtotime('-1 years'))}}" >August-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-9-{{date('Y',strtotime('-1 years'))}}" >September-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-10-{{date('Y',strtotime('-1 years'))}}" >October-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-11-{{date('Y',strtotime('-1 years'))}}" >November-{{date('Y',strtotime('-1 years'))}}</option>--}}
{{--                                                <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>--}}

{{--                                                <option value="01-01-{{date('Y')}}" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>--}}
{{--                                                <option value="01-02-{{date('Y')}}" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>--}}
{{--                                                <option value="01-03-{{date('Y')}}" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>--}}
{{--                                                <option value="01-04-{{date('Y')}}" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>--}}
{{--                                                <option value="01-05-{{date('Y')}}" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>--}}
{{--                                                <option value="01-06-{{date('Y')}}" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>--}}
{{--                                                <option value="01-07-{{date('Y')}}" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>--}}
{{--                                                <option value="01-08-{{date('Y')}}" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>--}}
{{--                                                <option value="01-09-{{date('Y')}}" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>--}}
{{--                                                <option value="01-10-{{date('Y')}}" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>--}}
{{--                                                <option value="01-11-{{date('Y')}}" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>--}}
{{--                                                <option value="01-12-{{date('Y')}}" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>--}}
{{--                                            </select>--}}
{{--                                        <!-- <input name="date" type="text" class="form-control datepicker" value="@if(request()->get('date')){{request()->get('from_date')}}@endif"> -->--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-5">--}}
{{--                                            <label>Area</label>--}}
{{--                                            <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >--}}
{{--                                                @if(Auth::user()->role_id==1)--}}
{{--                                                    <option value="all">ALL</option>--}}
{{--                                                @endif--}}
{{--                                                @foreach($areas as $area)--}}
{{--                                                    <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-2">--}}
{{--                                            <label>Show</label>--}}
{{--                                            <br>--}}
{{--                                            <button onclick="event.preventDefault();  document.getElementById('technitian_wise_monthly_csi_for_harvester').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}

                            <div class="col-sm-6">
                            <h4>Technician Wise Six Hours</h4>
                            <form class="" target="_blank" id="technitian_wise_monthly_six_hours" role="form" method="GET" action="{{url('/report/technitian_wise_monthly_six_hours')}}" style="width:100%;">
                                 @csrf
                                <div class="row">
                                  <div class="col-sm-5" >
                                    <label>Month</label>
                                        <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                            <option value="01-1-{{date('Y',strtotime('-1 years'))}}" >January-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-2-{{date('Y',strtotime('-1 years'))}}" >February-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-3-{{date('Y',strtotime('-1 years'))}}" >March-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-4-{{date('Y',strtotime('-1 years'))}}" >April-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-5-{{date('Y',strtotime('-1 years'))}}" >May-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-6-{{date('Y',strtotime('-1 years'))}}" >June-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-7-{{date('Y',strtotime('-1 years'))}}" >July-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-8-{{date('Y',strtotime('-1 years'))}}" >August-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-9-{{date('Y',strtotime('-1 years'))}}" >September-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-10-{{date('Y',strtotime('-1 years'))}}" >October-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-11-{{date('Y',strtotime('-1 years'))}}" >November-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>

                                            <option value="01-01-{{date('Y')}}" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                            <option value="01-02-{{date('Y')}}" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                            <option value="01-03-{{date('Y')}}" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                            <option value="01-04-{{date('Y')}}" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                            <option value="01-05-{{date('Y')}}" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                            <option value="01-06-{{date('Y')}}" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                            <option value="01-07-{{date('Y')}}" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                            <option value="01-08-{{date('Y')}}" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                            <option value="01-09-{{date('Y')}}" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                            <option value="01-10-{{date('Y')}}" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                            <option value="01-11-{{date('Y')}}" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                            <option value="01-12-{{date('Y')}}" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                        </select>
                                        <!-- <input name="date" type="text" class="form-control datepicker" value="@if(request()->get('date')){{request()->get('from_date')}}@endif"> -->
                                    </div>
                                    <div class="col-sm-5">
                                        <label>Area</label>
                                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                            @if(Auth::user()->role_id==1)
                                            <option value="all">ALL</option>
                                            @endif
                                            @foreach($areas as $area)
                                            <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Show</label>
                                        <br>
                                        <button onclick="event.preventDefault();  document.getElementById('technitian_wise_monthly_six_hours').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>
                                    </div>
                                </div>
                            </form>
                            </div>


                        </div> <!-- row end -->


                        <hr class="row-fluid">

                        <div class="row">
                            <div class="col-sm-6">
                            <h4>Technician Job Cards</h4>
                            <form class="" target="_blank" id="technitian_job_card_list" role="form" method="GET" action="{{url('/report/technitian_job_card_list')}}" style="width:100%;">
                                 @csrf
                                <div class="row">
                                  <div class="col-sm-5" >
                                    <label>Month</label>
                                        <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                            <option value="01-1-{{date('Y',strtotime('-1 years'))}}" >January-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-2-{{date('Y',strtotime('-1 years'))}}" >February-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-3-{{date('Y',strtotime('-1 years'))}}" >March-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-4-{{date('Y',strtotime('-1 years'))}}" >April-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-5-{{date('Y',strtotime('-1 years'))}}" >May-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-6-{{date('Y',strtotime('-1 years'))}}" >June-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-7-{{date('Y',strtotime('-1 years'))}}" >July-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-8-{{date('Y',strtotime('-1 years'))}}" >August-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-9-{{date('Y',strtotime('-1 years'))}}" >September-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-10-{{date('Y',strtotime('-1 years'))}}" >October-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-11-{{date('Y',strtotime('-1 years'))}}" >November-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>

                                            <option value="01-01-{{date('Y')}}" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                            <option value="01-02-{{date('Y')}}" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                            <option value="01-03-{{date('Y')}}" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                            <option value="01-04-{{date('Y')}}" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                            <option value="01-05-{{date('Y')}}" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                            <option value="01-06-{{date('Y')}}" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                            <option value="01-07-{{date('Y')}}" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                            <option value="01-08-{{date('Y')}}" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                            <option value="01-09-{{date('Y')}}" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                            <option value="01-10-{{date('Y')}}" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                            <option value="01-11-{{date('Y')}}" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                            <option value="01-12-{{date('Y')}}" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-5" >
                                        <label>Technician</label>
                                        <div class="form-group{{ $errors->has('technitian_id') ? 'has-error' : '' }}">
                                            <select name="technitian_id" id="technitian_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                                <option value="">Select Technician</option>
                                                @foreach($technicians as $technician)
                                                <option value="{{$technician->id}}" >{{$technician->username}} - {{$technician->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('technitian_id'))
                                                <span class="help-block"><strong>{{ $errors->first('technitian_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Show</label>
                                        <br>
                                        <button onclick="event.preventDefault();  document.getElementById('technitian_job_card_list').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>
                                    </div>
                                </div>
                            </form>
                            </div>

                            <div class="col-sm-6">
                            <h4>Area Wise Job Cards</h4>
                            <form class="" target="_blank" id="area_wise_job_card_list" role="form" method="GET" action="{{url('/report/area_wise_job_card_list')}}" style="width:100%;">
                                 @csrf
                                <div class="row">
                                  <div class="col-sm-4" >
                                    <label>Month</label>
                                        <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                            <option value="01-1-{{date('Y',strtotime('-1 years'))}}" >January-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-2-{{date('Y',strtotime('-1 years'))}}" >February-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-3-{{date('Y',strtotime('-1 years'))}}" >March-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-4-{{date('Y',strtotime('-1 years'))}}" >April-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-5-{{date('Y',strtotime('-1 years'))}}" >May-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-6-{{date('Y',strtotime('-1 years'))}}" >June-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-7-{{date('Y',strtotime('-1 years'))}}" >July-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-8-{{date('Y',strtotime('-1 years'))}}" >August-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-9-{{date('Y',strtotime('-1 years'))}}" >September-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-10-{{date('Y',strtotime('-1 years'))}}" >October-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-11-{{date('Y',strtotime('-1 years'))}}" >November-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>

                                            <option value="01-01-{{date('Y')}}" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                            <option value="01-02-{{date('Y')}}" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                            <option value="01-03-{{date('Y')}}" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                            <option value="01-04-{{date('Y')}}" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                            <option value="01-05-{{date('Y')}}" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                            <option value="01-06-{{date('Y')}}" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                            <option value="01-07-{{date('Y')}}" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                            <option value="01-08-{{date('Y')}}" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                            <option value="01-09-{{date('Y')}}" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                            <option value="01-10-{{date('Y')}}" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                            <option value="01-11-{{date('Y')}}" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                            <option value="01-12-{{date('Y')}}" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                        </select>
                                        <!-- <input name="date" type="text" class="form-control datepicker" value="@if(request()->get('date')){{request()->get('from_date')}}@endif"> -->
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Area</label>
                                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                            <option value="all">ALL</option>
                                            @foreach($areas as $area)
                                            <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Is Approved</label>
                                        <select name="is_approved" id="is_approved" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                            <option value="0">Not Approved</option>
                                            <option value="1">Approved</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1    ">
                                        <label>Show</label>
                                        <br>
                                        <button onclick="event.preventDefault();  document.getElementById('area_wise_job_card_list').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- row end -->

                            <div class="col-sm-6">
                                <h4>Technician Wise Timely Harvester Service</h4>
                                <form class="" target="_blank" id="technician_wise_timely_harvester_service" role="form" method="GET" action="{{url('/report/technician_wise_timely_harvester_service')}}" style="width:100%;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label>Month</label>
                                            <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                                <option value="01-1-{{date('Y',strtotime('-1 years'))}}" >January-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-2-{{date('Y',strtotime('-1 years'))}}" >February-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-3-{{date('Y',strtotime('-1 years'))}}" >March-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-4-{{date('Y',strtotime('-1 years'))}}" >April-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-5-{{date('Y',strtotime('-1 years'))}}" >May-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-6-{{date('Y',strtotime('-1 years'))}}" >June-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-7-{{date('Y',strtotime('-1 years'))}}" >July-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-8-{{date('Y',strtotime('-1 years'))}}" >August-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-9-{{date('Y',strtotime('-1 years'))}}" >September-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-10-{{date('Y',strtotime('-1 years'))}}" >October-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-11-{{date('Y',strtotime('-1 years'))}}" >November-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>

                                                <option value="01-01-{{date('Y')}}" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                                <option value="01-02-{{date('Y')}}" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                                <option value="01-03-{{date('Y')}}" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                                <option value="01-04-{{date('Y')}}" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                                <option value="01-05-{{date('Y')}}" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                                <option value="01-06-{{date('Y')}}" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                                <option value="01-07-{{date('Y')}}" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                                <option value="01-08-{{date('Y')}}" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                                <option value="01-09-{{date('Y')}}" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                                <option value="01-10-{{date('Y')}}" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                                <option value="01-11-{{date('Y')}}" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                                <option value="01-12-{{date('Y')}}" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <label>Technician</label>
                                            <div class="form-group{{ $errors->has('technitian_id') ? 'has-error' : '' }}">
                                                <select name="technitian_id" id="technitian_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                                    <option value="">Select Technician</option>
                                                    <option value="0">ALL</option>
                                                    @foreach($technicians as $technician)
                                                        <option value="{{$technician->id}}" >{{$technician->username}} - {{$technician->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('technitian_id'))
                                                    <span class="help-block"><strong>{{ $errors->first('technitian_id') }}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <label>Show</label>
                                            <br>
                                            <button onclick="event.preventDefault();  document.getElementById('technician_wise_timely_harvester_service').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Show</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- row end -->
                        </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
<script>

$('.loading_process').hide();


</script>


@endsection