@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Operator</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Operator Edit</li>
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
                            <h3 class="card-title">Operator</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="" role="form" method="POST" action="{{ route('operator.update') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$operator->id}}">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('operator_name') ? 'has-error' : '' }}">
                                            <label for="operator_name">Operator Name</label>
                                            <input name="operator_name" type="text" id="operator_name" class="form-control" value="{{ $operator->operator_name }}" placeholder="operator name">
                                            @if ($errors->has('operator_name'))
                                                <span class="help-block"><strong>{{ $errors->first('operator_name') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('village') ? 'has-error' : '' }}">
                                            <label for="village">Village</label>
                                            <input name="village" type="text" id="village" class="form-control" value="{{ $operator->village }}" placeholder="operator village">
                                            @if ($errors->has('village'))
                                                <span class="help-block"><strong>{{ $errors->first('village') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('post_office') ? 'has-error' : '' }}">
                                            <label for="post_office">Post office</label>
                                            <input name="post_office" type="text" id="post_office" class="form-control" value="{{ $operator->post_office }}" placeholder="post office">
                                            @if ($errors->has('post_office'))
                                                <span class="help-block"><strong>{{ $errors->first('post_office') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('police_station') ? 'has-error' : '' }}">
                                            <label for="police_station">Police station</label>
                                            <input name="police_station" type="text" id="police_station" class="form-control" value="{{ $operator->police_station }}" placeholder="police station">
                                            @if ($errors->has('police_station'))
                                                <span class="help-block"><strong>{{ $errors->first('police_station') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                            <label for="type">Area</label>
                                            <select name="area" id="area" class="form-control select2">
                                                <option value="">Select Area</option>
                                                @foreach($areas as $area)
                                                    @if ($area->id == $operator->area)
                                                        <option selected value="{{ $area->id }}">{{ $area->name }} - {{ $area->name_bn }}</option>
                                                    @else
                                                        <option value="{{ $area->id }}">{{ $area->name }} - {{ $area->name_bn }}</option>
                                                    @endif

                                                @endforeach
                                            </select>
                                            @if ($errors->has('area'))
                                                <span class="help-block"><strong>{{ $errors->first('area') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                                            <label for="type">district</label>
                                            <select name="district" id="district" class="form-control select2">
                                                <option value="">Select district</option>
                                                @foreach($districts as $district)
                                                    @if ($district->id == $operator->district)
                                                        <option selected value="{{ $district->id }}">{{ $district->name }} - {{ $district->name_bn }}</option>
                                                    @else
                                                        <option value="{{ $district->id }}">{{ $district->name }} - {{ $district->name_bn }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('district'))
                                                <span class="help-block"><strong>{{ $errors->first('district') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                            <label for="mobile">Mobile</label>
                                            <input name="mobile" type="number" id="mobile" class="form-control" value="{{ $operator->mobile }}" placeholder="mobile" required>
                                            @if ($errors->has('mobile'))
                                                <span class="help-block"><strong>{{ $errors->first('mobile') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('training_level') ? 'has-error' : '' }}">
                                            <label for="type">Training Level</label>
                                            <select name="training_level" id="training_level" class="form-control select2">
                                                <option value="">Select training level</option>
                                                <option @if($operator->training_level=='Level 1') {{'selected'}} @endif value="Level 1">Level 1</option>
                                                <option @if($operator->training_level=='Level 2') {{'selected'}} @endif value="Level 2">Level 2</option>
                                            
                                            </select>
                                            @if ($errors->has('training_level'))
                                                <span class="help-block"><strong>{{ $errors->first('training_level') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('training_date') ? 'has-error' : '' }}">
                                            <label for="training_date">Training Date</label>
                                            <input name="training_date" type="text" id="training_date" class="form-control" value="@if(!empty($operator->training_date)){{ date('Y-m-d',strtotime($operator->training_date)) }} @endif" placeholder="training date">
                                            @if ($errors->has('training_date'))
                                                <span class="help-block"><strong>{{ $errors->first('training_date') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('training_venue') ? 'has-error' : '' }}">
                                            <label for="training_venue">Training Venue</label>
                                            <input name="training_venue" type="text" id="training_venue" class="form-control" value="@if(!empty($operator->training_venue)){{ $operator->training_venue }} @endif" placeholder="training venue">
                                            @if ($errors->has('training_venue'))
                                                <span class="help-block"><strong>{{ $errors->first('training_venue') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('total_training_days') ? 'has-error' : '' }}">
                                            <label for="total_training_days">Total training days</label>
                                            <input name="total_training_days" type="text" id="total_training_days" class="form-control" value="@if(!empty($operator->total_training_days)){{ $operator->total_training_days }} @endif" placeholder="total_training_days">
                                            @if ($errors->has('total_training_days'))
                                                <span class="help-block"><strong>{{ $errors->first('total_training_days') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('operating_experience') ? 'has-error' : '' }}">
                                            <label for="type">Operating Experience</label>
                                            <select name="operating_experience" id="operating_experience" class="form-control select2">
                                                <option value="">Select operating experience</option>
                                                <option @if($operator->operating_experience=='0 to 1 yrs') {{'selected'}} @endif value="0 to 1 yrs">0 to 1 yrs</option>
                                                <option @if($operator->operating_experience=='1-2 yrs') {{'selected'}} @endif value="1-2 yrs">1-2 yrs</option>
                                                <option @if($operator->operating_experience=='2-3 yrs') {{'selected'}} @endif value="2-3 yrs">2-3 yrs</option>
                                                <option @if($operator->operating_experience=='3-4 yrs') {{'selected'}} @endif value="3-4 yrs">3-4 yrs</option>
                                                <option @if($operator->operating_experience=='4-5 yrs') {{'selected'}} @endif value="4-5 yrs">4-5 yrs</option>
                                                <option @if($operator->operating_experience=='5-above yrs') {{'selected'}} @endif value="5-above yrs">5-above yrs</option>    
                                            </select>
                                            @if ($errors->has('operating_experience'))
                                                <span class="help-block"><strong>{{ $errors->first('operating_experience') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('education') ? 'has-error' : '' }}">
                                            <label for="type">Educational Qualifications</label>
                                            <select name="education" id="education" class="form-control select2">
                                                <option value="">Select</option>
                                                <option @if($operator->education=='Primary') {{'selected'}} @endif value="Primary">Primary</option>
                                                <option @if($operator->education=='High School') {{'selected'}} @endif value="High School">High School</option>
                                                <option @if($operator->education=='Intermediate') {{'selected'}} @endif value="Intermediate">Intermediate</option>
                                                <option @if($operator->education=='Honors') {{'selected'}} @endif value="Honors">Honors</option>
                                                <option @if($operator->education=='None') {{'selected'}} @endif value="None">None</option>
                                            </select>
                                            @if ($errors->has('education'))
                                                <span class="help-block"><strong>{{ $errors->first('education') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('nid_no') ? 'has-error' : '' }}">
                                            <label for="nid_no">NID No.</label>
                                            <input name="nid_no" type="text" id="nid_no" class="form-control" value="@if(!empty($operator->nid_no)){{ $operator->nid_no }} @endif" placeholder="nid no" required>
                                            @if ($errors->has('nid_no'))
                                                <span class="help-block"><strong>{{ $errors->first('nid_no') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group {{ $errors->has('image_url') ? 'has-error' : '' }}">
                                            <label for="image_url">Operator Image</label>
                                            <input name="image_url" type="file" id="image_url" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right btn-flat">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- /.col-12 -->
            </div> <!--row end -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->

    <script>document.title = 'Operator | Edit';</script>
    <script>
        $( "#training_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    </script>
@endsection
