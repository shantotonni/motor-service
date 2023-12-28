@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">SSR Salary Details Print all pdf
                    <div class="spinner-border text-primary loading_process" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span class="loading_process success" style="color:red">Processing Please Do Not Close !!!!!!!!</span>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">SSR Salary Details/Print all pdf</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body" id="print">
                        <div id="message" style="display: flex;justify-content: space-between">
                            <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print " />
                        </div>

                        <div id="printableArea">
                            <?php
                            foreach ($salaries as $salary) {
                                $technitian_id = $salary->userid;
                                $technician = App\User::where('id', $technitian_id)->first();

                                $user_territory = App\UserTerritory::where('user_id', $technitian_id)->first();
                                // if(!$user_territory){return response()->json(['error'=>"No Territory Defined for this user"],422);}
                                $territory = App\Territory::find($user_territory->territory_id);

                                $area_id = $territory->area_id;
                                $user_area = App\UserArea::where('area_id', $area_id)->first();
                                // if(!$user_area){return response()->json(['error'=>"Engineer undefined"],422);}
                                $engineer = App\User::where('id', $user_area->user_id)->first();

                                doPrint($salary, $engineer, $territory, $technician);
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
    document.title = 'SSR Salary Details | Print All Pdf';
</script>
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
function doPrint($salary, $engineer, $territory, $technician)
{
?>

    <div id="printdiv">
        <div style="background-color: white; width: 1000px; padding: 4%;">

            <div class="row d-flex justify-content-center">
                <div class="col-sm-4">
                    <h4 class="text-center">ACI Motors Ltd.</h4>
                    <h4 class="text-center">SSR Salary Sheet</h4>
                </div>
            </div>
            <!-- row end -->
            <br><br>
            <div class="row">
                <div class="col-sm-6">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>{{ $salary->name }}</td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>{{ $salary->staffid }}</td>
                        </tr>
                        <tr>
                            <td>Supervisor</td>
                            <td>:</td>
                            <td>{{ $engineer->name }}</td>
                        </tr>
                        <tr>
                            <td>Terittory</td>
                            <td>:</td>
                            <td>{{ $territory->name }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <table>
                        <tr>
                            <td>Date of Forwarding : </td>
                            <td>{{ date('Y-m-d') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <!-- row end -->
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-sm">
                        <thead class="text-center">
                            <th>SL</th>
                            <th>Particulars</th>
                            <th>Qty</th>
                            <th>Deduction for Bike</th>
                            <th>Amount</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Salary</td>
                                <td></td>
                                <td class="text-right">
                                    @if($technician->self_bike != 'Y')
                                    5500.00
                                    @else
                                    0.00
                                    @endif
                                </td>
                                <td class="text-right">
                                    {{ $salary->Basic_Salary }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>Bike fuel and maintenance cost (2.15tk/ KM)</td>
                                <td class="text-right">
                                    @php
                                    $total_km = floor($salary->Fuel_Cost / 2.15);
                                    @endphp
                                    {{ $total_km }}
                                </td>
                                <td class="text-right">
                                <td class="text-right">{{ $salary->Fuel_Cost }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Daily Allowance (100/day, max 20 days)</td>
                                <td></td>
                                <td></td>
                                <td class="text-right">{{ $salary->Daily_Allowance }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>Service Payment (350/ job card)</td>
                                <td class="text-right">{{ $salary->Total_service }}</td>
                                <td class="text-right"></td>
                                <td class="text-right">{{ $salary->Service_Payment }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>Sales generation incentive</td>
                                <td>Item name and quantity</td>
                                <td></td>
                                <td class="text-right">{{ $salary->Sales_Incentive }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>SIM and internet ceiling</td>
                                <td></td>
                                <td></td>
                                <td class="text-right">{{ $salary->Sim_And_Internet }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2" class="font-weight-bold">Total</td>
                                <td></td>
                                <td class="text-right font-weight-bold">{{ $salary->Basic_Salary + $salary->Fuel_Cost + $salary->Daily_Allowance + $salary->Service_Payment + $salary->Sales_Incentive + $salary->Sim_And_Internet + $salary->Spare_Parts_TP }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- row end -->
            <br><br><br>
            <div class="row" style="padding-left: 80px;">
                <div class="col-sm-2 text-center" style="padding-top: 60px">
                    {{ $salary->name }}
                    <hr />
                    <p>Raised By</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2 text-center">
                    @if($salary->Status == 'checked' || $salary->Status == 'verified' || $salary->Status == 'approved')
                    <img src="{{ asset('signature/1.png') }}" height="100" width="80" alt="">
                    @endif
                    <hr />
                    <p>Checked By</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2 text-center">
                    @if($salary->Status == 'verified')
                    <img src="{{ asset('signature/2.png') }}" height="100" width="80" alt="">
                    @endif
                    <hr />
                    <p>Verified By</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2 text-center">
                    @if($salary->Status == 'approved')
                    <img src="{{ asset('signature/3.png') }}" height="100" width="80" alt="">
                    @endif
                    <hr />
                    <p>Approved By</p>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
        <div style="margin-bottom: 700px;"></div>
    </div>

<?php
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