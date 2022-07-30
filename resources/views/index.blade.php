@extends('layout')

@section('css')
	<style>
		.bg-600{
			border-radius: 10px;
			width: 95%;
		}
		.rectangle{
			position: static;
			width: 70px;
			height: 6px;
			background: #6EBA93;
			border-radius: 5px;
			margin-top: -5px;
		}
		.row{
			margin-top: 15px;
		}
		.row-a{
			margin-top: 15px;
		}
		.content{
			background: #F5F5F4;
		}
		.contents{
			padding-left: 30px;
		}
		.title{

		}
		.card{
			padding-bottom: 20px;
		}
		.tab-content > .tab-pane {
		display: block;
		height: 0px;
		overflow: hidden;
		}
		.tab-content > .active {
			height: auto;
		}
	</style>
@endsection

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
<div class="content pt-0">
	
	<!-- Greetings message -->
	<h2 id="greetings" style="text-align: center"></h2>

	<!-- Quick stats boxes -->
	<div class="title" style="padding-bottom: 20px">
		<h4><span class="font-weight-semibold">Info Penting</span></h4>
		<div class="rectangle">
		</div>
	</div>

	@if(Auth::user()->role == 1)
	<!-- Admin Dashboard -->
	<div class="row">
		<div class="col-xl-7">
			<div class="card" style="border-radius: 10px;">
				<div class="card-header header-elements-inline">
					<h5 class="font-weight-semibold">Laporan Tahunan</h5>
				</div>
		
				<div class="card-body">
		
					<ul class="nav nav-tabs nav-tabs-solid bg-primary border-0 nav-tabs-component rounded">
						<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab"><i class="icon-download mr-2"></i> Pemasukan</a></li>
						<li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab"><i class="icon-upload mr-2"></i> Pengeluaran</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane chart-container fade active show" id="tab1">
							<div class="chart has-fixed-height" id="area_pemasukan"></div>
						</div>
						<div class="tab-pane chart-container fade" id="tab2">
							<div class="chart has-fixed-height" id="area_pengeluaran"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-5">
			<div class="card" style="border-radius: 10px; height: auto;">
				<div class="card-header header-elements-inline">
					<h5 class="font-weight-semibold">Chart Proyek Klien</h5>
				</div>
				<div class="card-body">
					<div class="chart-container">
						<div class="chart has-fixed-height" id="pie_jproyek"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card" style="border-radius: 10px">
				<div class="card-header header-elements-inline">
					<h5 class="font-weight-semibold">Chart Jenis Layanan Proyek Klien</h5>
				</div>
				<div class="card-body">
					<div class="chart-container">
						<div class="d-flex align-items-center mb-3 mb-sm-0">
							<div class="chart has-fixed-height" id="pie_jlayananweb"></div>
							<div class="chart has-fixed-height" id="pie_jlayanansi"></div>
							<div class="chart has-fixed-height" id="pie_jlayananmobile"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		{{-- <div class="col-xl-7">
			<div class="card" style="border-radius: 10px">
				<div class="card-header header-elements-inline">
					<h5 class="font-weight-semibold">Grafik Pengeluaran per Tahun</h5>
				</div>
	
				<div class="card-body">
					<div class="chart-container">
						<div class="chart has-fixed-height" id="area_pengeluaran"></div>
					</div>
				</div>
			</div>
		</div> --}}
	@endif

	@if (Auth::user()->role == 20)
	<!-- Finance Dashboard -->
	<div class="row">
		<div class="col-xl-12">
			<div class="card" style="border-radius: 10px;">
				<div class="card-header header-elements-inline">
					<h5 class="font-weight-semibold">Laporan Tahunan</h5>
				</div>
		
				<div class="card-body">
		
					<ul class="nav nav-tabs nav-tabs-solid bg-primary border-0 nav-tabs-component rounded">
						<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab"><i class="icon-download mr-2"></i> Pemasukan</a></li>
						<li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab"><i class="icon-upload mr-2"></i> Pengeluaran</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane chart-container fade active show" id="tab1">
							<div class="chart has-fixed-height" id="area_pemasukan"></div>
						</div>
						<div class="tab-pane chart-container fade" id="tab2">
							<div class="chart has-fixed-height" id="area_pengeluaran"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card" style="border-radius: 10px">
				<div class="card-header header-elements-inline">
					<h5 class="font-weight-semibold">Chart Jenis Layanan Proyek Klien</h5>
				</div>
				<div class="card-body">
					<div class="chart-container">
						<div class="d-flex align-items-center mb-3 mb-sm-0">
							<div class="chart has-fixed-height" id="pie_pemasukan"></div>
							<div class="chart has-fixed-height" id="pie_pengeluaran"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
{{-- <div class="card" style="border-radius: 10px">
	<div class="row">
		<div class="contents">
		<h5><span class="font-weight-semibold">Info Klien</span></h5>
	</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-users icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $member }}</h3>
						</div>
						<div style="font-size: 18px;">
							Jumlah Klien
						</div>
					</div>
				</blockquote>
			</div>
		</div>
	</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-user icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $memberthis }}</h3>
						</div>
						<div style="font-size: 18px;">
							Jumlah Klien Bulan Ini
						</div>
					</div>
				</blockquote>
			</div>
		</div>
	</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #4169E1, #00CED1)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-user icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $memberlast }}</h3>
						</div>
						<div style="font-size: 18px;">
							Jumlah Klien Bulan Lalu
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
	</div>
</div>
<div class="card" style="border-radius: 10px">
	<div class="row">
		<div class="contents">
		<h5><span class="font-weight-semibold">Info Website</span></h5>
	</div>
</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #00FF00, #008000)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-display icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ count($proyek) }}</h3>
						</div>
						<div style="font-size: 18px;">
							Total Website (All Layanan)
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #00FF00, #008000)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-display icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $proyekthis }}</h3>
						</div>
						<div style="font-size: 18px;">
							Total Website Bulan Ini
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #00FF00, #008000)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-display icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $proyeklast }}</h3>
						</div>
						<div style="font-size: 18px;">
							Total Website Bulan Lalu
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
	</div>
</div>
<div class="card" style="border-radius: 10px">
	<div class="row">
		<div class="contents">
		<h5 class="font-weight-semibold">Info Layanan Website</h5>
	</div>
</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #FFA500, #FF4500)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-sphere icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $simple }}</h3>
						</div>
						<div style="font-size: 18px;">
							Total Website Simple
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #FFA500, #FF4500)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-sphere icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $prioritas }}</h3>
						</div>
						<div style="font-size: 18px;">
							Total Website Prioritas
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #FFA500, #FF4500)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-sphere icon-4x"></i>
					</div>
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $premium }}</h3>
						</div>
						<div style="font-size: 18px;">
							Total Website Premium
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
	</div>
</div>
	@if (\Auth::user()->role==1)
	<div class="card" style="border-radius: 10px">
		<div class="row">
			<div class="contents">
			<h5 class="font-weight-semibold">Info Pendapatan</h5>
		</div>
	</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="contents">
					<div class="bg-600" style="background: linear-gradient(to right, #FFFF00, #FFD700)">
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
							<div style="font-size: 18px;">
								Total Pendapatan
							</div>
						</div>
					</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contents">
					<div class="bg-600" style="background: linear-gradient(to right, #FFFF00, #FFD700)">
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
							<div style="font-size: 18px;">
								Total Pendapatan Bulan Ini
							</div>
						</div>
					</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contents">
					<div class="bg-600" style="background: linear-gradient(to right, #FFFF00, #FFD700)">
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
							<div style="font-size: 18px;">
								Total Pendapatan Bulan Lalu
							</div>
						</div>
					</div>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
	<div class="card" style="border-radius: 10px">
		<div class="row">
			<div class="contents">
			<h5 class="font-weight-semibold">Info Pengeluaran</h5>
		</div>
	</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="contents">
					<div class="bg-600" style="background: linear-gradient(to right, #FF6347, #800000)">
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
							<div style="font-size: 18px;">
								Total Pengeluaran
							</div>
						</div>
					</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contents">
					<div class="bg-600" style="background: linear-gradient(to right, #FF6347, #800000)">
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
							<div style="font-size: 18px;">
								Total Pengeluaran Bulan Ini
							</div>
						</div>
					</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contents">
					<div class="bg-600" style="background: linear-gradient(to right, #FF6347, #800000)">
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
							<div style="font-size: 18px;">
								Total Pengeluaran Bulan Lalu
							</div>
						</div>
					</div>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
	<div class="card" style="border-radius: 10px">
		<div class="row">
			<div class="contents">
			<h5 class="font-weight-semibold">Info Nett/Profit</h5>
		</div>
	</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="contents">
					<div class="bg-600" style="background: linear-gradient(to right, #2F4F4F, #808080)">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-coin-dollar icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$gross - @$total),0,',','.')}}, -</h3>
							</div>
							<div style="font-size: 18px;">
								Total Nett/Profit
							</div>
						</div>
					</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contents">
					<div class="bg-600" style="background: linear-gradient(to right, #2F4F4F, #808080)">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-coin-dollar icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$grossthis - @$expendthis),0,',','.')}}, -</h3>
							</div>
							<div style="font-size: 18px;">
								Total Nett/Profit Bulan Ini
							</div>
						</div>
					</div>
					</blockquote>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contents">
					<div class="bg-600" style="background: linear-gradient(to right, #2F4F4F, #808080)">
					<blockquote class="blockquote d-flex py-2 mb-0">
						<div class="mr-4" style="padding-left: 1.875rem;">
							<i class="icon-coin-dollar icon-4x"></i>
						</div>
						<div>
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">Rp {{number_format((@$grosslast - @$expendlast),0,',','.')}}, - </h3>
							</div>
							<div style="font-size: 18px;">
								Total Nett/Profit Bulan Lalu
							</div>
						</div>
					</div>
					</blockquote>
				</div>
			</div>
		</div>
	@endif
</div>
<div class="card" style="border-radius: 10px">
	<div class="row">
		<div class="contents">
		<h4><span class="font-weight-semibold">Total Task</span></h4>
	</div>
</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #BDB76B, #B8860B)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-stack-plus icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $new }}</h3>
						</div>
						<div style="font-size: 18px;">
							Task Baru
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #F4A460, #FF4500)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-forward icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $ongoing }}</h3>
						</div>
						<div style="font-size: 18px;">
							Task Sedang Dikerjakan
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #006400, #556B2F)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-clipboard2 icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $done }}</h3>
						</div>
						<div style="font-size: 18px;">
							Task Selesai
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
	</div>
	<!-- /quick stats boxes -->
	 <!-- TODAY -->
	<!-- Quick stats boxes -->
</div>
<div class="card" style="border-radius: 10px">
	<div class="row">
		<div class="contents">
		<h4><span class="font-weight-semibold">Task Hari Ini</span></h4>
	</div>
</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #BDB76B, #B8860B)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-stack-plus icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $todaynew }}</h3>
						</div>
						<div style="font-size: 18px;">
							Task Baru
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #F4A460, #FF4500)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-forward icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $todayongoing }}</h3>
						</div>
						<div style="font-size: 18px;">
							Task Sedang Dikerjakan
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="contents">
				<div class="bg-600" style="background: linear-gradient(to right, #006400, #556B2F)">
				<blockquote class="blockquote d-flex py-2 mb-0">
					<div class="mr-4" style="padding-left: 1.875rem;">
						<i class="icon-clipboard2 icon-4x"></i>
					</div>
					
					<div>
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ $todaydone }}</h3>
						</div>
						<div style="font-size: 18px;">
							Task Selesai
						</div>
					</div>
				</div>
				</blockquote>
			</div>
		</div>
	</div>
	<!-- /quick stats boxes -->
	<!-- TODAY -->
	<!-- Quick stats boxes -->
	<!-- /quick stats boxes -->
</div> --}}
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

<script>
	var day = new Date();
	var hrs = day.getHours();

	var greet = "";

	if (hrs < 12){
		greet = "Good Morning!";
	}
	else if (hrs >= 12 && hrs <= 17){
		greet = "Good Afternoon!";
	}
	else if (hrs >= 18 && hrs <= 23){
		greet = "Good Evening!";
	}

	// console.log(hrs);
	// console.log(greet);
	document.getElementById('greetings').innerHTML = greet;
</script>

@if (in_array(Auth::user()->role, [1,20]))
<script>
	// pemasukan
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

	// pengeluaran
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

@if (in_array(Auth::user()->role, [1]))
<script>
	// pie jenis proyek
	var EchartsPieBasicLight = function() {

		var _scatterPieBasicLightExample = function() {
			if (typeof echarts == 'undefined') {
				console.warn('Warning - echarts.min.js is not loaded.');
				return;
			}

			// Define element
			var pie_jproyek_element = document.getElementById('pie_jproyek');

			if (pie_jproyek_element) {

				// Initialize chart
				var pie_jproyek = echarts.init(pie_jproyek_element);

				// Options
				pie_jproyek.setOption({

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
						formatter: "{a} {b}: {c} ({d}%)"
					},

					// Add legend
					legend: {
						orient: 'horizontal',
						top: 'bottom',
						left: 'center',
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
						radius: '50%',
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
				pie_jproyek_element && pie_jproyek.resize();
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

	// pie jenis layanan website
	var EchartsPieBasicLight2 = function() {

		var _scatterPieBasicLightExample = function() {
			if (typeof echarts == 'undefined') {
				console.warn('Warning - echarts.min.js is not loaded.');
				return;
			}

			// Define element
			var pie_jlayananweb_element = document.getElementById('pie_jlayananweb');

			if (pie_jlayananweb_element) {

				// Initialize chart
				var pie_jlayananweb = echarts.init(pie_jlayananweb_element);

				// Options
				pie_jlayananweb.setOption({

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
						text: 'Proyek Website Klien',
						subtext: 'Berdasarkan Jenis Layanan',
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
						formatter: "{a} {b}: {c} ({d}%)"
					},

					// Add legend
					legend: {
						orient: 'horizontal',
						top: 'bottom',
						left: 'center',
						data: [@foreach($pie as $key => $val)
						'{{config("custom.jenis_layanan.".$key)}}',
						@endforeach],
						itemHeight: 8,
						itemWidth: 8
					},

					// Add series
					series: [{
						name: 'Jenis Layanan Website',
						type: 'pie',
						radius: '30%',
						center: ['50%', '50%'],
						itemStyle: {
							normal: {
								borderWidth: 1,
								borderColor: '#fff'
							}
						},
						data: [
							@foreach($pie2 as $key => $val)
							@if($val>0)
							{value: {{$val}}, name: '{{config("custom.jenis_layanan.".$key)}}' },
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
				pie_jlayananweb_element && pie_jlayananweb.resize();
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
		EchartsPieBasicLight2.init();
	});

	// pie jenis layanan sistem informasi
	var EchartsPieBasicLight3 = function() {

		var _scatterPieBasicLightExample = function() {
			if (typeof echarts == 'undefined') {
				console.warn('Warning - echarts.min.js is not loaded.');
				return;
			}

			// Define element
			var pie_jlayanansi_element = document.getElementById('pie_jlayanansi');

			if (pie_jlayanansi_element) {

				// Initialize chart
				var pie_jlayanansi = echarts.init(pie_jlayanansi_element);

				// Options
				pie_jlayanansi.setOption({

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
						text: 'Proyek Sistem Informasi Klien',
						subtext: 'Berdasarkan Jenis Layanan',
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
						formatter: "{a} {b}: {c} ({d}%)"
					},

					// Add legend
					legend: {
						orient: 'horizontal',
						top: 'bottom',
						left: 'center',
						data: [@foreach($pie as $key => $val)
						'{{config("custom.jenis_layanan.".$key)}}',
						@endforeach],
						itemHeight: 8,
						itemWidth: 8
					},

					// Add series
					series: [{
						name: 'Jenis Layanan Sistem Informasi',
						type: 'pie',
						radius: '30%',
						center: ['50%', '50%'],
						itemStyle: {
							normal: {
								borderWidth: 1,
								borderColor: '#fff'
							}
						},
						data: [
							@foreach($pie3 as $key => $val)
							@if($val>0)
							{value: {{$val}}, name: '{{config("custom.jenis_layanan.".$key)}}' },
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
				pie_jlayanansi_element && pie_jlayanansi.resize();
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
		EchartsPieBasicLight3.init();
	});

	// pie jenis layanan mobile app
	var EchartsPieBasicLight4 = function() {

		var _scatterPieBasicLightExample = function() {
			if (typeof echarts == 'undefined') {
				console.warn('Warning - echarts.min.js is not loaded.');
				return;
			}

			// Define element
			var pie_jlayananmobile_element = document.getElementById('pie_jlayananmobile');

			if (pie_jlayananmobile_element) {

				// Initialize chart
				var pie_jlayananmobile = echarts.init(pie_jlayananmobile_element);

				// Options
				pie_jlayananmobile.setOption({

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
						text: 'Proyek Mobile App Klien',
						subtext: 'Berdasarkan Jenis Layanan',
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
						formatter: "{a} {b}: {c} ({d}%)"
					},

					// Add legend
					legend: {
						orient: 'horizontal',
						top: 'bottom',
						left: 'center',
						data: [@foreach($pie as $key => $val)
						'{{config("custom.jenis_layanan.".$key)}}',
						@endforeach],
						itemHeight: 8,
						itemWidth: 8
					},

					// Add series
					series: [{
						name: 'Jenis Layanan Mobile App',
						type: 'pie',
						radius: '30%',
						center: ['50%', '50%'],
						itemStyle: {
							normal: {
								borderWidth: 1,
								borderColor: '#fff'
							}
						},
						data: [
							@foreach($pie4 as $key => $val)
							@if($val>0)
							{value: {{$val}}, name: '{{config("custom.jenis_layanan.".$key)}}' },
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
				pie_jlayananmobile_element && pie_jlayananmobile.resize();
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
		EchartsPieBasicLight4.init();
	});
</script>
@endif

@if (in_array(Auth::user()->role, [20]))
<script>
	// pie pemasukan
	var EchartsPieBasicLight = function() {

		var _scatterPieBasicLightExample = function() {
			if (typeof echarts == 'undefined') {
				console.warn('Warning - echarts.min.js is not loaded.');
				return;
			}

			// Define element
			var pie_pemasukan_element = document.getElementById('pie_pemasukan');

			if (pie_pemasukan_element) {

				// Initialize chart
				var pie_pemasukan = echarts.init(pie_pemasukan_element);

				// Options
				pie_pemasukan.setOption({

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
						text: 'Persentase Pemasukan',
						subtext: 'per Tahun',
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
						formatter: "{a} {b}: {c} ({d}%)"
					},

					// Add legend
					legend: {
						orient: 'horizontal',
						top: 'bottom',
						left: 'center',
						data: [@foreach($pie as $key => $val)
						'{{config("custom.j_pemasukan.".$key)}}',
						@endforeach],
						itemHeight: 8,
						itemWidth: 8
					},

					// Add series
					series: [{
						name: 'Total Pemasukan',
						type: 'pie',
						radius: '50%',
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
							{value: {{$val}}, name: '{{config("custom.j_pemasukan.".$key)}}' },
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
				pie_pemasukan_element && pie_pemasukan.resize();
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

	// pie pengeluaran
	var EchartsPieBasicLight2 = function() {

		var _scatterPieBasicLightExample = function() {
			if (typeof echarts == 'undefined') {
				console.warn('Warning - echarts.min.js is not loaded.');
				return;
			}

			// Define element
			var pie_pengeluaran_element = document.getElementById('pie_pengeluaran');

			if (pie_pengeluaran_element) {

				// Initialize chart
				var pie_pengeluaran = echarts.init(pie_pengeluaran_element);

				// Options
				pie_pengeluaran.setOption({

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
						text: 'Persentase Pengeluaran',
						subtext: 'per Tahun',
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
						formatter: "{a} {b}: {c} ({d}%)"
					},

					// Add legend
					legend: {
						orient: 'horizontal',
						top: 'bottom',
						left: 'center',
						data: [@foreach($pie2 as $key => $val)
						'{{config("custom.kat_pengeluaran.".$key)}}',
						@endforeach],
						itemHeight: 8,
						itemWidth: 8
					},

					// Add series
					series: [{
						name: 'Total Pengeluaran',
						type: 'pie',
						radius: '50%',
						center: ['50%', '50%'],
						itemStyle: {
							normal: {
								borderWidth: 1,
								borderColor: '#fff'
							}
						},
						data: [
							@foreach($pie2 as $key => $val)
							@if($val>0)
							{value: {{$val}}, name: '{{config("custom.kat_pengeluaran.".$key)}}' },
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
				pie_pengeluaran_element && pie_pengeluaran.resize();
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
		EchartsPieBasicLight2.init();
	});
</script>
@endif
@endsection