@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserKpiCode</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserKpiCode</li>
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
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">UserKpiCode </h3>
              <a href="{{url('/user_kpi_code/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create UserKpiCode</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                      
                      <th>Staff Id</th>
                      <th>User</th>
                      <th>Service income code</th>
                      <th>Tractor spare parts code</th>
                      <th>Tractor sonalika lub code</th>
                      <th>Tractor power oil code</th>
                      <th>Nm spare parts code</th>
                      <th>Nm power oil code</th>
                      <th>Pt spare parts code</th>
                      <th>Pt power oil code</th>

                      <th>Controls</th>
                </thead>
                <tbody>
                    @foreach ($user_kpi_codes as $user_kpi_code)
                      <tr>
                          
                          <td>{{$user_kpi_code->user->username}}</td>
                          <td>{{$user_kpi_code->user->name}}</td>
                          <td>{{$user_kpi_code->service_income_code}}</td>
                          <td>{{$user_kpi_code->tractor_spare_parts_code}}</td>
                          <td>{{$user_kpi_code->tractor_sonalika_lub_code}}</td>
                          <td>{{$user_kpi_code->tractor_power_oil_code}}</td>
                          <td>{{$user_kpi_code->nm_spare_parts_code}}</td>
                          <td>{{$user_kpi_code->nm_power_oil_code}}</td>
                          <td>{{$user_kpi_code->pt_spare_parts_code}}</td>
                          <td>{{$user_kpi_code->pt_power_oil_code}}</td>

                          <td>
                              <a href="{{url('/user_kpi_code/'.$user_kpi_code->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              <a href="{{url('/user_kpi_code/'.$user_kpi_code->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              <!--
                              <a id="openDeleteModal" data-toggle="modal" data-id="{{$user_kpi_code->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a>
                              -->
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                
              </table>
             
            </div>  
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->


<!-- Modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Delete Item !!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="delete_modal_form" role="form" method="POST" action="">
        {{ csrf_field() }}
        {{ method_field("DELETE") }}
      <div class="modal-body">
          <p class="text-center danger">Are Your Sure ? </p>
          <input id="delete_id" type="hidden" name="id">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary float-left">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>document.title = 'UserKpiCode';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/user_kpi_code')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
