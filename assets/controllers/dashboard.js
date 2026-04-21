'use strict';

var ticksStyle = {
	fontColor: '#495057',
	fontStyle: 'bold'
}

var mode = 'index'
var intersect = true



$(document).ready(function () {

	function formatNumber(num) {
		if (num >= 1000000000) {
			return (num / 1000000000).toFixed(1) + 'M';
		} else if (num >= 1000000) {
			return (num / 1000000).toFixed(1) + 'Jt';
		}
		return num;
	}

	$.ajax({
		url: baseUrl + "/dashboard/dashboardPendapatanJaspel",
		type: "POST",
		async: true,
		dataType: 'json',
		success: function (data) {

			var options = {
				series: [{
					name: "Jasa Pelayanan",
					data: data.jaspel
				}],
				chart: {
					height: 500,
					type: 'line',
					zoom: {
						enabled: false
					}
				},
				dataLabels: {
					enabled: true, // Aktifkan data labels
					formatter: function (value) {
						return formatNumber(value); // Gunakan formatNumber untuk memformat nilai
					},
					offsetY: -10, // Mengatur posisi label (opsional)
					style: {
						fontSize: '12px',
						colors: ["#304758"]
					}
				},
				stroke: {
					curve: 'straight'
				},
				title: {
					text: 'Grafik Jasa Pelayanan',
					align: 'left'
				},
				grid: {
					row: {
						colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
						opacity: 0.5
					},
				},
				xaxis: {
					categories: data.label,
				},
				yaxis: {
					labels: {
						formatter: function (value) {
							return formatNumber(value);
						}
					}
				},
				tooltip: {
					y: {
						formatter: function (value) {
							return formatNumber(value);
						}
					}
				}
			};

			var chart = new ApexCharts(document.querySelector("#jaspelAll"), options);
			chart.render();
		}
	});

	$.ajax({
		url: baseUrl + "/dashboard/dashboardJaspelRuang",
		type: "POST",
		async: true,
		dataType: 'json',
		success: function (data) {

			var options = {
				series: [{
					data: data.jaspel
				}],
				chart: {
					type: 'bar',
					height: 635
				},
				plotOptions: {
					bar: {
						barHeight: '100%',
						distributed: true,
						horizontal: true,
						dataLabels: {
							position: 'bottom'
						},
					}
				},
				colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4', '#90ee7e',
					'#f48024', '#69d2e7'
				],
				dataLabels: {
					enabled: true,
					textAnchor: 'start',
					formatter: function (val, opt) {
						return opt.w.globals.labels[opt.dataPointIndex] + ":  " + formatNumber(val)
					},
					offsetX: 0,
					dropShadow: {
						enabled: true
					}
				},
				stroke: {
					width: 1,
					colors: ['#000']
				},
				xaxis: {
					categories: data.label
				},
				title: {
					text: 'Laporan Jasa Pelayanan Per Ruangan',
					align: 'center',
					floating: true
				},
				tooltip: {
					enabled: false
				},
				legend: {
					show: false // Menghilangkan keterangan label di bawah
				}
			};

			var chart = new ApexCharts(document.querySelector("#jaspelRuangan"), options);
			chart.render();

		}
	});


	$.ajax({
		url: baseUrl + "/dashboard/JaspelPenerimaByStatus",
		type: "POST",
		async: true,
		dataType: 'json',
		success: function (data) {

			var options = {
				series: data.total,
				chart: {
					type: 'pie',
					height: 400,
					width: '100%'
				},
				labels: data.label,
				legend: {
					position: 'bottom', // Menempatkan legenda di bawah grafik
					horizontalAlign: 'center', // Menyelaraskan legenda di tengah secara horizontal
					floating: false, // Tidak mengapung
					offsetY: 0 // Offset vertikal dari legenda
				}
			};

			var chart = new ApexCharts(document.querySelector("#jumlahPenerimaByStatus"), options);
			chart.render();

		}

	})



	$.ajax({
		url: baseUrl + "/dashboard/JaspelPenerimaByBank",
		type: "POST",
		async: true,
		dataType: 'json',
		success: function (data) {

			var options = {
				series: data.total,
				chart: {
					type: 'donut',
					height: 400,
					width: '100%'
				},
				labels: data.label,
				legend: {
					position: 'bottom', // Menempatkan legenda di bawah grafik
					horizontalAlign: 'center', // Menyelaraskan legenda di tengah secara horizontal
					floating: false, // Tidak mengapung
					offsetY: 0 // Offset vertikal dari legenda
				}
			};

			var chart = new ApexCharts(document.querySelector("#jumlahPenerimaByBank"), options);
			chart.render();
		}
	})


	$.ajax({
		url: baseUrl + "/dashboard/GajiPenerimaByProfesi",
		type: "POST",
		async: true,
		dataType: 'json',
		success: function (data) {

			var options = {
				series: data.total,
				labels: data.label,
				chart: {
					type: 'polarArea',
				},
				stroke: {
					colors: ['#fff']
				},
				fill: {
					opacity: 0.8
				},
				legend: {
					position: 'bottom', // Menempatkan legenda di bawah grafik
					horizontalAlign: 'center', // Menyelaraskan legenda di tengah secara horizontal
					floating: false, // Tidak mengapung
					offsetY: 0 // Offset vertikal dari legenda
				},
				responsive: [{
					breakpoint: 480,
					options: {
						chart: {
							width: 200
						},
						legend: {
							position: 'bottom'
						}
					}
				}]
			};

			var chart = new ApexCharts(document.querySelector("#jumlahPenerimaGaji"), options);
			chart.render();

		}
	})

	// $.ajax({
	// 	url: baseUrl + "/dashboard/dashboardPendapatanJaspel",
	// 	type: "POST",
	// 	async: true,
	// 	dataType: 'json',
	// 	success: function (data) {
	// 		var visitorsChart = $('#jaspel-chart');
	// 		new Chart(visitorsChart, {
	// 			data: {
	// 				labels: data.label,
	// 				datasets: [{
	// 						type: 'line',
	// 						data: data.jaspel,
	// 						backgroundColor: 'transparent',
	// 						borderColor: '#007bff',
	// 						pointBorderColor: '#007bff',
	// 						pointBackgroundColor: '#007bff',
	// 						fill: false
	// 					}

	// 				]
	// 			},
	// 			options: {
	// 				maintainAspectRatio: false,
	// 				tooltips: {
	// 					mode: mode,
	// 					intersect: intersect
	// 				},
	// 				hover: {
	// 					mode: mode,
	// 					intersect: intersect
	// 				},
	// 				legend: {
	// 					display: false
	// 				},
	// 				scales: {
	// 					yAxes: [{
	// 						gridLines: {
	// 							display: true,
	// 							lineWidth: '4px',
	// 							color: 'rgba(0, 0, 0, .2)',
	// 							zeroLineColor: 'transparent'
	// 						},
	// 						ticks: $.extend({
	// 							beginAtZero: true,
	// 							callback: function (value) {
	// 								if (value >= 1000000000) {
	// 									value /= 1000000000
	// 									value += 'M'
	// 								}else if(value <= 1000000000){
	//                                     value /= 1000000
	// 									value += 'Jt'
	//                                 }
	// 								return '' + value
	// 							}
	// 						}, ticksStyle)
	// 					}],
	// 					xAxes: [{
	// 						display: true,
	// 						gridLines: {
	// 							display: false
	// 						},
	// 						ticks: ticksStyle
	// 					}]
	// 				}
	// 			}
	// 		})
	// 	}
	// });
});