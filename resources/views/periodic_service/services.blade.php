@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Periodic Service History</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
          <li class="breadcrumb-item active">Periodic Service History</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
    @endif
    <div class="row mb-3">
      <div class="col-sm-8"></div>
      <div class="col-sm-4">
      <a href="" id="addService" target="_blank" style="display: none;"><button class="btn btn-sm btn-info float-right btn-flat">Add Service</button></a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('post.periodic.service.history')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="chassisno">Chassis No</label>
                    <input type="text" id="chassisno" name="chassisno" value="@if(!empty($chassis)) {{$chassis}} @endif" class="form-control" autocomplete="off" placeholder="Chassis number">
                  </div>
                </div>
                <div class="col-sm-2">
                  <input type="submit" value="Show" class="btn btn-info" id="showBtn" style="margin-top: 33px;">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="printableArea">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Customer Information</h3>
              <input type="button" class="btn btn-primary float-right" id="printBtn" onclick="printDiv('printableArea')" value="Print " />
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <h5 class="float-right"><b>Chassis No : </b> <strong>@if(!empty($chassis)) {{$chassis}} @endif</strong></h5>
              <table id="" class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                <thead>
                  <tr>
                    <th>Customer Code</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Chassis No</th>
                    <th>Model</th>
                    <th>Date of Sale</th>
                  </tr>
                </thead>
                <tbody>
                  @if(isset($services) && !empty($services))
                  @foreach($services as $service)
                  <tr>
                    <td>{{$service->CustomerCode}}</td>
                    <td>{{$service->CustomerName1}}</td>
                    <td>{{$service->Address1}}</td>
                    <td>{{$service->Mobile}}</td>
                    <td>{{$service->ChassisNo}}</td>
                    <td>{{$service->Model}}</td>
                    <td>{{date("Y-m-d", strtotime($service->InvoiceDate))}}</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Periodic Service History</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="" class="table table-bordered table-striped text-nowrap">
                <thead>
                  <th>Periodic Service</th>
                  <th>Service Date</th>
                  <th>Customer Code</th>
                  <th>Customer Name</th>
                  <th>Service Hour</th>
                  <th>Service Taken Place</th>
                  <th>Service Done By</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Control</th>
                </thead>
                <tbody>
                  @if(isset($periodicServices) && !empty($periodicServices))
                  @foreach($periodicServices as $ps)
                  <tr>
                    <td>{{$ps->periodic_service->service_name}} ({{$ps->periodic_service->service_hour}} hour)</td>
                    <td>{{date("Y-m-d", strtotime($ps->service_date))}}</td>
                    <td>{{$ps->customer_code}}</td>
                    <td>{{$ps->customer_name}}</td>
                    <td>{{$ps->service_hour}}</td>
                    <td>{{$ps->service_taken_place}}</td>
                    <td>{{$ps->service_done_by}}</td>
                    <td>{{$ps->service_done_by_name}}</td>
                    <td>{{($ps->status==1) ? "Done" : "Pending"}}</td>
                    <td>
                      @if(Auth::user()->username==111)
                      <a href="{{route('show.edit.page', $ps->id)}}" class="btn btn-primary btn-sm btn_hide"><i class="fas fa-edit"></i></a>
                      <button type="button" class="btn btn-danger btn-sm btn_hide" data-id="{{$ps->id}}" id="modBtn" onclick="deleteFunc(this)" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash"></i></button>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                  @endif

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div>
      <!--row end -->
    </div>
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
      <form class="form-horizontal" id="delete_modal_form" role="form" method="post" action="{{route('delete.service.history')}}">
        {{ csrf_field() }}
        <div class="modal-body">
          <p class="text-center danger">Are Your Sure ? </p>
          <input id="delete_id" type="hidden" name="delete_id">
          <input id="chassis_no" type="hidden" name="chassis_no">
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
  document.title = 'Periodic Service Histories';
</script>
<script>
  $("#chassisno").autocomplete({
    source: function(request, response) {
      ajaxFunction(request.term, response);
    },
    minLength: 1
  }).bind('keypress', function() {
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
      success: function(res) {
        console.log(res);
        var transformed = res;
        response(transformed);
      },
      error: function(msg) {
        response([]);
      }
    })
  }
</script>
<script>
  function printDiv(divName) {
    $('.btn_hide').hide();
    $('#printBtn').hide();
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    $('.btn_hide').show();
    $('#printBtn').show();
  }
</script>

<script type="text/javascript">
  function deleteFunc(element) {
    var delId = $(element).attr('data-id');
    var chassisNo = $('#chassisno').val();
    $("#delete_id").val(delId);
    $("#chassis_no").val(chassisNo);
    // $("#myModal").modal("show");
  }
</script>
<script>
  // $('#showBtn').click(function(e){
    var chassisno = $('#chassisno').val();
    if(chassisno != ''){
      $('#addService').attr('href','/motor-service/add-periodic-service/'+chassisno.trim());
      $('#addService').css('display','block');
    }
  // });
</script>
@endsection