@extends('layouts.master')
@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
             @if(Session::has('success'))
                  <div class="alert alert-success">
                      <strong>Success! </strong> {{ Session::get('success') }}
                   </div> 
              @endif
              @if(Session::has('danger'))
                  <div class="alert alert-danger">
                      <strong>Success! </strong> {{ Session::get('danger') }}
                   </div> 
              @endif
            <div class="card">
                <div class="card-header">Admins:
                    <a href="{{url('/register')}}"><button class="btn btn-xs btn-success pull-right">Create admin</button></a>
                </div>
{{--                <div class="card-header">Import:--}}
{{--                    <form action="{{ route('user.import') }}" enctype="multipart/form-data" method="post">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <input type="file" name="file">--}}
{{--                        <button type="submit" class="btn btn-primary">Import</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Admin Name</th>
                                <th>Staff Id</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Designation</th>
                                <th>Role</th>
                                <th>KpiType</th>
                                <th>active</th>
                                <th>Access</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($admins as $admin)
                            <tr style="@if($admin->active == '0') background-color: #ffcccc; @endif">
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->username}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->mobile}}</td>
                                <td>{{$admin->designation}}</td>
                                <td>{{$admin->role->name}}</td>
                                <td>@if($admin->kpi_type_id){{$admin->kpi_type->name}}@endif</td>
                                <td>{{$admin->is_active}}</td>
                                <td>
                                    <a href="{{url('/admin/access/'.$admin->id)}}"><button type="button" class="btn btn-xs btn-info">Access</button></a>
                                </td>
                                <td><a href="{{url('/admin/'.$admin->id.'/edit')}}"><button type="button" class="btn btn-xs btn-info">Edit</button></a>
                                    <a data-toggle="modal" data-id="{{$admin->id}}" data-toggle="modal" title="Add this item" class="open-AddBookDialog btn btn-primary btn-xs" href="#resetPasswordModal">Reset Password</a>
                                </td>
                            </tr>
                          @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

  <!-- Modal -->
  <div class="modal fade" id="resetPasswordModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reset Password</h4>
        </div>
        <div class="modal-body">
          
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/reset_password')}}">
            {{ csrf_field() }}
          
           <input type="hidden" id="admin_id" name="id">
           
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">New Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!-- <div class="form-group{{ $errors->has('admin_password') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">Admin Password(your)</label>

                <div class="col-md-6">
                    <input id="admin_password" type="password" class="form-control" name="admin_password">

                    @if ($errors->has('admin_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('admin_password') }}</strong>
                        </span>
                    @endif
                </div>
            </div> -->

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Reset
                    </button>
                </div>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
    $('#example1').DataTable();
    $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
    });

$(document).on("click", ".open-AddBookDialog", function () {
     var Id = $(this).data('id');
     $(".modal-body #admin_id").val( Id );
     $('#addBookDialog').modal('show');
});
  </script>
@endsection
