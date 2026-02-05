$(function () {

	$(document).on('select2:open', () => {
		document.querySelector('.select2-container--open .select2-search__field').focus();
	});
	//Initialize Select2 Elements
	$('.select2').select2();

	//Initialize Select2 Elements
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	});

	$('#tanggal').datetimepicker({
		format: 'YYYY-MM-DD'
	});

	$('#tanggalbpjs').datetimepicker({
		format: 'DD-MM-YYYY'
	});

	$('#tanggal2').datetimepicker({
		format: 'DD-MM-YYYY'
	});

	$('#tanggal3').datetimepicker({
		format: 'DD-MM-YYYY'
	});

	//Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd/mm/yyyy', {
		'placeholder': 'dd/mm/yyyy'
	});
	//Datemask2 mm/dd/yyyy
	$('#datemask2').inputmask('mm/dd/yyyy', {
		'placeholder': 'mm/dd/yyyy'
	});
	//Money Euro
	$('[data-mask]').inputmask();




});