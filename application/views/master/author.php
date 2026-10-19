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
                                <td class="text-nowrap">
                                    <a href="<?= base_url('dashboard/detail/' . $data['id']); ?>" target="_blank"
                                        class="btn btn-outline-info btn-sm mr-1" title="Lihat Detail Author">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
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
                                    <span class="prodi-nama font-weight-bold"><?= htmlspecialchars((string) getProdi($data['prodi_id'], 'nama_program_studi')); ?></span>
                                    <button type="button" class="btn btn-sm btn-primary ml-1 btn-pilih-prodi" data-toggle="modal" data-target="#modalProdi"
                                        data-id="<?= $data['id']; ?>" data-name="<?= htmlspecialchars((string) $data['name']); ?>">
                                        Pilih Prodi
                                    </button>
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="modalProdiLabel">Pilih Program Studi</h5>
                    <small class="text-muted" id="modalAuthorName"></small>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body p-2">
                <input type="hidden" id="selected_author_id" value="">
                <div class="form-group px-2 pt-1 mb-2">
                    <input type="text" id="cariProdi" class="form-control" placeholder="Ketik untuk mencari Program Studi...">
                </div>
                <div style="max-height: 380px; overflow-y: auto;">
                    <ul class="list-group" id="listProdiContainer">
                        <?php foreach ($listProdi as $p): ?>
                        <li class="list-group-item list-group-item-action pilih-prodi" style="cursor: pointer;"
                            data-id="<?= $p['id']; ?>"
                            data-nama="<?= htmlspecialchars($p['nama_program_studi']); ?>">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><?= htmlspecialchars($p['nama_program_studi']); ?></span>
                                <span class="badge badge-primary badge-pill"><?= htmlspecialchars($p['nama_jenjang_pendidikan']); ?></span>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // Filter pencarian prodi di dalam modal
    $('#cariProdi').on('keyup', function() {
        let value = $(this).val().toLowerCase();
        $('#listProdiContainer li').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Tangkap data author saat modal dibuka via event Bootstrap 4
    $('#modalProdi').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget);
        let authorId = button.data('id');
        let authorName = button.data('name') || '';

        $('#selected_author_id').val(authorId);
        if (authorName) {
            $('#modalAuthorName').text('Author: ' + authorName);
        } else {
            $('#modalAuthorName').text('Author ID: ' + authorId);
        }

        // Reset pencarian
        $('#cariProdi').val('');
        $('#listProdiContainer li').show();
    });

    $('#modalProdi').on('shown.bs.modal', function() {
        $('#cariProdi').trigger('focus');
    });

    // Tangkap klik pilihan prodi
    $(document).on('click', '.pilih-prodi', function() {
        let prodiID = $(this).data('id');
        let prodiNama = $(this).data('nama');
        let authorId = $('#selected_author_id').val();

        if (!authorId || !prodiID) {
            Swal.fire({
                icon: 'error',
                title: 'Data Tidak Lengkap',
                text: 'Author ID atau Program Studi tidak valid.'
            });
            return;
        }

        $('#modalProdi').modal('hide');
        let $cell = $('td[data-author="' + authorId + '"]');
        let ajaxUrl = "<?= base_url('master/update_prodi_author'); ?>";
        if (window.location.protocol === 'https:' && ajaxUrl.indexOf('http:') === 0) {
            ajaxUrl = ajaxUrl.replace(/^http:/, 'https:');
        }

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            dataType: "json",
            data: {
                author_id: authorId,
                prodi_id: prodiID,
                '<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'
            },
            success: function(response) {
                if (response.status === 'success') {
                    let newHtml = `<span class="prodi-nama font-weight-bold">${prodiNama}</span> <button type="button" class="btn btn-sm btn-primary ml-1 btn-pilih-prodi" data-toggle="modal" data-target="#modalProdi" data-id="${authorId}">Pilih Prodi</button>`;

                    // Sinkronkan dengan DataTables jika aktif agar tidak hilang saat sorting/paging
                    if (window.jQuery && $.fn.DataTable && $.fn.DataTable.isDataTable('#example1')) {
                        let table = $('#example1').DataTable();
                        let cell = table.cell($cell);
                        if (cell && cell.any()) {
                            cell.data(newHtml).draw(false);
                        } else {
                            $cell.html(newHtml);
                        }
                    } else {
                        $cell.html(newHtml);
                    }

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true
                    });

                    Toast.fire({
                        icon: 'success',
                        title: response.message || 'Program Studi berhasil diperbarui!'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message || 'Gagal update program studi!'
                    });
                }
            },
            error: function(xhr, status, error) {
                let msg = 'Gagal menghubungi server.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan Server',
                    text: msg
                });
            }
        });
    });

});
</script>