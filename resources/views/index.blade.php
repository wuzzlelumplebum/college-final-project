@extends('layout')

@section('content')

<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><span class="font-weight-semibold">Home</span> - Dashboard</h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
	
	<!-- Quick stats boxes -->
	<div class="row">
		<h4><span class="font-weight-semibold">Info penting</span></h4>
	</div>
	@if(Auth::user()->role == 1)
		<div class="row">
			<h5><span class="font-weight">Grafik Pemasukan & Pengeluaran</span></h5>
		</div>
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Grafik Pemasukan per Tahun</h5>
			</div>

			<div class="card-body">
				<div class="chart-container">
					<div class="chart has-fixed-height" id="area_pemasukan"></div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Grafik Pengeluaran per Tahun</h5>
			</div>

			<div class="card-body">
				<div class="chart-container">
					<div class="chart has-fixed-height" id="area_pengeluaran"></div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Chart Proyek Klien Berdasarkan Jenis Proyek</h5>
			</div>

			<div class="card-body">
				<div class="chart-container">
					<div class="chart has-fixed-height" id="pie_basic"></div>
				</div>
			</div>
		</div>
	@endif
	<div class="row">
		<h5><span class="font-weight">Info Klien</span></h5>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card bg-blue-600" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-users icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $member }}</h3>
						</div>
						<div style="font-size: 22px;">
							Jumlah Klien
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-blue-600" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-user icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $memberthis }}</h3>
						</div>
						<div style="font-size: 22px;">
							Jumlah Klien Bulan Ini
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-blue-600" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-user icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $memberlast }}</h3>
						</div>
						<div style="font-size: 22px;">
							Jumlah Klien Bulan Lalu
						</div>
					</div>
				</blockquote>
			</div>
		</div>
	</div>
	<div class="row">
		<h5><span>Info Website</span></h5>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card bg-green-600" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-display icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ count($proyek) }}</h3>
						</div>
						<div style="font-size: 22px;">
							Total Website (All Layanan)
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-green-600" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-display icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $proyekthis }}</h3>
						</div>
						<div style="font-size: 22px;">
							Total Website Bulan Ini
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-green-600" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-display icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $proyeklast }}</h3>
						</div>
						<div style="font-size: 22px;">
							Total Website Bulan Lalu
						</div>
					</div>
				</blockquote>
			</div>
		</div>
	</div>
	<div class="row">
		<h5>Info Layanan Website</h5>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card bg-orange-600" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-sphere icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $simple }}</h3>
						</div>
						<div style="font-size: 22px;">
							Total Website Simple
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-orange-600" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-sphere icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $prioritas }}</h3>
						</div>
						<div style="font-size: 22px;">
							Total Website Prioritas
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-orange-600" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-sphere icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $premium }}</h3>
						</div>
						<div style="font-size: 22px;">
							Total Website Premium
						</div>
					</div>
				</blockquote>
			</div>
		</div>
	</div>
	@if (\Auth::user()->role==1)
		<div class="row">
			<h5>Info pendapatan</h5>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="card bg-slate-600" style="border-radius: 10px;">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-download icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
							@php($gross=0)
							@foreach ($pendapatans as $pendapatan)
							@php($gross = $pendapatan->sum('nominal'))
							@endforeach
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$gross),0,',','.')}}, -</h3>
							</div>
							<div style="font-size: 22px;">
								Total Pendapatan
							</div>
						</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card bg-slate-600" style="border-radius: 10px;">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-download icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								@php($grossthis=0)
									@foreach ($pendapatanthis as $pendapatanthis)
										@php($grossthis = $pendapatanthis->sum('nominal'))
									@endforeach
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$grossthis),0,',','.')}}, -</h3>
							</div>
							<div style="font-size: 22px;">
								Total pendapatan bulan ini
							</div>
						</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card bg-slate-600" style="border-radius: 10px;">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-download icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								@php($grosslast=0)
									@foreach ($pendapatanlast as $pendapatanlast)
										@php($grosslast = $pendapatanlast->sum('nominal'))
									@endforeach
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$grosslast),0,',','.')}}, -</h3>
							</div>
							<div style="font-size: 22px;">
								Total pendapatan bulan lalu
							</div>
						</div>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="row">
			<h5>Info pengeluaran</h5>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="card bg-grey-600" style="border-radius: 10px;">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-upload icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								@php($total=0)
								@foreach ($pengeluarans as $pengeluaran)
								@php($total = $pengeluaran->sum('nominal'))
								@endforeach
								<h3 class="font-weight-semibold mb-0">
									Rp {{number_format((@$total),0,',','.')}}, -
								</h3>
							</div>
							<div style="font-size: 22px;">
								Total pengeluaran
							</div>
						</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card bg-grey-600" style="border-radius: 10px;">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-upload icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								@php($expendthis=0)
								@foreach ($pengeluaranthis as $pengeluaranthis)
								@php($expendthis = $pengeluaranthis->sum('nominal'))
								@endforeach
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$expendthis),0,',','.')}}, -</h3>
							</div>
							<div style="font-size: 22px;">
								Total pengeluaran bulan ini
							</div>
						</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card bg-grey-600" style="border-radius: 10px;">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-upload icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								@php($expendlast=0)
								@foreach ($pengeluaranlast as $pengeluaranlast)
									@php($expendlast = $pengeluaranlast->sum('nominal'))
								@endforeach
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$expendlast),0,',','.')}}, -</h3>
							</div>
							<div style="font-size: 22px;">
								Total pengeluaran bulan lalu
							</div>
						</div>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="row">
			<h5>Info net/profit</h5>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="card bg-brown-600" style="border-radius: 10px;">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-coin-dollar icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$gross - @$total),0,',','.')}}, -</h3>
							</div>
							<div style="font-size: 22px;">
								Total nett/profit
							</div>
						</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card bg-brown-600" style="border-radius: 10px;">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-coin-dollar icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$grossthis - @$expendthis),0,',','.')}}, -</h3>
							</div>
							<div style="font-size: 22px;">
								Total nett/profit bulan ini
							</div>
						</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card bg-brown-600" style="border-radius: 10px;">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-coin-dollar icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$grosslast - @$expendlast),0,',','.')}}, - </h3>
							</div>
							<div style="font-size: 22px;">
								Total nett/profit bulan lalu
							</div>
						</div>
					</blockquote>
				</div>
			</div>
		</div>
	@endif
	<div class="row">
		<hr><hr>
	</div>
	<div class="row">
		<hr><hr>
	</div>
	<div class="row">
		<h4><span class="font-weight-semibold">Total Task</span></h4>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card bg-green-400" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-stack-plus icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $new }}</h3>
						</div>
						<div style="font-size: 22px;">
							Task Baru
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-orange-400" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-forward icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $ongoing }}</h3>
						</div>
						<div style="font-size: 22px;">
							Task Sedang Dikerjakan
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-success-400" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-clipboard2 icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $done }}</h3>
						</div>
						<div style="font-size: 22px;">
							Task Selesai
						</div>
					</div>
				</blockquote>
			</div>
		</div>
	</div>
	<!-- /quick stats boxes -->
	 <!-- TODAY -->
	<!-- Quick stats boxes -->
	<div class="row">
		<hr><hr>
	</div>
	<div class="row">
		<hr><hr>
	</div>
	<div class="row">
		<h4><span class="font-weight-semibold">Task hari ini</span></h4>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card bg-green-400" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-stack-plus icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $todaynew }}</h3>
						</div>
						<div style="font-size: 22px;">
							Task Baru
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-orange-400" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-forward icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $todayongoing }}</h3>
						</div>
						<div style="font-size: 22px;">
							Task Sedang Dikerjakan
						</div>
					</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card bg-success-400" style="border-radius: 10px;">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-clipboard2 icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $todaydone }}</h3>
						</div>
						<div style="font-size: 22px;">
							Task Selesai
						</div>
					</div>
				</blockquote>
			</div>
		</div>
	</div>
	<!-- /quick stats boxes -->
	<!-- TODAY -->
	<!-- Quick stats boxes -->
	<div class="row">
		<hr><hr>
	</div>
	<!-- /quick stats boxes -->
</div>

@endsection

@section('js')

<!-- Theme JS files -->
<script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
<script src="{{ asset('global_assets\js\plugins\visualization\echarts\echarts.min.js') }}"></script>

<script src="{{asset('assets/js/app.js') }}"></script>
<script src="{{asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
<script src="{{asset('global_assets/js/demo_charts/echarts/light/lines/area_basic.js') }}"></script>
<script src="{{asset('global_assets/js/demo_charts/echarts/light/pies/pie_basic.js') }}"></script>
<!-- /theme JS files -->
@if (Auth::user()->role == 1)
<script>
	//pemasukan
	var EchartsAreaBasicLight = function() {

		var _areaBasicLightExample = function() {
			if (typeof echarts == 'undefined') {
				console.warn('Warning - echarts.min.js is not loaded.');
				return;
			}

			// Define element
			var area_basic_element = document.getElementById('area_pemasukan');

			//
			// Charts configuration
			//

			if (area_basic_element) {

				// Initialize chart
				var area_basic = echarts.init(area_basic_element);

				// Options
				area_basic.setOption({

					// Define colors
					color: ['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80'],

					// Global text styles
					textStyle: {
						fontFamily: 'Roboto, Arial, Verdana, sans-serif',
						fontSize: 13
					},

					// Chart animation duration
					animationDuration: 750,

					// Setup grid
					grid: {
						left: 0,
						right: 40,
						top: 35,
						bottom: 0,
						containLabel: true
					},

					// Add legend
					legend: {
						data: ['Total Pemasukan'],
						itemHeight: 8,
						itemGap: 20
					},

					// Add tooltip
					tooltip: {
						trigger: 'axis',
						backgroundColor: 'rgba(0,0,0,0.75)',
						padding: [10, 15],
						textStyle: {
							fontSize: 13,
							fontFamily: 'Roboto, sans-serif'
						}
					},

					// Horizontal axis
					xAxis: [{
						type: 'category',
						boundaryGap: false,
						data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
						axisLabel: {
							color: '#333'
						},
						axisLine: {
							lineStyle: {
								color: '#999'
							}
						},
						splitLine: {
							show: true,
							lineStyle: {
								color: '#eee',
								type: 'dashed'
							}
						}
					}],

					// Vertical axis
					yAxis: [{
						type: 'value',
						axisLabel: {
							color: '#333'
						},
						axisLine: {
							lineStyle: {
								color: '#999'
							}
						},
						splitLine: {
							lineStyle: {
								color: '#eee'
							}
						},
						splitArea: {
							show: true,
							areaStyle: {
								color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
							}
						}
					}],

					// Add series
					series: [
						@foreach($chart as $name => $data)
						{
							name: 'Total Pemasukan',
							type: 'line',
							data: [
								@foreach($data as $val)
								{{ $val }},
								@endforeach
							],
							areaStyle: {
								normal: {
									opacity: 0.25
								}
							},
							smooth: true,
							symbolSize: 7,
							itemStyle: {
								normal: {
									borderWidth: 2
								}
							}
						},
						@endforeach
					]
				});
			}

			// Resize function
			var triggerChartResize = function() {
				area_basic_element && area_basic.resize();
			};

			// On sidebar width change
			var sidebarToggle = document.querySelector('.sidebar-control');
			sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);

			// On window resize
			var resizeCharts;
			window.addEventListener('resize', function() {
				clearTimeout(resizeCharts);
				resizeCharts = setTimeout(function () {
					triggerChartResize();
				}, 200);
			});
		};

		return {
			init: function() {
				_areaBasicLightExample();
			}
		}
	}();

	document.addEventListener('DOMContentLoaded', function() {
		EchartsAreaBasicLight.init();
	});

	var EchartsPieBasicLight = function() {

		var _scatterPieBasicLightExample = function() {
			if (typeof echarts == 'undefined') {
				console.warn('Warning - echarts.min.js is not loaded.');
				return;
			}

			// Define element
			var pie_basic_element = document.getElementById('pie_basic');

			if (pie_basic_element) {

				// Initialize chart
				var pie_basic = echarts.init(pie_basic_element);

				// Options
				pie_basic.setOption({

					// Colors
					color: [
						'#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
						'#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
						'#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
						'#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
					],

					// Global text styles
					textStyle: {
						fontFamily: 'Roboto, Arial, Verdana, sans-serif',
						fontSize: 13
					},

					// Add title
					title: {
						text: 'Proyek Klien',
						subtext: 'Berdasarkan Jenis Proyek',
						left: 'center',
						textStyle: {
							fontSize: 17,
							fontWeight: 500
						},
						subtextStyle: {
							fontSize: 12
						}
					},

					// Add tooltip
					tooltip: {
						trigger: 'item',
						backgroundColor: 'rgba(0,0,0,0.75)',
						padding: [10, 15],
						textStyle: {
							fontSize: 13,
							fontFamily: 'Roboto, sans-serif'
						},
						formatter: "{a} <br/>{b}: {c} ({d}%)"
					},

					// Add legend
					legend: {
						orient: 'vertical',
						top: 'center',
						left: 0,
						data: [@foreach($pie as $key => $val)
						'{{config("custom.jenis_proyek.".$key)}}',
						@endforeach],
						itemHeight: 8,
						itemWidth: 8
					},

					// Add series
					series: [{
						name: 'Jenis Proyek',
						type: 'pie',
						radius: '70%',
						center: ['50%', '50%'],
						itemStyle: {
							normal: {
								borderWidth: 1,
								borderColor: '#fff'
							}
						},
						data: [
							@foreach($pie as $key => $val)
							@if($val>0)
							{value: {{$val}}, name: '{{config("custom.jenis_proyek.".$key)}}' },
							@endif
							@endforeach
						]
					}]
				});
			}


			//
			// Resize charts
			//

			// Resize function
			var triggerChartResize = function() {
				pie_basic_element && pie_basic.resize();
			};

			// On sidebar width change
			var sidebarToggle = document.querySelector('.sidebar-control');
			sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);

			// On window resize
			var resizeCharts;
			window.addEventListener('resize', function() {
				clearTimeout(resizeCharts);
				resizeCharts = setTimeout(function () {
					triggerChartResize();
				}, 200);
			});
		};


		//
		// Return objects assigned to module
		//

		return {
			init: function() {
				_scatterPieBasicLightExample();
			}
		}
	}();

	// Initialize module
	// ------------------------------

	document.addEventListener('DOMContentLoaded', function() {
		EchartsPieBasicLight.init();
	});
</script>

<script>
	//pengeluaran
	var EchartsAreaBasicLight2 = function() {

		var _areaBasicLightExample2 = function() {
			if (typeof echarts == 'undefined') {
				console.warn('Warning - echarts.min.js is not loaded.');
				return;
			}

			// Define element
			var area_basic_element2 = document.getElementById('area_pengeluaran');

			//
			// Charts configuration
			//

			if (area_basic_element2) {

				// Initialize chart
				var area_basic2 = echarts.init(area_basic_element2);

				// Options
				area_basic2.setOption({

					// Define colors
					color: ['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80'],

					// Global text styles
					textStyle: {
						fontFamily: 'Roboto, Arial, Verdana, sans-serif',
						fontSize: 13
					},

					// Chart animation duration
					animationDuration: 750,

					// Setup grid
					grid: {
						left: 0,
						right: 40,
						top: 35,
						bottom: 0,
						containLabel: true
					},

					// Add legend
					legend: {
						data: ['Total Pengeluaran'],
						itemHeight: 8,
						itemGap: 20
					},

					// Add tooltip
					tooltip: {
						trigger: 'axis',
						backgroundColor: 'rgba(0,0,0,0.75)',
						padding: [10, 15],
						textStyle: {
							fontSize: 13,
							fontFamily: 'Roboto, sans-serif'
						}
					},

					// Horizontal axis
					xAxis: [{
						type: 'category',
						boundaryGap: false,
						data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
						axisLabel: {
							color: '#333'
						},
						axisLine: {
							lineStyle: {
								color: '#999'
							}
						},
						splitLine: {
							show: true,
							lineStyle: {
								color: '#eee',
								type: 'dashed'
							}
						}
					}],

					// Vertical axis
					yAxis: [{
						type: 'value',
						axisLabel: {
							color: '#333'
						},
						axisLine: {
							lineStyle: {
								color: '#999'
							}
						},
						splitLine: {
							lineStyle: {
								color: '#eee'
							}
						},
						splitArea: {
							show: true,
							areaStyle: {
								color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
							}
						}
					}],

					// Add series
					series: [
						@foreach($chart2 as $name => $data)
						{
							name: 'Total Pengeluaran',
							type: 'line',
							data: [
								@foreach($data as $val)
								{{ $val }},
								@endforeach
							],
							areaStyle: {
								normal: {
									opacity: 0.25
								}
							},
							smooth: true,
							symbolSize: 7,
							itemStyle: {
								normal: {
									borderWidth: 2
								}
							},
						},
						@endforeach
					]
				});
			}

			// Resize function
			var triggerChartResize = function() {
				area_basic_element2 && area_basic2.resize();
			};

			// On sidebar width change
			var sidebarToggle = document.querySelector('.sidebar-control');
			sidebarToggle && sidebarToggle.addEventListener('click', triggerChartResize);

			// On window resize
			var resizeCharts;
			window.addEventListener('resize', function() {
				clearTimeout(resizeCharts);
				resizeCharts = setTimeout(function () {
					triggerChartResize();
				}, 200);
			});
		};

		return {
			init: function() {
				_areaBasicLightExample2();
			}
		}
	}();

	document.addEventListener('DOMContentLoaded', function() {
		EchartsAreaBasicLight2.init();
	});
</script>
@endif
@endsection