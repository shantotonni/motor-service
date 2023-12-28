@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">SSR Expense List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">SSR Expense</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form id="filterform" action="{{ url('/ssr-expense') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="CallType">Period</label>
                                    <input type="text" id="datepicker" name="period" class="form-control from_date" placeholder="From Date" autocomplete="off">
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
                            <h3 class="card-title">SSR Expense</h3><br>
                            <a href="{{route('create.ssr.expense')}}" class="btn btn-sm btn-success float-left btn-flat">Add Expense</a>
                            <a href="{{URL::to('/')}}/export-ssr-expense" class="btn btn-sm btn-info float-right btn-flat">Export</a>
{{--                            <form action="{{ route('sales.inquiry.export') }}" class="float-right" method="post">--}}
{{--                                {{ csrf_field() }}--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <button type="submit" class="btn btn-info">Export</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm table-condensed small">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>SSR Name</th>
                                        <th>Opening KM</th>
                                        <th>Closing KM</th>
                                        <th>Bike No</th>
                                        <th>Period</th>
{{--                                        <th>Image</th>--}}
                                        <th>Opening Image</th>
                                        <th>Closing Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($ssr_expense as $key => $expense)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ isset($expense->user) ? $expense->user->name : '' }}</td>
                                        <td>{{ $expense->opening_km }}</td>
                                        <td>{{ $expense->closing_km }}</td>
                                        <td>{{ $expense->bike_no }}</td>
                                        <td>{{ $expense->period }}</td>
                                        <td><img src="{{ url('/ssr_expense/'.$expense->opening_image) }}" height="60" width="80" alt=""></td>
                                        <td>
                                            <img src="{{ url('/ssr_expense/'.$expense->closing_image) }}" height="80" width="60" alt="">
                                        </td>
                                        <td>
                                        {{--    <a href="{{url('/ssr-expense-show/'.$expense->id)}}" class="btn btn-xs btn-primary" title="Show" ><i class="fa fa-eye"></i></a> --}}
                                           <a href="{{url('/edit-ssr-expense/'.$expense->id)}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
{{--                                            <a id="openDeleteModal" data-toggle="modal" data-id="{{$expense->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $ssr_expense->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>document.title = 'SSR Expense List';</script>
    <script>
        $(function() {
            $("#datepicker").datepicker( {dateFormat: 'yymm'});
        });
    </script>
@endsection
