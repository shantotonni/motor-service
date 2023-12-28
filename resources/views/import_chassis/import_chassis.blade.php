@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Chassis Number Wise Harvester Info Import</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Chassis Number Wise Harvester Info Import</li>
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
                    <div class="card-body">
                        <form action="{{ route('import.chassis.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Import</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Chassis Number Wise Harvester Info</h3>
{{--              <a href="{{route('service-center.create')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i> Add Service Center</button></a>--}}
            </div>
              <div class="card-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                      <th>Id</th>
                      <th>Customer Name</th>
                      <th>Product</th>
                      <th>Engine No</th>
                      <th>Chesis</th>
                      </thead>
                      <tbody>
                      @foreach ($import_lists as $service_center)
                          <tr>
                              <td>{{$service_center->id}}</td>
                              <td>{{$service_center->customer_name}}</td>
                              <td>{{$service_center->product}}</td>
                              <td>{{$service_center->engine_no}}</td>
                              <td>{{$service_center->chesis}}</td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
                  {{$import_lists->links()}}
              </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script>document.title = 'Import List';</script>
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
                    url: "{{ route('service-center.destroy', '__id__') }}".replace('__id__', id),
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
