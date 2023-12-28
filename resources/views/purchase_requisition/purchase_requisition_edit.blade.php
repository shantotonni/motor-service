@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">PR</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('PurReqDate') ? 'has-error' : '' }}">
                                    <label for="PurReqDate">PurReqDate</label>
                                    <input name="PurReqDate" type="text" id="PurReqDate" class="form-control datepicker"   value="{{ date('d-m-Y',strtotime($purchaseRequisition->PurReqDate)) }}"   required autofocus   placeholder="PurReqDate"     >
                                    @if ($errors->has('PurReqDate'))
                                        <span class="help-block"><strong>{{ $errors->first('PurReqDate') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('ExpiryDate') ? 'has-error' : '' }}">
                                    <label for="ExpiryDate">ExpiryDate</label>
                                    <input name="ExpiryDate" type="text" id="ExpiryDate" class="form-control datepicker"   value="{{date('d-m-Y',strtotime($purchaseRequisition->ExpiryDate))}}"   required autofocus  placeholder="ExpiryDate"     >
                                    @if ($errors->has('ExpiryDate'))
                                        <span class="help-block"><strong>{{ $errors->first('ExpiryDate') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('DeliveryPlace') ? 'has-error' : '' }}">
                                    <label for="DeliveryPlace">DeliveryPlace</label>
                                    <input name="DeliveryPlace" type="text" id="DeliveryPlace" class="form-control"   value="{{ $purchaseRequisition->DeliveryPlace }}"   required autofocus   placeholder="DeliveryPlace"     >
                                    @if ($errors->has('DeliveryPlace'))
                                        <span class="help-block"><strong>{{ $errors->first('DeliveryPlace') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('ExpectedDelDate') ? 'has-error' : '' }}">
                                    <label for="ExpectedDelDate">ExpectedDelDate</label>
                                    <input name="ExpectedDelDate" type="text" id="ExpectedDelDate" class="form-control datepicker"   value="{{date('d-m-Y',strtotime($purchaseRequisition->ExpectedDelDate))}}"   required autofocus   placeholder="ExpectedDelDate"     >
                                    @if ($errors->has('ExpectedDelDate'))
                                        <span class="help-block"><strong>{{ $errors->first('ExpectedDelDate') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('RequisitionDetails') ? 'has-error' : '' }}">
                                    <label for="RequisitionDetails">RequisitionDetails</label>
                                    <input name="RequisitionDetails" type="text" id="RequisitionDetails" class="form-control"   value="{{ $purchaseRequisition->RequisitionDetails }}"   required autofocus   placeholder="RequisitionDetails"     >
                                    @if ($errors->has('RequisitionDetails'))
                                        <span class="help-block"><strong>{{ $errors->first('RequisitionDetails') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <hr class="row">
                        <div class="row">
                            <h4 id="response_txt" class="text-center" style="font-weight:bold;"></h4>
                        </div>
                        <table id="tbl" class="table table-condensed table-bordered">
                            <thead>
                                <th>Sl</th>
                                <th>
                                  
                                    <select name="ItemCode" id="ItemCode" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                        <option value="">Select Item</option>
                                        @foreach($items as $item)
                                        <option value="{{$item->ItemCode}}">{{$item->ItemName}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('ItemCode'))
                                        <span class="help-block"><strong>{{ $errors->first('ItemCode') }}</strong></span>
                                    @endif  

                                
                                </th>
                                <th><input name="Quantity" type="number" id="Quantity" class="form-control"   value="0"   required autofocus   placeholder="Qty"></th>    
                                <th><input name="Rates" type="number" id="Rates" class="form-control"   value="0"   required autofocus   placeholder="Rates"></th>
                                <th><input name="Description" type="text" id="Description" class="form-control"     required autofocus   placeholder="Description"></th>
                                <th><button id="add" class="btn btn-info">Add<botton></th>
                            </thead>
                            <thead>
                                <th>Sl</th>
                                <th>Item</th>
                                <th>Qty</th>    
                                <th>Rates</th>
                                <th>Description</th>
                                <th>Control</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        
                  </div> <!-- /.card-body -->
                  <div class='row-fluid'>
                          <button type="button" id="submitBtn" onClick="this.disabled=true;" class="btn btn-primary pull-right">Submit</button>
                         
                  </div>
                 </div>
                 <!-- /.card -->

            </div> <!-- /.col-12 -->
      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'PR | Create';</script>
<script type="text/javascript">

    var arr = [];
    var i = 0;

   //adding data data on edit
    @foreach($purchaseRequisitionDetails as $purchaseRequisitionDetail)
        arr.push({
            'ItemCode':'{{$purchaseRequisitionDetail->ItemCode}}',
            'ItemName':"{{$purchaseRequisitionDetail->item->ItemName}}",
            'Quantity':Number('{{$purchaseRequisitionDetail->Quantity}}'),
            'Rates':Number('{{$purchaseRequisitionDetail->Rates}}'),
            'Description':'{{$purchaseRequisitionDetail->Description}}'
        } )  
    @endforeach
     
    $(document).ready(function(){
        i=0;
        arr.forEach(obj => {
            addRow(i,obj.ItemCode,obj.ItemName,obj.Quantity,obj.Rates,obj.Description);
            i++;
        })
    })
    // adding data on edit 

    
    $("#add").click(function () {
       
        if(masterFieldData() != 1){
            $('#response_txt').html("Required Rrevious fields !!!").removeClass("text-success").addClass("text-danger").show();
            return 0;
        }
        

        var ItemCode   = $("#ItemCode").find('option:selected').val();
        var ItemName = $("#ItemCode").find('option:selected').text();
        var Quantity    = Number($("#Quantity").val()) || 0;
        var Rates    = Number($("#Rates").val()) || 0;
        var Description     = $("#Description").val();

        if(ItemCode == ''){
            $('#response_txt').html("No Item Selected").removeClass("text-success").addClass("text-danger").show();
            return 0;
        }


        if(Quantity == 0 || Rates == 0 ||  Quantity <= 0 || Rates <= 0 ){
            $('#response_txt').html("Required field Greater than 0 !!!").removeClass("text-success").addClass("text-danger").show();
            return 0;
        }

        if(isExist(ItemCode)){
            $('#response_txt').html("Already Exist !!!").removeClass("text-success").addClass("text-danger").show();
            return 0;
        }

       
        arr[i] = {
            'ItemCode':ItemCode,
            'ItemName':ItemName,
            'Quantity':Quantity,
            'Rates':Rates,
            'Description':Description,
        }
        addRow(i,ItemCode,ItemName,Quantity,Rates,Description);
        i++;
        clearInputField();
    }); 




    function addRow(index,ItemCode,ItemName,Quantity,Rates,Description) {
        var rows = '';
        rows += '<tr>';
        rows += '<td>' + (index+1) + '</td>';
        rows += '<td>' + ItemName + '</td>';
        rows += '<td>' + Quantity + '</td>';
        rows += '<td>' + Rates + '</td>';
        rows += '<td>' + Description +'</td>';
        rows += '<td><button type="button" class="btn btn-danger btn-xs" onclick="deleteRow(this,'+index+');">del</button></td>';
        rows +='</tr>';

        $("tbody").append(rows);
        $('#response_txt').html("Item Added !!!").removeClass("text-danger").addClass("text-success").show();
    }
    
    

    function isExist(ItemCode){
        return arr.some(function(elem) {
            return elem.ItemCode == ItemCode
        })
    }

    // function getSum(){
    //     var sum = 0; 
    //     arr.forEach(obj => {
    //         sum += obj['RmWeight']
    //         // for (var property in obj) {
    //         //     if(property == "RmWeight")
    //         //         sum += obj[property];
    //         // }
    //     })
    //     return sum;
    // }


    function masterFieldData(){
        var PurReqDate = $('#PurReqDate').val()
        var ExpiryDate = $('#ExpiryDate').val()
        var DeliveryPlace = $('#DeliveryPlace').val()
        var ExpectedDelDate = $('#ExpectedDelDate').val()

        if(PurReqDate == '' || ExpiryDate == '' || DeliveryPlace == '' || ExpectedDelDate == '' ){
            return 0;
        }else{
            return 1;
        }
    }



    function deleteRow(btn,index){
        arr.splice(index, 1);
        $(btn).closest('tr').remove();
    }

    function clearInputField(){
        $('#ItemCode').val('')
        $('#Quantity').val('')
        $('#Rates').val('')
        $('#Description').val('')
    }

  
    
    $('#submitBtn').click(function(){

        var baseurl = "{{ route('purchase-requisition.update',$purchaseRequisition->id) }}";

        $.ajax({
            url: baseurl,
            type: "PUT",
            data:{  '_token': "{{csrf_token()}}",
                    'PurReqDate': $('#PurReqDate').val(),
                    'ExpiryDate': $('#ExpiryDate').val(),
                    'DeliveryPlace': $('#DeliveryPlace').val(),
                    'ExpectedDelDate': $('#ExpectedDelDate').val(),
                    'details':JSON.stringify(arr)
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log("Success",data);
                window.location.href = "{{url('/purchase-requisition')}}";
            },
            error: function (err) {
                console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
            }
            
        });
    });




</script>
@endsection
