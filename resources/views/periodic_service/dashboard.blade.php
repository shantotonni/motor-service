@extends('layouts.master')
@section('title','Periodic Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Tractor Periodic Service Dashboard</h1>

                <form action="{{ url('periodic-service-dashboard') }}" method="get">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-2">
                            <select name="username" id="" class="form-control">
                                <option value="">Select Employee</option>
                                @foreach($engineers as $engineer)
                                    <option value="{{ $engineer->username }}">{{ $engineer->name }} - {{ $engineer->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input name="from_date" type="text" class="form-control datepicker" value="@if(request()->get('from_date')){{request()->get('from_date')}}@else{{date('01-m-Y', strtotime(date('d-m-Y').' -1 month'))}}@endif">
                        </div>
                        <div class="col-md-2">
                            <input name="to_date" type="text" class="form-control datepicker" value="@if(request()->get('to_date')){{request()->get('to_date')}}@else{{date('d-m-Y')}}@endif">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-success">Filter</button>
                        </div>
                    </div>
                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 class="text-center">{{$estimatedTotalService}}</h3>
                        <p class="text-center"><strong>Estimated Total Service</strong></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('show.next.service.info.page')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 class="text-center">{{$pending}}</h3>

                        <p class="text-center"><strong>Service Pending in This Month</strong></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('show.next.service.info.page')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 class="text-center">{{$expired}}</h3>
                        <p class="text-center"><strong>Total Expired Service</strong></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('show.next.service.info.page')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 class="text-center">{{$doneThisMonth}}</h3>

                        <p class="text-center"><strong>Service Done in This Month</strong></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('show.next.service.info.page')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <!--row end -->

        <div class="row">
            <div class="col-sm-6">
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Service Done in Current Month</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-sm-6">
                <!-- PIE CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Service Summary</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="periodicService" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <!-- PIE CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Service Done By ( Current Month )</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- row end -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->


<script>
    var phpIdArray = <?php echo json_encode(array_values($service_id_count)) ?>;
    var phplabelArray = <?php echo json_encode(array_values($service_label_count)) ?>;
    console.log(phplabelArray);

    var barChartData = {
        labels: phplabelArray,
        datasets: [{
            label: 'Service Done in This Month',
            backgroundColor: 'rgb(110, 153, 215)',
            borderColor: 'rgb(110, 153, 215)',
            pointRadius: false,
            pointColor: 'rgb(110, 153, 215)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: phpIdArray
        }, ]
    }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, barChartData)
    var temp0 = barChartData.datasets[0]
    // var temp1 = barChartData.datasets[1]
    barChartData.datasets[0] = temp0
    // barChartData.datasets[1] = temp0

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }

    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })
</script>

<script>
    var phpservice_done_by = <?php echo json_encode(array_values($service_done_by)) ?>;
    var phpservice_done_count = <?php echo json_encode(array_values($service_done_count)) ?>;
    console.log(phpservice_done_by);

    var pieData = {
        labels: phpservice_done_by,
        datasets: [{
            data: phpservice_done_count,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
    }
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = pieData;
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    })
</script>

<script>
    var onTime = <?php echo $onTime ?>;
    var early = <?php echo $early ?>;
    var delay = <?php echo $delay ?>;

    var periodicService = {
        labels: ['On Time','Early','Delay'],
        datasets: [{
            data: [onTime,early,delay],
            backgroundColor: ['#00a65a','#f39c12','#f56954'],
        }]
    }
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas2 = $('#periodicService').get(0).getContext('2d')
    var pieOptions2 = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas2, {
        type: 'pie',
        data: periodicService,
        options: pieOptions2
    })
</script>
@endsection