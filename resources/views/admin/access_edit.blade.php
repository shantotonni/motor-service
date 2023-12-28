@extends('layouts.master')

@section('content')

<?php use App\Http\Controllers\AdminController;?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Access Of:<strong>{{$user_name}}</strong>
                     <span ><i id="result_box" style="color:green"></i></span>
                </div>

                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-responsive table-condenced ">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Yes/No</th>
                        </thead>
                        <tbody>
                         @foreach ($features as $feature)
                            <tr>
                                <td>{{$feature->id}}</td>
                                <td>{{$feature->name}}</td>
                                <td><input type="checkbox" class="checkbox_features" name="v" value="{{$feature->id}}" 
                                <?php if(AdminController::isFeatureCheckedMarked($feature->id,$id)){echo "checked";} ?>
                                  >
                                 </td>
                            </tr>
                          @endforeach  
                        </tbody>

                    </table>
                 
                </div>
            </div>
        </div>
    </div>
</div>


  <script type="text/javascript">




 
$(document).ready(function(){
   $('#result_box').hide();

   var user_id = "{{$id}}";
   var status=null;
   var url = "{{url('/admin/access')}}";
   $('.checkbox_features').change(function () {
      var feature_id = $(this).val();
        //alert(feature_id);

        if ($(this).is(':checked')) {
             status = 1;
        }else{
            status = 0;
        }

      ajax_request(url,user_id,feature_id,status);  


    });


   function ajax_request(url,user_id,feature_id,status){
       
          $.ajax({
                    
             type: "POST",
             url: url,    
             data:{'user_id':user_id,
                   'feature_id':feature_id,
                   '_token': $('meta[name=csrf-token]').attr('content'),
                   'status':status
             },
             success: function(response){
                 //alert(response);
                 $('#result_box').html("!!!---"+response+"---!!!");
                 $("#result_box").show().delay(1000).fadeOut();
                 
             },
            error: function(err){      
              alert('Error while request..');

             }
          });
    }//ajax request end 




}); // document ready end 

</script>
@endsection
