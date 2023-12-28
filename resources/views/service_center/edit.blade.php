@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Service Center</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Service Center Edit</li>
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
                            <h3 class="card-title">Service Center</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="" role="form" method="POST" action="{{ route('service-center.update',$service_center->id ) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
                                            <label for="area_id">Area </label>
                                            <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                                                <option value="">Select Area</option>
                                                @foreach($areas as $area)
                                                    <option value="{{$area->id}}"  @if($area->id == $service_center->area_id){{"selected"}} @endif >{{$area->name}}</option>
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
                                            <textarea name="address" id="address" type="text" class="form-control" autofocus required  placeholder="Address">{{$service_center->address}}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('responsible_person') ? 'has-error' : '' }}">
                                            <label for="responsible_person">Responsible person</label>
                                            <input name="responsible_person" type="text" id="responsible_person" class="form-control" value="{{$service_center->responsible_person}}" autofocus max="191"  required  placeholder="Responsible person"     >
                                            @if ($errors->has('responsible_person'))
                                                <span class="help-block"><strong>{{ $errors->first('responsible_person') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                            <label for="mobile">Mobile</label>
                                            <input name="mobile" type="text" id="mobile" class="form-control"   value="{{$service_center->mobile}}"    autofocus max="191"  required  placeholder="Mobile"     >
                                            @if ($errors->has('mobile'))
                                                <span class="help-block"><strong>{{ $errors->first('mobile') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
                                            <label for="lat">Lat</label>
                                            <input name="lat" type="text" id="lat" class="form-control"   value="{{$service_center->lat}}"    autofocus max="191"  required  placeholder="Lat"     >
                                            @if ($errors->has('lat'))
                                                <span class="help-block"><strong>{{ $errors->first('lat') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('lon') ? 'has-error' : '' }}">
                                            <label for="lon">Lon</label>
                                            <input name="lon" type="text" id="lon" class="form-control"   value="{{$service_center->lon}}"    autofocus max="191"  required  placeholder="Lon"     >
                                            @if ($errors->has('lon'))
                                                <span class="help-block"><strong>{{ $errors->first('lon') }}</strong></span>
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

    <script>document.title = 'ServiceCenter | Edit';</script>
@endsection
