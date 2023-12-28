@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">KPI Summary Report

            <div  class="spinner-border text-primary loading_process" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <span class="loading_process success" style="color:red">Processing Please Do Not Close !!!!!!!!</span>

        </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">KPI Summary</li>
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
          <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                        <form action="{{route('kpi_summary.sort')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3" >
                                        <div class="form-group small">
                                            <label>Month<span style="color:red;"> *</span></label>
                                            <select name="date" id="date" class="form-control" style="width: 100%;" required>
                                                <option value="{{date('Y',strtotime('-1 years'))}}-12-01" >December-{{date('Y',strtotime('-1 years'))}}</option>
                                                <option value="{{date('Y')}}-01-01" @if((date('m', strtotime($inputs['date']))) == '01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-02-01" @if((date('m', strtotime($inputs['date']))) == '02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-03-01" @if((date('m', strtotime($inputs['date']))) == '03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-04-01" @if((date('m', strtotime($inputs['date']))) == '04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-05-01" @if((date('m', strtotime($inputs['date']))) == '05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-06-01" @if((date('m', strtotime($inputs['date']))) == '06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-07-01" @if((date('m', strtotime($inputs['date']))) == '07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-08-01" @if((date('m', strtotime($inputs['date']))) == '08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-09-01" @if((date('m', strtotime($inputs['date']))) == '09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-10-01" @if((date('m', strtotime($inputs['date']))) == '10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-11-01" @if((date('m', strtotime($inputs['date']))) == '11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                                                <option value="{{date('Y')}}-12-01" @if((date('m', strtotime($inputs['date']))) == '12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group" style="margin-top: 30px;">
                                            <button  type="submit" class="btn btn-sm btn-info float-left btn-flat"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive text-nowrap" id="printableArea">
                        <table class="table table-bordered small table-sm display" style="width:100%" id="printTable">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">SL.</th>
                                    <th scope="col">Staff Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Period</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Region</th>
                                    <th scope="col">Territory</th>
                                    <th scope="col">Total KPI Mark</th>
                                    <th scope="col">Total Incentive Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($result as $kpi)
                                    <tr>
                                        <td class="text-left">{{$kpi['id']}}</td>
                                        <td class="text-left">{{$kpi['serial']}}</td>
                                        <td class="text-left">{{$kpi['staff_id']}}</td>
                                        <td class="text-left">{{$kpi['name']}}</td>
                                        <td class="text-left">{{ date('d-M-Y',strtotime($kpi['period'])) }}</td>
                                        <td class="text-left">{{$kpi['designation']}}</td>
                                        <td class="text-left">{{$kpi['region']}}</td>
                                        <td class="text-left">{{$kpi['territory']}}</td>

                                        <?php
                                            if ($kpi['designation'] == 'TSO' || $kpi['designation'] == 'SS' || $kpi['designation'] == 'Sr.TSO') {
                                                $warrantyServiceWeight = 15;
                                                if ($kpi['warranty_service_target'] > 0) {
                                                    $warranty_service_target = $kpi['warranty_service_target'];
                                                }else {
                                                    $warranty_service_target = 1;
                                                }
                                                $warrantyServiceScore = round(($kpi['warranty_service_actual']/$warranty_service_target) * $warrantyServiceWeight, 2);
                                                $warrantyServiceFinalScore = 0;

                                                if($warrantyServiceScore > $warrantyServiceWeight)
                                                    $warrantyServiceFinalScore = $warrantyServiceWeight;
                                                else
                                                    $warrantyServiceFinalScore = round($warrantyServiceScore, 2);
                                                    $postWarrantyServiceWeight = 10;
                                                    if ($kpi['post_warranty_service_target'] > 0) {
                                                        $post_warranty_service_target = $kpi['post_warranty_service_target'];
                                                    }else{
                                                        $post_warranty_service_target = 1;
                                                    }
                                                $postWarrantyServiceScore = ($kpi['post_warranty_service_actual']/$post_warranty_service_target)*$postWarrantyServiceWeight;
                                                $postWarrantyServiceFinalScore=0;
                                                $totalWarrantyServiceWeight = $warrantyServiceWeight+$postWarrantyServiceWeight;
                                                $totalWarrantyServiceScore = round($warrantyServiceScore, 2)+round($postWarrantyServiceScore, 2);
                                                if($postWarrantyServiceScore > $postWarrantyServiceWeight)
                                                    $postWarrantyServiceFinalScore= $postWarrantyServiceWeight;
                                                else
                                                    $postWarrantyServiceFinalScore= round($postWarrantyServiceScore, 2);
                                                $totalWarrantyServiceFinalScore = $warrantyServiceFinalScore + $postWarrantyServiceFinalScore;
                                                $sixHourTarget = 100;
                                                $sixHourWeight = 5;
                                                $sixHourScore = ($kpi['six_hour_percentage']/$sixHourTarget)*$sixHourWeight;
                                                $sixHourFinalScore = 0;
                                                if($sixHourScore > $sixHourWeight)
                                                    $sixHourFinalScore = $sixHourWeight;
                                                else
                                                    $sixHourFinalScore = $sixHourScore;

                                                $csiTarget = 100;
                                                $csiWeight = 5;
                                                $csiScore = ($kpi['csi_percentage']/$csiTarget)*$csiWeight;
                                                $csiFinalScore = 0;
                                                if($csiScore > $csiWeight)
                                                    $csiFinalScore= $csiWeight;
                                                else
                                                    $csiFinalScore= $csiScore;
                                                $indexTotalWeight = $sixHourWeight + $csiWeight;
                                                $indexTotalFinalScore = $sixHourFinalScore + $csiFinalScore;

                                                // -----operation score
                                                $operationWeight = 5;
                                                if ($kpi['tracking'] > 0) {
                                                    $tracking = $kpi['tracking'];
                                                }else{
                                                    $tracking = 1;
                                                }
                                                $operationScore = round(($kpi['in_apps']/$tracking)*$operationWeight, 2);
                                                $operationFinalScore=0;
                                                if($operationScore > $operationWeight)
                                                    $operationFinalScore= $operationWeight;
                                                elseif($operationScore*10 < 40)
                                                    $operationFinalScore=0;
                                                else
                                                    $operationFinalScore= round($operationScore,2);
                                                //-----operation end

                                                //service Income
                                                $serviceIncomeWeight = 30;
                                                if ($kpi['service_income_target'] > 0) {
                                                $service_income_target = $kpi['service_income_target'];
                                                }else{
                                                    $service_income_target = 1;
                                                }
                                                $serviceIncomeScore = round(($kpi['service_income_actual']/$service_income_target)*$serviceIncomeWeight, 2);
                                                $serviceIncomeFinalScore=0;

                                                //new condition
                                                if ($kpi['service_income_actual'] > 0){
                                                    $val = ($kpi['service_income_actual'] / $kpi['service_income_target']) * 100;
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

                                                //end new condition

                                                if($serviceIncomeScore > $serviceIncomeWeight)
                                                    $serviceIncomeFinalScore= $serviceIncomeWeight;
                                                else
                                                    $serviceIncomeFinalScore= $serviceIncomeFinalScore;

                                                // spare parts
                                                if ($kpi['spare_parts_target'] > 0) {
                                                    $total_target = $kpi['spare_parts_target'];
                                                }else{
                                                    $total_target = 1;
                                                }
                                                $sparePartsWeight = 30;
                                                $sparePartsScore = round((($kpi['spare_parts_actual']/($total_target))*$sparePartsWeight), 2);
                                                if($total_target == 1){
                                                $sparePartsScore = 0;
                                                }
                                                $sparePartsFinalScore = 0;

                                                //new condition
                                                if ($kpi['spare_parts_actual'] > 0){
                                                    $val2 = ($kpi['spare_parts_actual'] / $kpi['spare_parts_target']) * 100;
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
                                                }else{
                                                    $sparePartsFinalScore = 0;
                                                }

                                                //end new condition

                                                if($sparePartsScore > $sparePartsWeight)
                                                    $sparePartsFinalScore= $sparePartsWeight;
//                                                elseif($sparePartsScore >= 8)
//                                                    $sparePartsFinalScore= $sparePartsWeight;
                                                else
//                                                    $sparePartsFinalScore= round(($sparePartsScore * $sparePartsWeight)/8, 2); // shanto working
                                                    $sparePartsFinalScore= $sparePartsFinalScore;

                                                $baselineIncentivePercent = 0;
                                                $baselineIncentivePercent = round((($totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore+$operationFinalScore+$sparePartsFinalScore)*100)/($totalWarrantyServiceWeight+$indexTotalWeight+$serviceIncomeWeight+$operationWeight+$sparePartsWeight), 2);
                                                if($baselineIncentivePercent > 100){
                                                    $baselineIncentivePercent=100;
                                                }

                                                if($baselineIncentivePercent <= 80){
                                                    $baselineIncentivePercent=0;
                                                }

                                                foreach($desig as $d){
                                                    if($d->name == $kpi['designation'])
                                                        $baseDesig = $d;
                                                }

                                                $totalServiceIncentiveAmount=round((($baseDesig->service_base_amount*$baselineIncentivePercent)/100), 2);
                                                $totalKpiFinalScore = round(($totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore+$operationFinalScore+$sparePartsFinalScore), 2);
                                                $totalFinalIncentiveAmount = $totalServiceIncentiveAmount;

                                                // spare parts end
                                            }

                                            if ($kpi['designation'] == 'TSA' || $kpi['designation'] == 'Sr.TSA' || $kpi['designation'] == 'PD') {
                                                //for warranty
                                                $warrantyServiceWeight = 20;
                                                if ($kpi['warranty_service_target'] > 0) {
                                                    $warranty_service_target = $kpi['warranty_service_target'];
                                                }else {
                                                    $warranty_service_target = 1;
                                                }

                                                $warrantyServiceScore = round(($kpi['warranty_service_actual']/$warranty_service_target) * $warrantyServiceWeight, 2);
                                                $warrantyServiceFinalScore = 0;
                                                if($warrantyServiceScore > $warrantyServiceWeight){
                                                    $warrantyServiceFinalScore = $warrantyServiceWeight;
                                                } else{
                                                    $warrantyServiceFinalScore = round($warrantyServiceScore, 2);
                                                }

                                                //for Post warranty
                                                $postWarrantyServiceWeight = 10;
                                                if ($kpi['post_warranty_service_target'] > 0) {
                                                    $post_warranty_service_target = $kpi['post_warranty_service_target'];
                                                }else{
                                                    $post_warranty_service_target = 1;
                                                }
                                                $postWarrantyServiceScore = ($kpi['post_warranty_service_actual']/$post_warranty_service_target)*$postWarrantyServiceWeight;
                                                $postWarrantyServiceFinalScore=0;
                                                $totalWarrantyServiceWeight = $warrantyServiceWeight+$postWarrantyServiceWeight;
                                                $totalWarrantyServiceScore = round($warrantyServiceScore, 2)+round($postWarrantyServiceScore, 2);

                                                if($postWarrantyServiceScore > $postWarrantyServiceWeight){
                                                    $postWarrantyServiceFinalScore= $postWarrantyServiceWeight;
                                                } else{
                                                    $postWarrantyServiceFinalScore= round($postWarrantyServiceScore, 2);
                                                }

                                                $totalWarrantyServiceFinalScore = $warrantyServiceFinalScore + $postWarrantyServiceFinalScore; // final one

                                                $sixHourTarget = 100;
                                                $sixHourWeight = 10;
                                                $sixHourScore = ($kpi['six_hour_percentage']/$sixHourTarget)*$sixHourWeight;
                                                $sixHourFinalScore = 0;
                                                if($sixHourScore > $sixHourWeight){
                                                    $sixHourFinalScore = $sixHourWeight;
                                                } else{
                                                    $sixHourFinalScore = $sixHourScore;
                                                }

                                                $csiTarget = 100;
                                                $csiWeight = 10;
                                                $csiScore = ($kpi['csi_percentage']/$csiTarget)*$csiWeight;
                                                $csiFinalScore = 0;
                                                if($csiScore > $csiWeight){
                                                    $csiFinalScore= $csiWeight;
                                                } else{
                                                    $csiFinalScore= $csiScore;
                                                }

                                                $indexTotalWeight = $sixHourWeight + $csiWeight;
                                                $indexTotalFinalScore = $sixHourFinalScore + $csiFinalScore; // final two

                                                 //operation score
                                                 $operationWeight = 10;
                                                 if ($kpi['tracking'] > 0) {
                                                    $tracking = $kpi['tracking'];
                                                }else{
                                                    $tracking = 1;
                                                }
                                                 $operationScore = round(($kpi['in_apps']/$tracking)*$operationWeight, 2);
                                                 $operationFinalScore=0;
                                                 if($operationScore > $operationWeight){
                                                     $operationFinalScore= $operationWeight;
                                                 } elseif($operationScore*10 < 80) {
                                                     $operationFinalScore=0;
                                                 } else{
                                                     $operationFinalScore= round($operationScore,2);
                                                 }

                                                 //Service Income
                                                 $serviceIncomeWeight = 30;
                                                 if ($kpi['service_income_target'] > 0) {
                                                 $service_income_target = $kpi['service_income_target'];
                                                 }else{
                                                     $service_income_target = 1;
                                                 }
                                                 $serviceIncomeScore = round(($kpi['service_income_actual']/$service_income_target)*$serviceIncomeWeight, 2);
                                                 $serviceIncomeFinalScore=0;

                                                 if ($kpi['service_income_target'] > 0) {
                                                    $val = ($kpi['service_income_actual'] / $kpi['service_income_target']) * 100;
                                                }

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

                                                 if($serviceIncomeScore > $serviceIncomeWeight){
                                                     $serviceIncomeFinalScore= $serviceIncomeWeight;
                                                 } else{
                                                     $serviceIncomeFinalScore= $serviceIncomeFinalScore;
                                                 }

                                                 // spare parts
                                                 if ($kpi['spare_parts_target'] > 0) {
                                                     $total_target = $kpi['spare_parts_target'];
                                                 }else{
                                                     $total_target = 1;
                                                 }
                                                 $sparePartsWeight = 10;
                                                 $sparePartsScore = round((($kpi['spare_parts_actual']/($total_target)) * $sparePartsWeight), 2);
                                                 if($total_target == 1){
                                                    $sparePartsScore = 0;
                                                 }

                                                 $sparePartsFinalScore = 0;

                                                 if ($kpi['spare_parts_actual'] > 0){
                                                     $val2 = ($kpi['spare_parts_actual'] / $kpi['spare_parts_target']) * 100;
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
                                                 }else{
                                                     $sparePartsFinalScore = 0;
                                                 }

                                                 if($sparePartsScore > $sparePartsWeight){
                                                     $sparePartsFinalScore= $sparePartsWeight;
                                                 } else{
                                                     //$sparePartsFinalScore= round(($sparePartsScore * $sparePartsWeight)/8, 2);
                                                     $sparePartsFinalScore= $sparePartsFinalScore;
                                                 }

                                                 $baselineIncentivePercent = 0;
                                                 $baselineIncentivePercent = round((($totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore+$operationFinalScore+$sparePartsFinalScore)*100)/($totalWarrantyServiceWeight+$indexTotalWeight+$serviceIncomeWeight+$operationWeight+$sparePartsWeight), 2);
                                                 if($baselineIncentivePercent > 100){
                                                     $baselineIncentivePercent=100;
                                                 }

                                                 if($baselineIncentivePercent < 80){
                                                     $baselineIncentivePercent=0;
                                                 }

                                                 foreach($desig as $d){
                                                     if($d->name == $kpi['designation'])
                                                         $baseDesig = $d;
                                                 }

                                                 $totalServiceIncentiveAmount=round((($baseDesig->service_base_amount*$baselineIncentivePercent)/100), 2);
                                                 $totalKpiFinalScore = round(($totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore+$operationFinalScore+$sparePartsFinalScore), 2);
                                                 $totalFinalIncentiveAmount = $totalServiceIncentiveAmount;

                                            }

                                        ?>
                                        <td class="text-right">{{ isset($totalKpiFinalScore) ? $totalKpiFinalScore : 0 }}</td>
                                        <td class="text-right">{{ isset($totalFinalIncentiveAmount) ? $totalFinalIncentiveAmount : 0 }}</td>
                                        <td>
                                            <a href="/motor-service/kpi-master/detail/{{$kpi['id']}}" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
      </div>
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
<script>

$('.loading_process').hide();


</script>

<script>
    $(document).ready( function () {
    $('#printTable').DataTable({
        dom: 'lBfrtip',
        buttons: [
            'print', 'excel'
        ]
    } );
} );
</script>



@endsection