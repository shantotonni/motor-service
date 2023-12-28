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
                <h4>Technician Wise Monthly CSI Report {{date('M-Y',strtotime(request()->get('date')))}} (For Harvester)
                <a href="" onclick="exportF(this,'job_card','technician_wise_monthly_csi_report{{date('d_m_Y')}}')" id="bt"><button class="btn btn-flat btn-success" style="float:right;" >ExportExcel</button></a>
                
                </h4>
                <div class="row-fluid">
                   <table id="job_card" class="table table-bordered table-condensed">
                      <thead>
                          <tr>
                              <th>Area</th>
                              <th>StaffId</th>
                              <th>Technician Name</th>
                              <th>Number Of Feedback</th>
                              <th>Total JobCard</th>
                              <th>Total Marks</th>
                              <th>OutOf</th>
                              <th>%</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php 
                          $grandOutOf=0;
                          $grandTotalMarks=0;
                          $total_job_card = 0;
                          ?>
                          @foreach($job_cards as $job_card)
                              <tr>
                                  <td>{{$job_card->AreaName}}</td>
                                  <td>{{$job_card->staff_id}}</td>
                                  <td>{{$job_card->TechnicianName}}</td>
                                  <td>{{$job_card->no_of_feedback}}</td>
                                  <td>{{$job_card->TotalFeedback}}</td>
                                  <td>{{$job_card->TotalMarks}}</td>
                                  <td>{{$job_card->OutOf}}</td>
                                  <td>{{$job_card->CSI_Percentage}}</td>
                                  <?php
                                    $grandTotalMarks += $job_card->TotalMarks;
                                    $grandOutOf += $job_card->OutOf;
                                  $total_job_card += $job_card->TotalFeedback;
                                  ?>
                              </tr>
                          @endforeach
                          <tr>
                              <td>TOTAL</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>{{ $total_job_card }}</td>
                              <td>{{$grandTotalMarks}}</td>
                              <td>{{$grandOutOf}}</td>
                              <td>
                                  @if (empty($grandTotalMarks))
                                      0
                                  @else
                                      {{round($grandTotalMarks*100/$grandOutOf,2)}}
                                  @endif

                              </td>
                          </tr>
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

</script>


@endsection