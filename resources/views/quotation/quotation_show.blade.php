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
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('QuotationDate') ? 'has-error' : '' }}">
                                    <label for="QuotationDate">QuotationDate</label>
                                    <input name="QuotationDate" type="text" id="QuotationDate" class="form-control"   value="{{ $quotation->QuotationDate }}"   readonly="true" autofocus   placeholder="QuotationDate"     >
                                </div>
                            </div>
                        </div>
                        <hr class="row">
             
                    
                        <div class="row">
                            <h4 id="response_txt" class="text-center" style="font-weight:bold;"></h4>
                        </div>

                        <hr class="row">
                      
                        <div class="table-responsive">


  
                        <table id="tbl" class="table table-condensed table-bordered">
                            <thead>
                                <th>Item</th>
                                <th>SpotLocation</th>
                                <th>Qty</th>    
                                <th>Rate</th>
                                <th>Other Cost</th>
                                <th>TotalPerUnit</th>
                                <th>Description</th>
                                <th>Image</th>
                            </thead>
                            <tbody>
                                @foreach($quotation_details as $quotation_detail)
                                <tr>
                                    <td>{{$quotation_detail->item->ItemName}}</td>
                                    <td>{{$quotation_detail->spot_location->SpotLocationName}}</td>
                                    <td>{{$quotation_detail->Quantity}}</td>    
                                    <td>{{$quotation_detail->Rate}}</td>
                                    <td>{{$quotation_detail->OthersCost}}</td>
                                    <td>{{$quotation_detail->TotalPerUnit}}</td>
                                    <td>{{$quotation_detail->Description}}</td>
                                    <td>
                                        <a class="example-image-link" href="{{asset('/images/'.$quotation_detail->PictureFileName)}}" data-lightbox="example-1">
                                            <img class="example-image" width="70px" src="{{asset('/images/'.$quotation_detail->PictureFileName)}}" alt="image-1" />
                                        </a>
                                    </td>
                           
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     
                     </div>
                        
                  </div> <!-- /.card-body -->
                 </div>
                 <!-- /.card -->

            </div> <!-- /.col-12 -->
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'Quotation | Show';</script>

@endsection
