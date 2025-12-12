'use strict';

$(function () {
    $("body").on("click", ".tomboledit", function (event) {
        const kode_rekening = $(this).data('kode_rekening');
        $.ajax({
            url: baseUrl + "/perencanaan/get_jegosbyid",
            type: "POST",
            data: {
                kode_rekening: kode_rekening
            },
            dataType: 'json',
            success: function (data) {
                $('#tahun').val(data.tahun);
                $('#kode_organisasi').val(data.kode_organisasi);
                $('#kode_sub_organisasi').val(data.kode_sub_organisasi);
                $('#kode_urusan').val(data.kode_urusan);
                $('#kode_kelompok_urusan').val(data.kode_kelompok_urusan);
                $('#kode_program').val(data.kode_program);
                $('#kode_kegiatan').val(data.kode_kegiatan);
                $('#kode_sub_kegiatan').val(data.kode_sub_kegiatan);
                $('#kode_sumber_dana').val(data.kode_sumber_dana);
                $('#kode_rekening').val(data.kode_rekening);

                $('#uraian_organisasi').val(data.uraian_organisasi);
                $('#uraian_sub_organisasi').val(data.uraian_sub_organisasi);
                $('#uraian_urusan').val(data.uraian_urusan);
                $('#uraian_kelompok_urusan').val(data.uraian_kelompok_urusan);
                $('#uraian_program').val(data.uraian_program);
                $('#uraian_kegiatan').val(data.uraian_kegiatan);
                $('#uraian_sub_kegiatan').val(data.uraian_sub_kegiatan);
                $('#uraian_rekening').val(data.uraian_rekening);
                $('#uraian_sumber_dana').val(data.uraian_sumber_dana);

                $('#jumlah_dpa').val(data.jumlah_dpa);

                $('#rko_keuangan_bl_01').val(data.rko_keuangan_bl_01);
                $('#rko_keuangan_bl_02').val(data.rko_keuangan_bl_02);
                $('#rko_keuangan_bl_03').val(data.rko_keuangan_bl_03);
                $('#rko_keuangan_bl_04').val(data.rko_keuangan_bl_04);
                $('#rko_keuangan_bl_05').val(data.rko_keuangan_bl_05);
                $('#rko_keuangan_bl_06').val(data.rko_keuangan_bl_06);
                $('#rko_keuangan_bl_07').val(data.rko_keuangan_bl_07);
                $('#rko_keuangan_bl_08').val(data.rko_keuangan_bl_08);
                $('#rko_keuangan_bl_09').val(data.rko_keuangan_bl_09);
                $('#rko_keuangan_bl_10').val(data.rko_keuangan_bl_10);
                $('#rko_keuangan_bl_11').val(data.rko_keuangan_bl_11);
                $('#rko_keuangan_bl_12').val(data.rko_keuangan_bl_12);

                $('#persentase_rko_fisik_bl_01').val(data.persentase_rko_fisik_bl_01);
                $('#persentase_rko_fisik_bl_02').val(data.persentase_rko_fisik_bl_02);
                $('#persentase_rko_fisik_bl_03').val(data.persentase_rko_fisik_bl_03);
                $('#persentase_rko_fisik_bl_04').val(data.persentase_rko_fisik_bl_04);
                $('#persentase_rko_fisik_bl_05').val(data.persentase_rko_fisik_bl_05);
                $('#persentase_rko_fisik_bl_06').val(data.persentase_rko_fisik_bl_06);
                $('#persentase_rko_fisik_bl_07').val(data.persentase_rko_fisik_bl_07);
                $('#persentase_rko_fisik_bl_08').val(data.persentase_rko_fisik_bl_08);
                $('#persentase_rko_fisik_bl_09').val(data.persentase_rko_fisik_bl_09);
                $('#persentase_rko_fisik_bl_10').val(data.persentase_rko_fisik_bl_10);
                $('#persentase_rko_fisik_bl_11').val(data.persentase_rko_fisik_bl_11);
                $('#persentase_rko_fisik_bl_12').val(data.persentase_rko_fisik_bl_12);

                $('#rfk_keuangan_bl_01').val(data.rfk_keuangan_bl_01);
                $('#rfk_keuangan_bl_02').val(data.rfk_keuangan_bl_02);
                $('#rfk_keuangan_bl_03').val(data.rfk_keuangan_bl_03);
                $('#rfk_keuangan_bl_04').val(data.rfk_keuangan_bl_04);
                $('#rfk_keuangan_bl_05').val(data.rfk_keuangan_bl_05);
                $('#rfk_keuangan_bl_06').val(data.rfk_keuangan_bl_06);
                $('#rfk_keuangan_bl_07').val(data.rfk_keuangan_bl_07);
                $('#rfk_keuangan_bl_08').val(data.rfk_keuangan_bl_08);
                $('#rfk_keuangan_bl_09').val(data.rfk_keuangan_bl_09);
                $('#rfk_keuangan_bl_10').val(data.rfk_keuangan_bl_10);
                $('#rfk_keuangan_bl_11').val(data.rfk_keuangan_bl_11);
                $('#rfk_keuangan_bl_12').val(data.rfk_keuangan_bl_12);

                $('#persentase_rfk_keu_bl_01').val(data.persentase_rfk_keu_bl_01);
                $('#persentase_rfk_keu_bl_02').val(data.persentase_rfk_keu_bl_02);
                $('#persentase_rfk_keu_bl_03').val(data.persentase_rfk_keu_bl_03);
                $('#persentase_rfk_keu_bl_04').val(data.persentase_rfk_keu_bl_04);
                $('#persentase_rfk_keu_bl_05').val(data.persentase_rfk_keu_bl_05);
                $('#persentase_rfk_keu_bl_06').val(data.persentase_rfk_keu_bl_06);
                $('#persentase_rfk_keu_bl_07').val(data.persentase_rfk_keu_bl_07);
                $('#persentase_rfk_keu_bl_08').val(data.persentase_rfk_keu_bl_08);
                $('#persentase_rfk_keu_bl_09').val(data.persentase_rfk_keu_bl_09);
                $('#persentase_rfk_keu_bl_10').val(data.persentase_rfk_keu_bl_10);
                $('#persentase_rfk_keu_bl_11').val(data.persentase_rfk_keu_bl_11);
                $('#persentase_rfk_keu_bl_12').val(data.persentase_rfk_keu_bl_12);

                $('#modal-edit').modal("show");
            }
        });
    })
})