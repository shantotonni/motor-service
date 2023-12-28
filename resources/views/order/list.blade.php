@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Order List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Order List</li>
        </ol>
        </div>
    </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Order List</h3>
{{--              <a href="{{route('dealer-point.create')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i> Add Dealer Point</button></a>--}}
            </div>

              <div class="card-body">
                  <form action="{{ route('order_list') }}" method="get">
                      <div class="row">
                          <div class="col-md-2">
                              <div class="form-group">
                                  <input type="text" name="from_date" class="form-control datepicker" placeholder="From Date" value="@if ($from)
                                      {{ date('d-m-Y',strtotime($from)) }}
                                  @endif">
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <input type="text" name="to_date" class="form-control datepicker" placeholder="To Date" value="@if ($to)
                                  {{ date('d-m-Y',strtotime($to)) }}
                                  @endif">
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <select name="order_status" id="order_status" class="form-control">
                                      <option value="">Select Order Status</option>
                                      <option value="pending">Pending</option>
                                      <option value="received">Order Confirmed</option>
                                      <option value="processing">Processing</option>
                                      <option value="shipped">Shipped</option>
                                      <option value="delivered">Delivered</option>
                                      <option value="cancel">Cancel</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <button type="submit" class="btn btn-success form-control">Submit</button>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <a href="{{ route('order_list') }}" type="submit" class="btn btn-info form-control">Reset</a>
                              </div>
                          </div>
                      </div>
                  </form>
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Customer name</th>
                              <th>Customer Code</th>
                              <th>Customer Address</th>
                              <th>Customer Mobile</th>
                              <th>Area</th>
                              <th>District</th>
                              <th>Upazila</th>
                              <th>Delivery Address</th>
                              <th>Total Amount</th>
                              <th>Order Date</th>
                              <th>Order Status</th>
                              <th width="10%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach ($orders as $key=>$order)
                          <tr>
                              <td>{{ ++$key }}</td>
                              <td>{{$order->name}}</td>
                              <td>{{$order->code}}</td>
                              <td>{{$order->customer_address}}</td>
                              <td>{{$order->mobile}}</td>
                              <td>{{$order->area_name}}</td>
                              <td>{{$order->district_name}}</td>
                              <td>{{$order->upazila_name}}</td>
                              <td>{{$order->delivery_address}}</td>
                              <td>{{$order->total_amount}}</td>
                              <td>{{$order->created_at}}</td>
                              <td>{{$order->order_status}}</td>
                              <td>
                                  <a href="{{ route('order.details',$order->id) }}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat"><i class="fas fa-eye"></i></button></a>
                                  <a onclick="destroy({{ $order->id }})" title="Delete"><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash"></i></button></a>
                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
                  </div>
                  {{$orders->links()}}
              </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script>document.title = 'Order List';</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function destroy(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "The Learning data will be Delete",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete!'
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    url: "{{ route('order.delete', '__id__') }}".replace('__id__', id),
                    method: 'DELETE'
                }).done(function(data) {
                    console.log(data)
                    Swal.fire({
                        title: 'Success',
                        text: "The Learning data Delete",
                        type: 'success',
                    }).then(function(res){
                        location.reload();
                    });
                });
            }
        })
    }
</script>
@endsection
