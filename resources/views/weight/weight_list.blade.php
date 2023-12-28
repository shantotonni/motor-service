@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Weight</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Weight</li>
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
              <h3 class="card-title">Weight </h3>
              <a href="{{url('/weight/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create Weight</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                      <th>Id</th>
                  <th>Kpi type</th>
                  <th>Service ratio ws weight</th>
                  <th>Service ratio pws weight</th>
                  <th>Satisfaction index six weight</th>
                  <th>Satisfaction index csi weight</th>
                  <th>Service income weight</th>
                  <th>Report submission weight</th>
                  <th>App monitor weight</th>
                  <th>Team co weight</th>
                  <th>Sp tractor weight</th>
                  <th>Sp nmpt weight</th>
                  <th>Sp tractor plus nmpt weight</th>

                      <th>Controls</th>
                </thead>
                <tbody>
                    @foreach ($weights as $weight)
                      <tr>
                          <td>{{$weight->id}}</td>
                      <td>{{$weight->kpi_type->name}}</td>
                      <td>{{$weight->service_ratio_ws_weight}}</td>
                      <td>{{$weight->service_ratio_pws_weight}}</td>
                      <td>{{$weight->satisfaction_index_six_weight}}</td>
                      <td>{{$weight->satisfaction_index_csi_weight}}</td>
                      <td>{{$weight->service_income_weight}}</td>
                      <td>{{$weight->report_submission_weight}}</td>
                      <td>{{$weight->app_monitor_weight}}</td>
                      <td>{{$weight->team_co_weight}}</td>
                      <td>{{$weight->sp_tractor_weight}}</td>
                      <td>{{$weight->sp_nmpt_weight}}</td>
                      <td>{{$weight->sp_tractor_plus_nmpt_weight}}</td>

                          <td>
                              <a href="{{url('/weight/'.$weight->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              <a href="{{url('/weight/'.$weight->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              <a id="openDeleteModal" data-toggle="modal" data-id="{{$weight->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                  <th>Kpi type</th>
                  <th>Service ratio ws weight</th>
                  <th>Service ratio pws weight</th>
                  <th>Satisfaction index six weight</th>
                  <th>Satisfaction index csi weight</th>
                  <th>Service income weight</th>
                  <th>Report submission weight</th>
                  <th>App monitor weight</th>
                  <th>Team co weight</th>
                  <th>Sp tractor weight</th>
                  <th>Sp nmpt weight</th>
                  <th>Sp tractor plus nmpt weight</th>

                    <th>Controls</th>
                </tr>
                </tfoot>
              </table>
              {{$weights->links()}}
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

<script>document.title = 'Weight';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/weight')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
