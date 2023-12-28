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
            <li class="breadcrumb-item active">KpiaDetail Create</li>
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
              <h3 class="card-title">KpiaDetail Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->id}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Kpia</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->kpia->name}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio ws target</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_ws_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio ws actual</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_ws_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio ws weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_ws_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio ws score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_ws_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio ws f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_ws_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio pws target</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_pws_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio pws actual</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_pws_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio pws weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_pws_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio pws score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_pws_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service ratio pws f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_ratio_pws_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index six target</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_six_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index six actual</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_six_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index six weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_six_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index six score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_six_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index six f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_six_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index csi target</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_csi_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index csi actual</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_csi_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index csi weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_csi_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index csi score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_csi_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Satisfaction index csi f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->satisfaction_index_csi_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income target</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_income_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income actual</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_income_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_income_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_income_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_income_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Report submission weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->report_submission_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Report submission score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->report_submission_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Report submission f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->report_submission_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>App monitor weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->app_monitor_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>App monitor score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->app_monitor_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>App monitor f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->app_monitor_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Team co weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->team_co_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Team co score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->team_co_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Team co f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->team_co_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income base line</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_income_base_line}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service f score total</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_f_score_total}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service f score percent</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_f_score_percent}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Service income total incentive</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->service_income_total_incentive}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor target</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor actual</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor base line</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_base_line}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor f score total</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_f_score_total}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor f score percent</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_f_score_percent}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor total incentive</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_total_incentive}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt target</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_nmpt_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt actual</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_nmpt_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_nmpt_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_nmpt_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_nmpt_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt base line</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_nmpt_base_line}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt f score total</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_nmpt_f_score_total}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt f score percent</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_nmpt_f_score_percent}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp nmpt total incentive</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_nmpt_total_incentive}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt target</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_plus_nmpt_target}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt actual</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_plus_nmpt_actual}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt weight</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_plus_nmpt_weight}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_plus_nmpt_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt f score</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_plus_nmpt_f_score}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt base line</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_plus_nmpt_base_line}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt f score total</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_plus_nmpt_f_score_total}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt f score percent</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_plus_nmpt_f_score_percent}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Sp tractor plus nmpt total incentive</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->sp_tractor_plus_nmpt_total_incentive}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Incentive 101 115 mul</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->incentive_101_115_mul}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Incentive 116 140 mul</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->incentive_116_140_mul}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Incentive 141 above mul</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->incentive_141_above_mul}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Incentive 101 115 amount</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->incentive_101_115_amount}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Incentive 116 140 amount</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->incentive_116_140_amount}}</p></div>
                </div>
                
                <div class="col-md-6">
                   <div class="col-md-4"><strong>Incentive 141 above amount</strong></div>
                   <div class="col-md-8"><p>{{$kpia_detail->incentive_141_above_amount}}</p></div>
                </div>
                

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
<script>document.title = 'KpiaDetail | Show';</script>
@endsection
