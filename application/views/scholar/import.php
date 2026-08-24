<style>
/* ============================================
   IMPORT PAGE — Shared Premium Design
   ============================================ */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

.imp-wrapper { font-family: 'Inter', sans-serif; }

/* ---- Upload Card ---- */
.imp-upload-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #edf2f7;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    overflow: hidden;
    margin-bottom: 24px;
}

.imp-upload-header {
    background: linear-gradient(135deg, #2563eb 0%, #6366f1 100%);
    padding: 20px 28px;
    display: flex;
    align-items: center;
    gap: 14px;
}

.imp-upload-header .ih-icon {
    width: 44px;
    height: 44px;
    background: rgba(255,255,255,0.18);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.imp-upload-header .ih-title {
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    margin: 0;
    line-height: 1.2;
}

.imp-upload-header .ih-sub {
    font-size: 12px;
    color: rgba(255,255,255,0.72);
    margin-top: 2px;
}

.imp-upload-body {
    padding: 24px 28px;
}

/* Flash Alert */
.imp-alert {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    border-left: 4px solid #2563eb;
    border-radius: 10px;
    padding: 14px 16px;
    margin-bottom: 20px;
    font-size: 13.5px;
    color: #1e40af;
    font-weight: 500;
}

.imp-alert .alert-icon { font-size: 18px; flex-shrink: 0; margin-top: 1px; }

/* Upload Zone */
.imp-drop-zone {
    border: 2px dashed #c7d9ff;
    border-radius: 12px;
    padding: 32px 20px;
    text-align: center;
    background: #f8fafc;
    transition: all 0.2s;
    cursor: pointer;
    margin-bottom: 20px;
    position: relative;
}

.imp-drop-zone:hover,
.imp-drop-zone.dragover {
    border-color: #3b6fe0;
    background: #eef4ff;
}

.imp-drop-zone .dz-icon { font-size: 36px; margin-bottom: 10px; display: block; }
.imp-drop-zone .dz-title { font-size: 15px; font-weight: 700; color: #1e293b; margin-bottom: 4px; }
.imp-drop-zone .dz-sub { font-size: 12px; color: #64748b; margin-bottom: 16px; }
.imp-drop-zone .dz-formats { display: inline-flex; gap: 6px; }

.dz-format-badge {
    background: #e0f2fe;
    color: #0284c7;
    border: 1px solid #bae6fd;
    border-radius: 6px;
    padding: 2px 10px;
    font-size: 11px;
    font-weight: 700;
}

.imp-file-input {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
}

.imp-file-name {
    font-size: 12px;
    color: #475569;
    margin-top: 10px;
    display: none;
}

.imp-actions {
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
}

.btn-imp-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 24px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg, #2563eb, #6366f1);
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    font-family: 'Inter', sans-serif;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 4px 14px rgba(37,99,235,0.4);
    text-decoration: none;
}

.btn-imp-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(37,99,235,0.5);
    color: #fff;
    text-decoration: none;
}

.imp-hint {
    font-size: 12px;
    color: #94a3b8;
    display: flex;
    align-items: center;
    gap: 5px;
}

/* ---- Stats Bar ---- */
.imp-stats-bar {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.imp-stat-pill {
    background: #fff;
    border: 1px solid #edf2f7;
    border-radius: 10px;
    padding: 10px 18px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    font-size: 13px;
}

.imp-stat-pill .sp-val {
    font-size: 20px;
    font-weight: 800;
    color: #1e293b;
    line-height: 1;
}

.imp-stat-pill .sp-lab {
    font-size: 10px;
    font-weight: 600;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    margin-top: 2px;
}

/* ---- Data Table Card ---- */
.imp-table-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #edf2f7;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    overflow: hidden;
    margin-bottom: 24px;
}

.imp-table-header {
    padding: 18px 24px;
    border-bottom: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #f8fafc;
    flex-wrap: wrap;
    gap: 10px;
}

.imp-table-title {
    font-size: 15px;
    font-weight: 700;
    color: #1e293b;
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
}

.imp-table-body { padding: 0; }

/* Custom Table */
.imp-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
    font-family: 'Inter', sans-serif;
}

.imp-table thead th {
    padding: 11px 14px;
    text-align: left;
    font-size: 10.5px;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: #f8fafc;
    border-bottom: 2px solid #edf2f7;
    white-space: nowrap;
}

.imp-table tbody tr {
    border-bottom: 1px solid #f1f5f9;
    transition: background 0.15s;
}

.imp-table tbody tr:last-child { border-bottom: none; }
.imp-table tbody tr:hover { background: #f8fafc; }

.imp-table td {
    padding: 11px 14px;
    vertical-align: top;
    color: #334155;
    line-height: 1.45;
}

.imp-table td.no-col { color: #94a3b8; font-weight: 600; width: 40px; }
.imp-table td.year-col { font-weight: 700; color: #1e293b; white-space: nowrap; }
.imp-table td.title-col { font-weight: 600; color: #1e293b; max-width: 300px; }
.imp-table td.journal-col { color: #475569; font-style: italic; }
.imp-table td.author-main { color: #334155; }
.imp-table td.author-sub { color: #64748b; font-size: 12px; }

.cit-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    background: #f0fdf4;
    color: #16a34a;
    border: 1px solid #bbf7d0;
    border-radius: 8px;
    padding: 2px 8px;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
}

.cit-badge.zero { background: #f8fafc; color: #94a3b8; border-color: #e2e8f0; }

.accred-badge {
    display: inline-block;
    padding: 2px 8px;
    border-radius: 6px;
    font-size: 10.5px;
    font-weight: 700;
    white-space: nowrap;
}

.accred-badge.s1 { background: #fef3c7; color: #d97706; border: 1px solid #fde68a; }
.accred-badge.s2 { background: #dbeafe; color: #2563eb; border: 1px solid #bfdbfe; }
.accred-badge.s3 { background: #dcfce7; color: #16a34a; border: 1px solid #bbf7d0; }
.accred-badge.other { background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; }
</style>

<div class="imp-wrapper">

<!-- ======================== UPLOAD CARD ======================== -->
<div class="imp-upload-card">
    <div class="imp-upload-header">
        <div class="ih-icon">📥</div>
        <div>
            <div class="ih-title">Import Google Scholar Publications</div>
            <div class="ih-sub">Upload file Excel (.xls / .xlsx) untuk sinkronisasi data publikasi Scholar</div>
        </div>
    </div>
    <div class="imp-upload-body">

        <!-- Flash Alert -->
        <?php if ($this->session->flashdata('msg')): ?>
        <div class="imp-alert">
            <span class="alert-icon">ℹ️</span>
            <span><?= $this->session->flashdata('msg') ?></span>
        </div>
        <?php endif; ?>

        <!-- Upload Form -->
        <form action="<?= base_url('scholar/import_process') ?>" method="post" enctype="multipart/form-data" id="scholarImportForm">
            <div class="imp-drop-zone" id="scholarDropZone">
                <input type="file" name="file" class="imp-file-input" accept=".xls,.xlsx"
                       required id="scholarFileInput" onchange="showFileName(this, 'scholarFileName')">
                <span class="dz-icon">📊</span>
                <div class="dz-title">Klik atau seret file Excel ke sini</div>
                <div class="dz-sub">Format yang didukung:</div>
                <div class="dz-formats">
                    <span class="dz-format-badge">.XLS</span>
                    <span class="dz-format-badge">.XLSX</span>
                </div>
            </div>
            <div class="imp-file-name" id="scholarFileName">📎 Belum ada file dipilih</div>

            <div class="imp-actions" style="margin-top:16px;">
                <button type="submit" class="btn-imp-primary">
                    ⬆️ Mulai Import
                </button>
                <span class="imp-hint">⚠️ Data duplikat (identifier + tahun) akan dilewati otomatis</span>
            </div>
        </form>
    </div>
</div>

<!-- ======================== STATS BAR ======================== -->
<?php
    $total_scholar     = count($result ?? []);
    $total_cit_scholar = array_sum(array_column($result ?? [], 'citation'));
    $years_scholar     = array_unique(array_column($result ?? [], 'year'));
?>
<div class="imp-stats-bar">
    <div class="imp-stat-pill">
        <div>
            <div class="sp-val"><?= number_format($total_scholar) ?></div>
            <div class="sp-lab">Total Publikasi</div>
        </div>
    </div>
    <div class="imp-stat-pill">
        <div>
            <div class="sp-val"><?= number_format($total_cit_scholar) ?></div>
            <div class="sp-lab">Total Sitasi</div>
        </div>
    </div>
    <div class="imp-stat-pill">
        <div>
            <div class="sp-val"><?= count($years_scholar) ?></div>
            <div class="sp-lab">Rentang Tahun</div>
        </div>
    </div>
</div>

<!-- ======================== DATA TABLE ======================== -->
<div class="imp-table-card">
    <div class="imp-table-header">
        <h5 class="imp-table-title">📋 Data Google Scholar Publication</h5>
        <span style="font-size:12px; color:#64748b;"><?= number_format($total_scholar) ?> entri · diurutkan terbaru</span>
    </div>
    <div class="imp-table-body">
        <div class="table-responsive">
            <table id="tableScholar" class="imp-table" style="width:100%">
                <thead>
                    <tr>
                        <th class="no-col">#</th>
                        <th>Dosen (SINTA)</th>
                        <th>Akreditasi</th>
                        <th>Judul</th>
                        <th>Jurnal</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Sitasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($result as $data): ?>
                    <tr>
                        <td class="no-col"><?= $no++ ?></td>
                        <td class="author-main"><?= htmlspecialchars(getAuthor($data['author_id'], 'name')) ?></td>
                        <td>
                            <?php
                                $acc = strtolower(trim($data['accreditation'] ?? ''));
                                $acc_class = str_starts_with($acc,'s1') ? 's1' : (str_starts_with($acc,'s2') ? 's2' : (str_starts_with($acc,'s3') ? 's3' : 'other'));
                            ?>
                            <span class="accred-badge <?= $acc_class ?>"><?= htmlspecialchars($data['accreditation'] ?? '—') ?></span>
                        </td>
                        <td class="title-col"><?= htmlspecialchars($data['title'] ?? '') ?></td>
                        <td class="journal-col"><?= htmlspecialchars($data['journal'] ?? '') ?></td>
                        <td class="author-sub"><?= htmlspecialchars($data['author'] ?? '') ?></td>
                        <td class="year-col"><?= htmlspecialchars($data['year'] ?? '') ?></td>
                        <td>
                            <span class="cit-badge <?= ($data['citation'] ?? 0) == 0 ? 'zero' : '' ?>">
                                💬 <?= number_format((int)($data['citation'] ?? 0)) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div><!-- end .imp-wrapper -->

<script>
// Show file name when selected
function showFileName(input, labelId) {
    const label = document.getElementById(labelId);
    if (input.files && input.files.length > 0) {
        label.textContent = '📎 ' + input.files[0].name;
        label.style.display = 'block';
    }
}

// Drag & drop highlight
(function() {
    const zone = document.getElementById('scholarDropZone');
    if (!zone) return;
    zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('dragover'); });
    zone.addEventListener('dragleave', () => zone.classList.remove('dragover'));
    zone.addEventListener('drop', e => { e.preventDefault(); zone.classList.remove('dragover'); });
})();
</script>
