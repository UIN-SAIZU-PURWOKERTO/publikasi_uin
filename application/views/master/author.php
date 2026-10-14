<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Form Data Author</h4>
                    </div>

                    <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <button type="button" class="btn btn-primary mb-2 mb-md-0" data-toggle="modal"
                            data-target="#modal-xl">
                            <i class="fa fa-plus-square"></i>
                            Tambah Data
                        </button>
                    </div> -->

                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <button type="button" class="btn btn-success mb-2 mb-md-0" data-toggle="modal"
                            data-target="#modalImportAuthor" id="btnImportAuthor">
                            <i class="fa fa-file-excel"></i>
                            Import Excel
                        </button>
                        <a href="<?= base_url('master/syncAffiliationAuthors'); ?>"
                            class="btn btn-outline-primary mb-2 mb-md-0 ml-2" id="btnSyncAffiliationAuthors"
                            title="Samakan tabel sinta_affiliations_authors dengan data author terbaru">
                            <i class="fa fa-sync"></i>
                            Sinkronkan Afiliasi
                        </a>
                    </div>
                </div>

                <?php $importResult = $this->session->flashdata('import_author_result'); ?>
                <?php if (!empty($importResult)) : ?>
                <div class="alert alert-success alert-dismissible" id="importAuthorResult">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h5 class="mb-2"><i class="fa fa-check-circle"></i> Hasil Import Author</h5>
                    <div>
                        Data valid di file: <b><?= (int) $importResult['total']; ?></b> &middot;
                        Diperbarui: <b><?= (int) $importResult['updated']; ?></b> &middot;
                        Ditambahkan: <b><?= (int) $importResult['inserted']; ?></b> &middot;
                        Dipulihkan: <b><?= (int) $importResult['restored']; ?></b> &middot;
                        Ditandai terhapus: <b><?= (int) $importResult['deleted']; ?></b> &middot;
                        Prodi terisi otomatis: <b><?= (int) $importResult['prodi_matched']; ?></b>
                        <?php if (!empty($importResult['skipped'])) : ?>
                        &middot; Baris dilewati (SINTAID kosong/tidak valid): <b><?= (int) $importResult['skipped']; ?></b>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($importResult['aff_sync'])) : ?>
                    <div class="mt-1">
                        <i class="fa fa-sync"></i> Sinkron <code>sinta_affiliations_authors</code>:
                        <b><?= (int) $importResult['aff_sync']['updated']; ?></b> diperbarui &middot;
                        <b><?= (int) $importResult['aff_sync']['inserted']; ?></b> ditambahkan &middot;
                        <b><?= (int) $importResult['aff_sync']['deleted']; ?></b> dihapus
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($importResult['prodi_unmatched'])) : ?>
                    <div class="mt-2">
                        <i class="fa fa-exclamation-triangle"></i>
                        Prodi berikut tidak cocok dengan Master Prodi, silakan pilih manual:
                        <em><?= htmlspecialchars(implode(', ', $importResult['prodi_unmatched'])); ?></em>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($importResult['missing_headers'])) : ?>
                    <div class="mt-2">
                        <i class="fa fa-exclamation-triangle"></i>
                        Kolom berikut tidak ditemukan di file (tidak diupdate):
                        <em><?= htmlspecialchars(implode(', ', $importResult['missing_headers'])); ?></em>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>


                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>ID Sinta</th>
                                <th>NIDN</th>
                                <th>Author</th>
                                <th>Jabatan Fungsional</th>
                                <th>Department Sinta</th>
                                <th>Subjects</th>
                                <th>Program Studi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
								foreach ($result as $data) : ?>
                            <tr>
                                <td>

                                    <a href="<?= base_url('master/hapusauthor/'); ?><?php echo $data['id']; ?>"
                                        class="btn btn-outline-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i>
                                        Hapus
                                    </a>
                                </td>
                                <td><?= $no++; ?></td>
                                <td><?= $data['id']; ?></td>
                                <td><?= htmlspecialchars((string) $data['nidn']); ?></td>
                                <td><?= $data['name']; ?></td>
                                <td><?= htmlspecialchars((string) $data['jabatan_fungsional']); ?></td>
                                <td><?= $data['department']; ?></td>
                                <td><?= $data['subjects']; ?></td>
                                <td data-author="<?= $data['id']; ?>">

                                    <b><?= getProdi($data['prodi_id'], 'nama_program_studi'); ?></b>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalProdi"
                                        data-id="<?= $data['id']; ?>">
                                        Pilih Prodi
                                    </button>

                                    <!-- hidden input untuk menyimpan ID prodi -->
                                    <input type="hidden" id="prodi_id" name="prodi_id"
                                        value="<?= $data['prodi_id']; ?>">
                                    <input type="hidden" id="author_id" name="author_id" value="<?= $data['id']; ?>">
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ========== MODAL IMPORT EXCEL AUTHOR ========== -->
<div class="modal fade" id="modalImportAuthor" tabindex="-1" role="dialog" aria-labelledby="modalImportAuthorLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('master/importAuthor'); ?>" method="post" enctype="multipart/form-data"
                id="formImportAuthor">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalImportAuthorLabel">Import Data Author dari Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="importAuthorFile">File Excel (.xlsx / .xls / .csv)</label>
                        <input type="file" class="form-control-file" name="file" id="importAuthorFile"
                            accept=".xls,.xlsx,.csv" required>
                        <small class="form-text text-muted">
                            Data dicocokkan berdasarkan kolom <b>SINTAID</b>. Kolom dibaca berdasarkan nama header
                            (NIDN, NAMA, PRODI, SINTA SCORE, DOKUMEN/SITASI/H-Index SCOPUS, GS, WOS, GARUDA, dst).
                        </small>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="mark_missing" value="1"
                            id="importAuthorMarkMissing" checked>
                        <label class="custom-control-label" for="importAuthorMarkMissing">
                            Tandai author yang <b>tidak ada</b> di file sebagai terhapus
                        </label>
                    </div>
                    <small class="form-text text-warning">
                        Pastikan file berisi <b>seluruh</b> author jika opsi ini dicentang.
                    </small>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="btnSubmitImportAuthor">
                        <i class="fa fa-upload"></i> Mulai Import
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    $('#formImportAuthor').on('submit', function() {
        $('#btnSubmitImportAuthor').prop('disabled', true)
            .html('<i class="fa fa-spinner fa-spin"></i> Memproses...');
    });
});
</script>
<!-- ========== MODAL PILIH PRODI (BOOTSTRAP 4) ========== -->
<div class="modal fade" id="modalProdi" tabindex="-1" role="dialog" aria-labelledby="modalProdiLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalProdiLabel">Pilih Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body p-0">
                <ul class="list-group">
                    <?php foreach ($listProdi as $p): ?>
                    <li class="list-group-item pilih-prodi" data-id="<?= $p['id']; ?>"
                        data-nama="<?= $p['nama_program_studi']; ?>">
                        <?= $p['nama_program_studi']; ?> (<?= $p['nama_jenjang_pendidikan']; ?>)
                    </li>
                    <?php endforeach; ?>
                </ul>

                <input type="text" id="selected_author_id">
            </div>

        </div>
    </div>
</div>

<!-- <script>
$(document).ready(function() {

    $('#modalProdi').on('show.bs.modal', function(event) {
        let authorId = button.data('id'); // ambil data-id dari button
        console.log("Author ID:", authorId);
        // tampilkan ke judul modal
        $('#modalProdiLabel').text('Pilih Program Studi (ID: ' + authorId + ')');

        // atau tampilkan ke body modal
        $('#modalProdi .modal-body').prepend(
            '<div class="alert alert-info mb-2" id="infoId">Author ID: ' + authorId + '</div>'
        );
    });

    // supaya tidak dobel setiap buka modal
    // $('#modalProdi').on('hidden.bs.modal', function() {
    //     $('#infoId').remove();
    // });

});
</script> -->

<script>
$(document).on('click', '[data-target="#modalProdi"]', function() {
    currentAuthorId = $(this).data('id');
    console.log("Author ID dikirim:", currentAuthorId);
});
</script>
<script>
let currentAuthorId = null;

document.addEventListener("DOMContentLoaded", function() {

    // tangkap tombol klik
    $(document).on('click', '[data-target="#modalProdi"]', function() {
        currentAuthorId = $(this).data('id');
        console.log("Author aktif:", currentAuthorId);
    });

    // klik prodi
    $(document).on("click", ".pilih-prodi", function() {

        let prodiID = $(this).data("id");
        let prodiNama = $(this).data("nama");

        // update tampilan baris yang sesuai
        let row = $('td[data-author="' + currentAuthorId + '"]');

        row.html(`
            ${prodiNama}
            <button class="btn btn-sm btn-primary ml-2" data-toggle="modal" data-target="#modalProdi" data-id="${currentAuthorId}">
                Pilih Prodi
            </button>
            <input type="hidden" class="prodi_id" name="prodi_id" value="${prodiID}">
            <input type="hidden" class="author_id" name="author_id" value="${currentAuthorId}">
        `);

        $("#modalProdi").modal("hide");

        // AJAX kirim data yang BENAR
        $.ajax({
            url: "<?= base_url('master/update_prodau'); ?>",
            type: "POST",
            data: {
                author_id: currentAuthorId,
                prodi_id: prodiID
            },
            success: function(response) {
                console.log("Updated:", response);
            },
            error: function() {
                alert("Gagal update prodi!");
            }
        });

    });

});
</script>