@extends('layouts.master')
@section('content')
<style>
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #4CAF50;
  text-align: center;
  line-height: 30px;
  color: white;
}
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Report

            <div  class="spinner-border text-primary loading_process" role="status">
                <span class="sr-only">Loading...</span>
                
            </div>
            <span class="loading_process success" style="color:red">Please Do Not Close</span>

            <div id="myProgress">
                <div id="myBar">1%</div>
            </div>

        </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">KPI</li>
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
                            <h4>Process KPI</h4>
                            <form class="" id="kpi_1_process" role="form" method="GET" action="{{url('/kpi_1_process')}}" style="width:100%;"> 
                                 @csrf
                                <div class="row">
                                  <div class="col-sm-5" >
                                    <label>Month</label>
                                        <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
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
                                        <label>Type</label>
                                        <select  id="kpi_type_id" name="kpi_type_id" class="form-control">
                                            @foreach($kpi_types as $kpi_type)
                                            <option value="{{$kpi_type->id}}">{{$kpi_type->name}}</option>
                                            @endforeach
                                        </select>
                                        <span>Order: Technician,Tso,Engineer</span>
                                    </div>

                                    <div class="col-sm-2">
                                        <label>Process</label>
                                        <br>
                                        <!--
                                        <button onclick="event.preventDefault();  document.getElementById('kpi_1_process').submit();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Process</button>
                                        --->
                                        <button onclick="event.preventDefault(); this.disabled=true;   submit_process_kpi();" type="submit" class="btn btn-sm btn-info float-left btn-flat">Process</button>
                                    </div>
                                </div>  
                            </form>
                            </div>
                        </div> <!-- row end -->  
                        <hr class="row-fluid">


        
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
$('#myProgress').hide();
function submit_process_kpi(){
    var kpi_type_id = $('#kpi_type_id').val();
    $('.loading_process').show(); 
    $('#myProgress').show();
    document.getElementById('kpi_1_process').submit();
    if(kpi_type_id == 1 || kpi_type_id == 4 || kpi_type_id == 5){
        move(100);
    }
    if(kpi_type_id == 2){
        move(100);

    }
    if(kpi_type_id == 3){
        move(5000);
    }
    
}

</script>
<script>
var i = 0;
function move(interval) {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, interval);
    function frame() {
      if (width >= 99) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width  + "%";
      }
    }
  }
}
</script>

@endsection