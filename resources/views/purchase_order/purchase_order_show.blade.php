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
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Purchase Order show</li>
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
                <!-- general form elements disabled -->
                <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Purchase Order</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <th>PurOrderNO</th>
                            <th>Supplier</th>
                            <th>QuotationNo</th>
                            <th>Order Amount</th>
                            <th>Created At</th>
                            <th>Delivery Date</th>
                            <th>Delivery Place</th>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$purchase_order->PurOrderNo}}</td>
                                <td>{{$purchase_order->SupplierID}}</td>
                                <td>{{$purchase_order->QuotationNo}}</td>  
                                <td>{{$purchase_order->PurOrderAmount}}</td>                      
                                <td>{{$purchase_order->CreatedDate}}</td>
                                <td>{{$purchase_order->DeliverDate}}</td>
                                <td>{{$purchase_order->DeliveryPlace}}</td>
                            </tr>

                        </tbody>
                    </table>
                    <hr>
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <th>Item</th>
                            <th>Spot Location</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>OthersCost</th>
                            <th>Amount</th>
                            <th>Description</th>
                        </thead>
                        <tbody>
                            @foreach ($purchase_order_details as $purchase_order_detail)
                            <tr>
                                <td>{{$purchase_order_detail->item->ItemCode}} - {{$purchase_order_detail->item->ItemName}}</td>
                                <td>{{$purchase_order_detail->spot_location->SpotLocationName}}
                                <td>{{$purchase_order_detail->Quantity}}</td>
                                <td>{{$purchase_order_detail->Rate}}</td>
                                <td>{{$purchase_order_detail->OthersCost}}</td>
                                <td>{{$purchase_order_detail->Amount}}</td>
                                <td>{{$purchase_order_detail->Description}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                 <!-- /.card-body -->
                 </div>
                 <!-- /.card -->

            </div> <!-- /.col-12 -->
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'Purchase Order | Create';</script>
@endsection
