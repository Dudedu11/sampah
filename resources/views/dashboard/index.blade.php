@extends('layout.master')

@section('title', 'Bank Sampah')

@section('content')
<div class="container-fluid p-0">

	<h1 class="h3 mb-3"> Dashboard</h1>

	<div class="row">
		<div class="col-xl-6 col-xxl-5 d-flex">
			<div class="w-100">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Saldo</h5>
									</div>

									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle" data-feather="dollar-sign"></i>
										</div>
									</div>
								</div>
								@if(session('role') == 2 || session('role') == 3)
								<h1 class="mt-1 mb-3">Rp. {{ number_format($users->saldo) }}</h1>
								@elseif(session('role') == 1)
								<h1 class="mt-1 mb-3">Rp. {{ number_format($saldo) }}</h1>
								@endif
							</div>
						</div>
						<div class="card">
							@if(session('role') == 2)
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Jumlah Nasabah</h5>
									</div>

									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle" data-feather="user"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3">{{ $nasabah }}</h1>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-xxl-7">
			<div class="card flex-fill">
				<div class="card-header">

					<h5 class="card-title mb-0">Calendar</h5>
				</div>
				<div class="card-body d-flex">
					<div class="align-self-center w-100">
						<div class="chart">
							<div id="datetimepicker-dashboard"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
			<div class="card flex-fill w-100">
				<div class="card-header">

					<h5 class="card-title mb-0">Browser Usage</h5>
				</div>
				<div class="card-body d-flex">
					<div class="align-self-center w-100">
						<div class="py-3">
							<div class="chart chart-xs">
								<canvas id="chartjs-dashboard-pie"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
			<div class="card flex-fill w-100">
				<div class="card-header">

					<h5 class="card-title mb-0">Jumlah Transaksi Masuk</h5>
				</div>
				<div class="card-body py-3">
					<div class="chart chart-sm">
						<canvas id="chartjs-dashboard-line"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>



</div>


@endsection