'use strict';

function formatMoney(number) {
    return 'Rp '+ number.toLocaleString('id-ID');
 }

$('.hari1').on('click', function() {
    const id_kegiatan_detail = $(this).data('kegiatandetail');
    const kelas = $(this).data('kelas');
    const idxdaftar = $(this).data('idxdaftar');

    $.ajax({
        url: baseUrl + "/home/updateHari1",
        type: 'post',
        data: {
            id_kegiatan_detail: id_kegiatan_detail,
            kelas: kelas,
            idxdaftar: idxdaftar
        },
        success: function() {
            document.location.href;
        }
    });

    $.ajax({
        url: baseUrl + "/home/get_cekTotal",
        type: 'post',
        data: {
            idxdaftar: idxdaftar
        },
		dataType: 'json',
        success: function(response) {
            console.log(response.total);
            console.log(response.cost_inacbg);

            var nilai = parseFloat(response.cost_inacbg)*90/100;
            console.log(nilai);

            if((parseFloat(response.total) > parseFloat(nilai)) && (parseFloat(nilai) < parseFloat(response.cost_inacbg))){
                Swal.fire({
                    title: "<h2>Total Biaya Hampir Mencapai Klaim INACBG</h2>",
                    icon: 'warning',
                    html: "<h1> Rp. " + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }

            
            if(parseFloat(response.total) > parseFloat(response.cost_inacbg)){
                Swal.fire({
                    title: "<h2>Total Biaya Telah Mencapai Klaim INACBG</h2>",
                    icon: 'warning',
                    html: "<h1> Rp. " + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }



        }
    });

});


$('.hari2').on('click', function() {
    const id_kegiatan_detail = $(this).data('kegiatandetail');
    const kelas = $(this).data('kelas');
    const idxdaftar = $(this).data('idxdaftar');

    $.ajax({
        url: baseUrl + "/home/updateHari2",
        type: 'post',
        data: {
            id_kegiatan_detail: id_kegiatan_detail,
            kelas: kelas,
            idxdaftar: idxdaftar
        },
        success: function() {
            document.location.href;
        }
    });


    $.ajax({
        url: baseUrl + "/home/get_cekTotal",
        type: 'post',
        data: {
            idxdaftar: idxdaftar
        },
		dataType: 'json',
        success: function(response) {
            console.log(response.total);
            console.log(response.cost_inacbg);


            var nilai = parseFloat(response.cost_inacbg)*90/100;
            console.log(nilai);

            if((parseFloat(response.total) > parseFloat(nilai)) && (parseFloat(nilai) < parseFloat(response.cost_inacbg))){
                Swal.fire({
                    title: "<h2>Total Biaya Hampir Mencapai Klaim INACBG</h2>",
                    icon: 'warning',
                    html: "<h1> Rp. " + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }


            if(parseFloat(response.total) > parseFloat(response.cost_inacbg)){
                Swal.fire({
                    title: "Total Biaya Telah Mencapai Klaim",
                    icon: 'warning',
                    html: "<h1>" + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }
        }
    });


});

$('.hari3').on('click', function() {
    const id_kegiatan_detail = $(this).data('kegiatandetail');
    const kelas = $(this).data('kelas');
    const idxdaftar = $(this).data('idxdaftar');

    $.ajax({
        url: baseUrl + "/home/updateHari3",
        type: 'post',
        data: {
            id_kegiatan_detail: id_kegiatan_detail,
            kelas: kelas,
            idxdaftar: idxdaftar
        },
        success: function() {
            document.location.href;
        }
    });

    $.ajax({
        url: baseUrl + "/home/get_cekTotal",
        type: 'post',
        data: {
            idxdaftar: idxdaftar
        },
		dataType: 'json',
        success: function(response) {
            console.log(response.total);
            console.log(response.cost_inacbg);

            var nilai = parseFloat(response.cost_inacbg)*90/100;
            console.log(nilai);

            if((parseFloat(response.total) > parseFloat(nilai)) && (parseFloat(nilai) < parseFloat(response.cost_inacbg))){
                Swal.fire({
                    title: "<h2>Total Biaya Hampir Mencapai Klaim INACBG</h2>",
                    icon: 'warning',
                    html: "<h1> Rp. " + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }


            if(parseFloat(response.total) > parseFloat(response.cost_inacbg)){
                Swal.fire({
                    title: "Total Biaya Telah Mencapai Klaim",
                    icon: 'warning',
                    html: "<h1>" + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }
        }
    });


});

$('.hari4').on('click', function() {
    const id_kegiatan_detail = $(this).data('kegiatandetail');
    const kelas = $(this).data('kelas');
    const idxdaftar = $(this).data('idxdaftar');

    $.ajax({
        url: baseUrl + "/home/updateHari4",
        type: 'post',
        data: {
            id_kegiatan_detail: id_kegiatan_detail,
            kelas: kelas,
            idxdaftar: idxdaftar
        },
        success: function() {
            document.location.href;
        }
    });

    $.ajax({
        url: baseUrl + "/home/get_cekTotal",
        type: 'post',
        data: {
            idxdaftar: idxdaftar
        },
		dataType: 'json',
        success: function(response) {
            console.log(response.total);
            console.log(response.cost_inacbg);


            var nilai = parseFloat(response.cost_inacbg)*90/100;
            console.log(nilai);

            if((parseFloat(response.total) > parseFloat(nilai)) && (parseFloat(nilai) < parseFloat(response.cost_inacbg))){
                Swal.fire({
                    title: "<h2>Total Biaya Hampir Mencapai Klaim INACBG</h2>",
                    icon: 'warning',
                    html: "<h1> Rp. " + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }


            if(parseFloat(response.total) > parseFloat(response.cost_inacbg)){
                Swal.fire({
                    title: "Total Biaya Telah Mencapai Klaim",
                    icon: 'warning',
                    html: "<h1>" + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }
        }
    });


});

$('.hari5').on('click', function() {
    const id_kegiatan_detail = $(this).data('kegiatandetail');
    const kelas = $(this).data('kelas');
    const idxdaftar = $(this).data('idxdaftar');

    $.ajax({
        url: baseUrl + "/home/updateHari5",
        type: 'post',
        data: {
            id_kegiatan_detail: id_kegiatan_detail,
            kelas: kelas,
            idxdaftar: idxdaftar
        },
        success: function() {
            document.location.href;
        }
    });

    $.ajax({
        url: baseUrl + "/home/get_cekTotal",
        type: 'post',
        data: {
            idxdaftar: idxdaftar
        },
		dataType: 'json',
        success: function(response) {
            console.log(response.total);
            console.log(response.cost_inacbg);

            var nilai = parseFloat(response.cost_inacbg)*90/100;
            console.log(nilai);

            if((parseFloat(response.total) > parseFloat(nilai)) && (parseFloat(nilai) < parseFloat(response.cost_inacbg))){
                Swal.fire({
                    title: "<h2>Total Biaya Hampir Mencapai Klaim INACBG</h2>",
                    icon: 'warning',
                    html: "<h1> Rp. " + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }


            if(parseFloat(response.total) > parseFloat(response.cost_inacbg)){
                Swal.fire({
                    title: "Total Biaya Telah Mencapai Klaim",
                    icon: 'warning',
                    html: "<h1>" + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }
        }
    });


});

$('.hari6').on('click', function() {
    const id_kegiatan_detail = $(this).data('kegiatandetail');
    const kelas = $(this).data('kelas');
    const idxdaftar = $(this).data('idxdaftar');

    $.ajax({
        url: baseUrl + "/home/updateHari6",
        type: 'post',
        data: {
            id_kegiatan_detail: id_kegiatan_detail,
            kelas: kelas,
            idxdaftar: idxdaftar
        },
        success: function() {
            document.location.href;
        }
    });


    $.ajax({
        url: baseUrl + "/home/get_cekTotal",
        type: 'post',
        data: {
            idxdaftar: idxdaftar
        },
		dataType: 'json',
        success: function(response) {
            console.log(response.total);
            console.log(response.cost_inacbg);

            var nilai = parseFloat(response.cost_inacbg)*90/100;
            console.log(nilai);

            if((parseFloat(response.total) > parseFloat(nilai)) && (parseFloat(nilai) < parseFloat(response.cost_inacbg))){
                Swal.fire({
                    title: "<h2>Total Biaya Hampir Mencapai Klaim INACBG</h2>",
                    icon: 'warning',
                    html: "<h1> Rp. " + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }


            if(parseFloat(response.total) > parseFloat(response.cost_inacbg)){
                Swal.fire({
                    title: "Total Biaya Telah Mencapai Klaim",
                    icon: 'warning',
                    html: "<h1>" + response.cost_inacbg.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +"</h1>"
                });
            }
        }
    });

});