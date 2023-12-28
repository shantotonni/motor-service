@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tractor Part</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Tractor Part</li>
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
              <h3 class="card-title">Tractor Part </h3>
              <a href="{{url('/tractor_part/create')}}"><button class="btn btn-sm btn-info float-right btn-flat">Create Tractor Part</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tractor_parts_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Code</th>
                        <th>Custom name</th>
                        <th>Price</th>
                        <th>Section</th>
                        <th>Model</th>
                        <th>image</th>
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tractor_parts as $tractor_part)
                      <tr>
                      <td>{{ $tractor_part->id }}</td>
                      <td>{{ $tractor_part->ProductCode }}</td>
                      <td>{{ $tractor_part->custom_name }}</td>
                      <td>{{ $tractor_part->UnitPrice }}</td>
                      <td>{{ $tractor_part->section_name }}</td>
                      <td>{{ $tractor_part->model_name_bn }}</td>
                      <td><img height="50px" width="50px" src="{{asset('part_image')}}/{{ $tractor_part->image }}"/></td>
                      <td>
                          <a href="{{ url('/tractor_part/'.$tractor_part->id) }}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                          <a href="{{url('/tractor_part/'.$tractor_part->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                          <a onclick="destroy({{ $tractor_part->id }})" title="Delete"><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button></a>
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

<script>document.title = 'Tractor Part';</script>
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
                    url: "{{ route('tractor_part.destroy', '__id__') }}".replace('__id__', id),
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

<script>
    $(document).ready( function () {
        $('#tractor_parts_table').DataTable();
    } );
</script>
@endsection
