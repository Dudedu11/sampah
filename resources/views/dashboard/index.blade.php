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
						@if(session('role') != 4)
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
						@endif
						@if(session('role') == 1)
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Total Sampah Terkumpul</h5>
									</div>
									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle" data-feather="dollar-sign"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3">{{ $totalTransaksi }} Kg</h1>
							</div>
						</div>
						@else
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										@if(session('role') == 2)
										<h5 class="card-title">
											Jumlah Nasabah
										</h5>
										@elseif(session('role') == 3)
										<h5 class="card-title">
											Jumlah Bank Sampah Unit
										</h5>
										@elseif(session('role') == 4)
										<h5 class="card-title">
											Jumlah Bank Sampah Induk
										</h5>
										@endif
									</div>

									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle" data-feather="user"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3">{{ $user }}</h1>
							</div>
						</div>
						@endif
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
	@if(session('role') == 1)
				<div class="row">
					<div class="col-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">
											Jumlah Nasabah
										</h5>
									</div>
									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle" data-feather="user"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3"> {{ $nasabah }}</h1>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">
											Jumlah Bank Sampah Unit
										</h5>
									</div>
									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle" data-feather="user"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3"> {{ $unit }}</h1>
							</div>
						</div>
					</div>
	
					<div class="col-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">
											Jumlah Bank Sampah Induk
										</h5>
									</div>
									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle" data-feather="user"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3"> {{ $induk }}</h1>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">
											Jumlah Industri
										</h5>
									</div>
									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle" data-feather="user"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3">{{ $industri }}</h1>
							</div>
						</div>
					</div>
				</div>
				@endif

	@if(session('role') != 4 && session('role') != 1)
	<div class="row">
		<div class="card flex-fill w-100">
			<div class="card-header">
				<h5 class="card-title mb-0">Grafik Pemasukan</h5>
			</div>
			<div class="card-body py-3">
				<div class="chart chart-sm">
					<canvas id="chartjs-dashboard-line"></canvas>
				</div>
			</div>
		</div>
	</div>
	@endif

	@if(session('role') != 1)
	<div class="row">
		<div class="card flex-fill w-100">
			<div class="card-header">

				<h5 class="card-title mb-0">Grafik Pengeluaran</h5>
			</div>
			<div class="card-body py-3">
				<div class="chart chart-sm">
					<canvas id="chartjs-dashboard-line-2"></canvas>
				</div>
			</div>
		</div>
	</div>
	@endif

	@if(session('role') == 1)
	<div class="row">
		<div class="card flex-fill w-100">
			<div class="card-header">

				<h5 class="card-title mb-0">Grafik Penyaluran Sampah Nasabah Ke Bank Sampah Unit</h5>
			</div>
			<div class="card-body py-3">
				<div class="chart chart-sm">
					<canvas id="chartjs-nasabah"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="card flex-fill w-100">
			<div class="card-header">

				<h5 class="card-title mb-0">Grafik Penyaluran Sampah Bank Sampah Unit ke Bank Sampah Induk</h5>
			</div>
			<div class="card-body py-3">
				<div class="chart chart-sm">
					<canvas id="chartjs-unit"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="card flex-fill w-100">
			<div class="card-header">

				<h5 class="card-title mb-0">Grafik Penyaluran Sampah Bank Sampah Induk ke Industri </h5>
			</div>
			<div class="card-body py-3">
				<div class="chart chart-sm">
					<canvas id="chartjs-induk"></canvas>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>


@endsection

<script src="js/app.js"></script>

@if(session('role') != 4 && session('role') != 1)
<script>
	document.addEventListener("DOMContentLoaded", function() {
		var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
		var gradient = ctx.createLinearGradient(0, 0, 0, 225);
		gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
		gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
		var totalDatas = @json($totalPemasukan);
		// Line chart
		new Chart(document.getElementById("chartjs-dashboard-line"), {
			type: "line",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Pemasukan (Rp )",
					fill: true,
					backgroundColor: gradient,
					borderColor: window.theme.primary,
					data: totalDatas
				}]
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					intersect: false
				},
				hover: {
					intersect: true
				},
				plugins: {
					filler: {
						propagate: false
					}
				},
				scales: {
					xAxes: [{
						reverse: true,
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}],
					yAxes: [{
						ticks: {
							stepSize: 1000
						},
						display: true,
						borderDash: [3, 3],
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}]
				}
			}
		});
	});
</script>
@endif

@if(session('role') != 1)
<script>
	document.addEventListener("DOMContentLoaded", function() {
		var ctx = document.getElementById("chartjs-dashboard-line-2").getContext("2d");
		var gradient = ctx.createLinearGradient(0, 0, 0, 225);
		gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
		gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
		var totalDatas = @json($totalPengeluaran);
		// Line chart
		new Chart(document.getElementById("chartjs-dashboard-line-2"), {
			type: "line",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Pengeluaran (Rp )",
					fill: true,
					backgroundColor: gradient,
					borderColor: window.theme.primary,
					data: totalDatas
				}]
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					intersect: false
				},
				hover: {
					intersect: true
				},
				plugins: {
					filler: {
						propagate: false
					}
				},
				scales: {
					xAxes: [{
						reverse: true,
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}],
					yAxes: [{
						ticks: {
							stepSize: 1000
						},
						display: true,
						borderDash: [3, 3],
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}]
				}
			}
		});
	});
</script>
@endif

@if(session('role') == 1)
<script>
	document.addEventListener("DOMContentLoaded", function() {
		var ctx = document.getElementById("chartjs-nasabah").getContext("2d");
		var gradient = ctx.createLinearGradient(0, 0, 0, 225);
		gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
		gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
		var totalDatas = @json($transaksiNasabah);
		// Line chart
		new Chart(document.getElementById("chartjs-nasabah"), {
			type: "line",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Pengeluaran (Rp )",
					fill: true,
					backgroundColor: gradient,
					borderColor: window.theme.primary,
					data: totalDatas
				}]
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					intersect: false
				},
				hover: {
					intersect: true
				},
				plugins: {
					filler: {
						propagate: false
					}
				},
				scales: {
					xAxes: [{
						reverse: true,
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}],
					yAxes: [{
						ticks: {
							stepSize: 1000
						},
						display: true,
						borderDash: [3, 3],
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}]
				}
			}
		});
	});
</script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var ctx = document.getElementById("chartjs-unit").getContext("2d");
		var gradient = ctx.createLinearGradient(0, 0, 0, 225);
		gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
		gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
		var totalDatas = @json($transaksiUnit);
		// Line chart
		new Chart(document.getElementById("chartjs-unit"), {
			type: "line",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Pengeluaran (Rp )",
					fill: true,
					backgroundColor: gradient,
					borderColor: window.theme.primary,
					data: totalDatas
				}]
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					intersect: false
				},
				hover: {
					intersect: true
				},
				plugins: {
					filler: {
						propagate: false
					}
				},
				scales: {
					xAxes: [{
						reverse: true,
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}],
					yAxes: [{
						ticks: {
							stepSize: 1000
						},
						display: true,
						borderDash: [3, 3],
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}]
				}
			}
		});
	});
</script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var ctx = document.getElementById("chartjs-induk").getContext("2d");
		var gradient = ctx.createLinearGradient(0, 0, 0, 225);
		gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
		gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
		var totalDatas = @json($transaksiInduk);
		// Line chart
		new Chart(document.getElementById("chartjs-induk"), {
			type: "line",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Pengeluaran (Rp )",
					fill: true,
					backgroundColor: gradient,
					borderColor: window.theme.primary,
					data: totalDatas
				}]
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					intersect: false
				},
				hover: {
					intersect: true
				},
				plugins: {
					filler: {
						propagate: false
					}
				},
				scales: {
					xAxes: [{
						reverse: true,
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}],
					yAxes: [{
						ticks: {
							stepSize: 1000
						},
						display: true,
						borderDash: [3, 3],
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}]
				}
			}
		});
	});
</script>
@endif