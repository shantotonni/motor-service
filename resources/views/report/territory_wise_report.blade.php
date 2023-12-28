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
            <li class="breadcrumb-item active">Attendance</li>
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
                <h4>Territory Wise Monthly Report - {{date('M-Y')}}
                <a href="" onclick="exportF(this,'job_card','territory_wise_monthly_report{{date('d_m_Y')}}')" id="bt"><button class="btn btn-flat btn-success" style="float:right;" >ExportExcel</button></a>
                </h4>
                <div class="row-fluid">
                   <table id="job_card" class="table table-bordered table-condensed">
                      <thead>
                          <th>Area</th>
                          <th>Territory</th>
                          <th>Target</th>
                          <th>Done</th>
                          <th>Ach</th>
                      </thead>
                      <tbody>
                          @foreach($job_cards as $job_card)
                          <tr>
                              <td>{{$job_card->area_name}}</td>
                              <td>{{$job_card->territory_name}}</td>
                              <td>{{$target = $obj->get_territory_wise_target($job_card->territory_id,request()->get('date'))}}</td>
                              <td>{{$job_card->total}}</td>
                              <td>
                                @if($target > 0)
                                   {{round(($job_card->total / $target) * 100,2) }}
                                @else
                                100
                                @endif
                                 %
                              </td>
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

function exportF(elem) {
    var table = document.getElementById("job_card");
    var html = table.outerHTML;
    var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
    elem.setAttribute("href", url);
    elem.setAttribute("download", "territory_wise_report_{{date('d_m_Y')}}.xls"); // Choose the file name
    return false;
}

</script>


@endsection