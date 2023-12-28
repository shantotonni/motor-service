@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Month Wise KPI Report
                    <div class="spinner-border text-primary loading_process" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span class="loading_process success" style="color:red">Processing Please Do Not Close !!!!!!!!</span>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Month Wise KPI Report</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{route('kpi_master.sort')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group small">
                                        <label>Month<span style="color:red;"> *</span></label>
                                        <select name="date" id="date" class="form-control" style="width: 100%;" required>
                                            <option value="{{date('Y',strtotime('-1 years'))}}-12-01">December-{{date('Y',strtotime('-1 years'))}}</option>
                                            <option value="{{date('Y')}}-01-01" @if((date('m', strtotime($inputs['date'])))=='01' ){{"selected"}}@endif>January-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-02-01" @if((date('m', strtotime($inputs['date'])))=='02' ){{"selected"}}@endif>February-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-03-01" @if((date('m', strtotime($inputs['date'])))=='03' ){{"selected"}}@endif>March-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-04-01" @if((date('m', strtotime($inputs['date'])))=='04' ){{"selected"}}@endif>April-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-05-01" @if((date('m', strtotime($inputs['date'])))=='05' ){{"selected"}}@endif>May-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-06-01" @if((date('m', strtotime($inputs['date'])))=='06' ){{"selected"}}@endif>June-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-07-01" @if((date('m', strtotime($inputs['date'])))=='07' ){{"selected"}}@endif>July-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-08-01" @if((date('m', strtotime($inputs['date'])))=='08' ){{"selected"}}@endif>August-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-09-01" @if((date('m', strtotime($inputs['date'])))=='09' ){{"selected"}}@endif>September-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-10-01" @if((date('m', strtotime($inputs['date'])))=='10' ){{"selected"}}@endif>October-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-11-01" @if((date('m', strtotime($inputs['date'])))=='11' ){{"selected"}}@endif>November-{{date('Y')}}</option>
                                            <option value="{{date('Y')}}-12-01" @if((date('m', strtotime($inputs['date'])))=='12' ){{"selected"}}@endif>December-{{date('Y')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group small">
                                        <label>Designation <span style="color:red;"> *</span></label>
                                        <select name="designation" id="date" class="form-control" style="width: 100%;" required>
                                            @foreach($designations as $designation)
                                            <option value="{{$designation->name}}" @if($designation->name == $inputs['designation']) selected @endif>{{$designation->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group" style="margin-top: 30px;">
                                        <button type="submit" class="btn btn-sm btn-info float-left btn-flat"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div id="message" style="display: flex;justify-content: space-between">
                            <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print " />
                        </div>

                        <div id="printableArea">
                            <?php
                            function filterData($val)
                            {
                                global $staff_id;
                                if ($val['staff_id'] == $staff_id) {
                                    return true;
                                }
                            }
                            if (!empty($staff_id)) {
                                foreach ($staff_id as $key => $value) {
                                    global $staff_id;
                                    $staff_id = $value;
                                    $filterresult = array_values(array_filter($result, "filterData"));
                                    if (!empty($filterresult)) {
                                        doPrint($filterresult, $desig);
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.loading_process').hide();
</script>


<style>
    @media print {
        .pagebreak {
            clear: both;
            page-break-after: always;
        }
    }
</style>

@endsection

<?php
function doPrint($kpi, $desig)
{
    if ($desig->name == 'TSO' || $desig->name == 'SS' || $desig->name == 'Sr.TSO') {

?>
        <div id="printdiv">
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
                                    <td>{{$kpi[0]['region']}}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$kpi[0]['name']}}</td>
                                    <th>Position</th>
                                    <td>{{$kpi[0]['designation']}}</td>
                                </tr>
                                <tr>
                                    <th>Supervisor</th>
                                    <td>Service Engineer</td>
                                    <th>Month</th>
                                    <td>{{date('F', strtotime($kpi[0]['period']))}}</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>Motors</td>
                                    <th>Staff ID</th>
                                    <td>{{$kpi[0]['staff_id']}}</td>
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
                                if ($kpi[0]['warranty_service_target'] > 0) {
                                    $warranty_service_target = $kpi[0]['warranty_service_target'];
                                }else {
                                    $warranty_service_target = 1;
                                }
                                $warrantyServiceWeight = 15;
                                $warrantyServiceScore = round(($kpi[0]['warranty_service_actual']/$warranty_service_target) * $warrantyServiceWeight, 2);
                                if($warranty_service_target==1){
                                    $warrantyServiceScore = 0;
                                }
                                $warrantyServiceFinalScore = 0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Warranty Service</td>
                                    <td>{{$kpi[0]['warranty_service_target']}}</td>
                                    <td>{{$kpi[0]['warranty_service_actual']}}</td>
                                    <td>{{$warrantyServiceWeight}}</td>
                                    <td>{{round($warrantyServiceScore, 2)}}</td>

                                    @if($warrantyServiceScore > $warrantyServiceWeight)
                                    @php
                                    $warrantyServiceFinalScore = $warrantyServiceWeight;
                                    @endphp
                                    <td>{{$warrantyServiceWeight}}</td>
                                    @else
                                    @php
                                    $warrantyServiceFinalScore = round($warrantyServiceScore, 2);
                                    @endphp
                                    <td>{{round($warrantyServiceScore, 2)}}</td>
                                    @endif
                                </tr>
                                @php
                                $postWarrantyServiceWeight = 10;
                                if ($kpi[0]['post_warranty_service_target'] > 0) {
                                $post_warranty_service_target = $kpi[0]['post_warranty_service_target'];
                                }else{
                                $post_warranty_service_target = 1;
                                }
                                $postWarrantyServiceScore = ($kpi[0]['post_warranty_service_actual']/$post_warranty_service_target)*$postWarrantyServiceWeight;
                                if($post_warranty_service_target==1){
                                    $postWarrantyServiceScore = 0;
                                }
                                $postWarrantyServiceFinalScore=0;
                                $totalWarrantyServiceWeight = $warrantyServiceWeight+$postWarrantyServiceWeight;
                                $totalWarrantyServiceScore = round($warrantyServiceScore, 2)+round($postWarrantyServiceScore, 2);
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Post Warranty Customer Service</td>
                                    <td>{{$kpi[0]['post_warranty_service_target']}}</td>
                                    <td>{{$kpi[0]['post_warranty_service_actual']}}</td>
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
                                    <th>{{$kpi[0]['warranty_service_target'] + $kpi[0]['post_warranty_service_target']}}</th>
                                    <th>{{$kpi[0]['warranty_service_actual'] + $kpi[0]['post_warranty_service_actual']}}</th>
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
                                $sixHourWeight = 5;
                                $sixHourScore = ($kpi[0]['six_hour_percentage']/$sixHourTarget)*$sixHourWeight;
                                $sixHourFinalScore=0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Six Hour Service Ratio
                                    </td>
                                    <td>{{$sixHourTarget}}</td>
                                    <td>{{$kpi[0]['six_hour_percentage']}}</td>
                                    <td>{{$sixHourWeight}}</td>
                                    <td>{{$sixHourScore}}</td>
                                    @php $sixHourFinalScore= $sixHourScore; @endphp
                                    <td>{{$sixHourScore}}</td>
                                </tr>
                                @php
                                $csiTarget = 100;
                                $csiWeight = 5;
                                $csiScore = ($kpi[0]['csi_percentage']/$csiTarget)*$csiWeight;
                                $csiFinalScore = 0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Customer Satisfaction Index</td>
                                    <td>{{$csiTarget}}</td>
                                    <td>{{$kpi[0]['csi_percentage']}}</td>
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
                                $indexTotalWeight = $sixHourWeight + $csiWeight;
                                $indexTotalFinalScore = $sixHourFinalScore + $csiFinalScore;
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
                                if ($kpi[0]['tracking'] > 0) {
                                $tracking = $kpi[0]['tracking'];
                                }else{
                                $tracking = 1;
                                }
                                $operationWeight = 5;
                                $operationScore = round(($kpi[0]['in_apps']/$tracking)*$operationWeight, 2);
                                if($tracking==1){
                                    $operationScore = 0;
                                }
                                $operationFinalScore=0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Apps Utilization (Min-80%)</td>
                                    <td>{{$kpi[0]['tracking']}}</td>
                                    <td>{{$kpi[0]['in_apps']}}</td>
                                    <td>{{$operationWeight}}</td>
                                    <td>{{$operationScore}}</td>
                                    @if($operationScore > $operationWeight)
                                    @php $operationFinalScore= $operationWeight; @endphp
                                    <td>{{$operationWeight}}</td>
                                    @elseif($operationScore*10 < 40) @php $operationFinalScore=0; @endphp <td>{{round($operationFinalScore, 2)}}</td>
                                        @else
                                        @php $operationFinalScore= $operationScore; @endphp
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
                                $serviceIncomeWeight = 30;
                                if ($kpi[0]['service_income_target'] > 0) {
                                $service_income_target = $kpi[0]['service_income_target'];
                                }else{
                                $service_income_target = 1;
                                }
                                $serviceIncomeScore = round(($kpi[0]['service_income_actual']/$service_income_target)*$serviceIncomeWeight, 2);
                                if($service_income_target==1){
                                    $serviceIncomeScore = 0;
                                }
                                $serviceIncomeFinalScore=0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Service Revenue Against Budget</td>
                                    <td>{{$kpi[0]['service_income_target']}}</td>
                                    <td>{{$kpi[0]['service_income_actual']}}</td>
                                    <td>{{$serviceIncomeWeight}}</td>
                                    <td>{{$serviceIncomeScore}}</td>

                                    @php
                                        $val = ($kpi[0]['service_income_actual'] / $kpi[0]['service_income_target']) * 100;

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
                                    @php $serviceIncomeFinalScore= $serviceIncomeWeight; @endphp
                                    <td>{{$serviceIncomeWeight}}</td>
                                    @else
{{--                                    @php $serviceIncomeFinalScore= $serviceIncomeScore; @endphp--}}
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
                                    <th>{{$totalWarrantyServiceWeight + $indexTotalWeight + $serviceIncomeWeight + $operationWeight}}</th>
                                    <th></th>
                                    <th>{{$totalWarrantyServiceFinalScore + $indexTotalFinalScore + $serviceIncomeFinalScore + $operationFinalScore}}</th>
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
                                if ($kpi[0]['spare_parts_target'] > 0) {
                                $total_target = $kpi[0]['spare_parts_target'];
                                }else{
                                $total_target = 1;
                                }

                                $sparePartsWeight = 30;
                                $sparePartsScore = round((($kpi[0]['spare_parts_actual']/($total_target))*$sparePartsWeight), 2);
                                if($total_target == 1){
                                $sparePartsScore = 0;
                                }
                                $sparePartsFinalScore=0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Regional Budget Achievement (80% Full mark)</td>
                                    <td>{{$kpi[0]['spare_parts_target']}}</td>
                                    <td>{{$kpi[0]['spare_parts_actual']}}</td>
                                    <td>{{$sparePartsWeight}}</td>
                                    <td>{{$sparePartsScore}}</td>

                                    @php
                                        $val2 = ($kpi[0]['spare_parts_actual'] / $kpi[0]['spare_parts_target']) * 100;

                                            if ($val2 < 60){
                                                $sparePartsFinalScoreConditional = 0;
                                            }
                                            if ($val2 >= 80){
                                                $sparePartsFinalScoreConditional = $sparePartsWeight;
                                            }
                                            if ($val2 >= 60 && $val2 < 80){
                                                $sparePartsFinalScoreConditional = round($val2 * .375, 2);
                                            }
                                            $sparePartsFinalScore = $sparePartsFinalScoreConditional;
                                    @endphp

                                    @if($sparePartsScore > $sparePartsWeight)
                                    @php $sparePartsFinalScore= $sparePartsWeight; @endphp
                                    <td>{{$sparePartsWeight}}</td>
{{--                                    @elseif($sparePartsScore >= 8)--}}
{{--                                    @php $sparePartsFinalScore= $sparePartsWeight; @endphp--}}
{{--                                    <td>{{$sparePartsFinalScore}}</td>--}}
                                    @else
{{--                                    @php $sparePartsFinalScore= round(($sparePartsScore * $sparePartsWeight)/8, 2); @endphp--}}
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
                        <br><br>
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
                                    <th class="text-center">{{$desig->service_base_amount}}</th>
                                </tr>
                            </tbody>
                        </table>
                        <br><br>
                        @php
                        if($baselineIncentivePercent > 100){
                        $baselineIncentivePercent=100;
                        } @endphp
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
                                        if($baselineIncentivePercent <= 80){ $baselineIncentivePercent=0; } $totalServiceIncentiveAmount=round((($desig->service_base_amount*$baselineIncentivePercent)/100), 2);
                                        @endphp
                                            <tr>
                                                <th colspan="2">Total Incentive Amount</th>
                                                <th class="text-center">{{$totalServiceIncentiveAmount}}</th>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                        $image = '';
                        $area = \App\Area::where('name',$kpi[0]['region'])->first();
                        if ($area){
                            $user_area = \App\UserArea::where('area_id',$area->id)->first();
                            if ($user_area){
                                $user = \App\User::where('id',$user_area->user_id)->first();
                                if ($user){
                                    $image = $user->signature;
                                }else{
                                    $image = null;
                                }
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="font-size: 13px;padding-top:200px;text-align: left">
                                    <div>
                                        <img src="{{ url('/signature/',$image) }}" height="40" width="100" alt="signature" style="margin-left: 13px;">
                                        <p style="margin-left: 30px;">Submitted by</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="font-size: 13px;padding-top:200px;text-align: right">
                                    <div>
                                        <img src="{{asset('/img/shahed_sig.png')}}" height="40" width="100" alt="signature" style="margin-left: 13px;">
                                        <p style="margin-left: 30px;">Checked by</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    if ($desig->name == 'TSA' || $desig->name == 'Sr.TSA' || $desig->name == 'PD') {
    ?>
        <div id="printdiv">
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
                                    <td>{{$kpi[0]['region']}}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$kpi[0]['name']}}</td>
                                    <th>Position</th>
                                    <td>{{$kpi[0]['designation']}}</td>
                                </tr>
                                <tr>
                                    <th>Supervisor</th>
                                    <td>Service Engineer</td>
                                    <th>Month</th>
                                    <td>{{date('F', strtotime($kpi[0]['period']))}}</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>Motors</td>
                                    <th>Staff ID</th>
                                    <td>{{$kpi[0]['staff_id']}}</td>
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
                                if ($kpi[0]['warranty_service_target'] > 0) {
                                    $warranty_service_target = $kpi[0]['warranty_service_target'];
                                }else {
                                    $warranty_service_target = 1;
                                }
                                $warrantyServiceWeight = 20;
                                $warrantyServiceScore = round(($kpi[0]['warranty_service_actual']/$warranty_service_target) * $warrantyServiceWeight, 2);
                                if($warranty_service_target == 1){
                                    $warrantyServiceScore = 0;
                                }
                                $warrantyServiceFinalScore = 0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Warranty Service</td>
                                    <td>{{$kpi[0]['warranty_service_target']}}</td>
                                    <td>{{$kpi[0]['warranty_service_actual']}}</td>
                                    <td>{{$warrantyServiceWeight}}</td>
                                    <td>{{round($warrantyServiceScore, 2)}}</td>

                                    @if($warrantyServiceScore > $warrantyServiceWeight)
                                    @php
                                    $warrantyServiceFinalScore = $warrantyServiceWeight;
                                    @endphp
                                    <td>{{$warrantyServiceWeight}}</td>
                                    @else
                                    @php
                                    $warrantyServiceFinalScore = round($warrantyServiceScore, 2);
                                    @endphp
                                    <td>{{round($warrantyServiceScore, 2)}}</td>
                                    @endif
                                </tr>
                                @php
                                $postWarrantyServiceWeight = 10;
                                if ($kpi[0]['post_warranty_service_target'] > 0) {
                                $post_warranty_service_target = $kpi[0]['post_warranty_service_target'];
                                }else{
                                $post_warranty_service_target = 1;
                                }
                                $postWarrantyServiceScore = ($kpi[0]['post_warranty_service_actual']/$post_warranty_service_target)*$postWarrantyServiceWeight;
                                if($post_warranty_service_target == 1){
                                    $postWarrantyServiceScore = 0;
                                }
                                $postWarrantyServiceFinalScore=0;
                                $totalWarrantyServiceWeight = $warrantyServiceWeight+$postWarrantyServiceWeight;
                                $totalWarrantyServiceScore = round($warrantyServiceScore, 2)+round($postWarrantyServiceScore, 2);
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Post Warranty Customer Service</td>
                                    <td>{{$kpi[0]['post_warranty_service_target']}}</td>
                                    <td>{{$kpi[0]['post_warranty_service_actual']}}</td>
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
                                    <th>{{$kpi[0]['warranty_service_target'] + $kpi[0]['post_warranty_service_target']}}</th>
                                    <th>{{$kpi[0]['warranty_service_actual'] + $kpi[0]['post_warranty_service_actual']}}</th>
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
                                $sixHourScore = ($kpi[0]['six_hour_percentage']/$sixHourTarget)*$sixHourWeight;
                                $sixHourFinalScore=0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Six Hour Service Ratio
                                    </td>
                                    <td>{{$sixHourTarget}}</td>
                                    <td>{{$kpi[0]['six_hour_percentage']}}</td>
                                    <td>{{$sixHourWeight}}</td>
                                    <td>{{$sixHourScore}}</td>
                                    @php $sixHourFinalScore= $sixHourScore; @endphp
                                    <td>{{$sixHourScore}}</td>
                                </tr>
                                @php
                                $csiTarget = 100;
                                $csiWeight = 10;
                                $csiScore = ($kpi[0]['csi_percentage']/$csiTarget)*$csiWeight;
                                $csiFinalScore = 0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Customer Satisfaction Index</td>
                                    <td>{{$csiTarget}}</td>
                                    <td>{{$kpi[0]['csi_percentage']}}</td>
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
                                $indexTotalWeight = $sixHourWeight + $csiWeight;
                                $indexTotalFinalScore = $sixHourFinalScore + $csiFinalScore;
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
                                if ($kpi[0]['tracking'] > 0) {
                                $tracking = $kpi[0]['tracking'];
                                }else{
                                $tracking = 1;
                                }

                                $operationWeight = 10;
                                $operationScore = round(($kpi[0]['in_apps']/$tracking)*$operationWeight, 2);
                                if($tracking == 1){
                                    $operationScore = 0;
                                }
                                $operationFinalScore=0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Apps Utilization (Min-80%)</td>
                                    <td>{{$kpi[0]['tracking']}}</td>
                                    <td>{{$kpi[0]['in_apps']}}</td>
                                    <td>{{$operationWeight}}</td>
                                    <td>{{$operationScore}}</td>
                                    @if($operationScore > $operationWeight)
                                    @php $operationFinalScore= $operationWeight; @endphp
                                    <td>{{$operationWeight}}</td>
                                    @elseif($operationScore*10 < 80) @php $operationFinalScore=0; @endphp <td>{{round($operationFinalScore, 2)}}</td>
                                        @else
                                        @php $operationFinalScore= $operationScore; @endphp
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
                                $serviceIncomeWeight = 30;
                                if ($kpi[0]['service_income_target'] > 0) {
                                $service_income_target = $kpi[0]['service_income_target'];
                                }else{
                                $service_income_target = 1;
                                }
                                $serviceIncomeScore = round(($kpi[0]['service_income_actual']/$service_income_target)*$serviceIncomeWeight, 2);
                                if($service_income_target == 1){
                                    $serviceIncomeScore = 0;
                                }
                                $serviceIncomeFinalScore=0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Service Revenue Against Budget</td>
                                    <td>{{$kpi[0]['service_income_target']}}</td>
                                    <td>{{$kpi[0]['service_income_actual']}}</td>
                                    <td>{{$serviceIncomeWeight}}</td>
                                    <td>{{$serviceIncomeScore}}</td>

                                    @php
                                    if ($kpi[0]['service_income_target'] > 0){
                                        $val = ($kpi[0]['service_income_actual'] / $kpi[0]['service_income_target']) * 100;

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
                                    }else{
                                        $serviceIncomeFinalScore = 0;
                                    }

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
                                    <th>{{$totalWarrantyServiceWeight + $indexTotalWeight + $serviceIncomeWeight + $operationWeight}}</th>
                                    <th></th>
                                    <th>{{$totalWarrantyServiceFinalScore + $indexTotalFinalScore + $serviceIncomeFinalScore + $operationFinalScore}}</th>
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
                                if ($kpi[0]['spare_parts_target'] > 0) {
                                    $total_target = $kpi[0]['spare_parts_target'];
                                }else{
                                    $total_target = 1;
                                }

                                $sparePartsWeight = 10;
                                $sparePartsScore = round((($kpi[0]['spare_parts_actual']/($total_target))*$sparePartsWeight), 2);
                                if($total_target == 1){
                                    $sparePartsScore = 0;
                                }
                                $sparePartsFinalScore=0;
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>Regional Budget Achievement (80% Full mark)</td>
                                    <td>{{$kpi[0]['spare_parts_target']}}</td>
                                    <td>{{$kpi[0]['spare_parts_actual']}}</td>
                                    <td>{{$sparePartsWeight}}</td>
                                    <td>{{$sparePartsScore}}</td>

                                    @php
                                        $val2 = ($kpi[0]['spare_parts_actual'] / $kpi[0]['spare_parts_target']) * 100;

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
{{--                                    @elseif($sparePartsScore >= 8)--}}
{{--                                    @php $sparePartsFinalScore= $sparePartsWeight; @endphp--}}
{{--                                    <td>{{$sparePartsFinalScore}}</td>--}}
                                    @else
{{--                                    @php $sparePartsFinalScore= round(($sparePartsScore * $sparePartsWeight)/8, 2); @endphp--}}
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
                        <br><br>
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
                                    <th class="text-center">{{$desig->service_base_amount}}</th>
                                </tr>
                            </tbody>
                        </table>
                        <br><br>
                        @php
                        if($baselineIncentivePercent > 100){
                        $baselineIncentivePercent=100;
                        }@endphp
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
                                           if($baselineIncentivePercent <= 80){ $baselineIncentivePercent=0; } $totalServiceIncentiveAmount=round((($desig->service_base_amount*$baselineIncentivePercent)/100), 2);
                                        @endphp
                                            <tr>
                                                <th colspan="2">Total Incentive Amount</th>
                                                <th class="text-center">{{$totalServiceIncentiveAmount}}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php
                        $image = '';
                        $area = \App\Area::where('name',$kpi[0]['region'])->first();
                        if ($area){
                            $user_area = \App\UserArea::where('area_id',$area->id)->first();
                            if ($user_area){
                                $user = \App\User::where('id',$user_area->user_id)->first();
                                if ($user){
                                    $image = $user->signature;
                                }else{
                                    $image = null;
                                }
                            }
                        }
                        ?>
                           <div class="row">
                               <div class="col-md-6">
                                   <div style="font-size: 13px;padding-top:200px;text-align: left">
                                       <div>
                                           <img src="{{ url('/signature/',$image) }}" height="40" width="100" alt="signature" style="margin-left: 13px;">
                                           <p style="margin-left: 30px;">Submitted by</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div style="font-size: 13px;padding-top:200px;text-align: right">
                                       <div>
                                           <img src="{{asset('/img/shahed_sig.png')}}" height="40" width="100" alt="signature" style="margin-left: 13px;">
                                           <p style="margin-left: 30px;">Checked by</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>