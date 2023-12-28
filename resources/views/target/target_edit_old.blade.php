@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Target</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Target Edit</li>
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
                    <h3 class="card-title">Target</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('target.update',$target->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                             
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                            <label for="date">Date</label>
                                            <input name="date" type="text" id="date"class="form-control datepicker"  value="@if($target->date){{date("d-m-Y", strtotime($target->date))}}@endif"    autofocus required  placeholder="Date"  autocomplete="off"       >
                                            @if ($errors->has('date'))
                                                <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('territory_id') ? 'has-error' : '' }}">
                                            <label for="territory_id">Territory </label>
                                            <select name="territory_id" id="territory_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                                <option value="">Select Territory</option>
                                                @foreach($territories as $territory)
                                                <option value="{{$territory->id}}"  @if($territory->id == $target->territory_id){{"selected"}} @endif >{{$territory->name}}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('territory_id'))
                                                <span class="help-block"><strong>{{ $errors->first('territory_id') }}</strong></span>
                                            @endif  
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('technitian_id') ? 'has-error' : '' }}">
                                            <label for="technitian_id">Technitian </label>
                                            <select name="technitian_id" id="technitian_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                                <option value="">Select Technician</option>
                                                @foreach($technitians as $technitian)
                                                <option value="{{$technitian->id}}"  @if($technitian->id == $target->technitian_id){{"selected"}} @endif >{{$technitian->username}} - {{$technitian->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('technitian_id'))
                                                <span class="help-block"><strong>{{ $errors->first('technitian_id') }}</strong></span>
                                            @endif  
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('installation') ? 'has-error' : '' }}">
                                            <label for="installation">Installation</label>
                                            <input name="installation" type="number" id="installation" class="form-control"   value="{{$target->installation}}"    autofocus step="any"  placeholder="Installation"     >
                                            @if ($errors->has('installation'))
                                                <span class="help-block"><strong>{{ $errors->first('installation') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('preodic_service') ? 'has-error' : '' }}">
                                            <label for="preodic_service">Preodic service</label>
                                            <input name="preodic_service" type="number" id="preodic_service" class="form-control"   value="{{$target->preodic_service}}"    autofocus step="any"  placeholder="Preodic service"     >
                                            @if ($errors->has('preodic_service'))
                                                <span class="help-block"><strong>{{ $errors->first('preodic_service') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('warranty_service') ? 'has-error' : '' }}">
                                            <label for="warranty_service">Warranty service</label>
                                            <input name="warranty_service" type="number" id="warranty_service" class="form-control"   value="{{$target->warranty_service}}"    autofocus step="any"  placeholder="Warranty service"     >
                                            @if ($errors->has('warranty_service'))
                                                <span class="help-block"><strong>{{ $errors->first('warranty_service') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('post_warranty_service') ? 'has-error' : '' }}">
                                            <label for="post_warranty_service">Post warranty service</label>
                                            <input name="post_warranty_service" type="number" id="post_warranty_service" class="form-control"   value="{{$target->post_warranty_service}}"    autofocus step="any"  placeholder="Post warranty service"     >
                                            @if ($errors->has('post_warranty_service'))
                                                <span class="help-block"><strong>{{ $errors->first('post_warranty_service') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('post_warranty_visit') ? 'has-error' : '' }}">
                                            <label for="post_warranty_visit">Post warranty visit</label>
                                            <input name="post_warranty_visit" type="number" id="post_warranty_visit" class="form-control"   value="{{$target->post_warranty_visit}}"    autofocus step="any"  placeholder="Post warranty visit"     >
                                            @if ($errors->has('post_warranty_visit'))
                                                <span class="help-block"><strong>{{ $errors->first('post_warranty_visit') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
                                            <label for="total">Total</label>
                                            <input name="total" type="number" id="total" class="form-control"   value="{{$target->total}}"    autofocus step="any"  placeholder="Total"     >
                                            @if ($errors->has('total'))
                                                <span class="help-block"><strong>{{ $errors->first('total') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('service_income') ? 'has-error' : '' }}">
                                            <label for="service_income">Service Income</label>
                                            <input name="service_income" type="number" id="service_income" class="form-control"   value="{{ $target->service_income }}"  min="0"  autofocus step="any"  placeholder=""     >
                                            @if ($errors->has('service_income'))
                                                <span class="help-block"><strong>{{ $errors->first('service_income') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('tractor_spare_parts_lubricants') ? 'has-error' : '' }}">
                                            <label for="tractor_spare_parts_lubricants">Tractor Spare Parts and Lubricants</label>
                                            <input name="tractor_spare_parts_lubricants"  type="number" id="tractor_spare_parts_lubricants" class="form-control"   value="{{ $target->tractor_spare_parts_lubricants }}"  min="0"  autofocus step="any"  placeholder=""     >
                                            @if ($errors->has('tractor_spare_parts_lubricants'))
                                                <span class="help-block"><strong>{{ $errors->first('tractor_spare_parts_lubricants') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('nm_pt_spare_parts_lubricants') ? 'has-error' : '' }}">
                                            <label for="nm_pt_spare_parts_lubricants">NM/PT Spare Parts and Lubricants</label>
                                            <input name="nm_pt_spare_parts_lubricants" type="number" id="nm_pt_spare_parts_lubricants" class="form-control"   value="{{ $target->nm_pt_spare_parts_lubricants }}"  min="0"  autofocus step="any"  placeholder=""     >
                                            @if ($errors->has('nm_pt_spare_parts_lubricants'))
                                                <span class="help-block"><strong>{{ $errors->first('nm_pt_spare_parts_lubricants') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{$errors->has('note') ? 'has-error' : '' }}">
                                            <label for="note" class="col-sm-3 control-label">Note</label>
                                            <textarea name="note" id="note" type="text" class="form-control"   autofocus value="1"  max="200"  placeholder="Note"     >{{ old('note') }}</textarea>
                                            @if ($errors->has('note'))
                                                <span class="help-block"><strong>{{ $errors->first('note') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_id == 1)
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('engineer_id') ? 'has-error' : '' }}">
                                            <label for="engineer_id">Engineer </label>
                                            <select name="engineer_id" id="engineer_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                                <option value="">Select Engineer</option>
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}"  @if($user->id == $target->engineer_id){{"selected"}} @endif >{{$user->username}} - {{$user->name}}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('engineer_id'))
                                                <span class="help-block"><strong>{{ $errors->first('engineer_id') }}</strong></span>
                                            @endif  
                                        </div>
                                    </div>
                                    @endif

                            </div>

                     <div class="card-footer">
                       <button type="submit" class="btn btn-info float-right btn-flat">Edit</button>
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

<script>document.title = 'Target | Edit';
$('#territory_id').change(function(){
   var url = '{{url("/json/user-of-territory")}}/'+$(this).val();
    chainSelect(url,'technitian_id','id',['username','name'],first_option_txt='Select Technitian',first_option_value="",spacer = " - ")
});

$('#installation, #warranty_service, #post_warranty_service,#preodic_service,#post_warranty_visit').change(function(){
 
 $('#total').val(
    parseInt($('#installation').val()) + parseInt($('#preodic_service').val()) + parseInt($('#warranty_service').val()) 
    + parseInt($('#post_warranty_service').val()) + parseInt($('#post_warranty_visit').val())
 );
});

</script>
@endsection
