@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">KpiaIncentive</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">KpiaIncentive</li>
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
              <h3 class="card-title">KpiaIncentive </h3>
              <a href="{{url('/kpia_incentive/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create KpiaIncentive</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                      <th>Id</th>
                  <th>Kpia</th>
                  <th>Incentive factor</th>
                  <th>Multiplier</th>
                  <th>Tractor</th>
                  <th>Nmpt</th>
                  <th>Tractor and nmpt</th>

                      <th>Controls</th>
                </thead>
                <tbody>
                    @foreach ($kpia_incentives as $kpia_incentive)
                      <tr>
                          <td>{{$kpia_incentive->id}}</td>
                      <td>{{$kpia_incentive->kpia->name}}</td>
                      <td>{{$kpia_incentive->incentive_factor->name}}</td>
                      <td>{{$kpia_incentive->multiplier}}</td>
                      <td>{{$kpia_incentive->tractor}}</td>
                      <td>{{$kpia_incentive->nmpt}}</td>
                      <td>{{$kpia_incentive->tractor_and_nmpt}}</td>

                          <td>
                              <a href="{{url('/kpia_incentive/'.$kpia_incentive->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              <a href="{{url('/kpia_incentive/'.$kpia_incentive->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              <a id="openDeleteModal" data-toggle="modal" data-id="{{$kpia_incentive->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                  <th>Kpia</th>
                  <th>Incentive factor</th>
                  <th>Multiplier</th>
                  <th>Tractor</th>
                  <th>Nmpt</th>
                  <th>Tractor and nmpt</th>

                    <th>Controls</th>
                </tr>
                </tfoot>
              </table>
              {{$kpia_incentives->links()}}
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

<script>document.title = 'KpiaIncentive';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/kpia_incentive')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
