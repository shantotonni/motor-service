@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Happy Customers Feedback</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Happy Customers Feedback</li>
        </ol>
        </div>
    </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Happy Customers Feedback </h3>
              <a href="{{route('happy-customer.create')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i> Add Happy Customer Feedback</button></a>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <th>Id</th>
                  <th>Customer Name</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Area</th>
                  <th>Thumbnail Image</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($happy_customer as $key=>$customer)
                      <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $customer->customer_name }}</td>
                      <td>{{$customer->customer_mobile}}</td>
                      <td>{{$customer->address}}</td>
                      <td>{{$customer->area->name}}</td>
                          <td><img height="50px" width="50px" src="{{asset('/thumbnail_image')}}/{{$customer->thumbnail_image}}"></td>
                      <td>
                          <a href="{{route('happy-customer.show',$customer->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-eye"></i></button></a>
                          <a href="{{route('happy-customer.edit',$customer->id)}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat"><i class="fas fa-edit"></i></button></a>
                          <a onclick="destroy({{ $customer->id }})" title="Delete"><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button></a>
                      </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
              {{$happy_customer->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script>document.title = 'Happy Customer Feedback';</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function destroy(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "The Learning data will be trashed",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, trash it!'
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    url: "{{ route('happy-customer.destroy', '__id__') }}".replace('__id__', id),
                    method: 'DELETE'
                }).done(function(data) {
                    console.log(data)
                    Swal.fire({
                        title: 'Success',
                        text: "The Learning data trashed",
                        type: 'success',
                    }).then(function(res){
                        location.reload();
                    });
                });
            }
        })
    }
</script>
@endsection
