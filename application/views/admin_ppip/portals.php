<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-3">
                    <div>
                        <h4 class="mb-3 mb-md-0 font-weight-bold">
                            <i class="fas fa-cubes text-success mr-2"></i> Data Layanan & Portal PPIP
                        </h4>
                    </div>

                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <a href="<?= base_url('ppip'); ?>" target="_blank" class="btn btn-outline-info mr-2 mb-2 mb-md-0">
                            <i class="fas fa-external-link-alt mr-1"></i> Preview Portal
                        </a>
                        <button type="button" class="btn btn-primary mb-2 mb-md-0" data-toggle="modal" data-target="#modalPortal" onclick="resetPortalForm()">
                            <i class="fa fa-plus-square mr-1"></i> Tambah Portal Baru
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 50px;">No</th>
                                <th style="width: 60px;">Ikon</th>
                                <th>Nama Portal</th>
                                <th>Sub-Judul & Badge</th>
                                <th>Link URL & Domain</th>
                                <th style="width: 60px;">Urutan</th>
                                <th style="width: 70px;">Status</th>
                                <th style="width: 140px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($portals as $p): ?>
                            <tr>
                                <td class="text-center font-weight-bold"><?= $no++; ?></td>
                                <td class="text-center">
                                    <span class="badge badge-light p-2 border">
                                        <i class="<?= htmlspecialchars($p['icon_class'] ?? 'fas fa-globe'); ?> fa-lg text-<?= $p['color_theme'] == 'gold' ? 'warning' : ($p['color_theme'] == 'blue' ? 'primary' : ($p['color_theme'] == 'purple' ? 'purple' : 'success')); ?>"></i>
                                    </span>
                                </td>
                                <td>
                                    <strong class="text-dark"><?= htmlspecialchars($p['portal_name']); ?></strong>
                                    <?php if (!empty($p['description'])): ?>
                                        <div class="small text-muted text-truncate" style="max-width: 320px;" title="<?= htmlspecialchars($p['description']); ?>">
                                            <?= htmlspecialchars($p['description']); ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="font-weight-bold text-secondary"><?= htmlspecialchars($p['subtitle'] ?? '-'); ?></div>
                                    <?php if (!empty($p['badge_tag'])): ?>
                                        <span class="badge badge-info mt-1"><?= htmlspecialchars($p['badge_tag']); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div>
                                        <a href="<?= htmlspecialchars($p['url']); ?>" target="_blank" class="text-primary font-weight-bold">
                                            <?= htmlspecialchars($p['url']); ?> <i class="fas fa-external-link-alt fa-xs ml-1"></i>
                                        </a>
                                    </div>
                                    <small class="text-muted"><i class="fas fa-link mr-1"></i> <?= htmlspecialchars($p['domain_label'] ?? '-'); ?></small>
                                </td>
                                <td class="text-center font-weight-bold"><?= (int) $p['order_num']; ?></td>
                                <td class="text-center">
                                    <?php if (!empty($p['is_active'])): ?>
                                        <span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Aktif</span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary px-2 py-1"><i class="fas fa-eye-slash mr-1"></i> Non-Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-info btn-sm btn-edit-portal mr-1" data-portal='<?= json_encode($p, JSON_HEX_APOS | JSON_HEX_QUOT); ?>' title="Ubah Data">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <a href="<?= base_url('kelola_ppip/delete_portal/' . $p['id']); ?>" class="btn btn-outline-danger btn-sm tombol-hapus" title="Hapus Data">
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

<!-- MODAL TAMBAH / EDIT PORTAL -->
<div class="modal fade" id="modalPortal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url('kelola_ppip/save_portal'); ?>" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="id" id="portal_id" value="">

                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="modalPortalTitle">
                        <i class="fas fa-cubes mr-2"></i> Tambah Portal Layanan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Nama Portal <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="portal_name" id="portal_name" placeholder="Misal: Griya Jurnal" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Sub-Judul</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Misal: Penguatan Tata Kelola Jurnal">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Tag / Badge</label>
                            <input type="text" class="form-control" name="badge_tag" id="badge_tag" placeholder="Misal: OJS & Akreditasi SINTA">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Teks Tombol</label>
                            <input type="text" class="form-control" name="button_text" id="button_text" value="Kunjungi Portal">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label class="font-weight-bold">URL Portal <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" name="url" id="portal_url" placeholder="https://ejournal.uinsaizu.ac.id" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold">Label Domain</label>
                            <input type="text" class="form-control" name="domain_label" id="domain_label" placeholder="ejournal.uinsaizu.ac.id">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Deskripsi Layanan</label>
                        <textarea class="form-control" name="description" id="portal_desc" rows="3" placeholder="Tuliskan gambaran layanan portal ini..."></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold">Class Ikon (FontAwesome)</label>
                            <input type="text" class="form-control" name="icon_class" id="icon_class" value="fas fa-newspaper" placeholder="fas fa-newspaper">
                            <small class="form-text text-muted">Contoh: fas fa-newspaper, fas fa-book-reader, fas fa-chalkboard-teacher, fas fa-scroll</small>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold">Tema Warna</label>
                            <select class="form-control" name="color_theme" id="color_theme">
                                <option value="green">Hijau Emerald (Default)</option>
                                <option value="gold">Emas / Amber</option>
                                <option value="blue">Biru Langit</option>
                                <option value="purple">Ungu / Purple</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="font-weight-bold">Urutan</label>
                            <input type="number" class="form-control" name="order_num" id="order_num" value="1" min="1">
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="font-weight-bold">Status</label>
                            <div class="custom-control custom-switch mt-2">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                                <label class="custom-control-label" for="is_active">Aktif</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Reset Form Modal
    window.resetPortalForm = function () {
        document.getElementById('modalPortalTitle').innerHTML = '<i class="fas fa-cubes mr-2"></i> Tambah Portal Layanan';
        document.getElementById('portal_id').value = '';
        document.getElementById('portal_name').value = '';
        document.getElementById('subtitle').value = '';
        document.getElementById('badge_tag').value = '';
        document.getElementById('portal_url').value = '';
        document.getElementById('button_text').value = 'Kunjungi Portal';
        document.getElementById('domain_label').value = '';
        document.getElementById('portal_desc').value = '';
        document.getElementById('icon_class').value = 'fas fa-globe';
        document.getElementById('color_theme').value = 'green';
        document.getElementById('order_num').value = '1';
        document.getElementById('is_active').checked = true;
    };

    // Tombol Edit
    $('.btn-edit-portal').on('click', function () {
        const portal = $(this).data('portal');
        if (!portal) return;

        document.getElementById('modalPortalTitle').innerHTML = '<i class="fas fa-edit mr-2"></i> Edit Portal: ' + (portal.portal_name || '');
        document.getElementById('portal_id').value = portal.id || '';
        document.getElementById('portal_name').value = portal.portal_name || '';
        document.getElementById('subtitle').value = portal.subtitle || '';
        document.getElementById('badge_tag').value = portal.badge_tag || '';
        document.getElementById('portal_url').value = portal.url || '';
        document.getElementById('button_text').value = portal.button_text || 'Kunjungi Portal';
        document.getElementById('domain_label').value = portal.domain_label || '';
        document.getElementById('portal_desc').value = portal.description || '';
        document.getElementById('icon_class').value = portal.icon_class || 'fas fa-globe';
        document.getElementById('color_theme').value = portal.color_theme || 'green';
        document.getElementById('order_num').value = portal.order_num || 1;
        document.getElementById('is_active').checked = (portal.is_active == 1);

        $('#modalPortal').modal('show');
    });
});
</script>
