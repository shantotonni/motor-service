@extends('layouts.master')
@section('content')
<style>
   /* @media print {
    .kpi_table { page-break-before: always; } 
} */
</style>
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
                <div class="row-fluid">
                @foreach($user_kpis as $kpi)
                    <table  class="table-bordered table-condensed" style="page-break-after: always; margin:0 auto;">
                      <tbody>
                         
                          <tr>
                             <td colspan="1">Business:</td>
                             <td colspan="5">Name:{{$kpi->user->name}}</td>
                          </tr>
                          <tr>
                             <td colspan="1">Supervisor:</td>
                             <td colspan="5">Department:</td> 
                          </tr>
                          <tr>
                             <td colspan="1">Location</td>
                             <td colspan="5">Position:{{$kpi->user->designation}}</td>
                            
                          </tr>
                          <tr>
                             <td colspan="1">Month:{{date('M-Y',strtotime($kpi->date))}}</td>
                             <td colspan="5">Staff:{{$kpi->user->username}}</td>
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

                          <!-- Spare parts & Lube Sales start --> 
                          <tr>
                             <th colspan="6">Spare parts & Lube Sales (Tractor & NM/PT)</th>
                          </tr>

                          <tr>
                             <td>Sales Budget Achievement</td>
                             <td>{{$kpi->sp_tractor_plus_nmpt_target}}</td>
                             <td>{{$kpi->sp_tractor_plus_nmpt_actual}}</td>
                             <td>{{$kpi->sp_tractor_plus_nmpt_weight}}</td>
                             <td>{{$kpi->sp_tractor_plus_nmpt_score}}</td>
                             <td>{{number_format($kpi->sp_tractor_plus_nmpt_f_score,2)}}</td>
                          </tr>

                          <tr>
                             <td>Total Mark Against Service</td>
                             <td></td>
                             <td></td>
                             <td>30</td>
                             <td></td>
                             <td>{{$kpi->sp_tractor_plus_nmpt_f_score_total}}</td>
                          </tr>

                          <tr>
                             <td>Base Line Incentive Amount</td>
                             <td></td>
                             <td>{{$kpi->sp_tractor_plus_nmpt_base_line}}</td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->sp_tractor_plus_nmpt_f_score_percent}}%</td>
                          </tr>

                          <tr>
                             <td>Total Incentive Amount Sales</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->sp_tractor_plus_nmpt_total_incentive}}</td>
                          </tr>
                          <!-- Spare parts & Lube Sales end -->
                          
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
                          <!-- <tr>
                             <td>If Sales Achievement (116%-140%): Base Amount * Multiplication factor 0.50</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->incentive_116_140_amount}}</td>
                          </tr>
                          <tr>
                             <td>If Sales Achievement (141%-Above): Full Base Amount	</td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>{{$kpi->incentive_141_above_amount}}</td>
                          </tr> -->
                          <!-- incentive end-->

                          
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