@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Target</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Target</li>
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
              <div class="row">
                <form class="" role="form" action="{{url('/target')}}" method="get">
                 <div class="row">
                  <div class="col-sm-6">
                    <!-- <input name="date" type="text" id="date"class="form-control datepicker"  value="{{ request()->get('date') }}"    autofocus required  placeholder="Date"  autocomplete="off">
                   -->
                     
                      <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select"     >
                      <option value="01-12-{{date('Y',strtotime('-1 years'))}}" >December-{{date('Y',strtotime('-1 years'))}}</option>
                          <option value="01-01-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='01'){{"selected"}}@endif>January-{{date('Y')}}</option>
                          <option value="01-02-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='02'){{"selected"}}@endif>February-{{date('Y')}}</option>
                          <option value="01-03-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='03'){{"selected"}}@endif>March-{{date('Y')}}</option>
                          <option value="01-04-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='04'){{"selected"}}@endif>April-{{date('Y')}}</option>
                          <option value="01-05-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='05'){{"selected"}}@endif>May-{{date('Y')}}</option>
                          <option value="01-06-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='06'){{"selected"}}@endif>June-{{date('Y')}}</option>
                          <option value="01-07-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='07'){{"selected"}}@endif>July-{{date('Y')}}</option>
                          <option value="01-08-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='08'){{"selected"}}@endif>August-{{date('Y')}}</option>
                          <option value="01-09-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='09'){{"selected"}}@endif>September-{{date('Y')}}</option>
                          <option value="01-10-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='10'){{"selected"}}@endif>October-{{date('Y')}}</option>
                          <option value="01-11-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='11'){{"selected"}}@endif>November-{{date('Y')}}</option>
                          <option value="01-12-{{date('Y')}}" @if(date('m',strtotime(request()->get('date'))) =='12'){{"selected"}}@endif>December-{{date('Y')}}</option>
                      </select>
                  </div>
                  <div class="col-sm-5">
                        <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" style="width: 100%;"  autofocus type="select"  required     >
                            @foreach($areas as $area)
                            <option value="{{$area->id}}" @if($area->id == request()->get("area_id")){{"selected"}} @endif">{{$area->name}}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="col-sm-1">
                        <button type="submit" class="btn btn-sm btn-success">Search</button>
                  </div>
                 </div>
                </form>
              </div>
              @if((Auth::user()->role_id == 1) || (Auth::user()->role_id == 2 && (int)date('d') < 12))
              <a href="{{url('/target/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create Target</button></a>
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="" class="table table-bordered table-striped table-sm text-nowrap">
                <thead>
                      <th>Id</th>
                      <th>Date</th>
                      <th>Area</th>
                      <th>Territory</th>
                      <th>Technitian</th>
                      <th>Engineer</th>
                      <th>Tractor Warranty</th>
                      <th>Tractor Post warranty</th>
                      <th>NM/PTDE Warranty</th>
                      <th>NM/PTDE Post Warranty</th>
                      <th>Total</th>
                      <th>Service Income</th>
                      <!-- <th>Note</th> -->
                      <th>Controls</th>
                </thead>
                <tbody>
                    <?php 
                    $total=0;
                    $total_tractor_warranty = 0;
                    $total_tractor_post_warranty = 0;
                    $total_nm_warranty = 0;
                    $total_nm_post_warranty = 0;
                    $total_service_income = 0;
                    ?>
                    @foreach ($targets as $target)
                      <tr>
                          <td>{{$target->id}}</td>
                          <td>{{date("d-M-Y",strtotime( $target->date))}}</td>
                          <td>{{$target->area->name}}</td>
                          <td>{{$target->territory->name}}</td>
                          <td>({{$target->technitian->username}}) - {{$target->technitian->name}}</td>
                          <td>{{$target->engineer->name}}</td>
                          <td class="text-right">{{$target->tractor_warranty}}</td>
                          <td class="text-right">{{$target->tractor_post_warranty}}</td>
                          <td class="text-right">{{$target->nm_warranty}}</td>
                          <td class="text-right">{{$target->nm_post_warranty}}</td>
                          <td class="text-right">{{$target->total}}</td>
                          <td class="text-right">{{$target->service_income}}</td>
                          <!-- <td>{{$target->note}}</td> -->

                          <td>
                              <a href="{{url('/target/'.$target->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              
                              @if((Auth::user()->role_id == 1) || (Auth::user()->role_id == 2 && (int)date('d') < 12))
                              <a href="{{url('/target/'.$target->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              <a id="openDeleteModal" data-toggle="modal" data-id="{{$target->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a>
                              @endif
                          </td>
                      </tr>
                      <?php 
                         $total+=$target->total;
                         $total_tractor_warranty+=$target->tractor_warranty;
                         $total_tractor_post_warranty+=$target->tractor_post_warranty;
                         $total_nm_warranty+=$target->nm_warranty;
                         $total_nm_post_warranty+=$target->nm_post_warranty;
                         $total_service_income+=$target->service_income;
                       ?>
                    @endforeach
                  </tbody>
                <tfoot>
                <tr>
                    <th colspan="6" class="text-right">Total</th>
                    <th class="text-right">{{$total_tractor_warranty}}</th>
                    <th class="text-right">{{$total_tractor_post_warranty}}</th>
                    <th class="text-right">{{$total_nm_warranty}}</th>
                    <th class="text-right">{{$total_nm_post_warranty}}</th>
                    <th class="text-right">{{$total}}</th>
                    <th class="text-right">{{$total_service_income}}</th>
                    <th class="text-right"></th>
                </tr>
                </tfoot>
              </table>
         
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->


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
        <button type="submit" class="btn btn-primary float-left">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>document.title = 'Target';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/target')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
