@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">PR</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-purchase_requisition"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-purchase_requisition active">PR</li>
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
              <h3 class="card-title">PR </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
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
                             
                              <a href="{{url('purchase-requisition/'.$purchase_requisition->id)}}/quotation-create" title="Quotation" ><button type="button" class="btn btn-xs btn-success btn-flat">Quotation</button></a>
                            
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                <tfoot>

              </table>
              {{$purchase_requisitions->links()}}
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
