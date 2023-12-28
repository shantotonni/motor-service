@extends('layouts.master')
@section('content')

<section class="content">
    <div class="container-fluid pt-3 pb-3" style="padding-left: 9%;">
        <div style="background-color: white; width: 1000px; padding: 4%;">
            <div class="row">
                <div class="col-lg-2">
                    <img src="{{asset('/img/acimotors-logo.png')}}" width="120" height="50" alt="logo">
                </div>
                <div class="col-lg-10 text-center">
                    <h4 style="margin-left: -100px;">ACI Motors Limited</h4>
                    <p style="margin-left: -100px;">Monthly Key Performance Indicator-Technician</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered small table-sm">
                        <tbody>
                            <tr>
                                <th>Business</th>
                                <td>ACI Motors</td>
                                <th>Location</th>
                                <td>{{$kpi->region}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$kpi->name}}</td>
                                <th>Position</th>
                                <td>{{$kpi->designation}}</td>
                            </tr>
                            <tr>
                                <th>Supervisor</th>
                                <td>Service Engineer</td>
                                <th>Month</th>
                                <td>{{date('F', strtotime($kpi->period))}}</td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td>Motors</td>
                                <th>Staff ID</th>
                                <td>{{$kpi->staff_id}}</td>
                            </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered small table-sm">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th colspan="7">Task</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th colspan="7">Service Ratio</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> </td>
                                <th>Target</th>
                                <th>Actual</th>
                                <th>Weight</th>
                                <th>Score</th>
                                <th>F.Score</th>
                            </tr>
                            @php
                            if ($kpi->warranty_service_target > 0) {
                                $warranty_service_target = $kpi->warranty_service_target;
                            }else{
                                $warranty_service_target = 1;
                            }

                            $warrantyServiceWeight = 20;
                            $warrantyServiceScore = ($kpi->warranty_service_actual/$warranty_service_target)*$warrantyServiceWeight;
                            if($warranty_service_target == 1){
                                $warrantyServiceScore = 0;
                            }
                            $warrantyServiceFinalScore=0;
                            @endphp
                            <tr>
                                <td></td>
                                <td>Warranty Service</td>
                                <td>{{$kpi->warranty_service_target}}</td>
                                <td>{{$kpi->warranty_service_actual}}</td>
                                <td>{{$warrantyServiceWeight}}</td>
                                <td>{{round($warrantyServiceScore,2)}}</td>
                                @if($warrantyServiceScore > $warrantyServiceWeight)
                                @php $warrantyServiceFinalScore = $warrantyServiceWeight; @endphp
                                <td>{{$warrantyServiceWeight}}</td>
                                @else
                                @php $warrantyServiceFinalScore = round($warrantyServiceScore, 2); @endphp
                                <td>{{round($warrantyServiceScore,2)}}</td>
                                @endif
                            </tr>
                            @php
                            if ($kpi->post_warranty_service_target > 0) {
                                $post_warranty_service_target = $kpi->post_warranty_service_target;
                            }else{
                                $post_warranty_service_target = 1;
                            }
                            $postWarrantyServiceWeight=10;
                            $postWarrantyServiceScore = ($kpi->post_warranty_service_actual/$post_warranty_service_target)*$postWarrantyServiceWeight;
                            if($post_warranty_service_target == 1){
                                $postWarrantyServiceScore = 0;
                            }
                            $postWarrantyServiceFinalScore=0;
                            $totalWarrantyServiceWeight = $warrantyServiceWeight+$postWarrantyServiceWeight;
                            $totalWarrantyServiceScore = round($warrantyServiceScore,2)+round($postWarrantyServiceScore,2);
                            @endphp
                            <tr>
                                <td></td>
                                <td>Post Warranty Customer Service</td>
                                <td>{{$kpi->post_warranty_service_target}}</td>
                                <td>{{$kpi->post_warranty_service_actual}}</td>
                                <td>{{$postWarrantyServiceWeight}}</td>
                                <td>{{round($postWarrantyServiceScore, 2)}}</td>
                                @if($postWarrantyServiceScore > $postWarrantyServiceWeight)
                                @php $postWarrantyServiceFinalScore= $postWarrantyServiceWeight; @endphp
                                <td>{{$postWarrantyServiceWeight}}</td>
                                @else
                                @php $postWarrantyServiceFinalScore= round($postWarrantyServiceScore, 2); @endphp
                                <td>{{round($postWarrantyServiceScore, 2)}}</td>
                                @endif
                            </tr>
                            @php
                            $totalWarrantyServiceFinalScore = $warrantyServiceFinalScore + $postWarrantyServiceFinalScore;
                            @endphp
                            <tr>
                                <td></td>
                                <th>Total</th>
                                <th>{{$kpi->warranty_service_target + $kpi->post_warranty_service_target}}</th>
                                <th>{{$kpi->warranty_service_actual + $kpi->post_warranty_service_actual}}</th>
                                <th>{{$totalWarrantyServiceWeight}}</th>
                                <th>{{$totalWarrantyServiceScore}}</th>
                                <th>{{$totalWarrantyServiceFinalScore}}</th>
                            </tr>

                            <tr>
                                <th>2</th>
                                <th colspan="7">Satisfaction Index</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> </td>
                                <th>Target</th>
                                <th>Actual</th>
                                <th>Weight</th>
                                <th>Score</th>
                                <th>F.Score</th>
                            </tr>
                            @php
                            $sixHourTarget = 100;
                            $sixHourWeight = 10;
                            $sixHourScore = ($kpi->six_hour_percentage/$sixHourTarget)*$sixHourWeight;
                            $sixHourFinalScore=0;
                            @endphp
                            <tr>
                                <td></td>
                                <td>Six Hour Service Ratio
                                </td>
                                <td>{{$sixHourTarget}}</td>
                                <td>{{$kpi->six_hour_percentage}}</td>
                                <td>{{$sixHourWeight}}</td>
                                <td>{{$sixHourScore}}</td>
                                @php $sixHourFinalScore= $sixHourScore; @endphp
                                <td>{{$sixHourScore}}</td>
                            </tr>
                            @php
                            $csiTarget = 100;
                            $csiWeight = 10;
                            $csiScore = ($kpi->csi_percentage/$csiTarget)*$csiWeight;
                            $csiFinalScore=0;
                            @endphp
                            <tr>
                                <td></td>
                                <td>Customer Satisfaction Index</td>
                                <td>{{$csiTarget}}</td>
                                <td>{{$kpi->csi_percentage}}</td>
                                <td>{{$csiWeight}}</td>
                                <td>{{$csiScore}}</td>
                                @if($csiScore > $csiWeight)
                                @php $csiFinalScore= $csiWeight; @endphp
                                <td>{{$csiWeight}}</td>
                                @else
                                @php $csiFinalScore= $csiScore; @endphp
                                <td>{{$csiScore}}</td>
                                @endif
                            </tr>
                            @php
                            $indexTotalWeight = $sixHourWeight+$csiWeight;
                            $indexTotalFinalScore = $sixHourFinalScore+$csiFinalScore;
                            @endphp
                            <tr>
                                <td></td>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th>{{$indexTotalWeight}}</th>
                                <th></th>
                                <th>{{$indexTotalFinalScore}}</th>
                            </tr>
                            <!-- Operation -->
                            <tr>
                                <th>3</th>
                                <th colspan="7">Operation</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> </td>
                                <th>Tracking</th>
                                <th>In Apps</th>
                                <th>Weight</th>
                                <th>Score</th>
                                <th>F.Score</th>
                            </tr>
                            @php
                            if ($kpi->tracking > 0) {
                                $tracking = $kpi->tracking;
                            }else{
                                $tracking = 1;
                            }

                            $operationWeight = 10;
                            $operationScore = round(($kpi->in_apps/$tracking)*$operationWeight, 2);
                            if($tracking == 1){
                                $operationScore = 0;
                            }
                            $operationFinalScore=0;
                            @endphp
                            <tr>
                                <td></td>
                                <td>Apps Utilization (Min-80%)</td>
                                <td>{{$kpi->tracking}}</td>
                                <td>{{$kpi->in_apps}}</td>
                                <td>{{$operationWeight}}</td>
                                <td>{{$operationScore}}</td>
                                @if($operationScore > $operationWeight)
                                @php $operationFinalScore= $operationWeight; @endphp
                                <td>{{$operationWeight}}</td>
                                @elseif($operationScore*10 < 80)
                                    @php $operationFinalScore=0;@endphp <td>{{round($operationFinalScore, 2)}}</td>
                                    @else
                                    @php $operationFinalScore = $operationScore; @endphp
                                    <td>{{round($operationScore, 2)}}</td>
                                    @endif
                            </tr>
                            <tr>
                                <td></td>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th>{{$operationWeight}}</th>
                                <th>{{round($operationScore, 2)}}</th>
                                <th>{{$operationFinalScore}}</th>
                            </tr>
                            <!-- end -->

                            <tr>
                                <th>4</th>
                                <th colspan="7">Service Income</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> </td>
                                <th>Target</th>
                                <th>Actual</th>
                                <th>Weight</th>
                                <th>Score</th>
                                <th>F.Score</th>
                            </tr>
                            @php
                            if ($kpi->service_income_target > 0) {
                            $service_income_target = $kpi->service_income_target;
                            }else{
                            $service_income_target = 1;
                            }
                            $serviceIncomeWeight = 30;
                            $serviceIncomeScore = round(($kpi->service_income_actual/$service_income_target)*$serviceIncomeWeight, 2);
                            if($service_income_target == 1){
                                $serviceIncomeScore = 0;
                            }
                            $serviceIncomeFinalScore=0;

                            @endphp

                            <tr>
                                <td></td>
                                <td>Service Revenue Against Budget</td>
                                <td>{{$kpi->service_income_target}}</td>
                                <td>{{$kpi->service_income_actual}}</td>
                                <td>{{$serviceIncomeWeight}}</td>
                                <td>{{$serviceIncomeScore}}</td>

                                @php
                                    if ($kpi->service_income_target > 0) {
                                                $total_target = $kpi->service_income_actual;
                                                 $val = ($kpi->service_income_actual / $kpi->service_income_target) * 100;
                                          }else{
                                                   $total_target = 1;
                                                   $val = 0;
                                           }
                                       //$val = ($kpi->service_income_actual / $kpi->service_income_target) * 100;

                                       if ($val < 60){
                                           $serviceIncomeScoreConditional = 0;
                                       }
                                       if ($val >= 80){
                                           $serviceIncomeScoreConditional = $serviceIncomeWeight;
                                       }
                                       if ($val >= 60 && $val < 80){
                                           $serviceIncomeScoreConditional = round($val * .375, 2);
                                       }
                                       $serviceIncomeFinalScore = $serviceIncomeScoreConditional;
                                @endphp

                                @if($serviceIncomeScore > $serviceIncomeWeight)
                                @php $serviceIncomeFinalScore = $serviceIncomeWeight;@endphp
                                <td>{{$serviceIncomeWeight}}</td>
                                @else
                                <td>{{round($serviceIncomeFinalScore, 2)}}</td>
                                @endif
                            </tr>
                            <tr>
                                <td></td>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th>{{$serviceIncomeWeight}}</th>
                                <th>{{round($serviceIncomeScore, 2)}}</th>
                                <th>{{$serviceIncomeFinalScore}}</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th>Total Mark Against Service</th>
                                <th></th>
                                <th></th>
                                <th>{{$totalWarrantyServiceWeight+$indexTotalWeight+$serviceIncomeWeight + $operationWeight}}</th>
                                <th></th>
                                <th>{{$totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore + $operationFinalScore}}</th>
                            </tr>

                            <!-- spare parts -->
                            <tr>
                                <th>5</th>
                                <th colspan="7">Spare parts (Tractor & Harvester)</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> </td>
                                <th>Target</th>
                                <th>Actual</th>
                                <th>Weight</th>
                                <th>Score</th>
                                <th>F.Score</th>
                            </tr>
                            @php
                            if ($kpi->spare_parts_target > 0) {
                            $total_target = $kpi->spare_parts_target;
                            }else{
                            $total_target = 1;
                            }

                            $sparePartsWeight = 10;
                            $sparePartsScore = round((($kpi->spare_parts_actual/($total_target))*$sparePartsWeight), 2);
                            if($total_target == 1){
                            $sparePartsScore = 0;
                            }
                            $sparePartsFinalScore=0;
                            @endphp

                            <tr>
                                <td></td>
                                <td>Regional Budget Achievement (80% Full mark)</td>
                                <td>{{$kpi->spare_parts_target}}</td>
                                <td>{{$kpi->spare_parts_actual}}</td>
                                <td>{{$sparePartsWeight}}</td>
                                <td>{{$sparePartsScore}}</td>

                                @php
                                if ($kpi->spare_parts_target > 0){
                                        $val2 = ($kpi->spare_parts_actual / $kpi->spare_parts_target) * 100;
                                    }else{
                                        $val2 = 0;
                                    }


                                        if ($val2 < 60){
                                            $sparePartsFinalScoreConditional = 0;
                                        }
                                        if ($val2 >= 80){
                                            $sparePartsFinalScoreConditional = $sparePartsWeight;
                                        }
                                        if ($val2 >= 60 && $val2 < 80){
                                            $sparePartsFinalScoreConditional = round($val2 * .125, 2);
                                        }
                                        $sparePartsFinalScore = $sparePartsFinalScoreConditional;
                                @endphp

                                @if($sparePartsScore > $sparePartsWeight)
                                @php $sparePartsFinalScore= $sparePartsWeight; @endphp
                                <td>{{$sparePartsWeight}}</td>
{{--                                @elseif($sparePartsScore >= 8)--}}
{{--                                    @php $sparePartsFinalScore = $sparePartsWeight; @endphp--}}
{{--                                <td>{{$sparePartsFinalScore}}</td>--}}
{{--                                @elseif($val2 < 60)--}}
{{--                                    @php $sparePartsFinalScore = 0; @endphp--}}
{{--                                <td>{{$sparePartsFinalScore}}</td>--}}
                                @else
{{--                                @php $sparePartsFinalScore= round(($sparePartsScore * $sparePartsWeight)/8, 2); @endphp--}}
                                <td>{{$sparePartsFinalScore}}</td>
                                @endif
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="2">Total Mark Against Spare parts & Lube</th>
                                <th></th>
                                <th>{{$sparePartsWeight}}</th>
                                <th>{{$sparePartsScore}}</th>
                                <th>{{$sparePartsFinalScore}}</th>
                            </tr>
                        </tbody>
                    </table>

                    <!-- spare parts end -->
                    @php
                    $baselineIncentivePercent = 0;
                    $baselineIncentivePercent = round((($totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore+$operationFinalScore+$sparePartsFinalScore)*100)/($totalWarrantyServiceWeight+$indexTotalWeight+$serviceIncomeWeight+$operationWeight+$sparePartsWeight), 2);
                    @endphp
                    <table class="table table-bordered small table-sm">
                        <tbody>
                            <tr>
                                <td></td>
                                <th colspan="7">Base Line Incentive Amount</th>
                                <th class="text-center">{{100}}%</th>
                                <!-- <th>{{$baselineIncentivePercent}}</th> -->
                                <th class="text-center">{{$designationBase->service_base_amount}}</th>
                            </tr>
                        </tbody>
                    </table>
                    @php
                    if($baselineIncentivePercent > 100){
                    $baselineIncentivePercent=100;
                    }
                        @endphp
                        <div class="row">
                            <div class="offset-sm-2 col-sm-8">
                                <table class="table table-bordered small table-sm">
                                    <tbody>
                                        <tr>
                                            <th colspan="1">Total KPI Mark</th>
                                            <th class="text-center">{{100}}</th>
                                            <th class="text-center">{{$baselineIncentivePercent}}</th>
                                        </tr>
                                        @php
                                            $totalServiceIncentiveAmount = 0;
                                            if($baselineIncentivePercent >= 80) {
                                                    $totalServiceIncentiveAmount = round((($designationBase->service_base_amount*$baselineIncentivePercent)/100), 2);
                                                } else{
                                                    $baselineIncentivePercent = 0;
                                                }
                                        @endphp
                                        <tr>
                                            <th colspan="2">Total Incentive Amount</th>
                                            <th class="text-center">{{$totalServiceIncentiveAmount}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>

            <div style="font-size: 13px;padding-top:1%;">
                <div>
                    <img src="{{asset('/img/shahed_sig.png')}}" height="60" width="100" alt="signature" style="margin-left: 13px;">
                    <p style="margin-left: 30px;">Prepared by</p>
                </div>
            </div>
        </div>
        <!-- report container end -->
    </div>
    <!-- end container-fluid -->
</section>

@endsection