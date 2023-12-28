@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">KpiaDetail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">KpiaDetail</li>
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
              <h3 class="card-title">KpiaDetail </h3>
              <a href="{{url('/kpia_detail/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create KpiaDetail</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                      <th>Id</th>
                  <th>Kpia</th>
                  <th>Service ratio ws target</th>
                  <th>Service ratio ws actual</th>
                  <th>Service ratio ws weight</th>
                  <th>Service ratio ws score</th>
                  <th>Service ratio ws f score</th>
                  <th>Service ratio pws target</th>
                  <th>Service ratio pws actual</th>
                  <th>Service ratio pws weight</th>
                  <th>Service ratio pws score</th>
                  <th>Service ratio pws f score</th>
                  <th>Satisfaction index six target</th>
                  <th>Satisfaction index six actual</th>
                  <th>Satisfaction index six weight</th>
                  <th>Satisfaction index six score</th>
                  <th>Satisfaction index six f score</th>
                  <th>Satisfaction index csi target</th>
                  <th>Satisfaction index csi actual</th>
                  <th>Satisfaction index csi weight</th>
                  <th>Satisfaction index csi score</th>
                  <th>Satisfaction index csi f score</th>
                  <th>Service income target</th>
                  <th>Service income actual</th>
                  <th>Service income weight</th>
                  <th>Service income score</th>
                  <th>Service income f score</th>
                  <th>Report submission weight</th>
                  <th>Report submission score</th>
                  <th>Report submission f score</th>
                  <th>App monitor weight</th>
                  <th>App monitor score</th>
                  <th>App monitor f score</th>
                  <th>Team co weight</th>
                  <th>Team co score</th>
                  <th>Team co f score</th>
                  <th>Service income base line</th>
                  <th>Service f score total</th>
                  <th>Service f score percent</th>
                  <th>Service income total incentive</th>
                  <th>Sp tractor target</th>
                  <th>Sp tractor actual</th>
                  <th>Sp tractor weight</th>
                  <th>Sp tractor score</th>
                  <th>Sp tractor f score</th>
                  <th>Sp tractor base line</th>
                  <th>Sp tractor f score total</th>
                  <th>Sp tractor f score percent</th>
                  <th>Sp tractor total incentive</th>
                  <th>Sp nmpt target</th>
                  <th>Sp nmpt actual</th>
                  <th>Sp nmpt weight</th>
                  <th>Sp nmpt score</th>
                  <th>Sp nmpt f score</th>
                  <th>Sp nmpt base line</th>
                  <th>Sp nmpt f score total</th>
                  <th>Sp nmpt f score percent</th>
                  <th>Sp nmpt total incentive</th>
                  <th>Sp tractor plus nmpt target</th>
                  <th>Sp tractor plus nmpt actual</th>
                  <th>Sp tractor plus nmpt weight</th>
                  <th>Sp tractor plus nmpt score</th>
                  <th>Sp tractor plus nmpt f score</th>
                  <th>Sp tractor plus nmpt base line</th>
                  <th>Sp tractor plus nmpt f score total</th>
                  <th>Sp tractor plus nmpt f score percent</th>
                  <th>Sp tractor plus nmpt total incentive</th>
                  <th>Incentive 101 115 mul</th>
                  <th>Incentive 116 140 mul</th>
                  <th>Incentive 141 above mul</th>
                  <th>Incentive 101 115 amount</th>
                  <th>Incentive 116 140 amount</th>
                  <th>Incentive 141 above amount</th>

                      <th>Controls</th>
                </thead>
                <tbody>
                    @foreach ($kpia_details as $kpia_detail)
                      <tr>
                          <td>{{$kpia_detail->id}}</td>
                      <td>{{$kpia_detail->kpia->name}}</td>
                      <td>{{$kpia_detail->service_ratio_ws_target}}</td>
                      <td>{{$kpia_detail->service_ratio_ws_actual}}</td>
                      <td>{{$kpia_detail->service_ratio_ws_weight}}</td>
                      <td>{{$kpia_detail->service_ratio_ws_score}}</td>
                      <td>{{$kpia_detail->service_ratio_ws_f_score}}</td>
                      <td>{{$kpia_detail->service_ratio_pws_target}}</td>
                      <td>{{$kpia_detail->service_ratio_pws_actual}}</td>
                      <td>{{$kpia_detail->service_ratio_pws_weight}}</td>
                      <td>{{$kpia_detail->service_ratio_pws_score}}</td>
                      <td>{{$kpia_detail->service_ratio_pws_f_score}}</td>
                      <td>{{$kpia_detail->satisfaction_index_six_target}}</td>
                      <td>{{$kpia_detail->satisfaction_index_six_actual}}</td>
                      <td>{{$kpia_detail->satisfaction_index_six_weight}}</td>
                      <td>{{$kpia_detail->satisfaction_index_six_score}}</td>
                      <td>{{$kpia_detail->satisfaction_index_six_f_score}}</td>
                      <td>{{$kpia_detail->satisfaction_index_csi_target}}</td>
                      <td>{{$kpia_detail->satisfaction_index_csi_actual}}</td>
                      <td>{{$kpia_detail->satisfaction_index_csi_weight}}</td>
                      <td>{{$kpia_detail->satisfaction_index_csi_score}}</td>
                      <td>{{$kpia_detail->satisfaction_index_csi_f_score}}</td>
                      <td>{{$kpia_detail->service_income_target}}</td>
                      <td>{{$kpia_detail->service_income_actual}}</td>
                      <td>{{$kpia_detail->service_income_weight}}</td>
                      <td>{{$kpia_detail->service_income_score}}</td>
                      <td>{{$kpia_detail->service_income_f_score}}</td>
                      <td>{{$kpia_detail->report_submission_weight}}</td>
                      <td>{{$kpia_detail->report_submission_score}}</td>
                      <td>{{$kpia_detail->report_submission_f_score}}</td>
                      <td>{{$kpia_detail->app_monitor_weight}}</td>
                      <td>{{$kpia_detail->app_monitor_score}}</td>
                      <td>{{$kpia_detail->app_monitor_f_score}}</td>
                      <td>{{$kpia_detail->team_co_weight}}</td>
                      <td>{{$kpia_detail->team_co_score}}</td>
                      <td>{{$kpia_detail->team_co_f_score}}</td>
                      <td>{{$kpia_detail->service_income_base_line}}</td>
                      <td>{{$kpia_detail->service_f_score_total}}</td>
                      <td>{{$kpia_detail->service_f_score_percent}}</td>
                      <td>{{$kpia_detail->service_income_total_incentive}}</td>
                      <td>{{$kpia_detail->sp_tractor_target}}</td>
                      <td>{{$kpia_detail->sp_tractor_actual}}</td>
                      <td>{{$kpia_detail->sp_tractor_weight}}</td>
                      <td>{{$kpia_detail->sp_tractor_score}}</td>
                      <td>{{$kpia_detail->sp_tractor_f_score}}</td>
                      <td>{{$kpia_detail->sp_tractor_base_line}}</td>
                      <td>{{$kpia_detail->sp_tractor_f_score_total}}</td>
                      <td>{{$kpia_detail->sp_tractor_f_score_percent}}</td>
                      <td>{{$kpia_detail->sp_tractor_total_incentive}}</td>
                      <td>{{$kpia_detail->sp_nmpt_target}}</td>
                      <td>{{$kpia_detail->sp_nmpt_actual}}</td>
                      <td>{{$kpia_detail->sp_nmpt_weight}}</td>
                      <td>{{$kpia_detail->sp_nmpt_score}}</td>
                      <td>{{$kpia_detail->sp_nmpt_f_score}}</td>
                      <td>{{$kpia_detail->sp_nmpt_base_line}}</td>
                      <td>{{$kpia_detail->sp_nmpt_f_score_total}}</td>
                      <td>{{$kpia_detail->sp_nmpt_f_score_percent}}</td>
                      <td>{{$kpia_detail->sp_nmpt_total_incentive}}</td>
                      <td>{{$kpia_detail->sp_tractor_plus_nmpt_target}}</td>
                      <td>{{$kpia_detail->sp_tractor_plus_nmpt_actual}}</td>
                      <td>{{$kpia_detail->sp_tractor_plus_nmpt_weight}}</td>
                      <td>{{$kpia_detail->sp_tractor_plus_nmpt_score}}</td>
                      <td>{{$kpia_detail->sp_tractor_plus_nmpt_f_score}}</td>
                      <td>{{$kpia_detail->sp_tractor_plus_nmpt_base_line}}</td>
                      <td>{{$kpia_detail->sp_tractor_plus_nmpt_f_score_total}}</td>
                      <td>{{$kpia_detail->sp_tractor_plus_nmpt_f_score_percent}}</td>
                      <td>{{$kpia_detail->sp_tractor_plus_nmpt_total_incentive}}</td>
                      <td>{{$kpia_detail->incentive_101_115_mul}}</td>
                      <td>{{$kpia_detail->incentive_116_140_mul}}</td>
                      <td>{{$kpia_detail->incentive_141_above_mul}}</td>
                      <td>{{$kpia_detail->incentive_101_115_amount}}</td>
                      <td>{{$kpia_detail->incentive_116_140_amount}}</td>
                      <td>{{$kpia_detail->incentive_141_above_amount}}</td>

                          <td>
                              <a href="{{url('/kpia_detail/'.$kpia_detail->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              <a href="{{url('/kpia_detail/'.$kpia_detail->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              <a id="openDeleteModal" data-toggle="modal" data-id="{{$kpia_detail->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                  <th>Kpia</th>
                  <th>Service ratio ws target</th>
                  <th>Service ratio ws actual</th>
                  <th>Service ratio ws weight</th>
                  <th>Service ratio ws score</th>
                  <th>Service ratio ws f score</th>
                  <th>Service ratio pws target</th>
                  <th>Service ratio pws actual</th>
                  <th>Service ratio pws weight</th>
                  <th>Service ratio pws score</th>
                  <th>Service ratio pws f score</th>
                  <th>Satisfaction index six target</th>
                  <th>Satisfaction index six actual</th>
                  <th>Satisfaction index six weight</th>
                  <th>Satisfaction index six score</th>
                  <th>Satisfaction index six f score</th>
                  <th>Satisfaction index csi target</th>
                  <th>Satisfaction index csi actual</th>
                  <th>Satisfaction index csi weight</th>
                  <th>Satisfaction index csi score</th>
                  <th>Satisfaction index csi f score</th>
                  <th>Service income target</th>
                  <th>Service income actual</th>
                  <th>Service income weight</th>
                  <th>Service income score</th>
                  <th>Service income f score</th>
                  <th>Report submission weight</th>
                  <th>Report submission score</th>
                  <th>Report submission f score</th>
                  <th>App monitor weight</th>
                  <th>App monitor score</th>
                  <th>App monitor f score</th>
                  <th>Team co weight</th>
                  <th>Team co score</th>
                  <th>Team co f score</th>
                  <th>Service income base line</th>
                  <th>Service f score total</th>
                  <th>Service f score percent</th>
                  <th>Service income total incentive</th>
                  <th>Sp tractor target</th>
                  <th>Sp tractor actual</th>
                  <th>Sp tractor weight</th>
                  <th>Sp tractor score</th>
                  <th>Sp tractor f score</th>
                  <th>Sp tractor base line</th>
                  <th>Sp tractor f score total</th>
                  <th>Sp tractor f score percent</th>
                  <th>Sp tractor total incentive</th>
                  <th>Sp nmpt target</th>
                  <th>Sp nmpt actual</th>
                  <th>Sp nmpt weight</th>
                  <th>Sp nmpt score</th>
                  <th>Sp nmpt f score</th>
                  <th>Sp nmpt base line</th>
                  <th>Sp nmpt f score total</th>
                  <th>Sp nmpt f score percent</th>
                  <th>Sp nmpt total incentive</th>
                  <th>Sp tractor plus nmpt target</th>
                  <th>Sp tractor plus nmpt actual</th>
                  <th>Sp tractor plus nmpt weight</th>
                  <th>Sp tractor plus nmpt score</th>
                  <th>Sp tractor plus nmpt f score</th>
                  <th>Sp tractor plus nmpt base line</th>
                  <th>Sp tractor plus nmpt f score total</th>
                  <th>Sp tractor plus nmpt f score percent</th>
                  <th>Sp tractor plus nmpt total incentive</th>
                  <th>Incentive 101 115 mul</th>
                  <th>Incentive 116 140 mul</th>
                  <th>Incentive 141 above mul</th>
                  <th>Incentive 101 115 amount</th>
                  <th>Incentive 116 140 amount</th>
                  <th>Incentive 141 above amount</th>

                    <th>Controls</th>
                </tr>
                </tfoot>
              </table>
              {{$kpia_details->links()}}
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

<script>document.title = 'KpiaDetail';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/kpia_detail')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
