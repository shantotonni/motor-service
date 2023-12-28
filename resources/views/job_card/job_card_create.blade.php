@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">JobCard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">JobCard Create</li>
        </ol>
        </div>
    </div>
    </div>
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
                    <h3 class="card-title">JobCard</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('job_card.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('territory_id') ? 'has-error' : '' }}">
                        <label for="territory_id">Territory </label>
                        <select name="territory_id" id="territory_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                            <option value="">Select Territory</option>
                            @foreach($territories as $territory)
                            <option value="{{$territory->id}}" @if($territory->id == old("territory_id")){{"selected"}} @endif">{{$territory->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('territory_id'))
                            <span class="help-block"><strong>{{ $errors->first('territory_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
                        <label for="area_id">Area </label>
                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required >
                            <option value="">Select Area</option>
                            @foreach($areas as $area)
                            <option value="{{$area->id}}" @if($area->id == old("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('area_id'))
                            <span class="help-block"><strong>{{ $errors->first('area_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('engineer_id') ? 'has-error' : '' }}">
                        <label for="engineer_id">Engineer </label>
                        <select name="engineer_id" id="engineer_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                            <option value="">Select Engineer</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if($user->id == old("engineer_id")){{"selected"}} @endif">{{$user->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('engineer_id'))
                            <span class="help-block"><strong>{{ $errors->first('engineer_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('technitian_id') ? 'has-error' : '' }}">
                        <label for="technitian_id">Technitian </label>
                        <select name="technitian_id" id="technitian_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                            <option value="">Select Technitian</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if($user->id == old("technitian_id")){{"selected"}} @endif">{{$user->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('technitian_id'))
                            <span class="help-block"><strong>{{ $errors->first('technitian_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('participant_id') ? 'has-error' : '' }}">
                        <label for="participant_id">Participant </label>
                        <select name="participant_id" id="participant_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" >
                            <option value="">Select Participant</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if($user->id == old("participant_id")){{"selected"}} @endif">{{$user->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('participant_id'))
                            <span class="help-block"><strong>{{ $errors->first('participant_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('product_id') ? 'has-error' : '' }}">
                        <label for="product_id">Product </label>
                        <select name="product_id" id="product_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required >
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}" @if($product->id == old("product_id")){{"selected"}} @endif">{{$product->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('product_id'))
                            <span class="help-block"><strong>{{ $errors->first('product_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('call_type_id') ? 'has-error' : '' }}">
                        <label for="call_type_id">Call type </label>
                        <select name="call_type_id" id="call_type_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus required>
                            <option value="">Select Call type</option>
                            @foreach($call_types as $call_type)
                            <option value="{{$call_type->id}}" @if($call_type->id == old("call_type_id")){{"selected"}} @endif">{{$call_type->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('call_type_id'))
                            <span class="help-block"><strong>{{ $errors->first('call_type_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('service_type_id') ? 'has-error' : '' }}">
                        <label for="service_type_id">Service type </label>
                        <select name="service_type_id" id="service_type_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus required >
                            <option value="">Select Service type</option>
                            @foreach($service_types as $service_type)
                            <option value="{{$service_type->id}}" @if($service_type->id == old("service_type_id")){{"selected"}} @endif">{{$service_type->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('service_type_id'))
                            <span class="help-block"><strong>{{ $errors->first('service_type_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                        <label for="customer_name">Customer name</label>
                        <input name="customer_name" type="text" id="customer_name" class="form-control"   value="{{ old('customer_name') }}"    autofocus max="100"  required  placeholder="Customer name"     >
                        @if ($errors->has('customer_name'))
                            <span class="help-block"><strong>{{ $errors->first('customer_name') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('customer_moblie') ? 'has-error' : '' }}">
                        <label for="customer_moblie">Customer moblie</label>
                        <input name="customer_moblie" type="text" id="customer_moblie" class="form-control"   value="{{ old('customer_moblie') }}"    autofocus max="11"  required  placeholder="Customer moblie"     >
                        @if ($errors->has('customer_moblie'))
                            <span class="help-block"><strong>{{ $errors->first('customer_moblie') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('buy_date') ? 'has-error' : '' }}">
                        <label for="buy_date">Buy date</label>
                        <input name="buy_date" type="text" id="buy_date"class="form-control datepicker"  value="{{ old('buy_date') }}"    autofocus placeholder="Buy date"  autocomplete="off"       >
                        @if ($errors->has('buy_date'))
                            <span class="help-block"><strong>{{ $errors->first('buy_date') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_wanted_at') ? 'has-error' : '' }}">
                        <label for="service_wanted_at">Service wanted at</label>
                        <input name="service_wanted_at" type="text" id="service_wanted_at"class="form-control datetimepicker24"  value="{{ old('service_wanted_at') }}"    autofocus required  placeholder="Service wanted at"  autocomplete="off"       >
                        @if ($errors->has('service_wanted_at'))
                            <span class="help-block"><strong>{{ $errors->first('service_wanted_at') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_start_at') ? 'has-error' : '' }}">
                        <label for="service_start_at">Service start at</label>
                        <input name="service_start_at" type="text" id="service_start_at"class="form-control datetimepicker24"  value="{{ old('service_start_at') }}"    autofocus required  placeholder="Service start at"  autocomplete="off"       >
                        @if ($errors->has('service_start_at'))
                            <span class="help-block"><strong>{{ $errors->first('service_start_at') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_end_at') ? 'has-error' : '' }}">
                        <label for="service_end_at">Service end at</label>
                        <input name="service_end_at" type="text" id="service_end_at"class="form-control datetimepicker24"  value="{{ old('service_end_at') }}"    autofocus required  placeholder="Service end at"  autocomplete="off"       >
                        @if ($errors->has('service_end_at'))
                            <span class="help-block"><strong>{{ $errors->first('service_end_at') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('hour') ? 'has-error' : '' }}">
                        <label for="hour">Hour</label>
                        <input name="hour" type="number" id="hour" class="form-control"   value="{{ old('hour') }}"    autofocus step="any"  required  placeholder="Hour"     >
                        @if ($errors->has('hour'))
                            <span class="help-block"><strong>{{ $errors->first('hour') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('service_income') ? 'has-error' : '' }}">
                        <label for="service_income">Service income</label>
                        <input name="service_income" type="number" id="service_income" class="form-control"   value="{{ old('service_income') }}"    autofocus step="any"  placeholder="Service income"     >
                        @if ($errors->has('service_income'))
                            <span class="help-block"><strong>{{ $errors->first('service_income') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group form-group {{ $errors->has('is_approved') ? 'has-error' : '' }}">
                        <label for="is_approved" >Is approved</label><br>
                        <label class="radio-inline radio_container">
                            <input type="radio" name="is_approved"  value="1"   >Yes
                            <span class="checkmark_radio"></span>
                        </label>
                        <label class="radio-inline radio_container">
                            <input type="radio" name="is_approved"  value="0"  checked >No
                            <span class="checkmark_radio"></span>
                        </label>
                        @if ($errors->has('is_approved'))
                            <span class="help-block"><strong>{{ $errors->first('is_approved') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('approver_id') ? 'has-error' : '' }}">
                        <label for="approver_id">Approver </label>
                        <select name="approver_id" id="approver_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"     >
                            <option value="">Select Approver</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if($user->id == old("approver_id")){{"selected"}} @endif">{{$user->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('approver_id'))
                            <span class="help-block"><strong>{{ $errors->first('approver_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                        </div>
                     <div class="card-footer">
                       <button type="submit" class="btn btn-info float-right btn-flat">Create</button>
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

<script>document.title = 'JobCard | Create';</script>
@endsection
