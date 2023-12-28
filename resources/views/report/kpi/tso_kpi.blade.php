@extends('layouts.master')
@section('content')

<button onclick="window.print()">Print this page</button>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card"> 
        
            <div class="card-body">
                <h4>KPI REPORT - {{date('M-Y',strtotime(request()->get('date')))}}
                </h4>
                <div class="row-fluid">
                    <table id="job_card" class="table-bordered">
                      <tbody>
                          @foreach($user_kpis as $user_kpi)
                          <tr>
                             <td colspan="2">Business:</td>
                             <td colspan="2">Name:{{$user_kpi->user->name}}</td>
                             <td colspan="1">Supervisor:</td>
                             <td colspan="1">Department</td> 
                          </tr>
                          <tr>
                             <td colspan="2">Location</td>
                             <td colspan="2">Position</td>
                             <td colspan="1">Month</td>
                             <td colspan="1">Staff</td>
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
                             <th>F. Score</th>
                          </tr>
                            <?php 
                                $groups = $obj->get_kpi_details_kpi_groups($user_kpi->id);
                            ?>
                            @foreach($groups as $group)
                              <?php
                                  $total_weight  = 0;
                                  $total_f_score = 0;  
                                  $name = 0; 
                              ?>

                              <tr>
                                <th colspan="6">{{$group->name}}</th>
                              </tr>
                              @foreach($obj->get_kpi_detail_of_group($user_kpi->id,$group->id) as $user_kpi_detail)
                              
                                @if($user_kpi_detail->kpi_topic->name =='Six Hour Service Ratio (Min-80%)')
                                <tr><th colspan="6">Satisfaction Index</th></tr>
                                @endif
                                @if($user_kpi_detail->kpi_topic->name =='Service Revenue Against Budget')
                                <tr><th colspan="6">Service Income</th></tr>
                                @endif

                                <tr>
                                    <td>{{$user_kpi_detail->kpi_topic->name}}</td>
                                    <td>{{$user_kpi_detail->target}}</td>
                                    <td>{{$user_kpi_detail->actual}}</td>
                                    <td>{{$user_kpi_detail->weight}} <?php $total_weight +=$user_kpi_detail->weight; ?></td>
                                    <td>{{number_format($user_kpi_detail->score,2)}}</td>
                                    <td>{{number_format($user_kpi_detail->f_score,2)}} <?php $total_f_score +=$user_kpi_detail->f_score; ?></td>
                                </tr>
                              
                              @endforeach

                              @if($total_weight>0)
                              <tr>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td>{{$total_weight}}</td>
                                <td></td>
                                <td>{{$total_f_score}}</td>
                              </tr>
                              <tr>
                                <td>Base Line Incentive</td>
                                <td></td>
                                <td>{{$base_line_amount = $obj->get_user_base_line_amount($user_kpi_detail->user_kpi_id,$user_kpi_detail->kpi_group_id)}}</td>
                                <td></td>
                                <td></td>
                                <td>{{round($total_f_score*100/$total_weight,2)}}%</td>
                              </tr>
                              <tr>
                                <th>Incentive amount Total</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{$base_line_amount  * ($total_f_score/$total_weight)}}</td>
                              </tr>
                              @endif
                       
                            @endforeach <!-- end group foreach -->
                            
                          @endforeach <!-- end user foreach -->
                      </tbody>
                   </table>
                        
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