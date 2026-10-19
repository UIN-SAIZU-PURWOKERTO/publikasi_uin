<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-3">
                    <div>
                        <h4 class="mb-3 mb-md-0 font-weight-bold">
                            <i class="fas fa-bullhorn text-warning mr-2"></i> Data Informasi & Agenda PPIP
                        </h4>
                    </div>

                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <a href="<?= base_url('ppip#informasi'); ?>" target="_blank" class="btn btn-outline-info mr-2 mb-2 mb-md-0">
                            <i class="fas fa-external-link-alt mr-1"></i> Preview di Landing
                        </a>
                        <button type="button" class="btn btn-primary mb-2 mb-md-0" data-toggle="modal" data-target="#modalAgenda" onclick="resetAgendaForm()">
                            <i class="fa fa-plus-square mr-1"></i> Tambah Agenda / Pengumuman
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 50px;">No</th>
                                <th>Kategori</th>
                                <th>Judul Informasi / Agenda</th>
                                <th>Jadwal / Waktu</th>
                                <th>Deskripsi Ringkas</th>
                                <th style="width: 60px;">Urutan</th>
                                <th style="width: 70px;">Status</th>
                                <th style="width: 140px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($agendas as $ag): ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?= $no++; ?></td>
                                <td class="text-center">
                                    <span class="badge badge-<?= $ag['category_class'] == 'buku' ? 'warning' : ($ag['category_class'] == 'konferensi' ? 'info' : 'success'); ?> px-2 py-1">
                                        <?= htmlspecialchars($ag['category']); ?>
                                    </span>
                                </td>
                                <td>
                                    <strong class="text-dark font-weight-bold"><?= htmlspecialchars($ag['title']); ?></strong>
                                    <?php if (!empty($ag['link_url']) && $ag['link_url'] != '#'): ?>
                                        <div class="mt-1">
                                            <a href="<?= htmlspecialchars($ag['link_url']); ?>" target="_blank" class="small text-primary">
                                                <i class="fas fa-external-link-alt mr-1"></i> <?= htmlspecialchars($ag['link_text'] ?: 'Kunjungi Tautan'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <i class="far fa-calendar-alt text-muted mr-1"></i>
                                    <?= htmlspecialchars($ag['event_date'] ?? '-'); ?>
                                </td>
                                <td>
                                    <div class="small text-muted text-truncate" style="max-width: 280px;" title="<?= htmlspecialchars($ag['description'] ?? ''); ?>">
                                        <?= htmlspecialchars($ag['description'] ?? '-'); ?>
                                    </div>
                                </td>
                                <td class="text-center font-weight-bold"><?= (int) $ag['order_num']; ?></td>
                                <td class="text-center">
                                    <?php if (!empty($ag['is_active'])): ?>
                                        <span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Tayang</span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary px-2 py-1"><i class="fas fa-eye-slash mr-1"></i> Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-info btn-sm btn-edit-agenda mr-1" data-agenda='<?= json_encode($ag, JSON_HEX_APOS | JSON_HEX_QUOT); ?>' title="Ubah Data">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <a href="<?= base_url('kelola_ppip/delete_agenda/' . $ag['id']); ?>" class="btn btn-outline-danger btn-sm tombol-hapus" title="Hapus Data">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
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

<!-- MODAL TAMBAH / EDIT AGENDA -->
<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url('kelola_ppip/save_agenda'); ?>" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="id" id="agenda_id" value="">

                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="modalAgendaTitle">
                        <i class="fas fa-bullhorn mr-2"></i> Tambah Informasi / Agenda
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Judul Informasi / Kegiatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="agenda_title" placeholder="Misal: Workshop Penulisan Artikel Terindeks Scopus" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Kategori</label>
                            <input type="text" class="form-control" name="category" id="agenda_category" placeholder="Misal: Jurnal / Penerbitan / Konferensi / Pelatihan" value="Jurnal" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Warna Label Kategori</label>
                            <select class="form-control" name="category_class" id="agenda_category_class">
                                <option value="jurnal">Hijau (Jurnal / Publikasi)</option>
                                <option value="buku">Kuning / Amber (Penerbitan Buku)</option>
                                <option value="konferensi">Biru (Konferensi & Seminar)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Waktu / Jadwal Pelaksanaan</label>
                            <input type="text" class="form-control" name="event_date" id="agenda_date" placeholder="Misal: 25 November 2026 / Terjadwal 2026">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Teks Tombol Tautan</label>
                            <input type="text" class="form-control" name="link_text" id="agenda_link_text" value="Baca Selengkapnya">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">URL Tautan Eksternal / Pedoman</label>
                        <input type="text" class="form-control" name="link_url" id="agenda_link_url" placeholder="https://... atau isi # jika tidak ada tautan" value="#">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Deskripsi Ringkas Kegiatan</label>
                        <textarea class="form-control" name="description" id="agenda_desc" rows="3" placeholder="Tuliskan keterangan singkat mengenai pengumuman atau agenda ini..."></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Urutan Tampil</label>
                            <input type="number" class="form-control" name="order_num" id="agenda_order_num" value="1" min="1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Status Publikasi</label>
                            <div class="custom-control custom-switch mt-2">
                                <input type="checkbox" class="custom-control-input" id="agenda_is_active" name="is_active" value="1" checked>
                                <label class="custom-control-label" for="agenda_is_active">Tayang di Landing Page</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Simpan Agenda
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Reset Form Modal
    window.resetAgendaForm = function () {
        document.getElementById('modalAgendaTitle').innerHTML = '<i class="fas fa-bullhorn mr-2"></i> Tambah Informasi / Agenda';
        document.getElementById('agenda_id').value = '';
        document.getElementById('agenda_title').value = '';
        document.getElementById('agenda_category').value = 'Jurnal';
        document.getElementById('agenda_category_class').value = 'jurnal';
        document.getElementById('agenda_date').value = '';
        document.getElementById('agenda_link_text').value = 'Baca Selengkapnya';
        document.getElementById('agenda_link_url').value = '#';
        document.getElementById('agenda_desc').value = '';
        document.getElementById('agenda_order_num').value = '1';
        document.getElementById('agenda_is_active').checked = true;
    };

    // Tombol Edit
    $('.btn-edit-agenda').on('click', function () {
        const agenda = $(this).data('agenda');
        if (!agenda) return;

        document.getElementById('modalAgendaTitle').innerHTML = '<i class="fas fa-edit mr-2"></i> Edit Informasi: ' + (agenda.title || '');
        document.getElementById('agenda_id').value = agenda.id || '';
        document.getElementById('agenda_title').value = agenda.title || '';
        document.getElementById('agenda_category').value = agenda.category || 'Jurnal';
        document.getElementById('agenda_category_class').value = agenda.category_class || 'jurnal';
        document.getElementById('agenda_date').value = agenda.event_date || '';
        document.getElementById('agenda_link_text').value = agenda.link_text || 'Baca Selengkapnya';
        document.getElementById('agenda_link_url').value = agenda.link_url || '#';
        document.getElementById('agenda_desc').value = agenda.description || '';
        document.getElementById('agenda_order_num').value = agenda.order_num || 1;
        document.getElementById('agenda_is_active').checked = (agenda.is_active == 1);

        $('#modalAgenda').modal('show');
    });
});
</script>
