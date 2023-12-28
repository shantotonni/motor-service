@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">EngineerReportCom</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">EngineerReportCom</li>
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
              <h3 class="card-title">EngineerReportCom </h3>
              <a href="{{url('/engineer_report_com/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create EngineerReportCom</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="col-sm-6">
                    <label>Month</label>
                    <select name="date" id="date" data-live-search="true" class="form-control select2" style="width: 100%;" required autofocus type="select">
                        <option value="">Select Month</option>
                        <option value="01-12-{{date('Y',strtotime('-1 years'))}}" @if(date('d-m-Y',strtotime(request()->get('date'))) == date('01-12-Y',strtotime('-1 years'))){{"selected"}}@endif>December-{{date('Y',strtotime('-1 years'))}}</option>
                        <option value="01-01-{{date('Y')}}" @if(date('01-01-Y',strtotime(request()->get('date'))) == date('01-01-Y')){{"selected"}}@endif>January-{{date('Y')}}</option>
                        <option value="01-02-{{date('Y')}}" @if(date('01-02-Y',strtotime(request()->get('date'))) == date('01-02-Y')){{"selected"}}@endif>February-{{date('Y')}}</option>
                        <option value="01-03-{{date('Y')}}" @if(date('01-03-Y',strtotime(request()->get('date'))) == date('01-03-Y')){{"selected"}}@endif>March-{{date('Y')}}</option>
                        <option value="01-04-{{date('Y')}}" @if(date('01-04-Y',strtotime(request()->get('date'))) == date('01-04-Y')){{"selected"}}@endif>April-{{date('Y')}}</option>
                        <option value="01-05-{{date('Y')}}" @if(date('01-05-Y',strtotime(request()->get('date'))) == date('01-05-Y')){{"selected"}}@endif>May-{{date('Y')}}</option>
                        <option value="01-06-{{date('Y')}}" @if(date('01-06-Y',strtotime(request()->get('date'))) == date('01-06-Y')){{"selected"}}@endif>June-{{date('Y')}}</option>
                        <option value="01-07-{{date('Y')}}" @if(date('01-07-Y',strtotime(request()->get('date'))) == date('01-07-Y')){{"selected"}}@endif>July-{{date('Y')}}</option>
                        <option value="01-08-{{date('Y')}}" @if(date('01-08-Y',strtotime(request()->get('date'))) == date('01-08-Y')){{"selected"}}@endif>August-{{date('Y')}}</option>
                        <option value="01-09-{{date('Y')}}" @if(date('01-09-Y',strtotime(request()->get('date'))) == date('01-09-Y')){{"selected"}}@endif>September-{{date('Y')}}</option>
                        <option value="01-10-{{date('Y')}}" @if(date('01-10-Y',strtotime(request()->get('date'))) == date('01-10-Y')){{"selected"}}@endif>October-{{date('Y')}}</option>
                        <option value="01-11-{{date('Y')}}" @if(date('01-11-Y',strtotime(request()->get('date'))) == date('01-11-Y')){{"selected"}}@endif>November-{{date('Y')}}</option>
                        <option value="01-12-{{date('Y')}}" @if(date('01-12-Y',strtotime(request()->get('date'))) == date('01-12-Y')){{"selected"}}@endif>December-{{date('Y')}}</option>
                    </select>
                </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                      <th>Id</th>
                  <th>Date</th>
                  <th>User</th>
                  <th>Report actual</th>
                  <th>App dashboard actual</th>
                  <th>Team coordination actual</th>

                      <th>Controls</th>
                </thead>
                <tbody>
                    @foreach ($engineer_report_coms as $engineer_report_com)
                      <tr>
                          <td>{{$engineer_report_com->id}}</td>
                        <td>{{date("d-m-Y",strtotime( $engineer_report_com->date))}}</td>
                        <td>{{$engineer_report_com->user->name}}</td>
                        <td>{{$engineer_report_com->report_actual}}</td>
                        <td>{{$engineer_report_com->app_dashboard_actual}}</td>
                        <td>{{$engineer_report_com->team_coordination_actual}}</td>

                          <td>
                              <a href="{{url('/engineer_report_com/'.$engineer_report_com->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              <a href="{{url('/engineer_report_com/'.$engineer_report_com->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              <a id="openDeleteModal" data-toggle="modal" data-id="{{$engineer_report_com->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              
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

<script>document.title = 'EngineerReportCom';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/engineer_report_com')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
$('#date').change(function(){
  var date = $(this).val();
  window.location.href = "{{url('/engineer_report_com')}}?date="+date;
});
</script>
@endsection
