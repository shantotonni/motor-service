@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">QuotationDetail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">QuotationDetail Create</li>
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
                    <h3 class="card-title">QuotationDetail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" enctype="multipart/form-data" method="POST" action="{{ route('quotation-detail.update',$quotation_detail->id) }}" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                        <input type="hidden" name="QuotationNo" value="{{$quotation_detail->QuotationNo}}" >
                        <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group {{ $errors->has('ItemCode') ? 'has-error' : '' }}">
                                            <label for="ItemCode">ItemCode</label>
                                            <select name="ItemCode" id="ItemCode" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                                <option value="">Select Item</option>
                                                @foreach($items as $item)
                                                <option value="{{$item->ItemCode}}" @if($item->ItemCode == $quotation_detail->ItemCode) {{'selected'}}@endif>{{$item->ItemCode}} - {{$item->ItemName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group {{ $errors->has('SpotLocationCode') ? 'has-error' : '' }}">
                                            <label for="SpotLocationCode">SpotLocationCode</label>
                                            <select name="SpotLocationCode" id="SpotLocationCode" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"  >
                                                <option value="">Select SpotLocation</option>
                                                @foreach($spot_locations as $spot_location)
                                                <option value="{{$spot_location->SpotLocationCode}}" @if($spot_location->SpotLocationCode == $quotation_detail->SpotLocationCode) {{'selected'}}@endif>{{$spot_location->SpotLocationName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group {{ $errors->has('Quantity') ? 'has-error' : '' }}">
                                            <label for="Quantity">Quantity</label>
                                            <input name="Quantity" type="number" id="Quantity" class="form-control"   value="{{$quotation_detail->Quantity}}" min="0" max="10000"  required autofocus   placeholder="Qty">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group {{ $errors->has('Rate') ? 'has-error' : '' }}">
                                            <label for="Rate">Rate (Up to Karwan Bazar)</label>
                                            <input name="Rate" type="number" id="Rate" class="form-control"   value="{{$quotation_detail->Rate}}" min="0" max="10000"   required autofocus   placeholder="Rate">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group {{ $errors->has('OthersCost') ? 'has-error' : '' }}">
                                            <label for="OthersCost">Other Cost (per Unit)</label>
                                            <input name="OthersCost" type="number" id="OthersCost" class="form-control"   value="{{$quotation_detail->OthersCost}}" min="0" max="10000"   required autofocus   placeholder="OthersCost">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group {{ $errors->has('TotalPerUnit') ? 'has-error' : '' }}">
                                            <label for="TotalPerUnit">total per Unit</label>
                                            <input name="TotalPerUnit" type="number" id="TotalPerUnit" class="form-control"   value="{{$quotation_detail->TotalPerUnit}}"   min="0" max="10000" readonly required autofocus   placeholder="TotalPerUnit">
                                        </div>
                                    </div>

                                    
                                    <div class="col-sm-3">
                                        <div class="form-group {{ $errors->has('Description') ? 'has-error' : '' }}">
                                            <label for="Description">Description</label>
                                            <textarea name="Description" type="number" id="Description" class="form-control"      autofocus   placeholder="Code,Origin:">{{$quotation_detail->Description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group {{ $errors->has('PictureFileName') ? 'has-error' : '' }}">
                                            <label for="PictureFileName">PictureFileName</label>
                                            <input name="PictureFileName" type="file" id="PictureFileName" class=""   value="{{$quotation_detail->Quantity}}"    autofocus   placeholder="Image">
                                        </div>
                                    </div>
                                    
                               

                        </div>
                     <div class="card-footer">
                       <button type="submit" class="btn btn-info float-right btn-flat">Update</button>
                     </div>
                   </form>
                  </div>
                 <!-- /.card-body -->
                 </div>
                 <!-- /.card -->

            </div> <!-- /.col-12 -->
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'QuotationDetail | Update';
$('#Rate, #OthersCost').keyup(function(){
    $('#TotalPerUnit').val((Number($("#OthersCost").val()) || 0) +(Number($("#Rate").val()) || 0))
});
</script>
@endsection
