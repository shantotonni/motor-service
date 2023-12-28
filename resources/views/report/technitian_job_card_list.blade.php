@extends('layouts.master')
@section('content')
<head>
<meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
</head>
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
            <li class="breadcrumb-item active"></li>
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
                <h4>Technician Job Card List  {{date('M-Y',strtotime(request()->get('date')))}}
                   <!-- <a href="" onclick="exportF(this,'job_card','technician_job_card_list{{date('d_m_Y')}}')" id="bt"><button class="btn btn-flat btn-success" style="float:right;" >ExportExcel</button></a> -->
                </h4>
                <div class="table-responsive">
                <table id="table_export" class="table table-bordered table-striped">
                <thead>
                      <th>Id</th>
                      <th>StaffId</th>
                      <th>Service Date</th>
                      <th>Approve</th>
                      <th>CSI</th>
                      <th>6hr</th>
                      <th>Area</th>
                      <th>Territory</th>
                      <th>Engineer</th>
                      <th>Technician</th>
                      <th>Participant</th>
                      <th>Product</th>
                      <th>Call type</th>
                      <th>Service type</th>
                      <th>Customer name</th>
                      <th>Customer moblie</th>
                      <th>Buy date</th>
                      <th>Visited date</th>
                      <th>Service wanted at</th>
                      <th>Service start at</th>
                      <th>Service end at</th>
                      <th>Hour</th>
                      <th>Six Hour</th>
                      <th>Service income</th>
                      <th>Chassis Number</th>
                      
                </thead>
                <tbody>
                    @foreach ($job_cards as $job_card)
                          <tr style="@if($job_card->is_approved == 0){{'background-color:#ff9999;'}}@endif">
                          <td>{{$job_card->id}}</td>
                          <td>{{$user->username}}</td>
                          <td>{{date("d-m-Y",strtotime( $job_card->service_date))}}</td>
                          <td>@if($job_card->is_approved==1){{'Yes'}}@else{{"No"}}@endif</td>
                          <td>@if($job_card->isCalled==1)<button data-job_card_no="{{$job_card->job_card_no}}"  class="openModal btn btn-xs btn-primary btn-flat" type="button">CSI/6H</button>@else{{"No"}}@endif</td>
                          <td>{{$job_card->six_hours}}</td>
                          <td>{{$job_card->area_name}}</td>
                          <td>{{$job_card->territory_name}}</td>
                          <td>{{$job_card->engineer_name}}</td>
                          <td>{{$job_card->technitian_name}}</td>
                          <td>{{$job_card->participant_name}}</td>
                          <td>{{$job_card->product_name}}</td>
                          <td>{{$job_card->call_type_name}}</td>
                          <td>{{$job_card->service_type_name}}</td>
                          <td>{{$job_card->customer_name}}</td>
                          <td>{{$job_card->customer_moblie}}</td>
                          <td>@if($job_card->buy_date){{date("d-m-Y",strtotime( $job_card->buy_date))}}@endif</td>
                          <td>@if($job_card->visited_date){{date("d-m-Y",strtotime( $job_card->visited_date))}}@endif</td> 
                          <td>@if($job_card->service_wanted_at){{date("d-m-Y H:i:s",strtotime( $job_card->service_wanted_at))}}@endif</td>
                          <td>@if($job_card->service_start_at){{date("d-m-Y H:i:s",strtotime( $job_card->service_start_at))}}@endif</td>
                          <td>@if($job_card->service_end_at){{date("d-m-Y H:i:s",strtotime( $job_card->service_end_at))}} @endif</td>
                          <td>{{$job_card->hour}}</td>
                          <td>{{$job_card->is_six_hour}}</td>
                          <td>{{$job_card->service_income}}</td>
                          <td>{{$job_card->chassis_number}}</td>
                          
                      </tr>
                    @endforeach
                  </tbody>
              
              </table>
                        
                </div> <!-- row fluid end -->      
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

function exportF(elem,table_id,report_name) {
    var table = document.getElementById(table_id);
    var html = table.outerHTML;
    var url = 'data:application/vnd.ms-excel;charset=utf-8;base64,' + encodeURIComponent(html); // Set your html table into url 
    elem.setAttribute("href", url);
    elem.setAttribute("download", report_name+".xls"); // Choose the file name
    return false;
}


</script>

<!-- Modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">CSI & SIX HOURS</h5><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul id="csi_data">
          </ul>
      </div>
      
    </div>
  </div>
</div>
<script>document.title = "technician_wise_job_card_list-{{date('d_m_Y')}}";</script>
<script type="text/javascript">
$(document).on("click", ".openModal", function () {
    $('#csi_data').empty()
    $("#csi_data").append("<li>Loading .......</li>");
    var total = 0; 
    var count = 0;

    var job_card_no = $(this).data("job_card_no");
    $.get( "{{url('/')}}/json/get_csi_of_job_card", { job_card_no: job_card_no } )
        .done(function( data ) {
            total = 0;
            count = 0;
            $('#csi_data').empty()
            $.each(data, function(k, v) {
                $("#csi_data").append("<li>"+v.Question+"     = "+v.Marks+"</li>");
                total +=parseInt(v.Marks) 
                count +=1;
            });
            $("#csi_data").append("<li>Total="+total+"        Outof="+count*5+"</li>");
           
        });
     //$("#delete_modal_form").attr("action", "{{url('/job_card')}}/" + delId);
     //$(".modal-body #delete_id").val( delId );

     $("#myModal").modal("show");  
     
});
</script>


@endsection