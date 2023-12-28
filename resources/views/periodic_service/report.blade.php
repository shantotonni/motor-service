@extends('layouts.master')
@section('title','Periodic Report')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Periodic Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Periodic Report</li>
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('show.periodic.report')}}" method="GET">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Select</option>
                                                <option value="onTime">On Time</option>
                                                <option value="early">Early</option>
                                                <option value="delay">Delay</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dateFrom">From Date</label>
                                            <input type="text" class="form-control" name="dateFrom"
                                                   value="@if($dateFrom != ''){{$dateFrom}} @endif" id="dateFrom"
                                                   placeholder="Date From YYYY-MM-DD" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dateTo">To Date</label>
                                            <input type="text" class="form-control" name="dateTo"
                                                   value="@if($dateTo != ''){{$dateTo}} @endif" id="dateTo"
                                                   placeholder="Date To YYYY-MM-DD" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <input type="submit" value="Search" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <a href="{{route('show.periodic.report')}}" class="btn btn-info form-control">Show All</a>
                        </div>
                        <div class="col-sm-4">
                            <form action="{{route('export.periodic.report')}}" method="POST">
                                @csrf
                                <input type="hidden" name="dateFrom" id="fromDate"
                                       value="@if($dateFrom != ''){{$dateFrom}} @endif">
                                <input type="hidden" name="dateTo" id="toDate"
                                       value="@if($dateTo != ''){{$dateTo}} @endif">
                                <input type="hidden" name="status" value="{{$status}}">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <input type="submit" value="Excel Export" id="exportBtn" class="btn btn-dark">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Periodic Report</h3>
                            <!-- <input type="button" class="btn btn-primary float-right" onclick="printDiv('printableArea')" value="Print " /> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive" id="printableArea">
                            <!-- <h5 class="float-right"><b>Chassis No : </b> <strong>@if(!empty($chassis))
                                {{$chassis}}
                            @endif</strong></h5> -->
                            <table id="" class="table table-bordered table-striped text-nowrap">
                                <thead>
                                <tr>
                                    <th>Customer Code</th>
                                    <th>Name</th>
                                    <th>Chassis No</th>
                                    <th>Expected Service Date</th>
                                    <th>Service Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($services) && !empty($services))
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->customer_code}}</td>
                                            <td>{{$service->customer_name}}</td>
                                            <td>{{$service->chassisno}}</td>
                                            <td>{{$service->pre_date}}</td>
                                            <td>{{$service->service_date}}</td>
                                            <td>
                                                @if($service->status === 'EARLY')
                                                    <span class="badge badge-warning">EARLY</span>
                                                @elseif($service->status === 'ON-TIME')
                                                    <span class="badge badge-success">ON-TIME</span>
                                                @elseif($service->status === 'EXPIRED')
                                                    <span class="badge badge-danger">DELAY</span>
                                                @else
                                                    <span class="badge badge-primary">{{$service->status}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <div class="float-right">
                                <p>{{$services->appends(request()->query())->links()}}</p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>
            <!--row end -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->

    <script>
        $("#chassisno").autocomplete({
            source: function (request, response) {
                ajaxFunction(request.term, response);
            },
            minLength: 1
        }).bind('keypress', function () {
            $(this).autocomplete("search");
        });

        function ajaxFunction(request, response) {
            $.ajax({
                type: "POST",
                url: "{{ route('search.by.chassis') }}",
                data: {
                    search: request,
                    _token: "{{csrf_token()}}"
                },
                dataType: "json",
                cache: false,
                success: function (res) {
                    console.log(res);
                    var transformed = res;
                    response(transformed);
                },
                error: function (msg) {
                    response([]);
                }
            })
        }
    </script>
    <script>
        function printDiv(divName) {
            $('.btn_hide').hide();
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <script>
        $('#dateFrom').datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true
        });
        $('#dateTo').datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true
        })
    </script>
    <script>
        $('#exportBtn').click(function (e) {
            var fromDate = $('#dateFrom').val();
            var toDate = $('#dateTo').val();
            $('#fromDate').val(fromDate);
            $('#toDate').val(toDate);
        });
    </script>
@endsection