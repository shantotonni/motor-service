@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="alert alert-warning" role="alert">
         After Creating Purchase Order, Supplier Will not able to enter any quotation on that day.
    </div>
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
              <h3 class="card-title">PR </h3>
              <!-- <a href="{{url('purchase-requisition/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create PR</button></a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="get">
              <input name="date" class="datepicker" value="@if(request()->get('date')){{request()->get('date')}} @else {{date('d-m-Y')}} @endif"><button>Search</button>
             </form>
             <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                    <th>PRNo.</th>
                    <th>PurReqDate</th>
                    <th>ExpiryDate</th>
                    <th>DeliveryPlace</th>
                    <th>Controls</th>
                </thead>
                <tbody>
                    @foreach ($purchase_requisitions as $purchase_requisition)
                      <tr>
                          <td>{{$purchase_requisition->PurReqNo}}</td>
                          <td>{{$purchase_requisition->PurReqDate}}</td>
                          <td>{{$purchase_requisition->ExpiryDate}}</td>
                          <td>{{$purchase_requisition->DeliveryPlace}}</td>
                          <td>
                              <a href="{{url('purchase-requisition/'.$purchase_requisition->id)}}/compare" title="Quotation" ><button type="button" class="btn btn-xs btn-primary btn-flat">Compare</button></a>
                              <!-- <a href="{{url('purchase-requisition/'.$purchase_requisition->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a> -->
                                
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                <tfoot>

              </table>
              {{$purchase_requisitions->links()}}
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

<script>document.title = 'Item';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('purchase-requisition')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
