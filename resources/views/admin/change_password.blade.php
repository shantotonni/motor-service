@extends('layouts.master')
@section('title','User Password Change | ACI Motors')
@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Change Password') }}</div>
                        <?php
                            $id = request()->segment(3);
                        ?>
                        <div class="card-body">
                            <form method="POST" action="{{ route('change.password.store') }}">
                                @csrf
                                <div class="row">
{{--                                    <div class="col-2">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="old_password">Old Password</label>--}}
{{--                                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <input type="hidden" value="{{ $id }}" name="UserId">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter password confirmation">
                                        </div>
                                    </div>
                                    <div class="col-2" style="margin-top: 30px">
                                        <button type="submit" name="submit" id="change-password" value="Submit" class="btn btn-info">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
