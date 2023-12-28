@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Demonstration List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Demonstration List</li>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Date</th>
                                        <th>Area</th>
                                        <th>Territory</th>
                                        <th>Place</th>
                                        <th>Total Participant Number</th>
                                        <th>Competitord Participant Number</th>
                                        <th>Sales Inquiry Number</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($TractorDemonstrationRecordEntry as $key => $demo)
                                        <tr>
                                            <td>{{$demo->id}}</td>
                                            <td>{{ date('d-m-Y', strtotime($demo->date)) }}</td>
                                            <td>{{$demo->area->name}}</td>
                                            <td>{{$demo->territory->name}}</td>
                                            <td>{{$demo->place}}</td>
                                            <td>{{$demo->total_participant_number}}</td>
                                            <td>{{$demo->competitord_participant_number}}</td>
                                            <td>{{$demo->sales_inquiry_number}}</td>
                                        <td>
                                          <a href="{{ route('demonstration.details',$demo->id) }}" title="Edit" ><button type="button" class="btn btn-xs btn-info btn-flat"><i class="fas fa-eye"></i></button></a>
                                            @if(Auth::user()->role_id == 1)
                                          <a href="{{ route('demonstration.delete',$demo->id) }}" onclick="return confirm(' you want to delete?');" title="Edit" ><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash"></i></button></a>
                                                @endif
                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$TractorDemonstrationRecordEntry->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>document.title = 'Order List';</script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function destroy(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "The Learning data will be Delete",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete!'
            }).then(function(result){
                if (result.value) {
                    $.ajax({
                        url: "{{ route('order.delete', '__id__') }}".replace('__id__', id),
                        method: 'DELETE'
                    }).done(function(data) {
                        console.log(data)
                        Swal.fire({
                            title: 'Success',
                            text: "The Learning data Delete",
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
