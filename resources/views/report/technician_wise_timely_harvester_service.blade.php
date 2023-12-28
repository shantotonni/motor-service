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
                            <h4>Technician Wise Timely Harvester Service Report {{date('M-Y',strtotime(request()->get('date')))}}
                                <a href="" onclick="exportF(this,'job_card','technician_wise_monthly_six_hours_report{{date('d_m_Y')}}')" id="bt"><button class="btn btn-flat btn-success" style="float:right;" >ExportExcel</button></a>
                            </h4>
                            <div class="row-fluid">
                                <table id="job_card" class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Area Name</th>
                                            <th>staff Id</th>
                                            <th>Technician Name</th>
                                            <th>Number Of Feedback</th>
                                            <th>Avg Number</th>
                                            <th>%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<!--                                    --><?php
//                                         $grandTotalSixHourPrcnt = 0;
//                                    ?>
                                    @foreach($job_cards as $job_card)
                                        <tr>
                                            <td>{{$job_card->Category}}</td>
                                            <td>{{$job_card->AreaName}}</td>
                                            <td>{{$job_card->staff_id}}</td>
                                            <td>{{$job_card->TechnicianName}}</td>
                                            <td>{{$job_card->no_of_feedback}}</td>
                                            <td>{{$job_card->AvgNumber}}</td>
                                            <td>
                                                @php
                                                    $percentage = ($job_card->AvgNumber * 100) / 5;
                                                @endphp
                                                {{ $percentage }}
                                            </td>
                                        </tr>
<!--                                        --><?php
//                                        $grandTotalSixHourPrcnt += $job_card->SixHourPrcnt;
//                                        ?>
                                    @endforeach
{{--                                    <tr>--}}
{{--                                        <td>TOTAL</td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td>--}}
{{--                                            @if (empty($grandTotalSixHourPrcnt))--}}
{{--                                                0--}}
{{--                                            @else--}}

{{--                                                {{round($grandTotalSixHourPrcnt/count($job_cards),2)}}--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
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
            elem.setAttribute("download", "technician_wise_monthly_report_{{date('d_m_Y')}}.xls"); // Choose the file name
            return false;
        }


    </script>


@endsection