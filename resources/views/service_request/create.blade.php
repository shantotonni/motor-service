@extends('layouts.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Service Request</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                <li class="breadcrumb-item active">Service Request Create</li>
            </ol>
        </div>
    </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Service Request</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('service_request.store') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('call_type_id') ? 'has-error' : '' }}">
                                        <label for="call_type_id">Caller type </label>
                                        <select name="call_type_id" id="call_type_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus>
                                            <option value="">Select Call type</option>
                                            @foreach($call_type as $type)
                                                <option value="{{$type->id}}">{{$type->name}} - {{$type->name_bn}}</option>
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
                                        <input type="text" class="form-control" name="customer_name" placeholder="Enter Customer Name">
                                        @if ($errors->has('customer_name'))
                                            <span class="help-block"><strong>{{ $errors->first('customer_name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('customer_mobile') ? 'has-error' : '' }}">
                                        <label for="customer_mobile">Customer Mobile </label>
                                        <input type="text" class="form-control" name="customer_mobile" placeholder="Enter Customer Mobile">
                                        @if ($errors->has('customer_mobile'))
                                            <span class="help-block"><strong>{{ $errors->first('customer_mobile') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('service_wanted_at') ? 'has-error' : '' }}">
                                        <label for="service_wanted_at">Service wanted at</label>
                                        <input name="service_wanted_at" type="text" id="service_wanted_at"class="form-control datetimepicker24" autofocus  placeholder="Service wanted at">
                                        @if ($errors->has('service_wanted_at'))
                                            <span class="help-block"><strong>{{ $errors->first('service_wanted_at') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('technitian_id') ? 'has-error' : '' }}">
                                        <label for="technitian_id">Technician</label>
                                        <select name="technitian_id" id="technitian_id" data-live-search="true" class="form-control select2" style="width: 100%;" autofocus type="select" required>
                                            <option value="">Select Technician</option>
                                            @foreach($technitians as $technitian)
                                                <option value="{{$technitian->id}}" >{{$technitian->username}} - {{$technitian->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('technitian_id'))
                                            <span class="help-block"><strong>{{ $errors->first('technitian_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                             <div class="card-footer">
                               <button type="submit" class="btn btn-info float-right btn-flat">Create</button>
                             </div>
                       </form>
                    </div>
                </div>
            </div>
      </div>
    </div>
</section>

<script>document.title = 'Service Request | Create';
$('#district_id').change(function(){
    var url = '{{url("/")}}/'+'json/get_upazilla_of_district?district_id='+$(this).val();
    chainSelect(url,'upazila_id','id',['name'],'Select Upazilla',"");
})
</script>
@endsection
