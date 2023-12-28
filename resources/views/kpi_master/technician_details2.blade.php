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
                                <td>Regional Sales Manager </td>
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
                            <tr>
                                <td></td>
                                <th>Total</th>
                                <th>{{$kpi->warranty_service_target+$kpi->post_warranty_service_target}}</th>
                                <th>{{$kpi->warranty_service_actual+$kpi->post_warranty_service_actual}}</th>
                                <th>{{$warrantyServiceWeight+$postWarrantyServiceWeight}}</th>
                                <th>{{floor($warrantyServiceScore)+floor($postWarrantyServiceScore)}}</th>
                                <th>{{$warrantyServiceFinalScore+$postWarrantyServiceFinalScore}}</th>
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
                                @if($sixHourScore > $sixHourWeight) 
                                    @php $sixHourFinalScore= $sixHourWeight; @endphp
                                    <td>{{$sixHourWeight}}</td> 
                                @else
                                    @php $sixHourFinalScore= $sixHourScore; @endphp
                                    <td>{{$sixHourScore}}</td>
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
                            <tr>
                                <td></td>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th>{{$sixHourWeight+$csiWeight}}</th>
                                <th></th>
                                <th>{{$sixHourFinalScore+$csiFinalScore}}</th>
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
                                $serviceIncomeScore = ($kpi->service_income_actual/$kpi->service_income_target)*$serviceIncomeWeight;
                                $serviceIncomeFinalScore=0;
                            @endphp
                            <tr>
                                <td></td>
                                <td>Service Revenue Against Budget</td>
                                <td>{{$kpi->service_income_target}}</td>
                                <td>{{$kpi->service_income_actual}}</td>
                                <td>{{$serviceIncomeWeight}}</td>
                                <td>{{round($serviceIncomeScore, 2)}}</td>
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
                                <th>564</th>
                                <th>345</th>
                                <th>456</th>
                                <th>657</th>
                                <th>45</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th>Base Line Incentive Amount</th>
                                <th>564</th>
                                <th>345</th>
                                <th>456</th>
                                <th>657</th>
                                <th>45</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="5">Total Incentive Amount against Service</th>
                                <th>445565</th>
                            </tr>
                            
                            <tr>
                                <th>4</th>
                                <th colspan="7">Spare parts & Lube Sales (Tractor & NM/PT)</th>
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
                            <tr>
                                <td></td>
                                <td>Sales Budget Achievement</td>
                                <td>564</td>
                                <td>345</td>
                                <td>456</td>
                                <td>657</td>
                                <td>45</td>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="1">Total Mark Against Spare parts & Lube</th>
                                <th>345</th>
                                <th>456</th>
                                <th>657</th>
                                <th>45</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th>Base Line Incentive Amount</th>
                                <th>564</th>
                                <th>345</th>
                                <th>456</th>
                                <th>657</th>
                                <th>45</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="3">Total Incentive Amount against Tractor Spare Parts Sales</th>
                                <th></th>
                                <th></th>
                                <th>445565</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="5">Performance Bonus Against KPI for up to Full Score</th>
                                <th>8979</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="4">If Sales Achievement (101%-115%):Base Amount*Multiplication factor 0.25</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="4">If Sales Achievement (116%-140%):Base Amount*Multiplication factor 0.50</th>
                                <th>1200</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="4">If Sales Achievement (141%-Above):Full Base Amount</th>
                                <th></th>
                                <th>1100</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="5">Total Incentive Amount against Spare Parts Sales</th>
                                <th>5900</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-bordered small table-sm">
                        <tbody>
                            <tr>
                                <td></td>
                                <th>Total KPI Mark</th>
                                <th>100</th>
                                <th>96.5</th>
                            </tr>
                            <tr>
                                <td></td>
                                <th colspan="1">Total Incentive Amount</th>
                                <th colspan="2" class="text-center">12044</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- report container end -->
    </div> 
    <!-- end container-fluid -->
</section>

@endsection
