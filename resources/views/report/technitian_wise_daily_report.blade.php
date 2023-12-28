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
                <h4>Technician Wise Daily Report ( {{request()->get('date')}} ) 
                <a href="" onclick="exportF(this,'job_card','technician_wise_daily_report{{date('d_m_Y')}}')" id="bt"><button class="btn btn-flat btn-success" style="float:right;" >ExportExcel</button></a>
                
                </h4>
                <div class="row-fluid">
                <table id="job_card" class="table table-bordered table-condensed">
                      <thead>
                          <th>Area</th>
                          <th>Staff Id</th>
                          <th>Technitian Name</th>
                          <th>Monthly Target</th>
                          <th>Done</th>
                          <th>Ach</th>
                      </thead>
                      <tbody>
                         <?php $total_target = 0; $total_done = 0;?>
                          @foreach($job_cards as $job_card)
                          <?php $target = 0;?>
                          <tr>
                              <td>{{$job_card->area_name}}</td>
                              <td>{{$job_card->username}} </td>
                              <td>{{$job_card->name}}</td>
                              <td>{{$job_card->target_total}}</td>
                              <td>{{$job_card->total}}</td>
                              <td>
                                 @if($job_card->target_total > 0)
                                 {{round($job_card->total*100/$job_card->target_total)}} 
                                 @else
                                 0
                                 @endif
                                 %
                              </td>
                          </tr>
                          <?php 
                          $total_done += $job_card->total;
                          $total_target += $job_card->target_total;
                          ?>
                          @endforeach
                          <tr>
                              <td><strong>Total</strong></td>
                              <td></td>
                              <td></td>
                              <td>{{$total_target}}</td>
                              <td>{{$total_done}}</td>
                              <td>
                              @if($total_target > 0)
                                   {{round(($total_done / $total_target) * 100,2) }}
                              @else
                                100
                              @endif
                                 % 
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