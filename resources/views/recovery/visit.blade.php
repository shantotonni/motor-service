@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Visit Result</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Visit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <form id="filterform" action="{{ url('visit-result') }}" method="get">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="CallType">From Date</label>
                                    <input type="text" id="datepicker" name="from_date" class="form-control from_date" placeholder="From Date" autocomplete="off" value="@if($from_date) {{ $from_date }} @endif">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="CallType">To Date</label>
                                    <input type="text" id="datepicker2" name="to_date" class="form-control to_date" placeholder="To Date" autocomplete="off" value="@if($to_date) {{ $to_date }} @endif">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group" style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-primary filBtn"><i class="fas fa-filter"></i> Filter</button>
                                </div>
                            </div>
                            <!-- <div class="col-sm-4">
                                <div class="form-group" style="margin-top: 30px;">
                                    <button type="button" class="btn btn-info float-right"><i class="fas fa-calculator"></i> Export</button>
                                </div>
                            </div> -->
                        </div>
                    </form>
                </div>
                <div class="col-sm-2">
                    <form action="{{route('visit.result.export')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="dateFrom" id="dateFrom">
                        <input type="hidden" name="dateTo" id="dateTo">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group" style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-calculator"></i> Export</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped table-hover text-nowrap table-sm small">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Upazilla</th>
                                        <th>Visit Type</th>
                                        <th>Result</th>
                                        <th>User</th>
                                        <th>Village name</th>
                                        <th>Purpose</th>
                                        <th>Person name</th>
                                        <th>Person mobile</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($visits as $key => $visit)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{$visit->upazilla->name}}</td>
                                        <td>{{$visit->visit_type->name}}</td>
                                        <td>{{$visit->result->name}}</td>
                                        <td>{{$visit->user->name}}</td>
                                        <td>{{$visit->village_name}}</td>
                                        <td>{{$visit->purpose}}</td>
                                        <td>{{$visit->person_name}}</td>
                                        <td>{{$visit->person_mobile}}</td>
                                        <td>{{date('d-M-Y h:i:s A', strtotime($visit->created_at))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$visits->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>document.title = 'Visit Result';</script>
    <script>
        $(function() {
            $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
            $("#datepicker2").datepicker( {dateFormat: 'yy-mm-dd'});
        });
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
            }).then(function(result){
                if (result.value) {
                    $.ajax({
                        url: "{{ route('topics.destroy', '__id__') }}".replace('__id__', id),
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
            $('#dateFrom').val($('#datepicker').val());
            $('#dateTo').val($('#datepicker2').val());
            console.log($('#dateFrom').val());
    </script>
@endsection
