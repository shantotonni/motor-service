@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tractor Service Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Tractor Service Details</li>
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
              <h3 class="card-title">Tractor Service Details </h3>
              <a href="{{route('tractor.service.details.export')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i> Export</button></a>
              <a href="{{route('tractor-service-details.create')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i> Add Tractor Details</button></a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="example2">
                    <thead>
                    <th>Id</th>
                    <th>Topic</th>
                    <th>From hr</th>
                    <th>To hr</th>
                    <th>Fixed hr</th>
                    <th>Servicing type</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ($tractor_details as $tractor_detail)
                        <tr>
                            <td>{{$tractor_detail->id}}</td>
                            <td>{{$tractor_detail->topic->name}}</td>
                            <td>{{$tractor_detail->from_hr}}</td>
                            <td>{{$tractor_detail->to_hr}}</td>
                            <td>{{$tractor_detail->fixed_hr}}</td>
                            <td>{{$tractor_detail->servicing_type->name}}</td>
                            <td>
{{--                                <a href="{{route('tractor-service-details.show',$tractor_detail->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>--}}
                                <a href="{{route('tractor-service-details.edit',$tractor_detail->id)}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                                <a onclick="destroy({{ $tractor_detail->id }})" title="Delete"><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--              {{$tractor_details->links()}}--}}
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script>document.title = 'Tractor Service Details';</script>
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
                    url: "{{ route('tractor-service-details.destroy', '__id__') }}".replace('__id__', id),
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

    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
    });
</script>
@endsection
