@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Customers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <a href="{{route('customers.create')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i> Add Customers</button></a>
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
                        @if(request()->get('from_date') && request()->get('to_date'))
                                <form action="{{ route('customer.list.export') }}" class="float-right" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="fromDate" value="{{ request()->get('from_date') }}">
                                    <input type="hidden" name="toDate" value="{{ request()->get('to_date') }}">
                                    <input type="hidden" name="m_mobile" value="{{ request()->get('mobile') }}">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-info" style="margin-top:30px;">Export</button>
                                    </div>
                                </form>
                            @endif

                        <div class="row">
                            <div class="col-sm-10">
                                <form action="{{ route('customers.index') }}" method="get">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>From Date</label>
                                            <input name="from_date" type="text" class="form-control datepicker" value="@if(request()->get('from_date')){{request()->get('from_date')}}@else{{date('01-m-Y', strtotime(date('d-m-Y').' -1 month'))}}@endif">
                                        </div>
                                        <div class="col-md-3">
                                            <label>To Date</label>
                                            <input name="to_date" type="text" class="form-control datepicker" value="@if(request()->get('to_date')){{request()->get('to_date')}}@else{{date('d-m-Y')}}@endif">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" value="@if(request()->get('mobile')){{request()->get('mobile')}}@endif" name="mobile" placeholder="Enter Mobile number">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-success" style="margin-top:30px;">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="col-sm-2">
                                <a href="{{URL::to('/')}}/export-customers" class="btn btn-info float-right btn-flat" style="margin-top:30px;"> Export</a>
                            </div> --}}
                        </div>

                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Mobile</th>
                                    <th>Chassis</th>
                                    <th>Model</th>
                                    <th>Service Hour</th>
                                    <th>Area</th>
                                    <th>Created At</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->code}}</td>
                                    <td>{{$customer->mobile}}</td>
                                    <td>{{$customer->chassis}}</td>
                                    <td>{{ isset($customer->model->name) ? $customer->model->name : '' }}</td>
                                    <td>{{$customer->service_hour}}</td>
                                    <td>{{isset($customer->area) ? $customer->area->name: '' }}</td>
                                    <td>{{$customer->created_at}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>
                                        <a href="{{route('customers.show',$customer->id)}}" title="Show"><button type="button" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-eye"></i></button></a>
                                        <a href="{{route('customers.edit',$customer->id)}}" title="Edit"><button type="button" class="btn btn-xs btn-info btn-flat"><i class="fas fa-edit"></i></button></a>
                                        <a onclick="destroy({{ $customer->id }})" title="Delete"><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$customers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.title = 'Customer';
</script>
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
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: "{{ route('customers.destroy', '__id__') }}".replace('__id__', id),
                    method: 'DELETE'
                }).done(function(data) {
                    console.log(data)
                    Swal.fire({
                        title: 'Success',
                        text: "The Learning data trashed",
                        type: 'success',
                    }).then(function(res) {
                        location.reload();
                    });
                });
            }
        })
    }
</script>
@endsection