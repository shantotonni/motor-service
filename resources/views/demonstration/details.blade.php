@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Demonstration Details</h1>
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
                    <div class="card-header">
                        <h3>Tractor Demonstration Record Entry </h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Purpose of Demo</th>
                                        <th>Market Type</th>
                                        <th>Date</th>
                                        <th>Area</th>
                                        <th>Territory</th>
                                        <th>Place</th>
                                        <th>Total Participant Number</th>
                                        <th>Competitor Participant Number</th>
                                        <th>Sales Inquiry Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->id}}</td>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->purpose_of_demo}}</td>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->market_type}}</td>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->date}}</td>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->area->name}}</td>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->territory->name}}</td>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->place}}</td>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->total_participant_number}}</td>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->competitord_participant_number}}</td>
                                            <td>{{$TractorDemonstrationRecordEntryDetails->sales_inquiry_number}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h3>Tractor Participant Image</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($TractorDemonstrationRecordEntryDetails->participant_image as $key => $participant_image)
                                    <div class="col-md-4">
                                        <img style="width: 300px;height: 300px" src="{{asset('/demonstration/'.$participant_image->image)}}" alt="">
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h3>Tractor Cultivation Trials Report</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tractor Model</th>
                                        <th>Implement</th>
                                        <th>Erpm</th>
                                        <th>Soil Type</th>
                                        <th>Gear Used First Cut</th>
                                        <th>Gear Used Second Cut</th>
                                        <th>Erpm Drop Fist Cut</th>
                                        <th>Erpm Drop Second Cut</th>
                                        <th>time_token_fist_cut</th>
                                        <th>time_token_second_cut</th>
                                        <th>fuel_consumption_first_cut</th>
                                        <th>fuel_consumption_second_cut</th>
                                        <th>area_cover_first_cut</th>
                                        <th>area_cover_second_cut</th>
                                        <th>depth_of_cut_first_cut</th>
                                        <th>depth_of_cut_second_cut</th>
                                        <th>calculative_fuel_consumption_first_cut</th>
                                        <th>calculative_fuel_consumption_second_cut</th>
                                        <th>calculative_litre_per_acre_first_cut</th>
                                        <th>calculative_litre_per_acre_second_cut</th>
                                        <th>calculative_acre_per_hr_first_cut</th>
                                        <th>calculative_acre_per_hr_second_cut</th>
                                        <th>average_fuel_consumption</th>
                                        <th>average_litre_per_acre</th>
                                        <th>average_acre_per_hr</th>
                                        <th>average_bigha_per_hour</th>
                                        <th>average_litre_per_bigha</th>
                                        <th>average_depth_of_cut</th>
                                        <th>status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->id}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->tractor_model}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->implement}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->erpm}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->soil_type}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->gear_used_first_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->gear_used_second_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->erpm_drop_fist_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->erpm_drop_second_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->time_token_fist_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->time_token_second_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->fuel_consumption_first_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->fuel_consumption_second_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->area_cover_first_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->area_cover_second_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->depth_of_cut_first_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->depth_of_cut_second_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->calculative_fuel_consumption_first_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->calculative_fuel_consumption_second_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->calculative_litre_per_acre_first_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->calculative_litre_per_acre_second_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->calculative_acre_per_hr_first_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->calculative_acre_per_hr_second_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->average_fuel_consumption}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->average_litre_per_acre}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->average_acre_per_hr}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->average_bigha_per_hour}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->average_litre_per_bigha}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->average_depth_of_cut}}</td>
                                        <td>{{$TractorDemonstrationRecordEntryDetails->trail_report->status}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h3>Tractor Competitors Participants Info</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Brand Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($TractorDemonstrationRecordEntryDetails->participant_info as $key => $demo)
                                    <tr>
                                        <td>{{$demo->id}}</td>
                                        <td>{{$demo->name}}</td>
                                        <td>{{$demo->contact_number}}</td>
                                        <td>{{$demo->brand_name}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h3>Tractor Demonstration Model Image</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($TractorDemonstrationRecordEntryDetails->model_image as $key => $demo)
                                    <div class="col-md-4">
                                        <img style="width: 300px;height: 300px" src="{{asset('/demonstration/'.$demo->image)}}" alt="">
                                    </div>
                                @endforeach 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h3>Tractor Check List</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($TractorDemonstrationRecordEntryDetails->check_list as $key => $check_list)
                                        <tr>
                                            <td>{{ $check_list->id }}</td>
                                            <td>{{ $check_list->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h3>Sales Inquiry</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Contact number</th>
                                        <th>Prefer model</th>
                                        <th>Inquiry type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($TractorDemonstrationRecordEntryDetails->sales as $key => $sale)
                                        <tr>
                                            <td>{{ $sale->id }}</td>
                                            <td>{{ $sale->name }}</td>
                                            <td>{{ $sale->contact_number }}</td>
                                            <td>{{ $sale->prefer_model }}</td>
                                            <td>{{ $sale->inquiry_type }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
