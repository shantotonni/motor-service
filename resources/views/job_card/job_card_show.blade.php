<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6">
                   <strong>Id:&nbsp;</strong>{{$job_card->id}}
                </div>
                <div class="col-md-6">
                   <strong>Territory:&nbsp;</strong>{{ isset($job_card->territory->name) ? $job_card->territory->name : '' }}
                </div>
                <div class="col-md-6">
                    <strong>Area:&nbsp;</strong>{{ isset($job_card->area->name) ? $job_card->area->name: '' }}
                </div>
                
                <div class="col-md-6">
                    <strong>Engineer&nbsp;</strong>{{ isset($job_card->engineer->name) ? $job_card->engineer->name : '' }}
                </div>
                <div class="col-md-6">
                   <strong>Technician:&nbsp;</strong>
                   {{ isset($job_card->technitian->name) ? $job_card->technitian->name : '' }}
                </div>
                <div class="col-md-6">
                   <strong>Participant:&nbsp;</strong>
                   @if($job_card->participant_id){{$job_card->participant->name}}@endif
                </div>
                <div class="col-md-6">
                  <strong>Product:&nbsp;</strong>
                   {{ isset($job_card->product->name) ? $job_card->product->name : '' }}
                </div>
                <div class="col-md-6">
                  <strong>Call type:&nbsp;</strong>
                   {{ isset($job_card->call_type->name) ? $job_card->call_type->name : '' }}
                </div>
                <div class="col-md-6">
                  <strong>Service type:&nbsp;</strong>
                   {{ isset($job_card->service_type->name) ? $job_card->service_type->name : '' }}
                </div>
                <div class="col-md-6">
                  <strong>Customer name:&nbsp;</strong>
                   {{ $job_card->customer_name }}
                </div>
                <div class="col-md-6">
                  <strong>Customer Mobile:&nbsp;</strong>
                   {{ $job_card->customer_moblie }}
                </div>
                <div class="col-md-6">
                    <strong>Chassis Number:&nbsp;</strong>
                    <span id="old_chassisno">{{ $job_card->chassis_number }}</span>
                </div>
                <div class="col-md-6">
                    <strong>Customer Rating:&nbsp;</strong>
                    {{ $job_card->rating }} stars(out of 5)
                </div>
                <div class="col-md-6">
                  <strong>Buy date:&nbsp;</strong>
                   {{$job_card->buy_date}}
                </div>
                <div class="col-md-6">
                  <strong>Visited date:&nbsp;</strong>
                   {{$job_card->visited_date}}
                </div>
                <div class="col-md-6">
                  <strong>Service wanted at:&nbsp;</strong>
                   {{$job_card->service_wanted_at}}
                </div>
                <div class="col-md-6">
                  <strong>Service start at:&nbsp;</strong>
                   {{$job_card->service_start_at}}
                </div>
                <div class="col-md-6">
                  <strong>Service end at:&nbsp;</strong>
                   {{$job_card->service_end_at}}
                </div>
                <div class="col-md-6">
                  <strong>Service Date:&nbsp;</strong>
                   {{$job_card->service_date}}
                </div>
                <div class="col-md-6">
                  <strong>Created At:&nbsp;</strong>
                   {{$job_card->created_at}}
                </div>
                <div class="col-md-6">
                  <strong>Hour:&nbsp;</strong>
                    <?php
                    if($job_card->service_wanted_at && $job_card->service_start_at){
                        $datetime1 = new DateTime($job_card->service_wanted_at);
                        $datetime2 = new DateTime($job_card->service_start_at);
                        $interval = $datetime1->diff($datetime2);
                        $interval = $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
                    }else {
                        $interval = 0;
                    }
                    ?>
                    {{ $interval }}
                </div>
                <div class="col-md-6">
                    <strong>Running Hour:&nbsp;</strong>
                    {{$job_card->hour}}
                </div>
                <div class="col-md-6">
                  <strong>Total Service Cost:&nbsp;</strong>
                   {{$job_card->total_service_cost}}
                </div>
                <div class="col-md-6">
                    <strong>Discount amount:&nbsp;</strong>
                    {{$job_card->discount_amount}}
                </div>
                <div class="col-md-6">
                    <strong>Total receivable:&nbsp;</strong>
                    {{$job_card->total_receviable}}
                </div>
{{--                <div class="col-md-6">--}}
{{--                    <strong>Service Income:&nbsp;</strong>--}}
{{--                    {{$job_card->service_income}}--}}
{{--                </div>--}}
                <div class="col-md-6">
                    <strong>Spare Parts Sale:&nbsp;</strong>
                    {{$job_card->spare_parts_sale}}
                </div>
                <div class="col-md-6">
                  <strong>Is approved:&nbsp;</strong>
                   @if($job_card->is_approved){{"Yes"}}@else{{"No"}}@endif
                </div>
                <div class="col-md-6">
                  <strong>Approve</strong>
                   <div class="col-md-8">
                   @if($job_card->is_approved)
                           {{"Approved"}}
                   @else
                           <form action="{{ route('job.card.approve') }}" method="post">
                               {{ csrf_field() }}
                               <textarea name="remark" id="" cols="6" rows="6" class="form-control" placeholder="Remarks"></textarea>
                               <input type="hidden" name="job_card_id" value="{{ $job_card->id }}">
                               <button type="submit" class="btn btn-success" id="approveBtn" @if(!empty($chassisImage)) @if($chassisImage->is_approved==0) {{'disabled="disabled"'}} @endif  @endif >Approve</button>
                           </form>
                   @endif 
                   @if($job_card->approver){{$job_card->approver->name}}@endif
                  </div>
                </div>
                @if($job_card->is_approved)
                <div class="col-md-6">
                    <strong>Approval Remarks</strong>
                    <div class="col-md-8">
                        {{ $job_card->approve_remarks }}
                    </div>
                </div>
                    @endif
                @if(!empty($chassisImage))
                  @if($chassisImage->is_approved==0)
                  <div class="col-md-6" id="chassis_image_div">
                      <strong>Chassis Image :</strong>
                      <img src="{{ URL::asset('chassis_images/'.$chassisImage->image_url) }}" alt="chassis image" width="300">
                      <input type="text" name="update_chassis" value="{{ $job_card->chassis_number }}" id="update_chassis" style="margin-top:15px;">
                      <input type="hidden" name="jobcardno" id="jobcardno" value="{{$job_card->id}}">
                      <button class="btn btn-danger btn-sm" id="update_chassis_btn">Update</button>
                    </div>
                  @endif
                @endif
             </div>
        </div>
      </div>
    </div>
</section>
<script>document.title = 'JobCard | Show';</script>

<script>

  // $("#approveBtn").prop("disabled",true);

  $('#update_chassis_btn').on('click', function(){
    var chassisno = $('#update_chassis').val();
    var jobcardno = $('#jobcardno').val();
    console.log(chassisno);
    $.ajax({
        type: "POST",
        url: "{{url('/')}}/job_card/job-card-chassis-update",
        data: {chassisno:chassisno,jobcardno:jobcardno, _token: "{{ csrf_token() }}" },
        dataType: 'json',
        success: function(response){
          console.log(response);
          if(response=='success'){
            $('#chassis_image_div').hide();
            $('#old_chassisno').text(chassisno);
            $("#approveBtn").prop("disabled",false);
          }
        }
      });
  });
</script>