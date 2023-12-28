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
                    <h3 class="card-title">Quotation</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                     <!--
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('PurReqNo') ? 'has-error' : '' }}">
                                    <label for="PurReqNo">PurReqNo</label>
                                    <input name="PurReqNo" type="text" id="PurReqNo" class="form-control"   value="{{ $quotation->PurReqNo }}"   readonly="true" autofocus   placeholder="PurReqNo"     >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('QuotationNo') ? 'has-error' : '' }}">
                                    <label for="QuotationNo">QuotationNo</label>
                                    <input name="QuotationNo" type="text" id="QuotationNo" class="form-control"   value="{{ $quotation->QuotationNo }}"   readonly="true" autofocus   placeholder="QuotationNo"     >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group {{ $errors->has('QuotationDate') ? 'has-error' : '' }}">
                                    <label for="QuotationDate">QuotationDate</label>
                                    <input name="QuotationDate" type="text" id="QuotationDate" class="form-control"   value="{{ $quotation->QuotationDate }}"   readonly="true" autofocus   placeholder="QuotationDate"     >
                                </div>
                            </div>
                        </div>
                      
                        <hr class="row">
                          -->
                        
                        <form id="quotation_detail_create_form" action="{{ route('quotation-detail.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="QuotationNo" value="{{$quotation->QuotationNo}}" >
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group {{ $errors->has('ItemCode') ? 'has-error' : '' }}">
                                    <label for="ItemCode">ItemCode</label>
                                    <select name="ItemCode" id="ItemCode" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                                        <option value="">Select Item</option>
                                        @foreach($items as $item)
                                        <option value="{{$item->ItemCode}}">{{$item->ItemCode}} - {{$item->ItemName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group {{ $errors->has('SpotLocationCode') ? 'has-error' : '' }}">
                                    <label for="SpotLocationCode">SpotLocationCode</label>
                                    <select name="SpotLocationCode" id="SpotLocationCode" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"  >
                                        <option value="">Select SpotLocation</option>
                                        @foreach($spot_locations as $spot_location)
                                        <option value="{{$spot_location->SpotLocationCode}}">{{$spot_location->SpotLocationName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group {{ $errors->has('Quantity') ? 'has-error' : '' }}">
                                    <label for="Quantity">Quantity</label>
                                    <input name="Quantity" type="number" id="Quantity" class="form-control"   value=""  min="0" max="10000"  required autofocus   placeholder="Qty">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group {{ $errors->has('Rate') ? 'has-error' : '' }}">
                                    <label for="Rate">Spot Rate</label>
                                    <input name="Rate" type="number" id="Rate" class="form-control"   value=""   min="0" max="10000"  required autofocus   placeholder="Rate">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group {{ $errors->has('OthersCost') ? 'has-error' : '' }}">
                                    <label for="OthersCost">Other Cost (per Unit)</label>
                                    <input name="OthersCost" type="number" id="OthersCost" class="form-control"   value=""  min="0" max="10000"   required autofocus   placeholder="OthersCost">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group {{ $errors->has('TotalPerUnit') ? 'has-error' : '' }}">
                                    <label for="TotalPerUnit">Total per Unit</label>
                                    <input name="TotalPerUnit" type="number" id="TotalPerUnit" class="form-control"   value=""   min="0" max="10000"  required autofocus  readonly placeholder="TotalPerUnit">
                                </div>
                            </div>

                            
                            <div class="col-sm-3">
                                <div class="form-group {{ $errors->has('Description') ? 'has-error' : '' }}">
                                    <label for="Description">Description</label>
                                    <textarea name="Description" type="number" id="Description" class="form-control"   value=""   required autofocus   placeholder="Code,Origin:"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group {{ $errors->has('PictureFileName') ? 'has-error' : '' }}">
                                    <label for="PictureFileName">PictureFileName</label>
                                    <input name="PictureFileName" type="file" id="PictureFileName" class=""   value=""   autofocus   placeholder="Image">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group {{ $errors->has('add') ? 'has-error' : '' }}">
                                    <label for="add">Add</label><br>
                                    <button id="btn" type="submit" class="btn  btn-info">Add</button>
                                </div>
                            </div>
                       </div>

                        </form>
                        <div class="row">
                            <h4 id="response_txt" class="text-center" style="font-weight:bold;"></h4>
                        </div>

                        <hr class="row">
                      
                        <div class="table-responsive">


                        <form class="" role="form" method="POST" action="{{ route('quotation.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <table id="tbl" class="table table-condensed table-bordered">
                            <thead>
                                <th>Item</th>
                                <th>SpotLocation</th>
                                <th>Qty</th>    
                                <th>Spot Rate</th>
                                <th>Other Cost (per Unit)</th>
                                <th>TotalPerUnit</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Control</th>
                            </thead>
                            <tbody>
                                @foreach($quotation_details as $quotation_detail)
                                <tr>
                                    <td>{{$quotation_detail->item->ItemCode}} - {{$quotation_detail->item->ItemName}}</td>
                                    <td>{{$quotation_detail->spot_location->SpotLocationName}}</td>
                                    <td>{{$quotation_detail->Quantity}}</td>    
                                    <td>{{$quotation_detail->Rate}}</td>
                                    <td>{{$quotation_detail->OthersCost}}</td>
                                    <td>{{$quotation_detail->TotalPerUnit}}</td>
                                    <td>{{$quotation_detail->Description}}</td>
                                    <td>
                                        <a class="example-image-link" href="{{asset('/images/'.$quotation_detail->PictureFileName)}}" data-lightbox="example-1">
                                            <img class="example-image" width="70px" src="{{asset('/images/'.$quotation_detail->PictureFileName)}}" alt="image-1" />
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/quotation-detail/{{$quotation_detail->id}}/edit"><button type="button" class="button btn-info btn-flat">Edit</button></a>
                                        <a id="openDeleteModal" data-toggle="modal" data-id="{{$quotation_detail->id}}" title="Delete"  href=""><button type="button" class="btn btn-danger btn-flat">Del</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                         <!-- &nbsp;&nbsp;&nbsp;<button type="submit" id="submitBtn1" class="btn btn-primary pull-right">Submit</button>  -->
                        </div>    
                     </form>
                     </div>
                        
                  </div> <!-- /.card-body -->
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

    @foreach($quotation_details as $quotation_detail)
        arr.push({
            'ItemCode':'{{$quotation_detail->item->ItemCode}}',
            'ItemName':'{{$quotation_detail->item->ItemName}}',
            'SpotLocationCode':'{{$quotation_detail->spot_location->SpotLocation}}',
            'SpotLocationName':'{{$quotation_detail->spot_location->SpotLocation}}',
            'Quantity':'{{$quotation_detail->Quantity}}',
            'Rate':'{{$quotation_detail->Rate}}',
            'OthersCost':'{{$quotation_detail->OthersCost}}',
            'TotalPerUnit':'{{$quotation_detail->TotalPerUnit}}',
            'Description':'{{$quotation_detail->Description}}',
            'PictureFileName':'{{$quotation_detail->PictureFileName}}'
        } )  
    @endforeach
    
    i=arr.length-1;

    
    $("#add").click(function () {
       
        var ItemCode  = $("#ItemCode").find('option:selected').val();
        var ItemName  = $("#ItemCode").find('option:selected').text();
        var SpotLocationCode  = $("#SpotLocation").find('option:selected').val();
        var SpotLocationName  = $("#SpotLocation").find('option:selected').text();
        var Quantity  = Number($("#Quantity").val()) || 0;
        var Rate      = Number($("#Rate").val()) || 0;
        var OthersCost = $("#OthersCost").val();
        var TotalPerUnit = $("#TotalPerUnit").val();
        var Description  = $('#Description').val();

        var PictureFileName  = $("#PictureFileName").clone();

        if(ItemCode == ''){
            $('#response_txt').html("No Item Selected").removeClass("text-success").addClass("text-danger").show();
            return 0;
        }


        if(Quantity == 0 || Rate == 0 ||  Quantity <= 0 || Rate <= 0 ){
            $('#response_txt').html("Required field Greater than 0 !!!").removeClass("text-success").addClass("text-danger").show();
            return 0;
        }

        if(isExist(ItemCode,SpotLocationCode)){
            $('#response_txt').html("Already Exist !!!").removeClass("text-success").addClass("text-danger").show();
            return 0;
        }

       
        arr[i] = {
            'ItemCode':ItemCode,
            'ItemName':ItemName,
            'SpotLocationCode':SpotLocation,
            'SpotLocationName':SpotLocation,
            'Quantity':Quantity,
            'Rate':Rate,
            'OthersCost':OthersCost,
            'TotalPerUnit':TotalPerUnit,
            'Description':Description,
            'PictureFileName':PictureFileName
        }
        addRow(i,ItemCode,ItemName,SpotLocationCode,SpotLocationName,Quantity,Rate,OthersCost,TotalPerUnit,Description,PictureFileName);
        i++;
        clearInputField();
    }); 




    function addRow(i,id,ItemCode,ItemName,SpotLocationCode,SpotLocationName,Quantity,Rate,OthersCost,TotalPerUnit,Description,PictureFileName){
        var rows = '';
        rows += '<tr>';
        rows += '<td>' + ItemName + '</td>';
        rows += '<td>' + SpotLocationName + '</td>';
        rows += '<td>' + Quantity + '</td>';
        rows += '<td>' + Rate + '</td>';
        rows += '<td>' + OthersCost + '</td>';
        rows += '<td>' + TotalPerUnit + '</td>';
        rows += '<td>' + Description +'</td>';
        rows += '<td><a class="example-image-link" href="{{url("images")}}/'+PictureFileName+'" data-lightbox="example-1"><img class="example-image" width="70px" src="{{url("images")}}/'+PictureFileName+'" alt="image-1" /></a></td>';
        rows += '<td><a href="{{url("quotation-detail")}}/'+id+'/edit"><button type="button" class="btn btn-info");">Edit</button></a></td>';
        //rows += '<td><button type="button" class="btn btn-danger btn-xs" onclick="deleteRow(this,'+i+');">del</button></td>';
        rows +='</tr>';
        
    
        $("tbody").append(rows);
        $('#response_txt').html("Item Added !!!").removeClass("text-danger").addClass("text-success").show();
    }
    
    

    function isExist(ItemCode,SpotLocationCode){
        return arr.some(function(elem) {
            return elem.ItemCode == ItemCode && elem.SpotLocationCode==SpotLocationCode
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
        var Quotation = $('#PurReqDate').val()
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
        $('#Rate').val('')
        $('#Description').val('')
    }

  
    
    // $('#submitBtn').click(function(){
    //     var baseurl = "{{ route('quotation.store') }}";

    //     $.ajax({
    //         url: baseurl,
    //         type: "POST",
    //         data:{  '_token': "{{csrf_token()}}",
    //                 'details':JSON.stringify(arr)
    //         },
    //         cache: false,
    //         enctype: 'multipart/form-data',
    //         dataType: 'json',
    //         success: function (data) {
    //             console.log("Success",data);
    //             //window.location.href = "{{url('/quotation/')}}";
    //         },
    //         error: function (err) {
    //             console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
    //         }
            
    //     });
    // });



       $('#Rate, #OthersCost').keyup(function(){
         $('#TotalPerUnit').val((Number($("#OthersCost").val()) || 0) +(Number($("#Rate").val()) || 0))
       });



        //$("#quotation_detail_create_form").submit(function(stay){
            $("#quotation_detail_create_form").submit(function(e) {
                

            //var formData = $(this).serialize(); // here $(this) refere to the form its submitting
                var formData = new FormData($(this)[0]);
                var url = $(this).attr('action');   

                e.preventDefault();

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'POST',
                    url: url,
                    cache: false,
                    async: false,
                    processData: false, // important 
                    contentType: false,
                    enctype: 'multipart/form-data',
                    data: formData, // here $(this) refers to the ajax object not form
                    success: function (data) {
                        console.log("Success",data);
                        if(isExist(data.ItemCode,data.SpotLocationCode)){
                            $('#response_txt').html("Updated Successfully!!!").removeClass("text-danger").addClass("text-success").fadeIn().delay(3000).fadeOut();
                        }else{
                            addRow(i,data.id,data.ItemCode,data.ItemName,data.SpotLocationCode,data.SpotLocationName,data.Quantity,data.Rate,data.OthersCost,data.TotalPerUnit,data.Description,data.PictureFileName)
                            i++;
                        }
                        
                        
                    },
                    error: function (err) {
                        
                         console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
                         if ( err.status === 422 ) {
                             var errors = err.responseJSON;
                            $('#response_txt').html(errors.error).removeClass("text-danger").addClass("text-danger").fadeIn().delay(3000).fadeOut();
                         }
                    }
                });

                return false;
                 
        })




</script>

<!-- Modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Delete Item !!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="delete_modal_form" role="form" method="POST" action="">
        {{ csrf_field() }}
        {{ method_field("DELETE") }}
      <div class="modal-body">
          <p class="text-center danger">Are Your Sure ? </p>
          <input id="delete_id" type="hidden" name="id">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary float-left">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>document.title = 'Company';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/quotation-detail')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
