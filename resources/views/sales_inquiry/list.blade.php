@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sales Inquiry List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Sales Inquiry</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form id="filterform">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="CallType">From Date</label>
                                    <input type="text" id="datepicker" name="from_date" class="form-control from_date" placeholder="From Date" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="CallType">To Date</label>
                                    <input type="text" id="datepicker2" name="to_date" class="form-control to_date" placeholder="To Date" autocomplete="off">
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
                            <h3 class="card-title">Sales Inquiry</h3>
                            <form action="{{ route('sales.inquiry.export') }}" class="float-right" method="post">
                                {{ csrf_field() }}
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-info">Export</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="sales_inquiry" class="table table-bordered table-striped table-sm table-condensed small">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>document.title = 'Sales Inquiry List';</script>

    <script>
        $(function() {
            $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
            $("#datepicker2").datepicker( {dateFormat: 'yy-mm-dd'});
        });
    </script>
    <script>
        $(function() {
            let table = $('#sales_inquiry').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                "order":[[0,'desc']],
                ajax: "{!! route('get.sales.inquiry') !!}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'village_name', name: 'village_name',title:'Village Name' },
                    { data: 'inquiry_name', name: 'inquiry_name',title:'Name' },
                    { data: 'inquiry_mobile', name: 'inquiry_mobile',title:'Mobile' },
                    { data: 'MotorsMSRCode', name: 'MotorsMSRCode',title:'MotorsMSRCode' },
                    { data: 'upazilla_name', name: 'upazilla_name', title:'Upazilla name' },
                    { data: 'InquiryTypeName', name: 'InquiryTypeName', title:'Type Name' },
                    { data: 'SSRName', name: 'SSRName', title:'SSR Name' },
                    { data: 'SSRMobile', name: 'SSRMobile', title:'SSR Mobile' },
                    { data: 'ProductCode', name: 'ProductCode', title:'Product Code' },
                    { data: 'ProductName', name: 'ProductName', title:'Product Name' },
                    { data: 'quantity', name: 'quantity', title:'Quantity' },
                    { data: 'excepted_quantity', name: 'excepted_quantity', title:'Excepted Quantity' },
                    { data: 'UseTypeName', name: 'UseTypeName', title:'Use Type Name' },
                    { data: 'ImplementName', name: 'ImplementName', title:'Implement Name' },
                    { data: 'VisitResultName', name: 'VisitResultName', title:'Visit Result Name' },
                    { data: 'OccupationName', name: 'OccupationName', title:'Occupation Name' },
                    { data: 'customer_brand_model', name: 'customer_brand_model', title:'Model' },
                    { data: 'inquirytype', name: 'inquirytype', title:'Inquiry type' },
                    { data: 'reference_no', name: 'reference_no', title:'Reference no' },
                    { data: 'CreatedAt', name: 'CreatedAt', title:'Created At' },
                    { data: 'Status', name: 'Status', title:'Status' },
                    { data: 'entryby', name: 'entryby', title:'Entry BY' },
                    { data: 'UserName', name: 'UserName', title:'Name' },
                ]
            });

            $("#filterform").on('submit', function(e) {

                console.log($(".from_date").val());
                console.log($(".to_date").val());

                table.ajax.url('get-sales-inquiry?from_date=' + $(".from_date").val() +
                        '&to_date=' + $(".to_date").val())
                    .load();
                e.preventDefault();
            });
        });


    </script>
@endsection
