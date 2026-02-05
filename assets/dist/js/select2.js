$(function () {

  $('#modal-xl').on('shown.bs.modal', function () {
    $('.select2').select2({
        dropdownParent: $('#modal-xl') // mengatur dropdown agar berada di dalam modal
    });
  });

  $('body').on('shown.bs.modal', function (e) {
    $(e.target).find('.select2').select2({
        dropdownParent: $(e.target) // mengatur dropdown agar berada di dalam modal yang sesuai
    });
});

	$(document).on('select2:open', () => {
		document.querySelector('.select2-container--open .select2-search__field').focus();
	});

	//Initialize Select2 Elements
	$('.select2').select2({
    width: "100%"
  });
	$('.select3').select2();

	$('.select2bs4').select2({
		theme: 'bootstrap4'
	});

  $("#select2insidemodal").select2({
    dropdownParent: $("#myModal")
  });

  $(".select2insidemodal").select2({
    dropdownParent: $("#modal-detail")
  });

  $(".select2insidemodal").select2({
    dropdownParent: $("#modal-info")
  });

  $(".namaobat").select2({
    dropdownParent: $("#modal-detail")
  });

  $(".aturanpakai").select2({
    dropdownParent: $("#modal-detail")
  });

});