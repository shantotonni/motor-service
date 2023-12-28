@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Showroom Centre</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Showroom Centre</li>
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
              <h3 class="card-title">Showroom Centre </h3>
              <a href="{{route('showrooms.create')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i> Add Showroom</button></a>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Area</th>
                  <th>Address</th>
                  <th>Mobile</th>
                  <th>Lat</th>
                  <th>Lon</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($showrooms as $showroom)
                      <tr>
                      <td>{{$showroom->id}}</td>
                      <td>{{$showroom->name}}</td>
                      <td>{{$showroom->area->name}}</td>
                      <td>{{$showroom->address}}</td>
                      <td>{{$showroom->mobile_number}}</td>
                      <td>{{$showroom->lat}}</td>
                      <td>{{$showroom->lon}}</td>
                      <td>
                          <a href="{{route('showrooms.show',$showroom->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-eye"></i></button></a>
                          <a href="{{route('showrooms.edit',$showroom->id)}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat"><i class="fas fa-edit"></i></button></a>
                          <a onclick="destroy({{ $showroom->id }})" title="Delete"><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button></a>
                      </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
              {{$showrooms->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script>document.title = 'showroom';</script>
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
                    url: "{{ route('showrooms.destroy', '__id__') }}".replace('__id__', id),
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
