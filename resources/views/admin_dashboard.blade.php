@extends('layouts.master')
@section('content')
<title>Line Chart</title>
	<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
	<style>
	canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
<style>

</style>
<!-- Content Header (Page header) -->
<form action="" class="" role="form" method="get">
<div class="row">
    <div class="col-md-5" style="padding-left:20px;">
        <label>From Date</label>
        <input name="from_date" type="text" class="form-control datepicker" value="@if(request()->get('from_date')){{request()->get('from_date')}}@else{{date('01-m-Y')}}@endif">
    </div>
    <div class="col-md-5">
        <label>To Date</label>
        <input name="to_date" type="text" class="form-control datepicker" value="@if(request()->get('to_date')){{request()->get('to_date')}}@else{{date('d-m-Y')}}@endif">
    </div>
    <div class="col-md-2">
        <label>Submit</label><br>
        <button type="submit" class="btn btn-sm btn-success">Submit</button>
    </div>
</div>
</form>
<!-- /.content-header -->


<div class="row" style="min-height: 500px; text-align:center">
    <div id="container" class="col-md-6">
        <canvas id="canvas"></canvas>
    </div>
    <div id="container2" class="col-md-6">
	    <canvas id="canvas2"></canvas>
    </div>
	<div id="container3" class="col-md-6">
	    <canvas id="canvas3"></canvas>
    </div>
	<div id="container3" class="col-md-6">
	    <canvas id="canvas4"></canvas>
    </div>
</div>
<script>
		//var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var color = Chart.helpers.color;
		var barChartServiceStatus = {
			//labels: ['January', 'February', 'March', 'April', 'May', 'June', 'lss'],
            labels:[
                @foreach($area_wise_services as $area_wise_service)
                    '{{$area_wise_service->name}}',
                @endforeach
            ],
			datasets: [{
				label: 'Area wise status',
				// backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				// borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					@foreach($area_wise_services as $area_wise_service)
                    {{$area_wise_service->total}},
                    @endforeach
				]
			},
            ]

		};


        var barChartServciceIncome = {
			//labels: ['January', 'February', 'March', 'April', 'May', 'June', 'lss'],
            labels:[
                @foreach($area_wise_service_incomes as $area_wise_service_income)
                    '{{$area_wise_service_income->name}}',
                @endforeach
            ],
			datasets: [{
				label: 'Area wise servcie income',
				// backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				// borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					@foreach($area_wise_service_incomes as $area_wise_service_income)
                    {{$area_wise_service_income->total}},
                    @endforeach
				]
			},
            ]

		};


		var pi_chart_1_config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						@if($csi[0])
						{{$csi[0]->marks.','}}
						{{$csi[0]->outof - $csi[0]->marks}}
						@endif
					],
					backgroundColor: [
						// window.chartColors.green,
						// window.chartColors.red,
					],
					label: 'CSI'
				}],
				labels: [
					'CSI : @if($csi[0] && $csi[0]->outof > 0){{round($csi[0]->marks*100/$csi[0]->outof,2)}}% @endif',
					'FAILED : @if($csi[0] && $csi[0]->outof > 0){{100-round($csi[0]->marks*100/$csi[0]->outof,2)}}% @endif',
				]
			},
			options: {
				responsive: true,
				title: {
				    display: true,
				    text: 'Customer Satisfaction Index'
			   }
			}
		};

		var pi_chart_2_config = {
			type: 'pie',

			data: {
				datasets: [{
					data: [
						@if($six_hour[0])
						{{$six_hour[0]->marks.','}}
						{{$six_hour[0]->outof - $six_hour[0]->marks}}
						@endif
					],
					backgroundColor: [

						// window.chartColors.orange,
						// window.chartColors.yellow,
						// window.chartColors.green,
						// window.chartColors.blue,
						// window.chartColors.red,
					],
					label: 'SIX HOURS'
				}],
				labels: [
					'YES : @if($six_hour[0] && $six_hour[0]->outof){{round($six_hour[0]->marks*100/$six_hour[0]->outof,2)}}% @endif',
					'NO : @if($six_hour[0] && $six_hour[0]->outof > 0){{100-round($six_hour[0]->marks*100/$six_hour[0]->outof,2)}}% @endif',
				]
			},
			options: {
				responsive: true,
				title: {
				    display: true,
				    text: 'SIX HOURS'
			   }
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartServiceStatus,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Area Wise Service Status'
					}
				}
			});


            var ctx2 = document.getElementById('canvas2').getContext('2d');
			window.myBar2 = new Chart(ctx2, {
				type: 'bar',
				data: barChartServciceIncome,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Area Wise Service Income'
					}
				}
			});


			// pi chart 1
			var pi_chart_1_ctx = document.getElementById('canvas3').getContext('2d');
			 window.myPie = new Chart(pi_chart_1_ctx, pi_chart_1_config);

			var pi_chart_2_ctx = document.getElementById('canvas4').getContext('2d');
			window.myPie = new Chart(pi_chart_2_ctx, pi_chart_2_config);



		};

		// document.getElementById('randomizeData').addEventListener('click', function() {
		// 	var zero = Math.random() < 0.2 ? true : false;
		// 	barChartData.datasets.forEach(function(dataset) {
		// 		dataset.data = dataset.data.map(function() {
		// 			return zero ? 0.0 : randomScalingFactor();
		// 		});

		// 	});
		// 	window.myBar.update();
		// });

		// var colorNames = Object.keys(window.chartColors);
		// document.getElementById('addDataset').addEventListener('click', function() {
		// 	var colorName = colorNames[barChartData.datasets.length % colorNames.length];
		// 	var dsColor = window.chartColors[colorName];
		// 	var newDataset = {
		// 		label: 'Dataset ' + (barChartData.datasets.length + 1),
		// 		backgroundColor: color(dsColor).alpha(0.5).rgbString(),
		// 		borderColor: dsColor,
		// 		borderWidth: 1,
		// 		data: []
		// 	};

		// 	for (var index = 0; index < barChartData.labels.length; ++index) {
		// 		newDataset.data.push(randomScalingFactor());
		// 	}

		// 	barChartData.datasets.push(newDataset);
		// 	window.myBar.update();
		// });

		// document.getElementById('addData').addEventListener('click', function() {
		// 	if (barChartData.datasets.length > 0) {
		// 		var month = MONTHS[barChartData.labels.length % MONTHS.length];
		// 		barChartData.labels.push(month);

		// 		for (var index = 0; index < barChartData.datasets.length; ++index) {
		// 			// window.myBar.addData(randomScalingFactor(), index);
		// 			barChartData.datasets[index].data.push(randomScalingFactor());
		// 		}

		// 		window.myBar.update();
		// 	}
		// });

		// document.getElementById('removeDataset').addEventListener('click', function() {
		// 	barChartData.datasets.pop();
		// 	window.myBar.update();
		// });

		// document.getElementById('removeData').addEventListener('click', function() {
		// 	barChartData.labels.splice(-1, 1); // remove the label first

		// 	barChartData.datasets.forEach(function(dataset) {
		// 		dataset.data.pop();
		// 	});

		// 	window.myBar.update();
		// });

</script>

@endsection




