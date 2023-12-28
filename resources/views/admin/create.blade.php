@extends('layouts.master')
@section('title','User Create | ACI Motors')
@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="company" class="col-md-4 col-form-label text-md-right">Company</label>
                                    <div class="col-md-6">
                                        <select id="company_id" type="company_id" class="form-control" name="company_id" required>
                                            <option value="">Select company</option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('company_id'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
                                    <div class="col-md-6">
                                        <select id="role_id" type="role_id" class="form-control role_id" name="role_id" required>
                                            <option value="">Select role</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
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
                                                <option value="{{$kpi_type->id}}">{{$kpi_type->name}}</option>
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
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

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
                                        <input id="designation" type="designation" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation">

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
                                        <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" max="11" required autocomplete="mobile">

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
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="is_ssr" class="col-md-4 col-form-label text-md-right">Is SSR</label>
                                    <div class="col-md-6">
                                        <select name="is_ssr" id="is_ssr" class="form-control">
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="spare_parts_permission" class="col-md-4 col-form-label text-md-right">Spare Parts Permission</label>
                                    <div class="col-md-6">
                                        <select name="spare_parts_permission" id="spare_parts_permission" class="form-control">
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row depot">
                                    <label for="Depot" class="col-md-4 col-form-label text-md-right">Depot</label>
                                    <div class="col-md-6">
                                        <select name="Depot" id="Depot" class="form-control">
                                            <option value="">Select Depo</option>
                                            @foreach($depots as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

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
            $('.depot').hide()
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


