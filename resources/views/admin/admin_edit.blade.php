    @extends('layouts.master')

    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Feture</div>

                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{url('/')}}/admin/{{$admin->id}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                                <label for="is_active" class="col-md-4 control-label">is_active</label>
                                <div class="col-md-6">
                                    <input id="is_active" type="checkbox" class="" name="is_active" <?php if ($admin->is_active == '1') {
                                                                                                        echo "checked";
                                                                                                    } ?> autofocus>

                                    @if ($errors->has('is_active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_active') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $admin->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">username</label>
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ $admin->username }}" required autofocus>

                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ old('username') }}{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $admin->email }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ old('email') }}{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="col-md-4 control-label">mobile</label>
                                <div class="col-md-6">
                                    <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $admin->mobile }}" autofocus>

                                    @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ old('mobile') }}{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                                <label for="designation" class="col-md-4 control-label">Designation</label>
                                <div class="col-md-6">
                                    <input id="designation" type="text" class="form-control" name="designation" value="{{ $admin->designation }}" autofocus>

                                    @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ old('designation') }}{{ $errors->first('designation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role" class="col-md-4 col-form-label">Kpi Type</label>
                                <div class="col-md-6">
                                    <select id="kpi_type_id" type="kpi_type_id" class="form-control" name="kpi_type_id" required>
                                        <option value="">Select Kpi Type</option>
                                        @foreach($kpi_types as $kpi_type)
                                        <option value="{{$kpi_type->id}}" @if($kpi_type->id == $admin->kpi_type_id) {{"selected"}}@endif>{{$kpi_type->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kpi_type_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kpi_type_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('self_bike') ? ' has-error' : '' }}">
                                <label for="self_bike" class="col-md-4 control-label">Self bike</label>
                                <div class="col-md-6">
                                    <input id="self_bike" type="checkbox" class="" name="self_bike" <?php if($admin->self_bike == 'Y'){echo "checked";}?> autofocus>

                                    @if ($errors->has('self_bike'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('self_bike') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('account_no') ? ' has-error' : '' }}">
                                <label for="account_no" class="col-md-4 control-label">Account No.</label>
                                <div class="col-md-6">
                                    <input id="account_no" type="text" class="form-control" name="account_no" value="{{ $admin->account_no }}" autofocus>

                                    @if ($errors->has('account_no'))
                                    <span class="help-block">
                                        <strong>{{ old('account_no') }}{{ $errors->first('account_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary pull-right" autofocus>
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--               map   -->


    @endsection