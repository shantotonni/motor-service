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
            <li class="breadcrumb-item active">KPI Master</li>
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
                            <h4>KPI MASTER REPORT</h4>
                            <form class="" id="kpi_master" role="form" method="POST" action="{{route('kpi_master_import')}}" style="width:100%;" enctype="multipart/form-data"> 
                                 @csrf
                                <div class="row">
                                  <div class="col-sm-5" >
                                        <div class="form-group">
                                            <label>Month</label>
                                            <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                                <option value="{{date('Y',strtotime('-1 years'))}}-12-01" >December-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="{{date('Y')}}-01-01" @if(date('m') =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-02-01" @if(date('m') =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-03-01" @if(date('m') =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-04-01" @if(date('m') =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-05-01" @if(date('m') =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-06-01" @if(date('m') =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-07-01" @if(date('m') =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-08-01" @if(date('m') =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-09-01" @if(date('m') =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-10-01" @if(date('m') =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-11-01" @if(date('m') =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-12-01" @if(date('m') =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-sm-5" >
                                        <div class="form-group">
                                            <label for="fileInput">Select File (<span style="color:red;font-size: 12px;">*Format: .xlsx</span>)</label>
                                            <input type="file" name="filename" class="form-control-file" id="fileInput" required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group" style="margin-top: 30px;">
                                            <button  type="submit" class="btn btn-sm btn-info float-left btn-flat">Upload</button>
                                        </div>
                                    </div>
                                </div>  
                            </form>
                            </div>
                        </div> <!-- row end -->  
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
      
      <div class="row">
          <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                            <form action="{{route('kpi_master.filter')}}" method="GET">
                            @csrf
                            {{method_field('GET')}}
                            <div class="row">
                                <div class="col-sm-5" >
                                        <div class="form-group small">
                                            <label>Month</label>
                                            <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                                <option value="{{date('Y',strtotime('-1 years'))}}-12-01" >December-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="{{date('Y')}}-01-01" @if((date('m', strtotime($inputs['date']))) == '01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-02-01" @if((date('m', strtotime($inputs['date']))) == '02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-03-01" @if((date('m', strtotime($inputs['date']))) == '03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-04-01" @if((date('m', strtotime($inputs['date']))) == '04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-05-01" @if((date('m', strtotime($inputs['date']))) == '05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-06-01" @if((date('m', strtotime($inputs['date']))) == '06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-07-01" @if((date('m', strtotime($inputs['date']))) == '07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-08-01" @if((date('m', strtotime($inputs['date']))) == '08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-09-01" @if((date('m', strtotime($inputs['date']))) == '09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-10-01" @if((date('m', strtotime($inputs['date']))) == '10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-11-01" @if((date('m', strtotime($inputs['date']))) == '11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-12-01" @if((date('m', strtotime($inputs['date']))) == '12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-sm-5" >
                                        <div class="form-group small">
                                            <label>Designation</label>
                                            <select name="designation" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                                @foreach($designations as $designation)
                                                    <option value="{{$designation->name}}" @if($designation->name == $inputs['designation']) selected @endif>{{$designation->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group" style="margin-top: 30px;">
                                            <button  type="submit" class="btn btn-sm btn-info float-left btn-flat"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-4">
                            <form action="{{route('kpi_master_search')}}" method="get">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group small">
                                            <label for="searchInput">Search</label>
                                            <input type="text" class="form-control" name="searchInput" id="searchInput" placeholder="Enter staff id">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group" style="margin-top: 30px;">
                                                <button  type="submit" class="btn btn-sm btn-info float-left btn-flat"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div> 
                    <div class="card-body table-responsive text-nowrap">
                        <table class="table table-bordered small table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">SL.</th>
                                    <th scope="col">Staff Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Period</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Region</th>
                                    <th scope="col">Territory</th>
                                    <th scope="col">Warranty Service Target</th>
                                    <th scope="col">Warranty Service Actual</th>
                                    <th scope="col">Warranty Service (%)</th>
                                    <th scope="col">Post Warranty Service Target</th>
                                    <th scope="col">Post Warranty Service Actual</th>
                                    <th scope="col">Post Warranty Service (%)</th>
                                    <th scope="col">CSI (%)</th>
                                    <th scope="col">6 Hour (%)</th>
                                    <th scope="col">Tracking</th>
                                    <th scope="col">In Apps</th>
                                    <th scope="col">Apps (%)</th>
                                    <th scope="col">Service Income Target</th>
                                    <th scope="col">Service Income Actual</th>
                                    <th scope="col">Service Income (%)</th>
                                    <th scope="col">Spare Parts Target</th>
                                    <th scope="col">Spare Parts Actual</th>
                                    <th scope="col">Spare Parts (%)</th>
                                    <th scope="col">Spare Parts Tractor Target</th>
                                    <th scope="col">Spare Parts Tractor Actual</th>
                                    <th scope="col">Spare Parts Tractor (%)</th>
                                    <th scope="col">Spare Parts Nm And Pt Target</th>
                                    <th scope="col">Spare Parts Nm And Pt Actual</th>
                                    <th scope="col">Spare Parts Nm And Pt (%)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kpis as $kpi)
                                    <tr>
                                        <td class="text-left">{{$kpi['id']}}</td>
                                        <td class="text-left">{{$kpi['serial']}}</td>
                                        <td class="text-left">{{$kpi['staff_id']}}</td>
                                        <td class="text-left">{{$kpi['name']}}</td>
                                        <td class="text-left">{{ date('d-M-Y',strtotime($kpi['period'])) }}</td>
                                        <td class="text-left">{{$kpi['designation']}}</td>
                                        <td class="text-left">{{$kpi['region']}}</td>
                                        <td class="text-left">{{$kpi['territory']}}</td>
                                        <td class="text-right">{{$kpi['warranty_service_target']}}</td>
                                        <td class="text-right">{{$kpi['warranty_service_actual']}}</td>
                                        <td class="text-right">{{$kpi['warranty_service_percentage']}}</td>
                                        <td class="text-right">{{$kpi['post_warranty_service_target']}}</td>
                                        <td class="text-right">{{$kpi['post_warranty_service_actual']}}</td>
                                        <td class="text-right">{{$kpi['post_warranty_service_percentage']}}</td>
                                        <td class="text-right">{{$kpi['csi_percentage']}}</td>
                                        <td class="text-right">{{$kpi['six_hour_percentage']}}</td>
                                        <td class="text-right">{{$kpi['tracking']}}</td>
                                        <td class="text-right">{{$kpi['in_apps']}}</td>
                                        <td class="text-right">{{$kpi['apps_percentage']}}</td>
                                        <td class="text-right">{{$kpi['service_income_target']}}</td>
                                        <td class="text-right">{{$kpi['service_income_actual']}}</td>
                                        <td class="text-right">{{$kpi['service_income_percentage']}}</td>
                                        <td class="text-right">{{$kpi['spare_parts_target']}}</td>
                                        <td class="text-right">{{$kpi['spare_parts_actual']}}</td>
                                        <td class="text-right">{{$kpi['spare_parts_percentage']}}</td>
                                        <td class="text-right">{{$kpi['spare_parts_tractor_target']}}</td>
                                        <td class="text-right">{{$kpi['spare_parts_tractor_actual']}}</td>
                                        <td class="text-right">{{$kpi['spare_parts_tractor_percentage']}}</td>
                                        <td class="text-right">{{$kpi['spare_parts_nm_and_pt_target']}}</td>
                                        <td class="text-right">{{$kpi['spare_parts_nm_and_pt_actual']}}</td>
                                        <td class="text-right">{{$kpi['spare_parts_nm_and_pt_percentage']}}</td>
                                        <td>
                                            <a href="/motor-service/kpi-master/detail/{{$kpi['id']}}" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right mt-3">
                            {{$kpis->links()}}
                        </div>
                    </div>
                </div>
          </div>
      </div>
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
<script>

$('.loading_process').hide();


</script>


@endsection