@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Order Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Order Details</li>
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
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <div class="row invoice-info">
                        <div class="col-sm-3 invoice-col">
                            From
                            <address>
                                <strong>ACI Limited</strong><br>
                                Address: 245, Tejgaon Industrial Area<br>
                                Dhaka 1208, Bangladesh<br>
                                Phone: 09606 666 678
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            To
                            <address>
                                <strong>{{ $order->customer->name }}</strong><br>
                                Upazila: {{ $order->upazila_name }}<br>
                                District: {{ $order->district_name }}<br>
                                Area: {{ $order->area_name }}<br>
                                D.Address: {{ $order->delivery_address }}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            <b>Invoice</b><br>
                            <br>
                            <b>Order ID:</b> {{ $order->id }}<br>
                            <b>Payment Status:</b> Cash On Delivery<br>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            <b>Invoice Status</b><br>
                            <br>
                            <b>Status:</b> {{ $order->order_status }}<br>
                            <b>Change status:</b>
                            <form action="{{ route('order.status.change') }}" class="form-inline" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <select name="order_status" id="order_id" class="form-control">
                                    <option value="">Select Order Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="received">Order Confirmed</option>
                                    <option value="processing">Processing</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancel">Cancel</option>
                                </select>
                                <button style="margin-left: 15px" type="submit" class="btn btn-success btn-sm">Change</button>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
{{--                                    <th>Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orderProduct as $key => $product)
                                    @if ($product->quantity > 0)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->item_price }} TK</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->quantity * $product->item_price }} TK</td>
{{--                                            <td>--}}
{{--                                                <a class="btn btn-danger btn-sm pt-0 pb-0" onclick="return confirm(' you want to delete?');" href="{{ route('order.update',['invoice_id'=>$invoice->InvoiceNo,'product_code'=>$item->ProductCode]) }}">Delete</a>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Payment Methods:</p>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                             Cash On Delivery
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                           <div class="table-responsive">
                                <table class="table">
                                    <tbody><tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>{{ $order->total_amount }} TK</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Charge:</th>
                                        <td>0 TK</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>{{ $order->grand_total }} TK</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
{{--                    <div class="row no-print">--}}
{{--                        <div class="col-12">--}}
{{--                            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>--}}
{{--                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit--}}
{{--                                Payment--}}
{{--                            </button>--}}
{{--                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">--}}
{{--                                <i class="fas fa-download"></i> Generate PDF--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<script>document.title = 'Order Details | Tractor Service';</script>
@endsection
