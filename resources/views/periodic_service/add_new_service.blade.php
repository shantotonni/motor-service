@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New Service</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Add New Service</li>
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
                        <h3 class="card-title">Add New Service</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="text-center alert alert-info font-weight-bold">Insert {{$service->periodic_service->service_name}} Service Information</h5>
                            </div>
                        </div>
                        <form action="{{route('store.service.info')}}" method="POST">
                            @csrf
                            <input type="hidden" name="chassis" value="{{$chassis}}">
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
                                        <input type="text" id="service_date" class="form-control ServiceDate" name="service_date" value="{{$service->next_service_date==null ? '' : date('Y-m-d',strtotime($service->next_service_date))}}" placeholder="YYYY-MM-DD" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service_hour">Service Hour</label>
                                        <input type="number" id="service_hour" class="form-control" name="service_hour" value="{{$service->periodic_service->service_hour}}" placeholder="Service Hour" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service_taken_place">Service Taken Place</label>
                                        <select name="service_taken_place" id="service_taken_place" class="form-control" required>
                                            <option value="Customer Point">Customer Point</option>
                                            <option value="Dealer Point" selected>Dealer Point</option>
                                            <option value="Service Center">Service Center</option>
                                            <option value="3S Center">3S Center</option>
                                            <option value="ASC">ASC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service_done_by">Service Done By</label>
                                        <select name="service_done_by" id="service_done_by" class="form-control" required>
                                            <option value="TSA">TSA</option>
                                            <option value="Customer">Customer</option>
                                            <option value="Dealer">Dealer</option>
                                            <option value="SC">SC</option>
                                            <option value="ASC">ASC</option>
                                            <option value="3S">3S</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="service_done_by_name">Name</label>
                                        <input type="text" id="service_done_by_name" class="form-control" name="service_done_by_name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="customer_code">Customer</label>
                                        <select name="customer_code" id="customer_code" onchange="setCustomerValues(this)" class="form-control select2" required>
                                            <option value="">-- Select Customer --</option>
                                            @foreach($customers as $cust)
                                                <option value="{{$cust->CustomerCode}}">{{$cust->CustomerCode}} - {{$cust->CustomerName1}}</option>
                                            @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="remarks">Remarks</label>
                                        <select name="remarks" id="remarks" class="form-control">
                                            <option value="">--- Select Remarks ---</option>
                                            <option value="Season time">Season time</option>
                                            <option value="Request from customer">Request from customer</option>
                                            <option value="Delay season">Delay season</option>
                                            <option value="Tractor off road">Tractor off road</option>
                                            <option value="Bad weather conditions">Bad weather conditions</option>
                                            <option value="Customer denied for taking service">Customer denied for taking service</option>
                                            <option value="Captured">Captured</option>
                                            <option value="Resale issue">Resale issue</option>
                                            <option value="Location shifting">Location shifting</option>
                                            <option value="Others">Others</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="area_id">Area</label>
                                        <select name="area_id" id="area_id" class="form-control" required>
                                            <option value="">-- Select Area --</option>
                                            @foreach($areas as $area)
                                                <option value="{{$area->id}}">{{$area->name}} - {{$area->name_bn}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="customer_name" id="customer_name">
                                <input type="hidden" name="customer_address" id="customer_address">

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


<!-- Modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Delete Item !!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="delete_modal_form" role="form" method="POST" action="">
                {{ csrf_field() }}
                {{ method_field("DELETE") }}
                <div class="modal-body">
                    <p class="text-center danger">Are Your Sure ? </p>
                    <input id="delete_id" type="hidden" name="id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary float-left">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.title = 'Add | Periodic Service History';
</script>
<script>
    $(".ServiceDate").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        maxDate: 0
    });
</script>
<script type="text/javascript">
    $(document).on("click", "#openDeleteModal", function() {
        var delId = $(this).data("id");
        $("#delete_modal_form").attr("action", "{{url('/district')}}/" + delId);
        $(".modal-body #delete_id").val(delId);
        $("#myModal").modal("show");
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