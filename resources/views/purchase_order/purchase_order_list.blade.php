@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Purchase Order</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-purchase_order"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-purchase_order active">Purchase Order</li>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Purchase Order </h3>
              <!-- <a href="{{url('/purchase_order/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create Purchase Order</button></a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="" method="get">
               <input name="date" class="datepicker" value="@if(request()->get('date')){{request()->get('date')}} @else {{date('d-m-Y')}} @endif"><button>Search</button>
              </form>
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                      <th>Id</th>
                      <th>PurOrderNO</th>
                      <th>PR</th>
                      <th>Supplier</th>
                      <th>Order Amount</th>
                      <th>QuotationNo</th>
                      <th>Created At</th>
                      <th>Delivery Date</th>
                      <th>Delivery Place</th>
                      <th>Controls</th>
                </thead>
                <tbody>
                    @foreach ($purchase_orders as $purchase_order)
                      <tr>
                          <td>{{$purchase_order->id}}</td>
                          
                          <td>{{$purchase_order->PurOrderNo}}</td>
                          <td>{{$purchase_order->PurReqNo}}</td>
                          <td>{{$purchase_order->SupplierID}}</td>
                          <td>{{$purchase_order->PurOrderAmount}}</td>
                          <td>{{$purchase_order->QuotationNo}}</td>                        
                          <td>{{$purchase_order->CreatedDate}}</td>
                          <td>{{$purchase_order->DeliverDate}}</td>
                          <td>{{$purchase_order->DeliveryPlace}}</td>


                          <td>
                              <a href="{{url('/purchase-order/'.$purchase_order->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              <!--
                              <a href="{{url('/purchase_order/'.$purchase_order->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              <a id="openDeleteModal" data-toggle="modal" data-id="{{$purchase_order->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a> -->
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                
              </table>
             </div>
              {{$purchase_orders->links()}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->


<!-- Modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Delete Purchase Order !!</h5>
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

<script>document.title = 'Purchase Order';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/purchase_order')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
