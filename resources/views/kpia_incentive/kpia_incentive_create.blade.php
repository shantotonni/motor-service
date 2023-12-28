@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">KpiaIncentive</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">KpiaIncentive Create</li>
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
                    <h3 class="card-title">KpiaIncentive</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('kpia_incentive.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('kpia_id') ? 'has-error' : '' }}">
                        <label for="kpia_id">Kpia </label>
                        <select name="kpia_id" id="kpia_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select Kpia</option>
                            @foreach($kpia as $kpium)
                            <option value="{{$kpium->id}}" @if($kpium->id == old("kpia_id")){{"selected"}} @endif">{{$kpium->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('kpia_id'))
                            <span class="help-block"><strong>{{ $errors->first('kpia_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('incentive_factor_id') ? 'has-error' : '' }}">
                        <label for="incentive_factor_id">Incentive factor </label>
                        <select name="incentive_factor_id" id="incentive_factor_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select Incentive factor</option>
                            @foreach($incentive_factors as $incentive_factor)
                            <option value="{{$incentive_factor->id}}" @if($incentive_factor->id == old("incentive_factor_id")){{"selected"}} @endif">{{$incentive_factor->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('incentive_factor_id'))
                            <span class="help-block"><strong>{{ $errors->first('incentive_factor_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('multiplier') ? 'has-error' : '' }}">
                        <label for="multiplier">Multiplier</label>
                        <input name="multiplier" type="number" id="multiplier" class="form-control"   value="{{ old('multiplier') }}"    autofocus step="any"  placeholder="Multiplier"     >
                        @if ($errors->has('multiplier'))
                            <span class="help-block"><strong>{{ $errors->first('multiplier') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('tractor') ? 'has-error' : '' }}">
                        <label for="tractor">Tractor</label>
                        <input name="tractor" type="number" id="tractor" class="form-control"   value="{{ old('tractor') }}"    autofocus step="any"  placeholder="Tractor"     >
                        @if ($errors->has('tractor'))
                            <span class="help-block"><strong>{{ $errors->first('tractor') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('nmpt') ? 'has-error' : '' }}">
                        <label for="nmpt">Nmpt</label>
                        <input name="nmpt" type="number" id="nmpt" class="form-control"   value="{{ old('nmpt') }}"    autofocus step="any"  placeholder="Nmpt"     >
                        @if ($errors->has('nmpt'))
                            <span class="help-block"><strong>{{ $errors->first('nmpt') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('tractor_and_nmpt') ? 'has-error' : '' }}">
                        <label for="tractor_and_nmpt">Tractor and nmpt</label>
                        <input name="tractor_and_nmpt" type="number" id="tractor_and_nmpt" class="form-control"   value="{{ old('tractor_and_nmpt') }}"    autofocus step="any"  placeholder="Tractor and nmpt"     >
                        @if ($errors->has('tractor_and_nmpt'))
                            <span class="help-block"><strong>{{ $errors->first('tractor_and_nmpt') }}</strong></span>
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

<script>document.title = 'KpiaIncentive | Create';</script>
@endsection
