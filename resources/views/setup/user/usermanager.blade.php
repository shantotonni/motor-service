@extends('layouts.master')
@section('title','User Manager | Motors Service')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>User Manager List</h4>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-hover text-nowrap table-bordered table-sm small">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">Designation</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Role Id</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->username}}</td>
                                <td class="text-center">{{$user->designation}}</td>
                                <td class="text-center">{{$user->is_active}}</td>
                                <td class="text-center">{{$user->role_id}}</td>
                                <td class="text-center">
                                    <a class="btn btn-danger btn-sm" href="{{url('user-menu-permission',$user->id)}}">Add Permission</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('jquery')
    <script>
        $(document).ready(function () {
            // jQuery Form Validation
            $('.form-validation').validate({
                rules: {
                    userName: {
                        required: true,
                        maxlength: 255
                    },
                    designation: {
                        required: true,
                        maxlength: 250
                    },
                },
            });
        });
    </script>
@endsection
