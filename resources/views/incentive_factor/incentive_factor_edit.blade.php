@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">IncentiveFactor</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">IncentiveFactor Edit</li>
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
                    <h3 class="card-title">IncentiveFactor</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('incentive_factor.update',$incentive_factor->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                            <div class="row">
                             
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('kpi_type_id') ? 'has-error' : '' }}">
                        <label for="kpi_type_id">Kpi type </label>
                        <select name="kpi_type_id" id="kpi_type_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus required     >
                            <option value="">Select Kpi type</option>
                            @foreach($kpi_types as $kpi_type)
                             <option value="{{$kpi_type->id}}"  @if($kpi_type->id == $incentive_factor->kpi_type_id){{"selected"}} @endif >{{$kpi_type->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('kpi_type_id'))
                            <span class="help-block"><strong>{{ $errors->first('kpi_type_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Name</label>
                        <input name="name" type="text" id="name" class="form-control"   value="{{$incentive_factor->name}}"    autofocus max="191"  required  placeholder="Name"     >
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('from') ? 'has-error' : '' }}">
                        <label for="from">From</label>
                        <input name="from" type="number" id="from" class="form-control"   value="{{$incentive_factor->from}}"    autofocus required  placeholder="From"     >
                        @if ($errors->has('from'))
                            <span class="help-block"><strong>{{ $errors->first('from') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('to') ? 'has-error' : '' }}">
                        <label for="to">To</label>
                        <input name="to" type="number" id="to" class="form-control"   value="{{$incentive_factor->to}}"    autofocus required  placeholder="To"     >
                        @if ($errors->has('to'))
                            <span class="help-block"><strong>{{ $errors->first('to') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('multiplication_factor') ? 'has-error' : '' }}">
                        <label for="multiplication_factor">Multiplication factor</label>
                        <input name="multiplication_factor" type="number" id="multiplication_factor" class="form-control"   value="{{$incentive_factor->multiplication_factor}}"    autofocus step="any"  required  placeholder="Multiplication factor"     >
                        @if ($errors->has('multiplication_factor'))
                            <span class="help-block"><strong>{{ $errors->first('multiplication_factor') }}</strong></span>
                        @endif
                    </div>
                </div>

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

<script>document.title = 'IncentiveFactor | Edit';</script>
@endsection
