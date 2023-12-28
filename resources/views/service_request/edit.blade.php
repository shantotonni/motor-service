@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Service Request Edit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Service Request Edit</li>
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
                    <h3 class="card-title">Service Request Edit</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('service_request.update',$service_request->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('district_id') ? 'has-error' : '' }}">
                                        <label for="district_id">District </label>
                                        <select name="district_id" id="district_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                            <option value="">Select District</option>
                                            @foreach($districts as $district)
                                             <option value="{{$district->id}}"  @if($district->id == $service_request->district_id){{"selected"}} @endif >{{$district->name}}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('district_id'))
                                            <span class="help-block"><strong>{{ $errors->first('district_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('upazila_id') ? 'has-error' : '' }}">
                                        <label for="upazila_id">Upazila </label>
                                        <select name="upazila_id" id="upazila_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                            <option value="">Select Upazila</option>
                                            @foreach($upazilas as $upazila)
                                             <option value="{{$upazila->id}}"  @if($upazila->id == $service_request->upazila_id){{"selected"}} @endif >{{$upazila->name}}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('upazila_id'))
                                            <span class="help-block"><strong>{{ $errors->first('upazila_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('product_id') ? 'has-error' : '' }}">
                                        <label for="product_id">Product </label>
                                        <select name="product_id" id="product_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus>
                                            <option value="">Select Product</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}"  @if($product->id == $service_request->product_id){{"selected"}} @endif >{{$product->name}} - {{$product->name_bn}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('product_id'))
                                            <span class="help-block"><strong>{{ $errors->first('product_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('call_type_id') ? 'has-error' : '' }}">
                                        <label for="call_type_id">Caller type </label>
                                        <select name="call_type_id" id="call_type_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus>
                                            <option value="">Select Call type</option>
                                            @foreach($call_type as $type)
                                                <option value="{{$type->id}}"  @if($type->id == $service_request->call_type_id){{"selected"}} @endif >{{$type->name}} - {{$type->name_bn}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('call_type_id'))
                                            <span class="help-block"><strong>{{ $errors->first('call_type_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('customer_name') ? 'has-error' : '' }}">
                                        <label for="customer_name">Customer Name </label>
                                        <input type="text" class="form-control" name="customer_name" value="{{ $service_request->customer_name }}" placeholder="Enter Customer Name">
                                        @if ($errors->has('customer_name'))
                                            <span class="help-block"><strong>{{ $errors->first('customer_name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('customer_mobile') ? 'has-error' : '' }}">
                                        <label for="customer_mobile">Customer Mobile </label>
                                        <input type="text" class="form-control" name="customer_mobile" value="{{ $service_request->customer_mobile }}" placeholder="Enter Customer Mobile">
                                        @if ($errors->has('customer_mobile'))
                                            <span class="help-block"><strong>{{ $errors->first('customer_mobile') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
                                        <label for="area_id">Area </label>
                                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                                            <option value="">Select Area</option>
                                            @foreach($areas as $area)
                                             <option value="{{$area->id}}"  @if($area->id == $service_request->area_id){{"selected"}} @endif >{{$area->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('area_id'))
                                            <span class="help-block"><strong>{{ $errors->first('area_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('customer_id') ? 'has-error' : '' }}">
                                        <label for="customer_id">Customer </label>
                                        <select name="customer_id" id="customer_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select">
                                            <option value="">Select Customer</option>
                                            @foreach($customers as $customer)
                                             <option value="{{$customer->id}}"  @if($customer->id == $service_request->customer_id){{"selected"}} @endif >{{$customer->name}}</option>
                                         @endforeach
                                        </select>
                                        @if ($errors->has('customer_id'))
                                            <span class="help-block"><strong>{{ $errors->first('customer_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                @if(Auth::user()->role_id == 1)
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('engineer_id') ? 'has-error' : '' }}">
                                        <label for="engineer_id">Engineer</label>
                                        <select name="engineer_id" id="engineer_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select">
                                            <option value="">Select Engineer</option>
                                            @foreach($users as $user)
                                                @if ($user->id == $service_request->engineer_id)
                                                    <option value="{{$user->id}}" selected>{{$user->username}} - {{$user->name}}</option>
                                                @else
                                                    <option value="{{$user->id}}" >{{$user->username}} - {{$user->name}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('engineer'))
                                            <span class="help-block"><strong>{{ $errors->first('engineer') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @endif

                                <div class="col-sm-6">
                                    <div class="form-group {{$errors->has('remarks') ? 'has-error' : '' }}">
                                        <label for="remarks" class="col-sm-3 control-label">Customer Remarks</label>
                                        <textarea name="remarks" id="remarks" type="text" class="form-control" autofocus value="1" placeholder="Remarks">{{ $service_request->remarks }}</textarea>
                                        @if ($errors->has('remarks'))
                                            <span class="help-block"><strong>{{ $errors->first('remarks') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('initiated_at') ? 'has-error' : '' }}">
                                        <label for="initiated_at">Service Request Time</label>
                                        <input name="initiated_at" type="text" id="initiated_at"class="form-control" value="@if($service_request->created_at){{ date('d-m-Y H:i:s',strtotime($service_request->created_at)) }}@endif" autofocus placeholder="Solved at"  autocomplete="off"   readonly="true"    >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('technitian_id') ? 'has-error' : '' }}">
                                        <label for="technitian_id">Technician</label>
                                        <select name="technitian_id" id="technitian_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                                            <option value="">Select Technician</option>
                                            @foreach($technitians as $technitian)
                                             <option value="{{$technitian->id}}"  @if($technitian->id == $service_request->technitian_id){{"selected"}} @endif >{{$technitian->username}} - {{$technitian->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('technitian_id'))
                                            <span class="help-block"><strong>{{ $errors->first('technitian_id') }}</strong></span>
                                        @endif
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>document.title = 'ServiceRequest | Edit';



$('#section_id').change(function(){
    var url = '{{url("/")}}/'+'json/get_topics_of_section?section_id='+$(this).val();
    chainSelect(url,'topic_id','id',['name'],'Select topic',"");
})

</script>



@endsection

@section('script')
<script>
$(document).ready(function(){
  $('#invoice_no').select2({
      minimumInputLength: 2,   
      allowClear: true,
    //   placeholder: 'Select Invoice',   
      ajax: {
            url: "{{url('/')}}/json/invoice_no_search",
            dataType: 'json',
            data: function (params){
              // Query parameters will be ?search=[term]&type=public
              return {
                  search: params.term,
                  type: "public",
               }
            },
            
        }
    });

})
</script>
@endsection
