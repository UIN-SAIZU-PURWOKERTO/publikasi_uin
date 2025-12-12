$(function () {

    $('#reservation').daterangepicker();

    $('#tanggal').datetimepicker({
		format: 'YYYY-MM-DD'
	});

	$('#tgl').datetimepicker({
		format: 'YYYY-MM-DD'
	});

	// $('#tglreg').datetimepicker({
	// 	minDate:new Date(),
	// 	format: 'DD/MM/YYYY'
	// });

	$('#tgl2').datetimepicker({
		format: 'YYYY-MM-DD'
	});

	$('#tanggalbpjs').datetimepicker({
		format: 'DD-MM-YYYY'
	});

	$('#tanggal2').datetimepicker({
		format: 'DD-MM-YYYY'
	});

	$('#tanggalbpjs2').datetimepicker({
		format: 'DD-MM-YYYY'
	});

	$('#tanggaljam').datetimepicker({ 
		icons: { time: 'far fa-clock' },
		format: 'YYYY-MM-DD HH:mm:ss'
	});

	$('#tanggaljam2').datetimepicker({ 
		icons: { time: 'far fa-clock' },
		format: 'YYYY-MM-DD HH:mm:ss'
	});

	$('#bulanbpjs').datetimepicker({
		format: 'MM-YYYY'
	});



});