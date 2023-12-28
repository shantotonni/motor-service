@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">SSR Salary List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">SSR Salary</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <input type="button" class="btn btn-primary float-right" value="Print" onclick='printtag("print");'>
                    </div>
                    <div class="card-body" id="print">
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-12">
                                <h5 class="text-center"><b>Salary Of Service & Sales Representative (MED Project)</b></h5>
                                <h5 class="text-center"><b>Incentive and Expense-{{$salaries[0]->Period}}</b></h5>
                                <h5 class="text-center"><b>Dutch Bangla Bank Limited</b></h5>
                            </div>
                        </div>
                        <!-- row end -->
                        <br><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-striped table-sm table-condensed small">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <!-- <th>Period</th> -->
                                            <!-- <th>Userid</th> -->
                                            <th>Staff id</th>
                                            <th>Name</th>
                                            <!-- <th>Area</th> -->
                                            <th>Bank Account</th>
                                            <th>Sales Incentive</th>
                                            <th>Service Payment</th>
                                            <th>Expense</th>
                                            <th>Total</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $expense = 0;
                                            $total = 0;
                                            $totalSalesIncentive = 0;
                                            $totalServicePayment = 0;
                                            $totalExpense = 0;
                                            $grandTotal = 0;
                                        @endphp
                                        @foreach ($salaries as $key => $salary)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <!-- <td>{{ $salary->Period }}</td> -->
                                            <!-- <td>{{ $salary->userid }}</td> -->
                                            <td>{{ $salary->staffid }}</td>
                                            <td>{{ $salary->name }}</td>
                                            <!-- <td></td> -->
                                            <td>{{ $salary->user->account_no }}</td>
                                            <td class="text-right">{{ $salary->Sales_Incentive }}</td>
                                            <td class="text-right">{{ $salary->Service_Payment }}</td>
                                            @php 
                                                $expense = $salary->Daily_Allowance + $salary->Fuel_Cost + $salary->Sim_And_Internet; 
                                                $total = $salary->Basic_Salary + $salary->Daily_Allowance + $salary->Fuel_Cost + $salary->Sim_And_Internet + $salary->Sales_Incentive + $salary->Spare_Parts_TP + $salary->Service_Payment;
                                            @endphp
                                            <td class="text-right">{{ $expense }}</td>
                                            <td class="text-right">{{ $total }}</td>
                                            <td></td>
                                        </tr>
                                        @php
                                            $totalSalesIncentive += $salary->Sales_Incentive;
                                            $totalServicePayment += $salary->Service_Payment;
                                            $totalExpense += $expense;
                                            $grandTotal += $total;
                                        @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="4" class="text-right font-weight-bold">Total</td>
                                            <td class="text-right font-weight-bold">{{$totalSalesIncentive}}</td>
                                            <td class="text-right font-weight-bold">{{$totalServicePayment}}</td>
                                            <td class="text-right font-weight-bold">{{$totalExpense}}</td>
                                            <td class="text-right font-weight-bold">{{$grandTotal}}</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- row end -->
                        <br><br><br>
                        <div class="row">
                            
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2 text-center">
                               
                                <img src="{{ asset('signature/1.png') }}" height="100" width="80" alt="">
                               
                                <hr />
                                <p>Checked By</p>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-2 text-center">
                                
                                <img src="{{ asset('signature/2.png') }}" height="100" width="80" alt="">
                                
                                <hr />
                                <p>Verified By</p>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-2 text-center">
                               
                                <img src="{{ asset('signature/3.png') }}" height="100" width="80" alt="">
                              
                                <hr />
                                <p>Approved By</p>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                    <!-- card body end -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.title = 'SSR Salary List | Print Pdf';
</script>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yymm'
        });
    });
</script>
<script>
    function printtag(tagid) {
        var hashid = "#" + tagid;
        var tagname = $(hashid).prop("tagName").toLowerCase();
        var attributes = "";
        var attrs = document.getElementById(tagid).attributes;
        $.each(attrs, function(i, elem) {
            attributes += " " + elem.name + " ='" + elem.value + "' ";
        })
        var divToPrint = $(hashid).html();
        var head = "<html><head>" + $("head").html() + "</head>";
        var allcontent = head + "<body  onload='window.print()' >" + "<" + tagname + attributes + ">" + divToPrint + "</" + tagname + ">" + "</body></html>";
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write(allcontent);
        newWin.document.close();
        setTimeout(function() {
            newWin.close();
        }, 2000);
    }
</script>
@endsection