@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">UserKpiDetail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">UserKpiDetail</li>
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
              <h3 class="card-title">UserKpiDetail </h3>
              <a href="{{url('/user_kpi_detail/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create UserKpiDetail</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                      <th>Id</th>
                  <th>User kpi</th>
                  <th>Kpi topic</th>
                  <th>Target</th>
                  <th>Actual</th>
                  <th>Weight</th>
                  <th>Score</th>
                  <th>F score</th>

                      <th>Controls</th>
                </thead>
                <tbody>
                    @foreach ($user_kpi_details as $user_kpi_detail)
                      <tr>
                          <td>{{$user_kpi_detail->id}}</td>
                      <td>{{$user_kpi_detail->user_kpi->name}}</td>
                      <td>{{$user_kpi_detail->kpi_topic->name}}</td>
                      <td>{{$user_kpi_detail->target}}</td>
                      <td>{{$user_kpi_detail->actual}}</td>
                      <td>{{$user_kpi_detail->weight}}</td>
                      <td>{{$user_kpi_detail->score}}</td>
                      <td>{{$user_kpi_detail->f_score}}</td>

                          <td>
                              <a href="{{url('/user_kpi_detail/'.$user_kpi_detail->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              <a href="{{url('/user_kpi_detail/'.$user_kpi_detail->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              <a id="openDeleteModal" data-toggle="modal" data-id="{{$user_kpi_detail->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                  <th>User kpi</th>
                  <th>Kpi topic</th>
                  <th>Target</th>
                  <th>Actual</th>
                  <th>Weight</th>
                  <th>Score</th>
                  <th>F score</th>

                    <th>Controls</th>
                </tr>
                </tfoot>
              </table>
              {{$user_kpi_details->links()}}
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

<script>document.title = 'UserKpiDetail';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/user_kpi_detail')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
