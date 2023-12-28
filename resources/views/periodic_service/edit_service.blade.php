@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Service</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Service</li>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Service</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="text-center alert alert-info font-weight-bold">Insert {{$service->periodic_service->service_name}} Service Information</h5>
                            </div>
                        </div>
                        <form action="{{route('update.service.info')}}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{$service->id}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="periodic_service_id">Periodic Service Number</label>
                                        <input type="text" id="periodic_service_id" class="form-control" name="periodic_service_id" value="{{$service->periodic_service_id}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service_date">Service Date</label>
                                        <input type="text" id="service_date" class="form-control ServiceDate" name="service_date" value="{{date('Y-m-d',strtotime($service->next_service_date))}}" placeholder="YYYY-MM-DD" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service_hour">Service Hour</label>
                                        <input type="number" id="service_hour" class="form-control" name="service_hour" value="{{$service->service_hour}}" placeholder="Service Hour" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service_taken_place">Service Taken Place</label>
                                        <select name="service_taken_place" id="service_taken_place" class="form-control" required>
                                            <option value="Customer Point" @if($service->service_taken_place=='Customer Point'){{"selected"}}@endif>Customer Point</option>
                                            <option value="Dealer Point" @if($service->service_taken_place=='Dealer Point'){{"selected"}}@endif>Dealer Point</option>
                                            <option value="Service Center" @if($service->service_taken_place=='Service Center'){{"selected"}}@endif>Service Center</option>
                                            <option value="3S Center" @if($service->service_taken_place=='3S Center'){{"selected"}}@endif>3S Center</option>
                                            <option value="ASC" @if($service->service_taken_place=='ASC'){{"selected"}}@endif>ASC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service_done_by">Service Done By</label>
                                        <select name="service_done_by" id="service_done_by" class="form-control" required>
                                            <option value="TSA" @if($service->service_done_by=='TSA'){{"selected"}}@endif>TSA</option>
                                            <option value="Customer" @if($service->service_done_by=='Customer'){{"selected"}}@endif>Customer</option>
                                            <option value="Dealer" @if($service->service_done_by=='Dealer'){{"selected"}}@endif>Dealer</option>
                                            <option value="SC" @if($service->service_done_by=='SC'){{"selected"}}@endif>SC</option>
                                            <option value="ASC" @if($service->service_done_by=='ASC'){{"selected"}}@endif>ASC</option>
                                            <option value="3S" @if($service->service_done_by=='3S'){{"selected"}}@endif>3S</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service_done_by_name">Name</label>
                                        <input type="text" id="service_done_by_name" class="form-control" name="service_done_by_name" value="{{$service->service_done_by_name}}" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="customer_code">Customer</label>
                                        <select name="customer_code" id="customer_code" onchange="setCustomerValues(this)" class="form-control select2" required>
                                            <option value="">-- Select Customer --</option>
                                            @foreach($customers as $cust)
                                                <option value="{{$cust->CustomerCode}}" @if($cust->CustomerCode==$service->customer_code) {{"selected"}} @endif>{{$cust->CustomerCode}} - {{$cust->CustomerName1}}</option>
                                            @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="remarks">Remarks</label>
                                        <select name="remarks" id="remarks" class="form-control">
                                            <option value="">--- Select Remarks ---</option>
                                            <option value="Season time" @if($service->remarks=="Season time") {{"selected"}} @endif>Season time</option>
                                            <option value="Request from customer" @if($service->remarks=="Request from customer") {{"selected"}} @endif>Request from customer</option>
                                            <option value="Delay season" @if($service->remarks=="Delay season") {{"selected"}} @endif>Delay season</option>
                                            <option value="Tractor off road" @if($service->remarks=="Tractor off road") {{"selected"}} @endif>Tractor off road</option>
                                            <option value="Bad weather conditions" @if($service->remarks=="Bad weather conditions") {{"selected"}} @endif>Bad weather conditions</option>
                                            <option value="Customer denied for taking service" @if($service->remarks=="Customer denied for taking service") {{"selected"}} @endif>Customer denied for taking service</option>
                                            <option value="Captured" @if($service->remarks=="Captured") {{"selected"}} @endif>Captured</option>
                                            <option value="Resale issue" @if($service->remarks=="Resale issue") {{"selected"}} @endif>Resale issue</option>
                                            <option value="Location shifting" @if($service->remarks=="Location shifting") {{"selected"}} @endif>Location shifting</option>
                                            <option value="Others" @if($service->remarks=="Others") {{"selected"}} @endif>Others</option>
                                            <option value="N/A" @if($service->remarks=="N/A") {{"selected"}} @endif>N/A</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="customer_name" id="customer_name" value="@if(!empty($service->customer_name)) {{$service->customer_name}} @endif">
                                <input type="hidden" name="customer_address" id="customer_address" value="@if(!empty($service->customer_address)) {{$service->customer_address}} @endif">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <input type="submit" value="Submit" class="btn btn-success float-right">
                                </div>
                            </div>
                        </form>


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
    document.title = 'Edit | Periodic Service History';
</script>
<script>
    $(".ServiceDate").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        maxDate: 0
    });
</script>
<script>
    function setCustomerValues(event){
        console.log($(event).find(":selected").val());
        var customerCode = $(event).find(":selected").val();

        $.ajax({
                type: "POST",
                url: "{{route('get.customer.info.by.code')}}",
                dataType: 'json',
                data: {CustomerCode : customerCode,"_token": "{{ csrf_token() }}"},
                success: function(response){
                    $('#customer_name').val(response.CustomerName1);
                    $('#customer_address').val(response.Address1);
                }
                });
    }
</script>

@endsection