@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">PR</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('PurReqDate') ? 'has-error' : '' }}">
                                    <label for="PurReqDate">PurReqDate</label>
                                    <input name="PurReqDate" type="text" id="PurReqDate" class="form-control datepicker"   value="{{ date('d-m-Y',strtotime($purchaseRequisition->PurReqDate)) }}"   required autofocus   placeholder="PurReqDate"     >
                                    @if ($errors->has('PurReqDate'))
                                        <span class="help-block"><strong>{{ $errors->first('PurReqDate') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('ExpiryDate') ? 'has-error' : '' }}">
                                    <label for="ExpiryDate">ExpiryDate</label>
                                    <input name="ExpiryDate" type="text" id="ExpiryDate" class="form-control datepicker"   value="{{date('d-m-Y',strtotime($purchaseRequisition->ExpiryDate))}}"   required autofocus  placeholder="ExpiryDate"     >
                                    @if ($errors->has('ExpiryDate'))
                                        <span class="help-block"><strong>{{ $errors->first('ExpiryDate') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('DeliveryPlace') ? 'has-error' : '' }}">
                                    <label for="DeliveryPlace">DeliveryPlace</label>
                                    <input name="DeliveryPlace" type="text" id="DeliveryPlace" class="form-control"   value="{{ $purchaseRequisition->DeliveryPlace }}"   required autofocus   placeholder="DeliveryPlace"     >
                                    @if ($errors->has('DeliveryPlace'))
                                        <span class="help-block"><strong>{{ $errors->first('DeliveryPlace') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('ExpectedDelDate') ? 'has-error' : '' }}">
                                    <label for="ExpectedDelDate">ExpectedDelDate</label>
                                    <input name="ExpectedDelDate" type="text" id="ExpectedDelDate" class="form-control datepicker"   value="{{date('d-m-Y',strtotime($purchaseRequisition->ExpectedDelDate))}}"   required autofocus   placeholder="ExpectedDelDate"     >
                                    @if ($errors->has('ExpectedDelDate'))
                                        <span class="help-block"><strong>{{ $errors->first('ExpectedDelDate') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('RequisitionDetails') ? 'has-error' : '' }}">
                                    <label for="RequisitionDetails">RequisitionDetails</label>
                                    <input name="RequisitionDetails" type="text" id="RequisitionDetails" class="form-control"   value="{{ $purchaseRequisition->RequisitionDetails }}"   required autofocus   placeholder="RequisitionDetails"     >
                                    @if ($errors->has('RequisitionDetails'))
                                        <span class="help-block"><strong>{{ $errors->first('RequisitionDetails') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <hr class="row">
                        <div class="row">
                            <h4 id="response_txt" class="text-center" style="font-weight:bold;"></h4>
                        </div>
                        @if(!$po)
                        <form method="POST" id="compare_form" action="/purchase-requisition/{{$purchaseRequisition->id}}/order-create">
                        @endif
                        <div class="table-responsive">
                        <table id="tbl" class="table table-condensed table-bordered">
                            <thead>
                                <th>Item</th>
                                @foreach($suppliers as $supplier)
                                <th>{{$supplier->SupplierName}}</th> 
                                @endforeach
                            </thead>
                            <tbody>
                                    {{csrf_field()}}
                                    <?php $i=1;?> 
                                    @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->ItemCode}} - {{$item->ItemName}}</td>
                                        @foreach($suppliers as $supplier)
                                        <?php 
                                            $qs = $obj->get_quotation_of_supplier($purchaseRequisition->PurReqNo ,$supplier->SupplierID,$item->ItemCode);
                                        ?>
                                        <td id="{{$supplier->SupplierID}}-{{$item->ItemCode}}">
                                        @foreach($qs as $q)
                                            @if($q)
                                                @if(!$po)
                                                <div class="row">
                                                    <input style="width: 25px; height:25px; margin-right:5px;" type="checkbox"  name="order_check[{{$i}}]" value="{{$i}}">
                                                    <input style="float:left; width:80%; text-align:center;" type="number" id="vehicle1" name="Quantity[{{$i}}]" value="{{$q->Quantity}}" max="10000">
                                                </div>
                                                @endif
                                                <input type="hidden" name="SupplierID[{{$i}}]" value="{{$supplier->SupplierID}}">
                                                <input type="hidden" name="QuotationNo[{{$i}}]" value="{{$q->QuotationNo}}">
                                                <input type="hidden" name="ItemCode[{{$i}}]" value="{{$q->ItemCode}}">
                                                <input type="hidden" name="SpotLocationCode[{{$i}}]" value="{{$q->SpotLocationCode}}">
                                                <input type="hidden" name="Rate[{{$i}}]" value="{{$q->Rate}}">
                                                <input type="hidden" name="OthersCost[{{$i}}]" value="{{$q->OthersCost}}">
                                                <input type="hidden" name="Description[{{$i}}]" value="{{$q->Description}}">
                                                
                                                Qty: {{$q->Quantity}} &nbsp;&nbsp;
                                                @if($q->PictureFileName)
                                                    <a class="example-image-link" href="{{asset('/images/'.$q->PictureFileName)}}" data-lightbox="example-1">
                                                    Image:<i height="20px" class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                @endif
                                                <br>
                                                Spot Rate: {{$q->Rate}} (tk)<br>
                                                Others : {{$q->OthersCost}} (tk)<br>
                                                Rate/pcs (Qty+Others) : {{$q->Rate + $q->OthersCost}}<br>
                                                Location: {{$q->SpotLocationName}}
                                                <hr width="100%">
                                                <?php $i++;?> 
                                            @endif
                                            
                                        @endforeach
                                        </td> 
                                        @endforeach
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            @if(!$po)
                                            <button  type="submit"  class="btn btn-primary btn-flat" id="submitBtn">Create Purchase Orders</button>
                                            @endif
                                        </td>
                                    </tr>
                                
                                </tbody>
                        </table>
                        </div>
                        </form>
                        
                  </div> <!-- /.card-body -->
               
                 </div>
                 <!-- /.card -->

            </div> <!-- /.col-12 -->
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'PR | Compare';

$('#compare_form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

$('#submitBtn').click(function(){
    $("#compare_form" ).submit();
})
</script>

@endsection
