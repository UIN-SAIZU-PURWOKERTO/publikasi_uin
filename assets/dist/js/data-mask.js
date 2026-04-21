$(function () {
	//Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd/mm/yyyy', {
		'placeholder': 'dd/mm/yyyy'
	});
	//Datemask2 mm/dd/yyyy
	$('#datemask2').inputmask('mm/dd/yyyy', {
		'placeholder': 'mm/dd/yyyy'
	});

	$('#tgllahir').inputmask('dd/mm/yyyy', {
		'placeholder': 'mm/dd/yyyy'
	});

	$('#tglreg').inputmask('dd/mm/yyyy', {
		'placeholder': 'dd/mm/yyyy',
		minDate:new Date()
	});

	$(':input').inputmask();

});