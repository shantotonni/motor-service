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
                    <p style="margin-left: -100px;">Monthly Key Performance Indicator-TSO (Area)</p>
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
                                $warrantyServiceWeight=20;
                                $warrantyServiceScore = ($kpi->warranty_service_actual/$kpi->warranty_service_target)*$warrantyServiceWeight;
                                $warrantyServiceFinalScore=0;
                            @endphp
                            <tr>
                                <td></td>
                                <td>Warranty Service</td>
                                <td>{{$kpi->warranty_service_target}}</td>
                                <td>{{$kpi->warranty_service_actual}}</td>
                                <td>{{$warrantyServiceWeight}}</td>
                                <td>{{floor($warrantyServiceScore)}}</td>
                                @if($warrantyServiceScore > $warrantyServiceWeight)
                                    @php $warrantyServiceFinalScore = $warrantyServiceWeight; @endphp
                                    <td>{{$warrantyServiceWeight}}</td> 
                                @else
                                    @php $warrantyServiceFinalScore = floor($warrantyServiceScore); @endphp
                                    <td>{{floor($warrantyServiceScore)}}</td>
                                @endif
                            </tr>
                            @php
                                $postWarrantyServiceWeight=10;
                                $postWarrantyServiceScore = ($kpi->post_warranty_service_actual/$kpi->post_warranty_service_target)*$postWarrantyServiceWeight;
                                $postWarrantyServiceFinalScore=0;
                                $totalWarrantyServiceWeight = $warrantyServiceWeight+$postWarrantyServiceWeight;
                                $totalWarrantyServiceScore = floor($warrantyServiceScore)+floor($postWarrantyServiceScore);
                            @endphp
                            <tr>
                                <td></td>
                                <td>Post Warranty Customer Service</td>
                                <td>{{$kpi->post_warranty_service_target}}</td>
                                <td>{{$kpi->post_warranty_service_actual}}</td>
                                <td>{{$postWarrantyServiceWeight}}</td>
                                <td>{{floor($postWarrantyServiceScore)}}</td>
                                @if($postWarrantyServiceScore > $postWarrantyServiceWeight) 
                                    @php $postWarrantyServiceFinalScore= $postWarrantyServiceWeight; @endphp
                                    <td>{{$postWarrantyServiceWeight}}</td> 
                                @else
                                    @php $postWarrantyServiceFinalScore= floor($postWarrantyServiceScore); @endphp
                                    <td>{{floor($postWarrantyServiceScore)}}</td>
                                @endif
                            </tr>
                            @php
                                $totalWarrantyServiceFinalScore = $warrantyServiceFinalScore+$postWarrantyServiceFinalScore;
                            @endphp
                            <tr>
                                <td></td>
                                <th>Total</th>
                                <th>{{$kpi->warranty_service_target+$kpi->post_warranty_service_target}}</th>
                                <th>{{$kpi->warranty_service_actual+$kpi->post_warranty_service_actual}}</th>
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
                                <td>Six Hour Service Ratio(Min-80%)</td>
                                <td>{{$sixHourTarget}}</td>
                                <td>{{$kpi->six_hour_percentage}}</td>
                                <td>{{$sixHourWeight}}</td>
                                <td>{{$sixHourScore}}</td>
                                @if($sixHourScore > $sixHourWeight && $kpi->six_hour_percentage >= 80) 
                                    @php $sixHourFinalScore= $sixHourWeight; @endphp
                                    <td>{{$sixHourWeight}}</td> 
                                @elseif($kpi->six_hour_percentage >= 80)
                                    @php $sixHourFinalScore= $sixHourScore; @endphp
                                    <td>{{$sixHourScore}}</td>
                                @else
                                    @php $sixHourFinalScore=0; @endphp
                                    <td>{{$sixHourFinalScore}}</td>
                                @endif
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
                            
                            <tr>
                                <th>3</th>
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
                                $serviceIncomeWeight = 20;
                                $serviceIncomeScore = round(($kpi->service_income_actual/$kpi->service_income_target)*$serviceIncomeWeight, 2);
                                $serviceIncomeFinalScore=0;
                            @endphp
                            <tr>
                                <td></td>
                                <td>Service Revenue Against Budget</td>
                                <td>{{$kpi->service_income_target}}</td>
                                <td>{{$kpi->service_income_actual}}</td>
                                <td>{{$serviceIncomeWeight}}</td>
                                <td>{{$serviceIncomeScore}}</td>
                                @if($serviceIncomeScore > $serviceIncomeWeight) 
                                    @php $serviceIncomeFinalScore= $serviceIncomeWeight; @endphp
                                    <td>{{$serviceIncomeWeight}}</td> 
                                @else
                                    @php $serviceIncomeFinalScore= $serviceIncomeScore; @endphp
                                    <td>{{round($serviceIncomeScore, 2)}}</td>
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
                                <th>{{$totalWarrantyServiceWeight+$indexTotalWeight+$serviceIncomeWeight}}</th>
                                <th></th>
                                <th>{{$totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore}}</th>
                            </tr>
                            @php
                                $baselineIncentivePercent = 0;
                                $baselineIncentivePercent = round((($totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore)*100)/($totalWarrantyServiceWeight+$indexTotalWeight+$serviceIncomeWeight), 2);
                            @endphp
                            <tr>
                                <td></td>
                                <th>Base Line Incentive Amount</th>
                                <th></th>
                                <th></th>
                                <th>{{100}}%</th>
                                <th>{{$baselineIncentivePercent}}</th>
                                <th>{{$designationBase->service_base_amount}}</th>
                            </tr>
                            @php
                                if($baselineIncentivePercent > 100){
                                    $baselineIncentivePercent=100;
                                }elseif($baselineIncentivePercent < 80){
                                    $baselineIncentivePercent=0;
                                }
                                $totalServiceIncentiveAmount = round((($designationBase->service_base_amount*$baselineIncentivePercent)/100), 2);
                            @endphp
                            <tr>
                                <td></td>
                                <th colspan="5">Total Incentive Amount against Service</th>
                                <th>{{$totalServiceIncentiveAmount}}</th>
                            </tr>
                            
                            <tr>
                                <th>4</th>
                                <th colspan="7">Tractor Spare parts & Lube sales</th>
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
                                $tractorPartsWeight = 20;
                                $tractorPartsScore = round((($kpi->spare_parts_tractor_actual/$kpi->spare_parts_tractor_target)*$tractorPartsWeight), 2);
                                $tractorPartsFinalScore=0;
                            @endphp
                            <tr>
                                <td></td>
                                <td>Sales Budget Achievement</td>
                                <td>{{$kpi->spare_parts_tractor_target}}</td>
                                <td>{{$kpi->spare_parts_tractor_actual}}</td>
                                <td>{{$tractorPartsWeight}}</td>
                                <td>{{$tractorPartsScore}}</td>
                                @if($tractorPartsScore > $tractorPartsWeight) 
                                    @php $tractorPartsFinalScore= $tractorPartsWeight; @endphp
                                    <td>{{$tractorPartsWeight}}</td> 
                                @else
                                    @php $tractorPartsFinalScore= $tractorPartsScore; @endphp
                                    <td>{{$tractorPartsScore}}</td>
                                @endif
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="2">Total Mark Against Spare parts & Lube</th>
                                <th></th>
                                <th>{{$tractorPartsWeight}}</th>
                                <th>{{$tractorPartsScore}}</th>
                                <th>{{$tractorPartsFinalScore}}</th>
                            </tr>
                            @php
                                $tractorBaselineIncentivePercent = round((($tractorPartsScore*100)/$tractorPartsWeight), 2);
                            @endphp
                            <tr>
                                <td></td>
                                <th>Base Line Incentive Amount</th>
                                <th></th>
                                <th></th>
                                <th>{{100}}%</th>
                                <th>{{$tractorBaselineIncentivePercent}}</th>
                                <th>{{$designationBase->tractor_parts_base_amount}}</th>
                            </tr>
                            @php
                                $tractorGreaterHundred = 0;
                                if($tractorBaselineIncentivePercent > 100){
                                    $tractorGreaterHundred = $tractorBaselineIncentivePercent;
                                    $tractorBaselineIncentivePercent = 100;
                                }elseif($tractorBaselineIncentivePercent < 80){
                                    $tractorGreaterHundred = $tractorBaselineIncentivePercent;
                                    $tractorBaselineIncentivePercent = 0;
                                }
                                $totalTractorIncentiveAmount = round((($designationBase->tractor_parts_base_amount*$tractorBaselineIncentivePercent)/100), 2);
                            @endphp
                            <tr>
                                <td></td>
                                <th colspan="3">Total Incentive Amount against Tractor Spare Parts Sales</th>
                                <th></th>
                                <th></th>
                                <th>{{$totalTractorIncentiveAmount}}</th>
                            </tr>
                            <tr>
                                <th>5</th>
                                <th colspan="7">NM/PT Spare Parts & Lubricants</th>
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
                                $nmPartsWeight = 10;
                                $nmPartsScore = round((($kpi->spare_parts_nm_and_pt_actual/$kpi->spare_parts_nm_and_pt_target)*$nmPartsWeight), 2);
                                $nmPartsFinalScore=0;
                            @endphp
                            <tr>
                                <td></td>
                                <td>Sales Budget Achievement</td>
                                <td>{{$kpi->spare_parts_nm_and_pt_target}}</td>
                                <td>{{$kpi->spare_parts_nm_and_pt_actual}}</td>
                                <td>{{$nmPartsWeight}}</td>
                                <td>{{$nmPartsScore}}</td>
                                @if($nmPartsScore > $nmPartsWeight) 
                                    @php $nmPartsFinalScore= $nmPartsWeight; @endphp
                                    <td>{{$nmPartsWeight}}</td> 
                                @else
                                    @php $nmPartsFinalScore= $nmPartsScore; @endphp
                                    <td>{{$nmPartsScore}}</td>
                                @endif
                            </tr>
                            <tr>
                                <td></td>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th>{{$nmPartsWeight}}</th>
                                <th>{{$nmPartsScore}}</th>
                                <th>{{$nmPartsFinalScore}}</th>
                            </tr>
                            @php
                                $nmBaselineIncentivePercent = round((($nmPartsScore*100)/$nmPartsWeight), 2);
                            @endphp
                            <tr>
                                <td></td>
                                <th>Base Line Incentive Amount</th>
                                <th></th>
                                <th></th>
                                <th>{{100}}%</th>
                                <th>{{$nmBaselineIncentivePercent}}</th>
                                <th>{{$designationBase->nm_parts_base_amount}}</th>
                            </tr>
                            @php
                                if($nmBaselineIncentivePercent > 100){
                                    $nmGreaterHundred = $nmBaselineIncentivePercent;
                                    $nmBaselineIncentivePercent = 100;
                                }elseif($nmBaselineIncentivePercent < 80){
                                    $nmGreaterHundred = $nmBaselineIncentivePercent;
                                    $nmBaselineIncentivePercent = 0;
                                }
                                $totalNmIncentiveAmount = round((($designationBase->nm_parts_base_amount*$nmBaselineIncentivePercent)/100), 2);
                            @endphp
                            <tr>
                                <td></td>
                                <th colspan="3">Total Incentive Amount against NM/PT Spare Parts Sales</th>
                                <th></th>
                                <th></th>
                                <th>{{$totalNmIncentiveAmount}}</th>
                            </tr>
                            @php
                                $totalSparePartsWeight = $tractorPartsWeight+$nmPartsWeight;
                                $totalSparePartsGreaterHundred = $tractorGreaterHundred+$nmGreaterHundred;
                                $totalSparePartsFinalScore = $tractorPartsFinalScore+$nmPartsFinalScore;
                            @endphp
                            <tr>
                                <td></td>
                                <th colspan="3">Total Mark Against Spare Parts</th>
                                <th>{{$totalSparePartsWeight}}</th>
                                <th>{{$totalSparePartsGreaterHundred}}</th>
                                <th>{{$totalSparePartsFinalScore}}</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="4">Performance Bonus Against KPI for up to Full Score</th>
                                <th>Tractor</th>
                                <th>NM/PT</th>
                            </tr>
                            @php
                                $tractorSalesAchieve25=0;
                                $tractorSalesAchieve50=0;
                                $tractorSalesAchieveGreat50=0;
                                if($tractorBaselineIncentivePercent != 0 && $tractorGreaterHundred >= 101 && $tractorGreaterHundred <= 115){
                                    $tractorSalesAchieve25 = round($designationBase->tractor_parts_base_amount*0.25, 2);
                                }elseif($tractorBaselineIncentivePercent != 0 && $tractorGreaterHundred >= 116 && $tractorGreaterHundred <= 140){
                                    $tractorSalesAchieve50 = round($designationBase->tractor_parts_base_amount*0.50, 2);
                                }elseif($tractorBaselineIncentivePercent != 0 && $tractorGreaterHundred >= 141){
                                    $tractorSalesAchieveGreat50 = $designationBase->tractor_parts_base_amount;
                                }
                            @endphp

                            @php
                                $nmSalesAchieve25=0;
                                $nmSalesAchieve50=0;
                                $nmSalesAchieveGreat50=0;
                                if($nmBaselineIncentivePercent != 0 && $nmGreaterHundred >= 101 && $nmGreaterHundred <= 115){
                                    $nmSalesAchieve25 = round($designationBase->nm_parts_base_amount*0.25 ,2);
                                }elseif($nmBaselineIncentivePercent != 0 && $nmGreaterHundred >= 116 && $nmGreaterHundred <= 140){
                                    $nmSalesAchieve50 = round($designationBase->nm_parts_base_amount*0.50 ,2);
                                }elseif($nmBaselineIncentivePercent != 0 && $nmGreaterHundred >= 141){
                                    $nmSalesAchieveGreat50 = $designationBase->nm_parts_base_amount;
                                }
                            @endphp
                            <tr>
                                <td></td>
                                <th colspan="4">If Sales Achievement (101%-115%):Base Amount*Multiplication factor 0.25</th>
                                <th>{{$tractorSalesAchieve25}}</th>
                                <th>{{$nmSalesAchieve25}}</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="4">If Sales Achievement (116%-140%):Base Amount*Multiplication factor 0.50</th>
                                <th>{{$tractorSalesAchieve50}}</th>
                                <th>{{$nmSalesAchieve50}}</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="4">If Sales Achievement (141%-Above):Full Base Amount</th>
                                <th>{{$tractorSalesAchieveGreat50}}</th>
                                <th>{{$nmSalesAchieveGreat50}}</th>
                            </tr>
                            @php
                                $totalSparePartsSalesIncentiveAmount = $tractorSalesAchieve25+$nmSalesAchieve25+$tractorSalesAchieve50+$nmSalesAchieve50+$tractorSalesAchieveGreat50+$nmSalesAchieveGreat50+$totalTractorIncentiveAmount+$totalNmIncentiveAmount;
                            @endphp
                            <tr>
                                <td></td>
                                <th colspan="5">Total Incentive Amount against Spare Parts Sales</th>
                                <th>{{$totalSparePartsSalesIncentiveAmount}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-bordered small table-sm">
                        <tbody>
                            @php
                                $totalKpiFinalScore = $totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore+$totalSparePartsFinalScore;
                            @endphp
                            <tr>
                                <td></td>
                                <th>Total KPI Mark</th>
                                <th>100</th>
                                <th>{{$totalKpiFinalScore}}</th>
                            </tr>
                            @php
                                $totalFinalIncentiveAmount = $totalServiceIncentiveAmount + $totalSparePartsSalesIncentiveAmount;
                            @endphp
                            <tr>
                                <td></td>
                                <th colspan="1">Total Incentive Amount</th>
                                <th colspan="2" class="text-center">{{$totalFinalIncentiveAmount}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="font-size: 13px;padding-top:1%;">
                <div>
                    <img src="{{asset('/img/shahed_sig_backup.png')}}" height="20" width="100" alt="signature" style="margin-left: 13px;">
                    <p style="margin-left: 30px;">Prepared by</p>
                </div>
            </div>
        </div>
        <!-- report container end -->
    </div> 
    <!-- end container-fluid -->
</section>

@endsection
