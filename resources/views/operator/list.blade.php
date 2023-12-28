@extends('layouts.master')
@section('title','Operator List | Motors Autonomous')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Operator List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
{{--                    <a href="{{route('customers.create')}}"><button class="btn btn-sm btn-info float-right btn-flat"><i class="fas fa-plus"></i> Add Customers</button></a>--}}
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
                                <form action="{{ route('operator.list.export') }}" class="float-right" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="fromDate" value="{{ request()->get('from_date') }}">
                                    <input type="hidden" name="toDate" value="{{ request()->get('to_date') }}">
                                    <input type="hidden" name="m_mobile" value="{{ request()->get('mobile') }}">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-info" style="margin-top:30px;">Export</button>
                                    </div>
                                </form>
                            @endif
                            <form role="form" action="{{url('/operator-list')}}" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>From Date</label>
                                        <input name="from_date" type="text" class="form-control datepicker" value="@if($from_date){{ $from_date }}@endif">
                                    </div>
                                    <div class="col-md-3">
                                        <label>To Date</label>
                                        <input name="to_date" type="text" class="form-control datepicker" value="@if($to_date){{request()->get('to_date')}}@endif">
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input name="mobile" type="text" id="mobile" class="form-control" value="@if(request()->get('mobile')){{request()->get('mobile')}}@endif" autofocus max="11"  placeholder="Search mobile number"     >
                                            @if ($errors->has('mobile'))
                                                <span class="help-block"><strong>{{ $errors->first('mobile') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-1" style="padding-top: 30px">
                                        <button  type="submit" class="btn btn-success" value="filter" name="filter">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
{{--                        <div class="card-header">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <form action="{{ route('customers.index') }}" method="get">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-8">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <input type="text" class="form-control" value="{{ $mobile }}" name="mobile" placeholder="Enter Mobile number">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-4">--}}
{{--                                                <button type="submit" class="btn btn-success">Filter</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <a href="{{URL::to('/')}}/export-customers" class="btn btn-sm btn-info float-right btn-flat"> Export</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                    <thead>
                                    <tr>
                                        <th>Operator name</th>
                                        <th>Village</th>
                                        <th>Post Office</th>
                                        <th>Police Station</th>
                                        <th>Area</th>
                                        <th>District</th>
                                        <th>Mobile</th>
                                        <th>Training level</th>
                                        <th>Training Date</th>
                                        <th>Training Venue</th>
                                        <th>Total Training Days</th>
                                        <th>Operating Experience</th>
                                        <th>Education</th>
                                        <th>NID No</th>
                                        <th>Image</th>
                                        @if(Auth::user()->id=="1")
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($operators as $operator)
                                        <tr>
                                            <td>{{$operator->operator_name}}</td>
                                            <td>{{$operator->village}}</td>
                                            <td>{{$operator->post_office}}</td>
                                            <td>{{$operator->police_station}}</td>
                                            <td>{{isset($operator->area_name) ? $operator->area_name->name: ''}}</td>
                                            <td>{{isset($operator->district_name) ? $operator->district_name->name: ''}}</td>
                                            <td>{{$operator->mobile}}</td>
                                            <td>{{$operator->training_level}}</td>
                                            <td>{{$operator->training_date}}</td>
                                            <td>{{$operator->training_venue}}</td>
                                            <td>{{$operator->total_training_days}}</td>
                                            <td>{{$operator->operating_experience}}</td>
                                            <td>{{$operator->education}}</td>
                                            <td>{{$operator->nid_no}}</td>
                                            <td><img height="50px" width="50px" src="{{asset('operator_images')}}/{{ $operator->image_url }}"/></td>
                                            @if(Auth::user()->id=="1")
                                            <td>
                                            {{--                                            <a href="{{route('customers.show',$customer->id)}}" title="Show"><button type="button" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-eye"></i></button></a>--}}
                                                <a href="{{route('operator.edit',$operator->id)}}" title="Edit"><button type="button" class="btn btn-xs btn-info btn-flat"><i class="fas fa-edit"></i></button></a>
                                                <a onclick="destroy({{ $operator->id }})" title="Delete"><button type="button" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button></a>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $operators->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        url: "{{ route('operator.destroy', '__id__') }}".replace('__id__', id),
                        method: 'GET'
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