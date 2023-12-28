@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Service Income Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Service Income Category</li>
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
              <h3 class="card-title">Service Income Category</h3>
              <a href="{{url('/service-income-category/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create Service Income Category</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                      <th>Id</th>
                      <th>Product Name</th>
                      <th>Name</th>
                      <th>Name bn</th>
                      <th>Amount</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($service_category as $key => $category)
                      <tr>
                       <td>{{ ++$key }}</td>
                      <td>{{$category->product->name}}</td>
                      <td>{{$category->name}}</td>
                      <td>{{$category->name_bn}}</td>
                      <td>{{$category->amount}}</td>
                      <td>
                          <a href="{{url('/service-income-category/'.$category->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                          <a id="openDeleteModal" data-toggle="modal" data-id="{{$category->id}}" title="Delete"  href=""><button type="button" class="btn btn-xs btn-danger btn-flat">Del</button></a>
                      </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
              {{$service_category->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

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

<script>document.title = 'Product Model';</script>
<script type="text/javascript">
$(document).on("click", "#openDeleteModal", function () {
     var delId = $(this).data("id");
     $("#delete_modal_form").attr("action", "{{url('/service-income-category')}}/" + delId);
     $(".modal-body #delete_id").val( delId );
     $("#myModal").modal("show");
});
</script>
@endsection
