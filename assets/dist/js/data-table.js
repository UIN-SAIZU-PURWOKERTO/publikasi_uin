$(function () {
	$("#example1").DataTable({
		"language": {
			"emptyTable": "Data tidak tersedia"
		}
	});
});

$(function () {
	$("#tabel1").DataTable();
});

$(function () {
	$("#tabel2").DataTable();
});


$(function () {
	$("#tabel3").DataTable();
});

$(function () {
	$("#tabel4").DataTable();
});


$(function () {
	$("#table_default").DataTable({
		"searching": false,
		"lengthChange": false
	});
});

$(function () {
	$("#cp").DataTable({
		"language": {
			"emptyTable": "Data tidak tersedia"
		},
		"info": false,
		"pagingType": "simple",
		"lengthChange": false
	});
});