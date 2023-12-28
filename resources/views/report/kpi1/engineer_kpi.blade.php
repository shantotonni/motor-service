@extends('layouts.master')
@section('content')

<!-- Main content -->
<section class="content">

    <!-- Content Header (Page header) -->
   <div class="content-header">
         <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Report
                           <button onclick="window.print()">Print this page</button> 
                           <div  class="spinner-border text-primary loading_process" role="status">
                              <span class="sr-only">Loading...</span>
                           </div>
                           <span class="loading_process success" style="color:red">Processing Please Do Not Close !!!!!!!!</span>

                     </h1>
                  </div><!-- /.col -->
               </div><!-- /.row -->
         </div><!-- /.container-fluid -->
   </div>
    
   <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card"> 
        
            <div class="card-body">
                <div class="row-fluid kpi_table">
                @foreach($user_kpis as $kpi)
                    <table  class="table-bordered table-condensed" style="page-break-after: always; margin:0 auto;">
                      <tbody>
                          <tr>
                             <td colspan="1"><string>Business: </string></td>
                             <td colspan="5"><string>Name: </string>{{$kpi->user->name}}</td>
                          </tr>
                          <tr>
                             <td colspan="1"><string>Supervisor: </string></td>
                             <td colspan="5"><string>Department: </string></td> 
                          </tr>
                          <tr>
                             <td colspan="1"><string>Location</string></td>
                             <td colspan="5"><string>Position: </string>{{$kpi->user->designation}}</td>
                            
                          </tr>
                          <tr>
                             <td colspan="1"><string>Month: {{date('M-Y',strtotime($kpi->date))}}</string></td>
                             <td colspan="5"><string>Staff: </string>{{$kpi->user->username}}</td>
                          </tr>
                          <tr>
                              <td colspan="6">&nbsp;</td>
                          </tr>
                          <tr>
                             <th>Task</th>
                             <th>Target</th>
                             <th>Actual</th>
                             <th>Weight</th>
                             <th>Score</th>
                             <th>F.Score</th>
                          </tr>

                          <!-- service ratio start --> 
                          <tr>
                             <th colspan="6">Service Ratio</th>
                          </tr>

                          <tr>
                             <td>Warranty Service</td>
                             <td>{{$kpi->service_ratio_ws_target}}</td>
                             <td>{{$kpi->service_ratio_ws_actual}}</td>
                             <td>{{$kpi->service_ratio_ws_weight}}</td>
                             <td>{{number_format($kpi->service_ratio_ws_score,2)}}</td>
                             <td>{{number_format($kpi->service_ratio_ws_f_score,2)}}</td>
                          </tr>
                          <tr>
                             <td>Post warranty Customer Service </td>
                             <td>{{$kpi->service_ratio_pws_target}}</td>
                             <td>{{$kpi->service_ratio_pws_actual}}</td>
                             <td>{{$kpi->service_ratio_pws_weight}}</td>
                             <td>{{number_format($kpi->service_ratio_pws_score,2)}}</td>
                             <td>{{number_format($kpi->service_ratio_pws_f_score,2)}}</td>
                          </tr>
                          <!-- service ratio end --> 

                          <!-- satisfaction index start --> 
                          <tr>
                             <th colspan="6">Satisfaction Index</th>
                          </tr>
                          <tr>
                             <td>Six Hour Service Ratio (Min-80%)</td>
                             <td>{{$kpi->satisfaction_index_six_target}}</td>
                             <td>{{$kpi->satisfaction_index_six_actual}}</td>
                             <td>{{$kpi->satisfaction_index_six_weight}}</td>
                             <td>{{number_format($kpi->satisfaction_index_six_score,2)}}</td>
                             <td>{{number_format($kpi->satisfaction_index_six_f_score,2)}}</td>
                          </tr>
                          <tr>
                             <td>Customer Satisfaction Index</td>
                             <td>{{$kpi->satisfaction_index_csi_target}}</td>
                             <td>{{$kpi->satisfaction_index_csi_actual}}</td>
                             <td>{{$kpi->satisfaction_index_csi_weight}}</td>
                             <td>{{number_format($kpi->satisfaction_index_csi_score,2)}}</td>
                             <td>{{number_format($kpi->satisfaction_index_csi_f_score,2)}}</td>
                          </tr>
                          <!-- satisfaction index end --> 

                           <!-- Report & Communication--> 
                           <tr>
                             <th colspan="6">Report & Communication</th>
                          </tr>
                          <tr>
                             <td>Monthly Report Submission</td>
                             <td>{{$kpi->report_submission_target}}</td>
                             <td>{{$kpi->report_submission_actual}}</td>
                             <td>{{$kpi->report_submission_weight}}</td>
                             <td>{{number_format($kpi->report_submission_score,2)}}</td>
                             <td>{{number_format($kpi->report_submission_f_score,2)}}</td>
                          </tr>  
                          <tr>
                             <td>Apps & Dashboard Monitoring</td>
                             <td>{{$kpi->app_monitor_target}}</td>
                             <td>{{$kpi->app_monitor_actual}}</td>
                             <td>{{$kpi->app_monitor_weight}}</td>
                             <td>{{number_format($kpi->app_monitor_score,2)}}</td>
                             <td>{{number_format($kpi->app_monitor_f_xcore,2)}}</td>
                          </tr>
                          <tr>
                             <td>Team Co-ordination</td>
                             <td>{{$kpi->team_co_target}}</td>
                             <td>{{$kpi->team_co_actual}}</td>
                             <td>{{$kpi->team_co_weight}}</td>
                             <td>{{number_format($kpi->team_co_score,2)}}</td>
                             <td>{{number_format($kpi->team_co_f_score,2)}}</td>
                          </tr>
                          <!-- Report & Communication end --> 

                           <!-- Service income start --> 
                           <tr>
                             <th colspan="6">Service Income</th>
                          </tr>

                          <tr>
                             <td>Sales Budget Achievement</td>
                             <td>{{$kpi->service_income_target}}</td>
                             <td>{{$kpi->service_income_actual}}</td>
                             <td>{{$kpi->service_income_weight}}</td>
                             <td>{{number_format($kpi->service_income_score,2)}}</td>
                             <td>{{number_format($kpi->service_income_f_score,2)}}</td>
                          </tr>

                          <tr>
                             <td>Total Mark Against Service</td>
                             <td></td>
                             <td></td>
                             <td>70</td>
                             <td></td>
                             <td>{{number_format($kpi->service_f_score_total,2)}}</td>
                          </tr>

                          <tr>
                             <td>Base Line Incentive Amount</td>
                             <td></td>
                             <td>{{$kpi->service_income_base_line}}</td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->service_f_score_percent}}%</td>
                          </tr>

                          <tr>
                             <td>Total Incentive Amount against Service </td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->service_income_total_incentive}}</td>
                          </tr>

                          <!-- Service Income  end --> 
                          <tr>
                             <th colspan="6">Spare parts Sales</th>
                          </tr>


                          <!-- Tractor Sales --> 
                          <tr>
                             <th colspan="6">Tractor Spare Parts & Lubricants</th>
                          </tr>

                          <tr>
                             <td>Sales Budget Achievement</td>
                             <td>{{$kpi->sp_tractor_target}}</td>
                             <td>{{$kpi->sp_tractor_actual}}</td>
                             <td>{{$kpi->sp_tractor_weight}}</td>
                             <td>{{$kpi->sp_tractor_score}}</td>
                             <td>{{number_format($kpi->sp_tractor_f_score,2)}}</td>
                          </tr>

                          <tr>
                             <td>Total Mark Against Service</td>
                             <td></td>
                             <td></td>
                             <td>30</td>
                             <td></td>
                             <td>{{$kpi->sp_tractor_f_score_total}}</td>
                          </tr>

                          <tr>
                             <td>Base Line Incentive Amount</td>
                             <td></td>
                             <td>{{$kpi->sp_tractor_base_line}}</td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->sp_tractor_f_score_percent}}%</td>
                          </tr>

                          <tr>
                             <td>Total Incentive Amount Sales</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->sp_tractor_total_incentive}}</td>
                          </tr>
                          <!-- Tractor sales end -->


                          <!-- NM PT SALES --> 
                          <tr>
                             <th colspan="6">NM/PT Spare Parts & Lubricants</th>
                          </tr>

                          <tr>
                             <td>Sales Budget Achievement</td>
                             <td>{{$kpi->sp_nmpt_target}}</td>
                             <td>{{$kpi->sp_nmpt_actual}}</td>
                             <td>{{$kpi->sp_nmpt_weight}}</td>
                             <td>{{$kpi->sp_nmpt_score}}</td>
                             <td>{{number_format($kpi->sp_nmpt_f_score,2)}}</td>
                          </tr>

                          <tr>
                             <td>Total Mark Against Service</td>
                             <td></td>
                             <td></td>
                             <td>30</td>
                             <td></td>
                             <td>{{$kpi->sp_nmpt_f_score_total}}</td>
                          </tr>

                          <tr>
                             <td>Base Line Incentive Amount</td>
                             <td></td>
                             <td>{{$kpi->sp_nmpt_base_line}}</td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->sp_nmpt_f_score_percent}}%</td>
                          </tr>

                          <tr>
                             <td>Total Incentive Amount Sales</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->sp_nmpt_total_incentive}}</td>
                          </tr>
                          <!-- NM pt sales end -->

      
                          
                          <!-- Incentive Start -->
                          
                          <tr>
                             <th>Performance Bonus Against KPI for up to Full Score	</th>
                             <td></td>
                             <td></td>
                             <td></td> 
                             <td></td>
                             <td></td>
                          </tr>
                          @foreach($kpi->kpia_incentives as $kpia_incentive)
                          <tr>
                             <td>{{$kpia_incentive->incentive_factor->name}}</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>{{$kpia_incentive->tractor_and_nmpt}}</td>
                          </tr>
                          @endforeach
                        

                          
                          <tr>
                             <th>Total Incentive Amount against Spare Parts Sales	</th>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->total_incentive_amount}}</td>
                          </tr>
                          
                          <tr>
                             <td colspan="6">&nbsp;</td>
                          </tr>

                          <tr>
                             <th>Total Kpi Mark</th>
                             <td></td>
                             <td>100</td>
                             <td>{{$kpi->total_kpi_mark}}</td>
                             <td></td>
                             <td></td>
                             
                          </tr>

                          		
                          <tr>
                             <td colspan="6">&nbsp;</td>
                          </tr>
                          <tr>
                             <td colspan="6">&nbsp;</td>
                          </tr>
                          
                      </tbody>
                   </table>
                   <br>
                
                   @endforeach
                        
                </div> <!-- row fluid end -->      
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
<script>

$('.loading_process').hide();




</script>


@endsection