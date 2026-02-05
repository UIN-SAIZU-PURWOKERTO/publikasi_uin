'use strict';

let baseUrl = window.location.protocol == 'http:' ? window.location.protocol + "//" + window.location.host + "/" + window.location.pathname.split("/")[1] : window.location.protocol + "//" + window.location.host;

getdate()

$('#pilih_tema').on('click', function () {
	let pd_uid = $("#pd_uid").val();
	$.ajax({
		url: baseUrl + "/admin/tema",
		type: 'post',
		data: {
			uid: pd_uid
		},
		success: function () {
			location.reload();
		}
	});
});

function getdate() {
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	if (h < 10) {
		h = "0" + h;
	}
	if (m < 10) {
		m = "0" + m;
	}
	if (s < 10) {
		s = "0" + s;
	}

	var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth();
	var thisDay = date.getDay(),
		thisDay = myDays[thisDay];
	var yy = date.getYear();
	var year = (yy < 1000) ? yy + 1900 : yy;

	var tgl = ("" + thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
	var jam = (h + ":" + m + ":" + s + " WIB");
	$("#timer").html(tgl + ' ' + jam);

	setTimeout(function () {
		getdate()
	}, 1000);

}


