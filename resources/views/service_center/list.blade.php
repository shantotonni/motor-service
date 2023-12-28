@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Service Center</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Service Center</li>
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
              <h3 class="card-title">Service Center </h3>
              <a href="{{route('service-center.create')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i> Add Service Center</button></a>
            </div>
              <div class="card-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                      <th>Id</th>
                      <th>Area</th>
                      <th>Address</th>
                      <th>Responsible person</th>
                      <th>Mobile</th>
                      <th>Lat</th>
                      <th>Lon</th>
                      <th width="10%">Action</th>
                      </thead>
                      <tbody>
                      @foreach ($service_centers as $service_center)
                          <tr>
                              <td>{{$service_center->id}}</td>
                              <td>{{$service_center->area->name}}</td>
                              <td>{{$service_center->address}}</td>
                              <td>{{$service_center->responsible_person}}</td>
                              <td>{{$service_center->mobile}}</td>
                              <td>{{$service_center->lat}}</td>
                              <td>{{$service_center->lon}}</td>
                              <td>
{{--                                  <a href="{{url('/service_center/'.$service_center->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>--}}
                                  <a href="{{route('service-center.edit',$service_center->id)}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                                  <a onclick="destroy({{ $service_center->id }})" title="Delete"><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button></a>
                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
                  {{$service_centers->links()}}
              </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script>document.title = 'Service Center';</script>
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
