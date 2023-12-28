@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">SSR Salary Module List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">SSR Salary Module</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form id="filterform" action="{{ url('/ssr-salary-module') }}" method="get">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="CallType">Period</label>
                                <input type="text" name="from_date" id="datepicker1" value="{{isset($from_date) ? $from_date : '' }}" class="form-control from_date" placeholder="From Date" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="CallType">Period</label>
                                <input type="text" name="to_date" id="datepicker2" value="{{isset($to_date) ? $to_date : '' }}" class="form-control to_date" placeholder="From Date" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group" style="margin-top: 30px;">
                                <button type="submit" class="btn btn-primary"><i class="ti-filter"></i> Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm table-condensed small">
                            <thead>
                                <tr>
                                    {{-- <th><input type="checkbox" class="btn btn-success" id="checkAll"></th>--}}
                                    <th>SN</th>
                                    <th>Userid</th>
                                    <th>Staff id</th>
                                    <th>Name</th>
                                    <th>Basic Salary</th>
{{--                                    <th>Fuel Cost</th>--}}
                                    <th>Daily Allowance</th>
                                    <th>Total service</th>
                                    <th>Service Payment</th>
                                    <th>Sales Item Count</th>
                                    <th>Sales Incentive</th>
                                    <th>Sim And Internet</th>
                                    <th>Spare Parts TP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salaries as $key => $salary)
                                <tr>
                                    {{-- <td><input type="checkbox" name="ids" class="btn btn-success" value="{{ $salary->Period }}-{{ $salary->userid }}-{{ $salary->staffid }}"></td>--}}
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $salary->userid }}</td>
                                    <td>{{ $salary->staffid }}</td>
                                    <td>{{ $salary->name }}</td>
                                    <td>{{ $salary->Basic_Salary }}</td>
{{--                                    <td>{{ $salary->Fuel_Cost }}</td>--}}
                                    <td>{{ $salary->Daily_Allowance }}</td>
                                    <td>{{ $salary->Total_service }}</td>
                                    <td>{{ $salary->Service_Payment }}</td>
                                    <td>{{ $salary->SalesItemCount }}</td>
                                    <td>{{ $salary->Sales_Incentive }}</td>
                                    <td>{{ $salary->Sim_And_Internet }}</td>
                                    <td>{{ number_format($salary->Spare_Parts_TP, 0) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.title = 'SSR Salary Module';
</script>
<script>
    $(function() {
        $("#datepicker1").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $("#datepicker2").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
@endsection