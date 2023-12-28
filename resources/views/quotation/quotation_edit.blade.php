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
                    <h3 class="card-title">Quotation</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('PurReqNo') ? 'has-error' : '' }}">
                                    <label for="PurReqNo">PurReqNo</label>
                                    <input name="PurReqNo" type="text" id="PurReqNo" class="form-control"   value="{{ $quotation->PurReqNo }}"   readonly="true" autofocus   placeholder="PurReqNo"     >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('QuotationNo') ? 'has-error' : '' }}">
                                    <label for="QuotationNo">QuotationNo</label>
                                    <input name="QuotationNo" type="text" id="QuotationNo" class="form-control"   value="{{ $quotation->QuotationNo }}"   readonly="true" autofocus   placeholder="QuotationNo"     >
                                </div>
                            </div>
                        </div>
                        <hr class="row">
                        <div class="row">
                            <h4 id="response_txt" class="text-center" style="font-weight:bold;"></h4>
                        </div>

                        <form action="/quotation/{{$quotation->id}}/update" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <table id="tbl" class="table table-condensed table-bordered">
                            <thead>
                                <th>Item</th>
                                <th>Qty</th>    
                                <th>Spot Rate</th>
                                <th>Other Cost per UOM</th>
                                <th>SpotLocationCode</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Remove</th>
                            </thead>
                            <tbody>
                        
                            @foreach($purchaseRequisitionDetails as $purchaseRequisitionDetail)
                            
                                <?php $quotation_detail = $obj->get_quotation_details($quotation->QuotationNo,$purchaseRequisitionDetail->ItemCode);?>
                                <tr>
                                    <td>
                                    
                                        {{$purchaseRequisitionDetail->item->ItemCode}} - {{$purchaseRequisitionDetail->item->ItemName}} - {{$purchaseRequisitionDetail->item->UOM}}
                                        <br><strong>Qty: {{$purchaseRequisitionDetail->Quantity}} &nbsp;<br> Exected Rate: {{$purchaseRequisitionDetail->Rates}}</strong>
                                        <br>{{$purchaseRequisitionDetail->Description}}
                                        
                                        <input name="purchaseRequisitionDetailId[{{$purchaseRequisitionDetail->id}}]" type="hidden" value="{{$purchaseRequisitionDetail->id}}">
                                        <input name="ItemCode[{{$purchaseRequisitionDetail->id}}]" type="hidden" value="{{$purchaseRequisitionDetail->ItemCode}}">
                                        <input name="QuotationNo[{{$purchaseRequisitionDetail->id}}]" type="hidden" value="{{$quotation->QuotationNo}}">
                                    </td>
                                    <th><input name="Quantity[{{$purchaseRequisitionDetail->id}}]" type="number" id="Quantity" class="form-control"   value="@if($quotation_detail){{$quotation_detail->Quantity}}@endif"    autofocus   placeholder="Qty"></th>    
                                    <th><input name="Rate[{{$purchaseRequisitionDetail->id}}]" type="number" id="Rate" class="form-control"   value="@if($quotation_detail){{$quotation_detail->Rate}}@endif"    autofocus   placeholder="Rate"></th>
                                    <th><input name="OthersCost[{{$purchaseRequisitionDetail->id}}]" type="number" id="OthersCost" class="form-control"   value="@if($quotation_detail){{$quotation_detail->OthersCost}}@endif"    autofocus   placeholder="Others Cost"></th>
                                    <td>
                                        <select name="SpotLocationCode[{{$purchaseRequisitionDetail->id}}]" id="SpotLocation{{$purchaseRequisitionDetail->id}}" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  >
                                            <option value="">Select SpotLocation</option>
                                            @foreach($spotLocations as $spotLocation)
                                            <option value="{{$spotLocation->SpotLocationCode}}" @if($quotation_detail &&  $quotation_detail->SpotLocationCode == $spotLocation->SpotLocationCode){{"selected"}}@endif>{{$spotLocation->SpotLocationName}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        
                                        <input style="width:130px;" name="PictureFileName[{{$purchaseRequisitionDetail->id}}]" type="file" id="PictureFileName"  autofocus   placeholder="PictureFileName">
                                        @if($quotation_detail)
                                        <a class="example-image-link" href="{{asset('/images/'.$quotation_detail->PictureFileName)}}" data-lightbox="example-1">
                                           <img class="example-image" width="70px" src="{{asset('/images/'.$quotation_detail->PictureFileName)}}" alt="image-1" />
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                      <textarea placeholder="Color:"></textarea>    
                                    <td>
                                    <td>
                                        <input type="checkbox" name="delete[{{$purchaseRequisitionDetail->id}}]" value="{{$purchaseRequisitionDetail->id}}">
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td><button type="submit">Submit</button></td>
                            </tr>
                              
                            </tbody>
                        </table>
                        </form>
                        
                  </div> <!-- /.card-body -->
            
                 </div>
                 <!-- /.card -->

            </div> <!-- /.col-12 -->
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'PR | Create';</script>
<script type="text/javascript">

    
    $('#submitBtn').click(function(){
        var baseurl = "{{ route('purchase-requisition.store') }}";

        $.ajax({
            url: baseurl,
            type: "POST",
            data:{  '_token': "{{csrf_token()}}",
                    'PurReqDate': $('#PurReqDate').val(),
                    'ExpiryDate': $('#ExpiryDate').val(),
                    'DeliveryPlace': $('#DeliveryPlace').val(),
                    'ExpectedDelDate': $('#ExpectedDelDate').val(),
                    'details':JSON.stringify(arr)
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log("Success",data);
                window.location.href = "{{url('/purchase-requisition')}}";
            },
            error: function (err) {
                console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
            }
            
        });
    });




</script>
@endsection
