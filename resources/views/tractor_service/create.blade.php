@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tractor Service Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Tractor Service Details Create</li>
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
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Tractor Service Details</h3>
                    </div>
                    <div class="card-body">
                        <form class="" role="form" method="POST" action="{{ route('tractor-service-details.store') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('topic_id') ? 'has-error' : '' }}">
                                        <label for="topic_id">Topic </label>
                                        <select name="topic_id" id="topic_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                            <option value="">Select Topic</option>
                                            @foreach($topics as $topic)
                                                <option value="{{$topic->id}}" @if($topic->id == old("topic_id")){{"selected"}} @endif> {{$topic->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('topic_id'))
                                            <span class="help-block"><strong>{{ $errors->first('topic_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('from_hr') ? 'has-error' : '' }}">
                                        <label for="from_hr">From hr</label>
                                        <input name="from_hr" type="number" id="from_hr" class="form-control" value="{{ old('from_hr') }}" autofocus  required  placeholder="From hr"     >
                                        @if ($errors->has('from_hr'))
                                            <span class="help-block"><strong>{{ $errors->first('from_hr') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('to_hr') ? 'has-error' : '' }}">
                                        <label for="to_hr">To hr</label>
                                        <input name="to_hr" type="number" id="to_hr" class="form-control" value="{{ old('to_hr') }}" autofocus  required  placeholder="To hr"     >
                                        @if ($errors->has('to_hr'))
                                            <span class="help-block"><strong>{{ $errors->first('to_hr') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('fixed_hr') ? 'has-error' : '' }}">
                                        <label for="fixed_hr">Fixed hr</label>
                                        <input name="fixed_hr" type="number" id="fixed_hr" class="form-control" value="{{ old('fixed_hr') }}" autofocus required  placeholder="From hr"     >
                                        @if ($errors->has('fixed_hr'))
                                            <span class="help-block"><strong>{{ $errors->first('fixed_hr') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('servicing_type_id') ? 'has-error' : '' }}">
                                        <label for="servicing_type_id">Servicing type </label>
                                        <select name="servicing_type_id" id="servicing_type_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus required     >
                                            <option value="">Select Servicing type</option>
                                            @foreach($servicing_types as $servicing_type)
                                                <option value="{{$servicing_type->id}}" @if($servicing_type->id == old("servicing_type_id")){{"selected"}} @endif">{{$servicing_type->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('servicing_type_id'))
                                            <span class="help-block"><strong>{{ $errors->first('servicing_type_id') }}</strong></span>
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
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<style>
    .help-block{
        color: red;
    }
</style>

<script>document.title = 'Tractor Service Details | Create';</script>
@endsection
