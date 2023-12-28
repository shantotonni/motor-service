@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Service Request</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Service Request</li>
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
              <h3 class="card-title">Service Request </h3>
              <a href="{{url('/service_request/create')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i>Create Service Request</button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('service_request.index') }}" method="get">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group{{ $errors->has('area_id') ? 'has-error' : '' }}">
                                <label for="area_id">Area </label>
                                <select name="area_id" id="area_id" data-live-search="true" class="form-control select2" autofocus type="select" required>
                                    <option value="">Select Area</option>
                                    @foreach($areas as $area)
                                        <option value="{{$area->id}}" @if($area->id == request()->get("area_id")){{"selected"}} @endif>{{$area->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('area_id'))
                                    <span class="help-block"><strong>{{ $errors->first('area_id') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-2" style="padding-top: 30px">
                            <button type="submit" class="btn btn-success">Filter</button>
                        </div>
                    </div>
                </form>
              <table class="table table-bordered table-striped">
                <thead>
                  <th>Id</th>
                  <th>District</th>
                  <th>Upazila</th>
                  <th>Service type</th>
                  <th>Area</th>
                  <th>Remarks</th>
                  <th>Customer</th>
                  <th>Customer Mobile</th>
                  <th>Technician Name</th>
                  <th>Is solved</th>
                  <th>Is Agree</th>
                  <th>Initiated at</th>
                  <th>Action</th>
                </thead>
                <tbody>
                @if (isset($service_requests))
                    @foreach ($service_requests as $service_request)
                      <tr style="@if($service_request->is_solved == 0)background-color:#ffcccc;@endif">
                      <td>{{$service_request->id}}</td>
                      <td>{{ isset($service_request->district->name) ? $service_request->district->name : '' }}</td>
                      <td>{{ isset($service_request->upazila->name) ? $service_request->upazila->name : '' }}</td>
                      <td>{{ isset($service_request->service_type) ? $service_request->service_type->name : '' }}</td>
                      <td>{{ isset($service_request->area->name) ? $service_request->area->name : '' }}</td>
                      <td>{{$service_request->remarks}}</td>
                      <td>{{$service_request->customer_name}}</td>
                      <td>{{$service_request->customer_mobile}}</td>
                      <td>{{ isset($service_request->technician) ? $service_request->technician->name : '' }}</td>
                      <td>
                          @if($service_request->is_solved)
                          {{"Yes"}}<br>
                          @if($service_request->solved_at){{date("d-m-Y H:i:s",strtotime( $service_request->solved_at))}}@endif<br>
                          @if($service_request->solver_id){{$service_request->solver->name}}@endif
                          @else{{"No"}}@endif
                      </td>
                      <td>
                          @if($service_request->is_agree)
                                {{"Yes"}}<br>
                          @else
                              {{"No"}}
                          @endif
                      </td>
                      <!-- <td>@if($service_request->solver_id){{$service_request->solver->name}}@endif</td> -->
                      <td>@if($service_request->created_at){{date("d-m-Y H:i:s",strtotime( $service_request->created_at))}}@endif</td>
                      <!-- <td>@if($service_request->solved_at){{date("d-m-Y H:i:s",strtotime( $service_request->solved_at))}}@endif</td> -->

                          <td>
                              <a href="{{url('/service_request/'.$service_request->id)}}" title="Show" ><button type="button" class="btn btn-xs btn-primary btn-flat">Show</button></a>
                              <a href="{{url('/service_request/'.$service_request->id.'/edit')}}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat">Edit</button></a>
                              @if(Auth::user()->role_id == 1)
                                  <a onclick="destroy({{ $service_request->id }})" title="Delete"><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button></a>
                              @endif
                          </td>
                      </tr>
                    @endforeach
                @endif
                  </tbody>
              </table>
              {{$service_requests->appends(request()->query())->links() }}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div> <!--row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>document.title = 'Service Request';</script>
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
                    url: "{{ route('service_request.destroy', '__id__') }}".replace('__id__', id),
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
