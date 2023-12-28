@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserKpiDetail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserKpiDetail Create</li>
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
                    <h3 class="card-title">UserKpiDetail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form class="" role="form" method="POST" action="{{ route('user_kpi_detail.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                         
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('user_kpi_id') ? 'has-error' : '' }}">
                        <label for="user_kpi_id">User kpi </label>
                        <select name="user_kpi_id" id="user_kpi_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select User kpi</option>
                            @foreach($user_kpis as $user_kpi)
                            <option value="{{$user_kpi->id}}" @if($user_kpi->id == old("user_kpi_id")){{"selected"}} @endif">{{$user_kpi->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('user_kpi_id'))
                            <span class="help-block"><strong>{{ $errors->first('user_kpi_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('kpi_topic_id') ? 'has-error' : '' }}">
                        <label for="kpi_topic_id">Kpi topic </label>
                        <select name="kpi_topic_id" id="kpi_topic_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            <option value="">Select Kpi topic</option>
                            @foreach($kpi_topics as $kpi_topic)
                            <option value="{{$kpi_topic->id}}" @if($kpi_topic->id == old("kpi_topic_id")){{"selected"}} @endif">{{$kpi_topic->name}}</option>
                        @endforeach
                        </select>
                        @if ($errors->has('kpi_topic_id'))
                            <span class="help-block"><strong>{{ $errors->first('kpi_topic_id') }}</strong></span>
                        @endif  
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('target') ? 'has-error' : '' }}">
                        <label for="target">Target</label>
                        <input name="target" type="number" id="target" class="form-control"   value="{{ old('target') }}"    autofocus step="any"  placeholder="Target"     >
                        @if ($errors->has('target'))
                            <span class="help-block"><strong>{{ $errors->first('target') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('actual') ? 'has-error' : '' }}">
                        <label for="actual">Actual</label>
                        <input name="actual" type="number" id="actual" class="form-control"   value="{{ old('actual') }}"    autofocus step="any"  placeholder="Actual"     >
                        @if ($errors->has('actual'))
                            <span class="help-block"><strong>{{ $errors->first('actual') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
                        <label for="weight">Weight</label>
                        <input name="weight" type="number" id="weight" class="form-control"   value="{{ old('weight') }}"    autofocus step="any"  placeholder="Weight"     >
                        @if ($errors->has('weight'))
                            <span class="help-block"><strong>{{ $errors->first('weight') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}">
                        <label for="score">Score</label>
                        <input name="score" type="number" id="score" class="form-control"   value="{{ old('score') }}"    autofocus step="any"  placeholder="Score"     >
                        @if ($errors->has('score'))
                            <span class="help-block"><strong>{{ $errors->first('score') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('f_score') ? 'has-error' : '' }}">
                        <label for="f_score">F score</label>
                        <input name="f_score" type="number" id="f_score" class="form-control"   value="{{ old('f_score') }}"    autofocus step="any"  placeholder="F score"     >
                        @if ($errors->has('f_score'))
                            <span class="help-block"><strong>{{ $errors->first('f_score') }}</strong></span>
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

<script>document.title = 'UserKpiDetail | Create';</script>
@endsection
