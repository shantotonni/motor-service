@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">SSR Salary List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">SSR Salary</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form id="filterform" action="{{ url('/ssr-salary-list') }}" method="get">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="CallType">Period</label>
                                <input type="text" id="datepicker" name="Period" value="{{isset($Period) ? $Period : '' }}" class="form-control from_date" placeholder="From Date" autocomplete="off">
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
                    <div class="card-header">
                        <h3 class="card-title">
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 4)
                            <a href="{{ url('ssr-salary-all-verified'.'/'.$Period) }}" class="btn btn-info">All Verify</a>
                            @endif

                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5)
                            <a href="{{ url('ssr-salary-all-approved'.'/'.$Period) }}" class="btn btn-info">All Approved</a>
                            @endif

                        </h3>
                        @if(isset($Period) && !empty($Period))
                        <div class="row">
                            <div class="col-sm-2">
                                <form action="{{ route('ssr.salary.all.pdf.print') }}" class="float-left" method="post" target="_blank">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $Period }}" name="Period">
                                    <button type="submit" class="btn btn-info">Print All</button>
                                </form>
                            </div>
                            <div class="col-sm-5"></div>
                            <div class="col-sm-4" >
                                <form action="{{ route('ssr.salary.print.pdf') }}" class="float-right" method="post" target="_blank">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $Period }}" name="Period">
                                    <button type="submit" class="btn btn-info">Salary Of Service & Sales Representative</button>
                                </form>
                            </div>
                            <div class="col-sm-1" >
                                <form action="{{ route('ssr.salary.export') }}" class="float-right" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $Period }}" name="Period">
                                    <button type="submit" class="btn btn-info">Export</button>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm table-condensed small">
                            <thead>
                                <tr>
                                    {{-- <th><input type="checkbox" class="btn btn-success" id="checkAll"></th>--}}
                                    <th>SN</th>
                                    <th>Period</th>
                                    <th>Userid</th>
                                    <th>Staff id</th>
                                    <th>Name</th>
                                    <th>Basic Salary</th>
                                    <th>Fuel Cost</th>
                                    <th>Daily Allowance</th>
                                    <th>Total service</th>
                                    <th>Service Payment</th>
                                    <th>Sales Item Count</th>
                                    <th>Sales Incentive</th>
                                    <th>Sim And Internet</th>
                                    <th>Spare Parts TP</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salaries as $key => $salary)
                                <tr>
                                    {{-- <td><input type="checkbox" name="ids" class="btn btn-success" value="{{ $salary->Period }}-{{ $salary->userid }}-{{ $salary->staffid }}"></td>--}}
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $salary->Period }}</td>
                                    <td>{{ $salary->userid }}</td>
                                    <td>{{ $salary->staffid }}</td>
                                    <td>{{ $salary->name }}</td>
                                    <td>{{ $salary->Basic_Salary }}</td>
                                    <td>{{ $salary->Fuel_Cost }}</td>
                                    <td>{{ $salary->Daily_Allowance }}</td>
                                    <td>{{ $salary->Total_service }}</td>
                                    <td>{{ $salary->Service_Payment }}</td>
                                    <td>{{ $salary->SalesItemCount }}</td>
                                    <td>{{ $salary->Sales_Incentive }}</td>
                                    <td>{{ $salary->Sim_And_Internet }}</td>
                                    <td>{{ $salary->Spare_Parts_TP }}</td>
                                    <td>
                                        @if($salary->Status == 'generated')
                                        <span class="badge badge-warning">Generated</span>
                                        @elseif($salary->Status == 'checked')
                                        <span class="badge badge-info">Checked</span>
                                        @elseif($salary->Status == 'verified')
                                        <span class="badge badge-primary">Verified</span>
                                        @elseif($salary->Status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/ssr-salary-details/'.$salary->Period.'/'.$salary->userid.'/'.$salary->staffid)}}" class="btn btn-xs btn-primary" title="Show"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $salaries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.title = 'SSR Salary';
</script>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yymm'
        });
    });
</script>
@endsection