@extends('layouts.master')
@section('title','User Edit | ACI Motors')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.update',$admin->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
                                    <div class="col-md-6">
                                        <select id="role_id" type="role_id" class="form-control role_id" name="role_id" required>
                                            <option value="">Select role</option>
                                            @foreach($roles as $role)
                                                @if($role->id == $admin->role_id)
                                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                @else
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Kpi Type</label>
                                    <div class="col-md-6">
                                        <select id="kpi_type_id" type="kpi_type_id" class="form-control" name="kpi_type_id" required>
                                            <option value="">Select Kpi Type</option>
                                            @foreach($kpi_types as $kpi_type)
                                                @if($kpi_type->id == $admin->kpi_type_id)
                                                <option value="{{$kpi_type->id}}" selected>{{$kpi_type->name}}</option>
                                                @else
                                                    <option value="{{$kpi_type->id}}">{{$kpi_type->name}}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('kpi_type_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('kpi_type_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $admin->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Staff Id') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $admin->username }}" required autocomplete="username">

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="designation" class="col-md-4 col-form-label text-md-right">Designation</label>

                                    <div class="col-md-6">
                                        <input id="designation" type="designation" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $admin->designation }}" required autocomplete="designation">

                                        @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>

                                    <div class="col-md-6">
                                        <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" max="11" value="{{ $admin->mobile }}" required autocomplete="mobile">

                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $admin->email }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="account_no" class="col-md-4 col-form-label text-md-right">Account No</label>
                                    <div class="col-md-6">
                                        <input id="account_no" type="text" class="form-control" name="account_no" value="{{ $admin->account_no }}" >
                                        @error('account_no')
                                        <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="is_active" class="col-md-4 col-form-label text-md-right">Active</label>
                                    <div class="col-md-6">
                                        <select name="is_active" id="is_active" class="form-control">
                                            @if($admin->is_active == 1)
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="self_bike" class="col-md-4 col-form-label text-md-right">Self Bike</label>
                                    <div class="col-md-6">
                                        <select name="self_bike" id="self_bike" class="form-control">
                                            @if($admin->self_bike == 'Y')
                                                <option value="Y" selected>Yes</option>
                                                <option value="N">No</option>
                                            @else
                                                <option value="Y">Yes</option>
                                                <option value="N" selected>No</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="is_ssr" class="col-md-4 col-form-label text-md-right">Is SSR</label>
                                    <div class="col-md-6">
                                        <select name="is_ssr" id="is_ssr" class="form-control">
                                            @if($admin->is_ssr == 'Y')
                                            <option value="Y" selected>Yes</option>
                                                <option value="N">No</option>
                                            @else
                                                <option value="Y">Yes</option>
                                                <option value="N" selected>No</option>
                                                @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="spare_parts_permission" class="col-md-4 col-form-label text-md-right">Spare Parts Permission</label>
                                    <div class="col-md-6">
                                        <select name="spare_parts_permission" id="spare_parts_permission" class="form-control">
                                            @if($admin->spare_parts_permission == 'Y')
                                                <option value="Y" selected>Yes</option>
                                                <option value="N">No</option>
                                            @else
                                                <option value="Y">Yes</option>
                                                <option value="N" selected>No</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row depot">
                                    <label for="Depot" class="col-md-4 col-form-label text-md-right">Depot</label>
                                    <div class="col-md-6">
                                        <select name="Depot" id="Depot" class="form-control">
                                            <option value="">Select Depo</option>
                                            @foreach($depots as $key => $value)
                                                @if($key == $admin->Depot)
                                                <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if(Auth::user()->role_id == 1)
                                <div class="form-group row">
                                    <label for="Depot" class="col-md-4 col-form-label text-md-right">Signature</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function (){
            let role = $('.role_id').val();
            if(role==2){
                $('.depot').show()
            }else {
                $('.depot').hide()
            }

            $('.role_id').on('change',function (){
                let role = $('.role_id').val();
                if(role==2){
                    $('.depot').show()
                }else {
                    $('.depot').hide()
                }
            })
        })
    </script>

@endsection
