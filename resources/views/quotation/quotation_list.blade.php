@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="alert alert-warning" role="alert">
         Per day one Quotation can be created with multiple item from different 
         location. If purchase order is created by admin, quotation can not be edited.
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
              <h3 class="card-title">Quotation </h3>
              <a href="{{url('/quotation/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create Quotation For Today</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="get">
               <input name="date" class="datepicker" value="@if(request()->get('date')){{request()->get('date')}} @else {{date('d-m-Y')}} @endif"><button>Search</button>
              </form>
              <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                      <th>Id</th>
                      <th>QuotationNo</th>
                      <th>Quotation Date</th>
                      <th>Supplier</th>
                      <th>Created At</th>
                      <th>Controls</th>
                </thead>
                <tbody>
                    @foreach ($quotations as $quotation)
                      <tr>
                          <td>{{$quotation->id}}</td>
                          <td>{{$quotation->QuotationNo}}</td>
                          <td>{{date('d-m-Y',strtotime($quotation->QuotationDate))}}</td>
                          <td>{{$quotation->SupplierID}}</td>
                          <td>{{$quotation->CreatedDate}}</td>
                          <td>
                              <a href="{{url('/quotation/'.$quotation->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              <a href="{{url('/quotation/'.$quotation->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              <!--
                              
                              <a id="openDeleteModal" data-toggle="modal" data-id="{{$quotation->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a> -->
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                
              </table>
              </div>
              {{$quotations->links()}}
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
        <h5 class="modal-title text-center">Delete Quotation !!</h5>
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

<script>document.title = 'Quotation';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/quotation')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
