@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">KpiTopic</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">KpiTopic Create</li>
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
                    <h3 class="card-title">KpiTopic</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('kpi_topic.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Name</label>
                        <input name="name" type="text" id="name" class="form-control"   value="{{ old('name') }}"    autofocus max="191"  required  placeholder="Name"     >
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('kpi_type_id') ? 'has-error' : '' }}">
                        <label for="kpi_type_id">Kpi type </label>
                        <select name="kpi_type_id" id="kpi_type_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus required     >
                            <option value="">Select Kpi type</option>
                            @foreach($kpi_types as $kpi_type)
                            <option value="{{$kpi_type->id}}" @if($kpi_type->id == old("kpi_type_id")){{"selected"}} @endif">{{$kpi_type->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('kpi_type_id'))
                            <span class="help-block"><strong>{{ $errors->first('kpi_type_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('kpi_group_id') ? 'has-error' : '' }}">
                        <label for="kpi_group_id">Kpi group </label>
                        <select name="kpi_group_id" id="kpi_group_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select Kpi group</option>
                            @foreach($kpi_groups as $kpi_group)
                            <option value="{{$kpi_group->id}}" @if($kpi_group->id == old("kpi_group_id")){{"selected"}} @endif">{{$kpi_group->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('kpi_group_id'))
                            <span class="help-block"><strong>{{ $errors->first('kpi_group_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('sl') ? 'has-error' : '' }}">
                        <label for="sl">Sl</label>
                        <input name="sl" type="text" id="sl" class="form-control"   value="{{ old('sl') }}"    autofocus max="191"  placeholder="Sl"     >
                        @if ($errors->has('sl'))
                            <span class="help-block"><strong>{{ $errors->first('sl') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('mark') ? 'has-error' : '' }}">
                        <label for="mark">Mark</label>
                        <input name="mark" type="number" id="mark" class="form-control"   value="{{ old('mark') }}"    autofocus step="any"  placeholder="Mark"     >
                        @if ($errors->has('mark'))
                            <span class="help-block"><strong>{{ $errors->first('mark') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('ach_from') ? 'has-error' : '' }}">
                        <label for="ach_from">Ach from</label>
                        <input name="ach_from" type="number" id="ach_from" class="form-control"   value="{{ old('ach_from') }}"    autofocus placeholder="Ach from"     >
                        @if ($errors->has('ach_from'))
                            <span class="help-block"><strong>{{ $errors->first('ach_from') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('ach_to') ? 'has-error' : '' }}">
                        <label for="ach_to">Ach to</label>
                        <input name="ach_to" type="number" id="ach_to" class="form-control"   value="{{ old('ach_to') }}"    autofocus placeholder="Ach to"     >
                        @if ($errors->has('ach_to'))
                            <span class="help-block"><strong>{{ $errors->first('ach_to') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
                        <label for="weight">Weight</label>
                        <input name="weight" type="number" id="weight" class="form-control"   value="{{ old('weight') }}"    autofocus placeholder="Weight"     >
                        @if ($errors->has('weight'))
                            <span class="help-block"><strong>{{ $errors->first('weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('multiplication_factor') ? 'has-error' : '' }}">
                        <label for="multiplication_factor">Multiplication factor</label>
                        <input name="multiplication_factor" type="number" id="multiplication_factor" class="form-control"   value="{{ old('multiplication_factor') }}"    autofocus step="any"  placeholder="Multiplication factor"     >
                        @if ($errors->has('multiplication_factor'))
                            <span class="help-block"><strong>{{ $errors->first('multiplication_factor') }}</strong></span>
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

<script>document.title = 'KpiTopic | Create';</script>
@endsection
