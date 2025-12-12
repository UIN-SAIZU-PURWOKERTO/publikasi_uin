$(document).ready(function () {
    $(".tglcuti").datepicker({
        multidate: true,
        format: 'yyyy-mm-dd'
    });

    $("#tgl").datepicker({
        format: 'yyyy-mm-dd'
    });

    $("#tgllahir").datepicker({
      changeYear: true,
      dateFormat: 'yyyy/mm/dd',
    });
});