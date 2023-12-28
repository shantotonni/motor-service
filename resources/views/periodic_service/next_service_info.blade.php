@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Estimated Service Information</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
          <li class="breadcrumb-item active">Estimated Service Information</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?php
//dd($Status);
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <form action="{{route('search.next.service.by.date')}}" method="GET">
          <div class="row">
            <div class="col-md-2">
              <input type="text" class="form-control" name="dateFrom" value="@if($dateFrom != ''){{$dateFrom}} @endif" id="dateFrom" placeholder="Date From YYYY-MM-DD" autocomplete="off" required>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" name="dateTo" value="@if($dateTo != ''){{$dateTo}} @endif" id="dateTo" placeholder="Date To YYYY-MM-DD" autocomplete="off" required>
            </div>
            <div class="col-md-2">
              <select name="Status" id="Status" class="form-control">
                <option value="">---- Select Status ----</option>
                @if($Status=="Pending")
                <option value="Pending" selected>Pending</option>
                <option value="Expired">Expired</option>
                @else
                  <option value="Pending">Pending</option>
                  <option value="Expired" selected>Expired</option>
                @endif
              </select>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" name="address" value="@if($address != ''){{$address}} @endif" id="address" placeholder="Address">
            </div>
            <div class="col-sm-2">
              <input type="submit" value="Filter" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-1">
        <form action="{{route('export.periodic.service')}}" method="POST">
          @csrf
          <input type="hidden" name="fromDate" id="fromDate">
          <input type="hidden" name="toDate" id="toDate">
          <input type="hidden" name="StatusCode" id="StatusCode">
          <div class="row">
            <div class="col-sm-1">
              <input type="submit" value="Export" id="exportBtn" class="btn btn-dark">
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Estimated Service Information</h3>
            <!-- <input type="button" class="btn btn-primary float-right" onclick="printDiv('printableArea')" value="Print " /> -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="printableArea">
            <!-- <h5 class="float-right"><b>Chassis No : </b> <strong>@if(!empty($chassis)) {{$chassis}} @endif</strong></h5> -->
            <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
              <thead>
                 <tr>
                   <th>Customer Code</th>
                   <th>Name</th>
                   <th>Address</th>
                   <th>Mobile</th>
                   <th>Chassis No</th>
                   <th>Model</th>
                   <th>Last Service Taken</th>
                   <th>Next Service</th>
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
                  <td @if($service->service_date != NULL) class="alert alert-success" @endif>@if($service->service_date != NULL){{$service->service_hour}} hour ({{date("Y-m-d", strtotime($service->service_date)) }}) @endif</td>
                  <td @if($service->next_service_date != NULL && $service->next_service_date < \Carbon\Carbon::now()) class="alert alert-danger" @elseif($service->next_service_date != NULL && $service->next_service_date >= \Carbon\Carbon::now()) class="alert alert-warning" @endif>@if($service->next_service_date != NULL){{$service->ps_hour}} hour ({{date("Y-m-d", strtotime($service->next_service_date)) }}) @endif</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
            <div class="float-right">
              <p>{{$services->links()}}</p>
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
  document.title = 'Estimated Service Information';
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
  $('#exportBtn').click(function(e) {
    var fromDate = $('#dateFrom').val();
    var toDate = $('#dateTo').val();
    var StatusCode = $('#Status').val();
    $('#fromDate').val(fromDate);
    $('#toDate').val(toDate);
    $('#StatusCode').val(StatusCode);
  });
</script>
@endsection