@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tractor Customer List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
          <li class="breadcrumb-item active">Customer List</li>
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
        <div>
          @if(session()->has('message'))
          <p class="alert alert-success">{{session()->get('message')}}</p>
          @endif
          @if(session()->has('error'))
          <p class="alert alert-danger">{{session()->get('error')}}</p>
          @endif
        </div>
        <div class="card">
          <div class="card-header">
            <div class="row">
              <!-- <div class="col-sm-2">
                <h3 class="card-title">Periodic Service List </h3>
              </div> -->
              <div class="col-sm-4">
                <form action="{{route('customer.search.by.code')}}" method="GET">
                  <div class="row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="search" value="@if(!empty($search)){{$search}} @endif" placeholder="Customer Code/Chassis no..">
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" class="btn btn-info btn" value="Search">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-sm-7"></div>
              <!-- <div class="col-sm-3">
                <a href="{{route('show.next.service.info.page')}}" class="btn btn-primary btn-sm float-right" target="_blank">Next Service Info</a>
              </div>
              <div class="col-sm-2">
                <a href="{{route('show.customer.info.page')}}" class="btn btn-dark btn-sm float-right" target="_blank">Customer Information</a>
              </div>
              <div class="col-sm-2">
                <a href="{{route('show.periodic.service.page')}}" class="btn btn-info btn-sm float-right" target="_blank">Periodic Service History</a>
              </div> -->
              <div class="col-sm-1">
                <a href="{{route('sysc.periodic.customer.list')}}" class="btn btn-danger btn-sm float-right"><i class='fas fa-sync'></i>&nbsp;Sync</a>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
              <thead>
                <tr>
                  <th>Customer Code</th>
                  <th>Name</th>
                  <th>District</th>
                  <th>Upazilla</th>
                  <th>Address</th>
                  <th>Mobile</th>
                  <th>Chassis No</th>
                  <th>Model</th>
                  <th>Date of Sale</th>
                  <th>Controls</th>
                </tr>
              </thead>
              <tbody>
                @foreach($services as $service)
                  <tr @if(isset($service->captured_tractor->chassis_no) ? $service->captured_tractor->chassis_no : '' == $service->ChassisNo) style="background-color:#FA896B;" @endif>
                    <td>{{$service->CustomerCode}}</td>
                    <td>{{$service->CustomerName1}}</td>
                    <td>{{$service->DistrictName}}</td>
                    <td>{{$service->UpazilaName}}</td>
                    <td>{{$service->Address1}}</td>
                    <td>{{$service->Mobile}}</td>
                    <td>{{$service->ChassisNo}}</td>
                    <td>{{$service->Model}}</td>
                    <td>{{date("Y-m-d", strtotime($service->InvoiceDate))}}</td>
                    <td>
                      <div class="row">
                      @if(isset($service->captured_tractor->chassis_no) ? $service->captured_tractor->chassis_no : '' != $service->ChassisNo)
                        <div class="col-sm-6">
                          <a href="/motor-service/add-periodic-service/{{$service->ChassisNo}}" target="_blank"><button class="btn btn-sm btn-info float-right btn-flat">Add Service</button></a>
                        </div>
                        @if(Auth::user()->username==111)
                        <div class="col-sm-6">
                          <button class="btn btn-danger btn-sm" onclick="tractorCaptured('{{$service->ChassisNo}}')">Captured</button>
                        </div>
                        @endif
                      @else
                        <p style="padding-left: 50px;">Captured/Sold</p>
                      @endif
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="float-right mt-3">
              {{$services->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div id="capturedModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Capture Tractor !!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="{{route('tractor.captured.sold')}}">
        {{ csrf_field() }}
        {{ method_field("POST") }}
        <div class="modal-body">
          <p class="text-center danger">Are Your Sure ? </p>
          <input id="chassisnumber" type="hidden" name="chassisnumber">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary float-left">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<!-- <div id="myModal" class="modal" tabindex="-1" role="dialog">
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
</div> -->

<script>
  document.title = 'Customer List';
</script>
<!-- <script type="text/javascript">
  $(document).on("click", "#openDeleteModal", function() {
    var delId = $(this).data("id");
    $("#delete_modal_form").attr("action", "{{url('/district')}}/" + delId);
    $(".modal-body #delete_id").val(delId);
    $("#myModal").modal("show");
  });
</script> -->

<script>
  function tractorCaptured(chassisno){
    console.log(chassisno);
    $("#capturedModal #chassisnumber").val(chassisno);
    $("#capturedModal").modal("show");
  }
</script>
@endsection