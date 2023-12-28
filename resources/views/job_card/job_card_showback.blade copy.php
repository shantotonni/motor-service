
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">JobCard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">JobCard Create</li>
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
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">JobCard Show</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
            <div class="row">
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Id</strong></div>
                   <div class="col-md-8"><p>{{$job_card->id}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Territory</strong></div>
                   <div class="col-md-8"><p>{{$job_card->territory->name}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Area</strong></div>
                   <div class="col-md-8"><p>{{$job_card->area->name}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Engineer</strong></div>
                   <div class="col-md-8"><p>{{$job_card->engineer->name}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Technician</strong></div>
                   <div class="col-md-8"><p>{{$job_card->technitian->name}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Participant</strong></div>
                   <div class="col-md-8"><p>@if($job_card->participant_id){{$job_card->participant->name}}@endif</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Product</strong></div>
                   <div class="col-md-8"><p>{{$job_card->product->name}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Call type</strong></div>
                   <div class="col-md-8"><p>{{$job_card->call_type->name}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Service type</strong></div>
                   <div class="col-md-8"><p>{{$job_card->service_type->name}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Customer name</strong></div>
                   <div class="col-md-8"><p>{{$job_card->customer_name}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Customer moblie</strong></div>
                   <div class="col-md-8"><p>{{$job_card->customer_moblie}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Buy date</strong></div>
                   <div class="col-md-8"><p>{{$job_card->buy_date}}</p></div>
                </div>
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Visited date</strong></div>
                   <div class="col-md-8"><p>{{$job_card->visited_date}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Service wanted at</strong></div>
                   <div class="col-md-8"><p>{{$job_card->service_wanted_at}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Service start at</strong></div>
                   <div class="col-md-8"><p>{{$job_card->service_start_at}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Service end at</strong></div>
                   <div class="col-md-8"><p>{{$job_card->service_end_at}}</p></div>
                </div>

                <div class="col-md-4">
                   <div class="col-md-4"><strong>Service Date</strong></div>
                   <div class="col-md-8"><p>{{$job_card->service_date}}</p></div>
                </div>
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Created At</strong></div>
                   <div class="col-md-8"><p>{{$job_card->created_at}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Hour</strong></div>
                   <div class="col-md-8"><p>{{$job_card->hour}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Service income</strong></div>
                   <div class="col-md-8"><p>{{$job_card->service_income}}</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Is approved</strong></div>
                   <div class="col-md-8"><p>@if($job_card->is_approved){{"Yes"}}@else{{"No"}}@endif</p></div>
                </div>
                
                <div class="col-md-4">
                   <div class="col-md-4"><strong>Approver</strong></div>
                   <div class="col-md-8">
                   @if($job_card->is_approved){{"Approved"}}
                   @else
                   <a href="{{url('/job_card/'.$job_card->id)}}/approve"><button type="button" class="btn btn-success">Approve</button>
                   @endif 
                   @if($job_card->approver){{$job_card->approver->name}}@endif
                  </div>
                </div>

                
             </div>
                

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
<script>document.title = 'JobCard | Show';</script>

