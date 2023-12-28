@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Customer Information</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
          <li class="breadcrumb-item active">Customer Information</li>
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
            <form action="{{route('post.customer.info')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="chassisno">Chassis No</label>
                    <input type="text" id="chassisno" name="chassisno" value="@if(!empty($chassis)) {{$chassis}} @endif" class="form-control" autocomplete="off" placeholder="Chassis number">
                  </div>
                </div>
                <div class="col-sm-2">
                  <input type="submit" value="Show" class="btn btn-info" style="margin-top: 33px;">
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
            <h3 class="card-title">Customer Information</h3>
            <input type="button" class="btn btn-primary float-right" onclick="printDiv('printableArea')" value="Print " />
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive" id="printableArea">
            <h5 class="float-right"><b>Chassis No : </b> <strong>@if(!empty($chassis)) {{$chassis}} @endif</strong></h5>
            <table id="" class="table table-bordered table-striped text-nowrap">
              <thead>
                <th>Customer Code</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Chassis No</th>
                <th>Model</th>
                <th>Date of Sale</th>
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
  document.title = 'Customer Information';
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
      url: "{{ route('search.by.chassis.in.invcustomlist') }}",
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

@endsection