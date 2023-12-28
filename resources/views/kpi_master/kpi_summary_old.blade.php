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
                                                $warrantyServiceWeight = 20;
                                                if ($kpi['warranty_service_target'] > 0) {
                                                    $warranty_service_target = $kpi['warranty_service_target'];
                                                }else {
                                                    $warranty_service_target = 1;
                                                }
                                                $warrantyServiceScore = floor(($kpi['warranty_service_actual']/$warranty_service_target) * $warrantyServiceWeight);
                                                $warrantyServiceFinalScore = 0;

                                                if($warrantyServiceScore > $warrantyServiceWeight)
                                                    $warrantyServiceFinalScore = $warrantyServiceWeight;
                                                else
                                                    $warrantyServiceFinalScore = floor($warrantyServiceScore);
                                                    $postWarrantyServiceWeight = 10;
                                                    if ($kpi['post_warranty_service_target'] > 0) {
                                                        $post_warranty_service_target = $kpi['post_warranty_service_target'];
                                                    }else{
                                                        $post_warranty_service_target = 1;
                                                    }
                                                $postWarrantyServiceScore = ($kpi['post_warranty_service_actual']/$post_warranty_service_target)*$postWarrantyServiceWeight;
                                                $postWarrantyServiceFinalScore=0;
                                                $totalWarrantyServiceWeight = $warrantyServiceWeight+$postWarrantyServiceWeight;
                                                $totalWarrantyServiceScore = floor($warrantyServiceScore)+floor($postWarrantyServiceScore);
                                                if($postWarrantyServiceScore > $postWarrantyServiceWeight)
                                                    $postWarrantyServiceFinalScore= $postWarrantyServiceWeight;
                                                else
                                                    $postWarrantyServiceFinalScore= floor($postWarrantyServiceScore);
                                                $totalWarrantyServiceFinalScore = $warrantyServiceFinalScore + $postWarrantyServiceFinalScore;
                                                $sixHourTarget = 100;
                                                $sixHourWeight = 10;
                                                $sixHourScore = ($kpi['six_hour_percentage']/$sixHourTarget)*$sixHourWeight;
                                                $sixHourFinalScore = 0;
                                                if($sixHourScore > $sixHourWeight && $kpi['six_hour_percentage'] >= 80)
                                                    $sixHourFinalScore = $sixHourWeight;
                                                elseif($kpi['six_hour_percentage'] >= 80)
                                                    $sixHourFinalScore = $sixHourScore; 
                                                else
                                                    $sixHourFinalScore = 0;
                                                $csiTarget = 100;
                                                $csiWeight = 10;
                                                $csiScore = ($kpi['csi_percentage']/$csiTarget)*$csiWeight;
                                                $csiFinalScore = 0;
                                                if($csiScore > $csiWeight)
                                                    $csiFinalScore= $csiWeight;
                                                else
                                                    $csiFinalScore= $csiScore;
                                                $indexTotalWeight = $sixHourWeight + $csiWeight;
                                                $indexTotalFinalScore = $sixHourFinalScore + $csiFinalScore;
                                                $serviceIncomeWeight = 20;
                                                if ($kpi['service_income_target'] > 0) {
                                                $service_income_target = $kpi['service_income_target'];
                                                }else{
                                                    $service_income_target = 1;
                                                }
                                                $serviceIncomeScore = round(($kpi['service_income_actual']/$service_income_target)*$serviceIncomeWeight, 2);
                                                $serviceIncomeFinalScore=0;
                                                if($serviceIncomeScore > $serviceIncomeWeight)
                                                    $serviceIncomeFinalScore= $serviceIncomeWeight;
                                                else
                                                    $serviceIncomeFinalScore= $serviceIncomeScore;
                                                $baselineIncentivePercent = 0;
                                                $baselineIncentivePercent = round((($totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore)*100)/($totalWarrantyServiceWeight+$indexTotalWeight+$serviceIncomeWeight), 2);
                                                if($baselineIncentivePercent > 100){
                                                    $baselineIncentivePercent=100;
                                                }elseif($baselineIncentivePercent < 80){
                                                    $baselineIncentivePercent=0;
                                                }
                                                foreach($desig as $d){
                                                    if($d->name == $kpi['designation'])
                                                        $baseDesig = $d;
                                                }
                                                $totalServiceIncentiveAmount = round((($baseDesig->service_base_amount*$baselineIncentivePercent)/100), 2);
                                                $tractorPartsWeight = 20;
                                                if ($kpi['spare_parts_tractor_target'] > 0) {
                                                    $spare_parts_tractor_target = $kpi['spare_parts_tractor_target'];
                                                }else{
                                                    $spare_parts_tractor_target = 1;
                                                }
                                                $tractorPartsScore = round((($kpi['spare_parts_tractor_actual']/$spare_parts_tractor_target)*$tractorPartsWeight), 2);
                                                $tractorPartsFinalScore=0;
                                                if($tractorPartsScore > $tractorPartsWeight)
                                                    $tractorPartsFinalScore= $tractorPartsWeight;
                                                else
                                                    $tractorPartsFinalScore= $tractorPartsScore;
                                                $tractorBaselineIncentivePercent = round((($tractorPartsScore*100)/$tractorPartsWeight), 2);
                                                $tractorGreaterHundred = 0;
                                                if($tractorBaselineIncentivePercent > 100){
                                                    $tractorGreaterHundred = $tractorBaselineIncentivePercent;
                                                    $tractorBaselineIncentivePercent = 100;
                                                }elseif($tractorBaselineIncentivePercent < 80){
                                                    $tractorGreaterHundred = $tractorBaselineIncentivePercent;
                                                    $tractorBaselineIncentivePercent = 0;
                                                }
                                                $totalTractorIncentiveAmount = round((($baseDesig->tractor_parts_base_amount*$tractorBaselineIncentivePercent)/100), 2);
                                                $nmPartsWeight = 10;
                                                if ($kpi['spare_parts_nm_and_pt_target'] > 0) {
                                                    $spare_parts_nm_and_pt_target = $kpi['spare_parts_nm_and_pt_target'];
                                                }else{
                                                    $spare_parts_nm_and_pt_target = 1;
                                                }
                                                $nmPartsScore = round((($kpi['spare_parts_nm_and_pt_actual']/$spare_parts_nm_and_pt_target)*$nmPartsWeight), 2);
                                                $nmPartsFinalScore=0;
                                                if($nmPartsScore > $nmPartsWeight)
                                                    $nmPartsFinalScore= $nmPartsWeight;
                                                else
                                                    $nmPartsFinalScore= $nmPartsScore;
                                                $nmBaselineIncentivePercent = round((($nmPartsScore*100)/$nmPartsWeight), 2);
                                                $nmGreaterHundred = 0;
                                                if($nmBaselineIncentivePercent > 100){
                                                    $nmGreaterHundred = $nmBaselineIncentivePercent;
                                                    $nmBaselineIncentivePercent = 100;
                                                }elseif($nmBaselineIncentivePercent < 80){
                                                    $nmGreaterHundred = $nmBaselineIncentivePercent;
                                                    $nmBaselineIncentivePercent = 0;
                                                }
                                                $totalNmIncentiveAmount = round((($baseDesig->nm_parts_base_amount*$nmBaselineIncentivePercent)/100), 2);
                                                $totalSparePartsWeight = $tractorPartsWeight+$nmPartsWeight;
                                                $totalSparePartsGreaterHundred = $tractorGreaterHundred+$nmGreaterHundred;
                                                $totalSparePartsFinalScore = $tractorPartsFinalScore+$nmPartsFinalScore;
                                                $tractorSalesAchieve25=0;
                                                $tractorSalesAchieve50=0;
                                                $tractorSalesAchieveGreat50=0;
                                                if($tractorBaselineIncentivePercent != 0 && $tractorGreaterHundred >= 101 && $tractorGreaterHundred <= 115){
                                                    $tractorSalesAchieve25 = round($baseDesig->tractor_parts_base_amount*0.25, 2);
                                                }elseif($tractorBaselineIncentivePercent != 0 && $tractorGreaterHundred >= 116 && $tractorGreaterHundred <= 140){
                                                    $tractorSalesAchieve50 = round($baseDesig->tractor_parts_base_amount*0.50, 2);
                                                }elseif($tractorBaselineIncentivePercent != 0 && $tractorGreaterHundred >= 141){
                                                    $tractorSalesAchieveGreat50 = $baseDesig->tractor_parts_base_amount;
                                                }
                                                $nmSalesAchieve25=0;
                                                $nmSalesAchieve50=0;
                                                $nmSalesAchieveGreat50=0;
                                                if($nmBaselineIncentivePercent != 0 && $nmGreaterHundred >= 101 && $nmGreaterHundred <= 115){
                                                    $nmSalesAchieve25 = round($baseDesig->nm_parts_base_amount*0.25 ,2);
                                                }elseif($nmBaselineIncentivePercent != 0 && $nmGreaterHundred >= 116 && $nmGreaterHundred <= 140){
                                                    $nmSalesAchieve50 = round($baseDesig->nm_parts_base_amount*0.50 ,2);
                                                }elseif($nmBaselineIncentivePercent != 0 && $nmGreaterHundred >= 141){
                                                    $nmSalesAchieveGreat50 = $baseDesig->nm_parts_base_amount;
                                                }
                                                $totalSparePartsSalesIncentiveAmount = $tractorSalesAchieve25+$nmSalesAchieve25+$tractorSalesAchieve50+$nmSalesAchieve50+$tractorSalesAchieveGreat50+$nmSalesAchieveGreat50+$totalTractorIncentiveAmount+$totalNmIncentiveAmount;
                                                $totalKpiFinalScore = $totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore+$totalSparePartsFinalScore;
                                                $totalFinalIncentiveAmount = $totalServiceIncentiveAmount + $totalSparePartsSalesIncentiveAmount;
                                                

                                            }

                                            if ($kpi['designation'] == 'TSA' || $kpi['designation'] == 'Sr.TSA' || $kpi['designation'] == 'PD') {

                                                $warrantyServiceWeight = 20;
                                                if ($kpi['warranty_service_target'] > 0) {
                                                    $warranty_service_target = $kpi['warranty_service_target'];
                                                }else {
                                                    $warranty_service_target = 1;
                                                }
                                                $warrantyServiceScore = floor(($kpi['warranty_service_actual']/$warranty_service_target) * $warrantyServiceWeight);
                                                $warrantyServiceFinalScore = 0;
                                                if($warrantyServiceScore > $warrantyServiceWeight)
                                                    $warrantyServiceFinalScore = $warrantyServiceWeight;
                                                else
                                                    $warrantyServiceFinalScore = floor($warrantyServiceScore);
                                                    $postWarrantyServiceWeight = 10;
                                                    if ($kpi['post_warranty_service_target'] > 0) {
                                                        $post_warranty_service_target = $kpi['post_warranty_service_target'];
                                                    }else{
                                                        $post_warranty_service_target = 1;
                                                    }
                                                $postWarrantyServiceScore = ($kpi['post_warranty_service_actual']/$post_warranty_service_target)*$postWarrantyServiceWeight;
                                                $postWarrantyServiceFinalScore=0;
                                                $totalWarrantyServiceWeight = $warrantyServiceWeight+$postWarrantyServiceWeight;
                                                $totalWarrantyServiceScore = floor($warrantyServiceScore)+floor($postWarrantyServiceScore);
                                                if($postWarrantyServiceScore > $postWarrantyServiceWeight)
                                                    $postWarrantyServiceFinalScore= $postWarrantyServiceWeight;
                                                else
                                                    $postWarrantyServiceFinalScore= floor($postWarrantyServiceScore); 
                                                $totalWarrantyServiceFinalScore = $warrantyServiceFinalScore + $postWarrantyServiceFinalScore;
                                                $sixHourTarget = 100;
                                                $sixHourWeight = 10;
                                                $sixHourScore = ($kpi['six_hour_percentage']/$sixHourTarget)*$sixHourWeight;
                                                $sixHourFinalScore = 0;
                                                if($sixHourScore > $sixHourWeight && $kpi['six_hour_percentage'] >= 80)
                                                    $sixHourFinalScore = $sixHourWeight;
                                                elseif($kpi['six_hour_percentage'] >= 80)
                                                    $sixHourFinalScore = $sixHourScore; 
                                                else
                                                   $sixHourFinalScore = 0;
                                                $csiTarget = 100;
                                                $csiWeight = 10;
                                                $csiScore = ($kpi['csi_percentage']/$csiTarget)*$csiWeight;
                                                $csiFinalScore = 0;
                                                if($csiScore > $csiWeight)
                                                    $csiFinalScore= $csiWeight;
                                                else
                                                    $csiFinalScore= $csiScore;
                                                $indexTotalWeight = $sixHourWeight + $csiWeight;
                                                $indexTotalFinalScore = $sixHourFinalScore + $csiFinalScore;
                                                $serviceIncomeWeight = 20;
                                                if ($kpi['service_income_target'] > 0) {
                                                   $service_income_target = $kpi['service_income_target'];
                                                }else{
                                                    $service_income_target = 1;
                                                }
                                                $serviceIncomeScore = round(($kpi['service_income_actual']/$service_income_target)*$serviceIncomeWeight, 2);
                                                $serviceIncomeFinalScore=0;
                                                if($serviceIncomeScore > $serviceIncomeWeight)
                                                    $serviceIncomeFinalScore= $serviceIncomeWeight;
                                                else
                                                    $serviceIncomeFinalScore= $serviceIncomeScore;
                                                $baselineIncentivePercent = 0;
                                                $baselineIncentivePercent = round((($totalWarrantyServiceFinalScore+$indexTotalFinalScore+$serviceIncomeFinalScore)*100)/($totalWarrantyServiceWeight+$indexTotalWeight+$serviceIncomeWeight), 2);
                                                if($baselineIncentivePercent > 100){
                                                    $baselineIncentivePercent=100;
                                                }elseif($baselineIncentivePercent < 80){
                                                    $baselineIncentivePercent=0;
                                                }
                                                foreach($desig as $d){
                                                    if($d->name == $kpi['designation'])
                                                        $baseDesig = $d;
                                                }
                                                $totalServiceIncentiveAmount = round((($baseDesig->service_base_amount*$baselineIncentivePercent)/100), 2);
                                                if ($kpi['spare_parts_nm_and_pt_target'] > 0 || $kpi['spare_parts_tractor_target'] > 0) {
                                                    $total_target = $kpi['spare_parts_nm_and_pt_target'] + $kpi['spare_parts_tractor_target'];
                                                }else{
                                                    $total_target = 1;
                                                }
                                                $tractorPartsWeight = 30;
                                                $tractorPartsScore = round(((($kpi['spare_parts_tractor_actual'] + $kpi['spare_parts_nm_and_pt_actual'])/($total_target))*$tractorPartsWeight), 2);
                                                if($total_target == 1){
                                                    $tractorPartsScore = 0;
                                                }
                                                $tractorPartsFinalScore=0;
                                                if($tractorPartsScore > $tractorPartsWeight)
                                                    $tractorPartsFinalScore= $tractorPartsWeight;
                                                else
                                                    $tractorPartsFinalScore= $tractorPartsScore;
                                                $tractorBaselineIncentivePercent = round((($tractorPartsScore*100)/$tractorPartsWeight), 2);
                                                $tractorGreaterHundred = 0;
                                                if($tractorBaselineIncentivePercent > 100){
                                                    $tractorGreaterHundred = $tractorBaselineIncentivePercent;
                                                    $tractorBaselineIncentivePercent = 100;
                                                }elseif($tractorBaselineIncentivePercent < 80){
                                                    $tractorGreaterHundred = $tractorBaselineIncentivePercent;
                                                    $tractorBaselineIncentivePercent = 0;
                                                }
                                                $totalTractorIncentiveAmount = round((($baseDesig->tractor_parts_base_amount*$tractorBaselineIncentivePercent)/100), 2);
                                                $totalSparePartsWeight = $tractorPartsWeight;
                                                $totalSparePartsGreaterHundred = $tractorGreaterHundred;
                                                $totalSparePartsFinalScore = $tractorPartsFinalScore;
                                                $tractorSalesAchieve25=0;
                                                $tractorSalesAchieve50=0;
                                                $tractorSalesAchieveGreat50=0;
                                                if($tractorBaselineIncentivePercent != 0 && $tractorGreaterHundred >= 101 && $tractorGreaterHundred <= 115){
                                                    $tractorSalesAchieve25 = round($baseDesig->tractor_parts_base_amount*0.25, 2);
                                                }elseif($tractorBaselineIncentivePercent != 0 && $tractorGreaterHundred >= 116 && $tractorGreaterHundred <= 140){
                                                    $tractorSalesAchieve50 = round($baseDesig->tractor_parts_base_amount*0.50, 2);
                                                }elseif($tractorBaselineIncentivePercent != 0 && $tractorGreaterHundred >= 141){
                                                    $tractorSalesAchieveGreat50 = $baseDesig->tractor_parts_base_amount;
                                                }
                                                $totalSparePartsSalesIncentiveAmount = $tractorSalesAchieve25 + $tractorSalesAchieve50 + $tractorSalesAchieveGreat50 + $totalTractorIncentiveAmount;
                                                $totalKpiFinalScore = $totalWarrantyServiceFinalScore + $indexTotalFinalScore + $serviceIncomeFinalScore + $totalSparePartsFinalScore;
                                                $totalFinalIncentiveAmount = $totalServiceIncentiveAmount + $totalSparePartsSalesIncentiveAmount;
                   

                                            }

                                        ?>
                                        <td class="text-right">{{$totalKpiFinalScore}}</td>
                                        <td class="text-right">{{$totalFinalIncentiveAmount}}</td>
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