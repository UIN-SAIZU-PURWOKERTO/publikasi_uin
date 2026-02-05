var dataTable_;
$(document).ready(function () {
	dataTable_ = $('#items-table').DataTable({
		processing: true,
		serverSide: true,
		searching: true,
		info: true,
		paging: true,
		lengthChange: true,
		ajax: {
			url: baseUrl + "/master/get_items_karyawan",
			type: "GET",
			data: function (data) {
			}
		}
	});
});