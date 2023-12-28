@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dealer Point</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dealer Point Create</li>
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
                            <h3 class="card-title">Dealer Point</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="" role="form" method="POST" action="{{ route('dealer-point.store') }}">
                                {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
                                            <label for="area_id">Area </label>
                                            <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
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
                                        <div class="form-group {{$errors->has('address') ? 'has-error' : '' }}">
                                            <label for="address" class="col-sm-3 control-label">Address</label>
                                            <textarea name="address" id="address" type="text" class="form-control"   autofocus value="1"  max="200"  required  placeholder="Address"     >{{ old('address') }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('responsible_person') ? 'has-error' : '' }}">
                                            <label for="responsible_person">Responsible person</label>
                                            <input name="responsible_person" type="text" id="responsible_person" class="form-control"   value="{{ old('responsible_person') }}"    autofocus max="191"  required  placeholder="Responsible person"     >
                                            @if ($errors->has('responsible_person'))
                                                <span class="help-block"><strong>{{ $errors->first('responsible_person') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                            <label for="mobile">Mobile</label>
                                            <input name="mobile" type="text" id="mobile" class="form-control"   value="{{ old('mobile') }}"    autofocus max="191"  required  placeholder="Mobile"     >
                                            @if ($errors->has('mobile'))
                                                <span class="help-block"><strong>{{ $errors->first('mobile') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
                                            <label for="lat">Lat</label>
                                            <input name="lat" type="text" id="lat" class="form-control"   value="{{ old('lat') }}"    autofocus max="191"  required  placeholder="Lat"     >
                                            @if ($errors->has('lat'))
                                                <span class="help-block"><strong>{{ $errors->first('lat') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('lon') ? 'has-error' : '' }}">
                                            <label for="lon">Lon</label>
                                            <input name="lon" type="text" id="lon" class="form-control"   value="{{ old('lon') }}"    autofocus max="191"  required  placeholder="Lon"     >
                                            @if ($errors->has('lon'))
                                                <span class="help-block"><strong>{{ $errors->first('lon') }}</strong></span>
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
                </div> <!-- /.col-12 -->
            </div> <!--row end -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
    <script>document.title = 'ServiceCenter | Create';</script>
@endsection
