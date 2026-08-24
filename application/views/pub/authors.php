<style>
/* =========================================================
   AUTHORS PAGE — Modern Informative Design
   ========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

* { box-sizing: border-box; }

/* ---- Filter Bar ---- */
.filter-bar {
    background: #fff;
    border-radius: 16px;
    padding: 20px 24px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    border: 1px solid #edf2f7;
    margin-bottom: 28px;
}

.filter-bar form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    justify-content: center;
}

.filter-search-wrap {
    position: relative;
    flex: 1 1 260px;
    min-width: 200px;
}

.filter-search-wrap .search-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 15px;
}

.filter-search-wrap input[type="text"] {
    width: 100%;
    padding: 10px 16px 10px 40px;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    font-size: 14px;
    font-family: 'Inter', sans-serif;
    background: #f8fafc;
    transition: all 0.2s;
}

.filter-search-wrap input[type="text"]:focus {
    outline: none;
    border-color: #4f8ef7;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(79,142,247,0.12);
}

.filter-select {
    padding: 10px 14px;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    font-size: 13px;
    font-family: 'Inter', sans-serif;
    background: #f8fafc;
    color: #334155;
    cursor: pointer;
    transition: all 0.2s;
    min-width: 150px;
}

.filter-select:focus {
    outline: none;
    border-color: #4f8ef7;
    box-shadow: 0 0 0 3px rgba(79,142,247,0.12);
}

.filter-divider {
    width: 1px;
    height: 32px;
    background: #e2e8f0;
    flex-shrink: 0;
}

.btn-search {
    padding: 10px 22px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg, #4f8ef7, #3b6fe0);
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    font-family: 'Inter', sans-serif;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 3px 10px rgba(79,142,247,0.35);
    white-space: nowrap;
}

.btn-search:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(79,142,247,0.45);
}

/* ---- Results Info ---- */
.results-info {
    font-size: 13px;
    color: #64748b;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.results-info strong { color: #1e293b; }

/* ---- Author Cards Grid ---- */
.lecturer-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

@media (max-width: 1300px) { .lecturer-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 960px)  { .lecturer-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 580px)  { .lecturer-grid { grid-template-columns: 1fr; } }

/* ---- Profile Card ---- */
.profile-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 0;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.07);
    transition: all 0.3s cubic-bezier(.22,1,.36,1);
    border: 1px solid #edf2f7;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.profile-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.13);
    border-color: #c7d9ff;
}

/* Card accent top strip */
.card-accent {
    height: 4px;
    background: linear-gradient(90deg, #4f8ef7, #0ea5e9, #6366f1);
    border-radius: 16px 16px 0 0;
    flex-shrink: 0;
}

/* ---- Card Header ---- */
.card-header-section {
    padding: 16px 18px 12px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
}

.card-avatar {
    position: relative;
    flex-shrink: 0;
}

.card-avatar img {
    width: 58px;
    height: 58px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #fff;
    box-shadow: 0 3px 10px rgba(79,142,247,0.3);
    background: #e2e8f0;
}

.card-meta {
    flex: 1;
    min-width: 0;
}

.card-name {
    font-size: 14px;
    font-weight: 700;
    color: #1e293b;
    line-height: 1.3;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.card-dept {
    font-size: 11px;
    color: #64748b;
    margin-top: 3px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.sinta-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    margin-top: 6px;
    font-size: 10px;
    font-weight: 700;
    color: #4f8ef7;
    background: #eef4ff;
    padding: 2px 8px;
    border-radius: 20px;
    border: 1px solid #c7d9ff;
    letter-spacing: 0.3px;
}

/* ---- Score Chips ---- */
.score-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 5px;
    padding: 0 14px 10px;
}

.score-chip {
    background: #f8fafc;
    border-radius: 8px;
    padding: 7px 6px;
    border: 1px solid #e2e8f0;
    text-align: center;
}

.score-chip .chip-label {
    font-size: 8.5px;
    font-weight: 600;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    display: block;
    margin-bottom: 2px;
    line-height: 1.1;
}

.score-chip .chip-value {
    font-size: 15px;
    font-weight: 800;
    color: #1e293b;
    line-height: 1;
    display: block;
}

.score-chip.highlight {
    background: linear-gradient(135deg, #eef4ff, #dde8ff);
    border-color: #c7d9ff;
}

.score-chip.highlight .chip-value { color: #3b6fe0; }

/* ---- Metric Grids (Articles & Citations) ---- */
.metric-section {
    padding: 0 14px 10px;
}

.metric-title {
    font-size: 10.5px;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 5px;
    display: block;
}

.metric-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 4px;
}

.metric-item {
    background: #f8fafc;
    border-radius: 7px;
    padding: 6px 7px;
    border: 1px solid #e8edf5;
}

.metric-item .mi-source {
    font-size: 8.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    margin-bottom: 2px;
    display: block;
}

.metric-item .mi-value {
    font-size: 14px;
    font-weight: 800;
    color: #1e293b;
    display: block;
    line-height: 1;
}

.source-scholar { border-left: 3px solid #2563eb; }
.source-scopus  { border-left: 3px solid #d97706; }
.source-wos     { border-left: 3px solid #16a34a; }

.source-scholar .mi-source { color: #2563eb; }
.source-scopus  .mi-source { color: #d97706; }
.source-wos     .mi-source { color: #16a34a; }

/* ---- Progress Bars ---- */
.progress-section {
    padding: 0 14px 12px;
}

.progress-row { margin-bottom: 8px; }
.progress-row:last-child { margin-bottom: 0; }

.progress-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 3px;
}

.progress-name { font-size: 10.5px; font-weight: 600; color: #475569; }
.progress-val  { font-size: 10.5px; font-weight: 700; color: #1e293b; }

.pbar-track {
    width: 100%;
    height: 5px;
    background: #e9eef5;
    border-radius: 10px;
    overflow: hidden;
}

.pbar-fill {
    height: 100%;
    border-radius: 10px;
    width: 0;
    transition: width 1.3s cubic-bezier(.4,0,.2,1);
}

.pbar-fill.overall { background: linear-gradient(90deg, #4f8ef7, #6366f1); }
.pbar-fill.three-yr { background: linear-gradient(90deg, #0ea5e9, #06b6d4); }

.progress-animate .pbar-fill { width: var(--val); }

/* ---- Subject Badges ---- */
.subject-section {
    padding: 0 14px 14px;
    margin-top: auto;
}

.subject-badge {
    display: inline-block;
    background: #eef4ff;
    border: 1px solid #c7d9ff;
    color: #2f54c4;
    padding: 2px 8px;
    margin: 2px 2px 0 0;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 600;
    white-space: nowrap;
    max-width: 130px;
    overflow: hidden;
    text-overflow: ellipsis;
    vertical-align: middle;
}

.subject-badge.more-badge {
    background: #f1f5f9;
    color: #64748b;
    border-color: #e2e8f0;
}

/* ---- Pagination ---- */
.pagination-container {
    margin-top: 36px;
    margin-bottom: 20px;
    display: flex;
    justify-content: center;
}

.pagination-container ul.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    gap: 5px;
}

.pagination-container .page-item .page-link {
    color: #4f8ef7;
    padding: 8px 16px;
    border-radius: 8px;
    border: 1px solid #dee2e6;
    transition: all 0.3s;
    text-decoration: none;
}

.pagination-container .page-item.active .page-link {
    background: linear-gradient(135deg, #4f8ef7, #3b6fe0);
    border-color: #4f8ef7;
    color: #fff;
}

.pagination-container .page-item .page-link:hover:not(.active) {
    background-color: #eef4ff;
    border-color: #c7d9ff;
}

/* Responsive filter */
@media (max-width: 600px) {
    .filter-search-wrap { flex: 1 1 100%; }
    .filter-select { flex: 1 1 45%; min-width: 0; }
    .filter-divider { display: none; }
    .score-row { grid-template-columns: 1fr 1fr; }
}

/* ---- Page Header ---- */
.page-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 24px;
    flex-wrap: wrap;
}

.page-header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.page-header-icon {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    background: linear-gradient(135deg, #4f8ef7, #6366f1);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    box-shadow: 0 6px 18px rgba(79,142,247,0.35);
    flex-shrink: 0;
}

.page-header-text .page-title {
    font-size: 22px;
    font-weight: 800;
    color: #1e293b;
    line-height: 1.2;
    margin: 0;
}

.page-header-text .page-subtitle {
    font-size: 13px;
    color: #64748b;
    margin-top: 3px;
    font-weight: 400;
}

.page-header-stats {
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
}

.header-stat {
    background: #fff;
    border: 1px solid #edf2f7;
    border-radius: 10px;
    padding: 8px 16px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    min-width: 80px;
}

.header-stat .hs-value {
    font-size: 18px;
    font-weight: 800;
    color: #1e293b;
    line-height: 1;
    display: block;
}

.header-stat .hs-label {
    font-size: 10px;
    font-weight: 600;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: block;
    margin-top: 2px;
}

.header-stat.accent { background: linear-gradient(135deg, #eef4ff, #dde8ff); border-color: #c7d9ff; }
.header-stat.accent .hs-value { color: #3b6fe0; }

@media (max-width: 600px) {
    .page-header { flex-direction: column; }
    .page-header-stats { width: 100%; justify-content: flex-start; }
    .page-header-text .page-title { font-size: 18px; }
}
</style>

<!-- ========== PAGE HEADER ========== -->
<div class="page-header">
    <div class="page-header-left">
        <div class="page-header-icon">👨‍🏫</div>
        <div class="page-header-text">
            <h1 class="page-title">Direktori Akademisi UIN Saizu Purwokerto</h1>
            <div class="page-subtitle">
                 Data publikasi dari SINTA, Scopus, Scholar &amp; WoS
            </div>
        </div>
    </div>
    <div class="page-header-stats">
        <?php
            // Hitung total artikel dan sitasi dari data yang tampil
            $total_art_all = 0; $total_cit_all = 0;
            foreach ($lecturers as $l) {
                $total_art_all += (int)($l['artikel_scholar']??0) + (int)($l['artikel_scopus']??0) + (int)($l['artikel_wos']??0);
                $total_cit_all += (int)($l['cit_scholar']??0) + (int)($l['cit_scopus']??0) + (int)($l['cit_wos']??0);
            }
        ?>
        <div class="header-stat accent">
            <span class="hs-value"><?= count($lecturers) ?></span>
            <span class="hs-label">Dosen</span>
        </div>
        <div class="header-stat">
            <span class="hs-value"><?= $total_art_all >= 1000 ? round($total_art_all/1000,1).'k' : $total_art_all ?></span>
            <span class="hs-label">Artikel</span>
        </div>
        <div class="header-stat">
            <span class="hs-value"><?= $total_cit_all >= 1000 ? round($total_cit_all/1000,1).'k' : $total_cit_all ?></span>
            <span class="hs-label">Sitasi</span>
        </div>
    </div>
</div>

<!-- ========== FILTER BAR ========== -->
<div class="filter-bar">
    <form action="<?= site_url('dashboard/authors') ?>" method="GET">

        <div class="filter-search-wrap">
            <span class="search-icon">🔍</span>
            <input type="text" name="q" value="<?= htmlspecialchars($keyword ?? '') ?>"
                   placeholder="Cari nama dosen, prodi, atau subject...">
        </div>

        <div class="filter-divider"></div>

        <select name="fakultas" class="filter-select" onchange="this.form.submit()">
            <option value="">🏛️ Semua Fakultas</option>
            <?php foreach ($fakultas_list as $f): ?>
            <option value="<?= $f['fakultas_id'] ?>" <?= ($selected_fakultas == $f['fakultas_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($f['fakultas_name']) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <select name="prodi" class="filter-select" onchange="this.form.submit()">
            <option value="">📚 Semua Prodi</option>
            <?php foreach ($prodi_list as $p): ?>
            <option value="<?= $p['id'] ?>" <?= ($selected_prodi == $p['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($p['nama_program_studi']) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <div class="filter-divider"></div>

        <select name="sort" class="filter-select" onchange="this.form.submit()">
            <option value="">↕️ Urutkan</option>
            <option value="score_overall"             <?= ($sort=='score_overall')?'selected':'' ?>>📊 Score Overall</option>
            <option value="score_3_years"             <?= ($sort=='score_3_years')?'selected':'' ?>>📅 Score 3 Tahun</option>
            <option value="score_affiliation"         <?= ($sort=='score_affiliation')?'selected':'' ?>>🏷️ Score Affiliasi</option>
            <option value="score_affiliation_3_years" <?= ($sort=='score_affiliation_3_years')?'selected':'' ?>>🏷️ Affiliasi 3 Thn</option>
            <option value="articles_scholar"          <?= ($sort=='articles_scholar')?'selected':'' ?>>📝 Artikel Scholar</option>
            <option value="articles_scopus"           <?= ($sort=='articles_scopus')?'selected':'' ?>>📝 Artikel Scopus</option>
            <option value="articles_wos"              <?= ($sort=='articles_wos')?'selected':'' ?>>📝 Artikel WoS</option>
            <option value="citations_scholar"         <?= ($sort=='citations_scholar')?'selected':'' ?>>💬 Sitasi Scholar</option>
            <option value="citations_scopus"          <?= ($sort=='citations_scopus')?'selected':'' ?>>💬 Sitasi Scopus</option>
            <option value="citations_wos"             <?= ($sort=='citations_wos')?'selected':'' ?>>💬 Sitasi WoS</option>
        </select>

        <select name="order" class="filter-select" onchange="this.form.submit()">
            <option value="desc" <?= ($order=='desc')?'selected':'' ?>>⬇ Terbesar</option>
            <option value="asc"  <?= ($order=='asc')?'selected':'' ?>>⬆ Terkecil</option>
        </select>

        <button type="submit" class="btn-search">Terapkan</button>
    </form>
</div>

<!-- ========== RESULTS INFO ========== -->
<div class="results-info">
    📋 Menampilkan <strong><?= count($lecturers) ?></strong> dosen
    <?php if (!empty($keyword)): ?>
        &nbsp;· pencarian: "<strong><?= htmlspecialchars($keyword) ?></strong>"
    <?php endif; ?>
    <?php if (!empty($selected_fakultas) || !empty($selected_prodi)): ?>
        &nbsp;· <span style="color:#4f8ef7; font-weight:600;">filter aktif</span>
    <?php endif; ?>
</div>

<!-- ========== AUTHOR GRID ========== -->
<div class="lecturer-grid">

    <?php foreach($lecturers as $d):
        $score_all      = (float)($d['score_all'] ?? 0);
        $score_3yr      = (float)($d['score_3_years'] ?? 0);
        $art_scholar    = (int)($d['artikel_scholar'] ?? 0);
        $art_scopus     = (int)($d['artikel_scopus'] ?? 0);
        $art_wos        = (int)($d['artikel_wos'] ?? 0);
        $cit_scholar    = (int)($d['cit_scholar'] ?? 0);
        $cit_scopus     = (int)($d['cit_scopus'] ?? 0);
        $cit_wos        = (int)($d['cit_wos'] ?? 0);
        $total_articles = $art_scholar + $art_scopus + $art_wos;
        $total_citations= $cit_scholar + $cit_scopus + $cit_wos;
        $max_score      = 5000;
        $pct_all        = min(round(($score_all / $max_score) * 100), 100);
        $pct_3yr        = min(round(($score_3yr / $max_score) * 100), 100);

        // Subject processing
        $subjects_raw = array_filter(array_map('trim', $d['subject'] ?? []));
        $subjects_show= array_slice($subjects_raw, 0, 4);
        $subjects_more= count($subjects_raw) - count($subjects_show);
    ?>
    <a href="<?= base_url('dashboard/detail/'.$d['id']) ?>" style="text-decoration:none; color:inherit; display:flex; flex-direction:column;">
        <div class="profile-card progress-animate">

            <!-- Accent bar -->
            <div class="card-accent"></div>

            <!-- Header -->
            <div class="card-header-section">
                <div class="card-avatar">
                    <img src="<?= htmlspecialchars($d['photo'] ?? '') ?>"
                         alt="<?= htmlspecialchars($d['nama']) ?>"
                         onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($d['nama']) ?>&background=4f8ef7&color=fff&size=60'">
                </div>
                <div class="card-meta">
                    <div class="card-name" title="<?= htmlspecialchars($d['nama']) ?>">
                        <?= htmlspecialchars($d['nama']) ?>
                    </div>
                    <div class="card-dept" title="<?= htmlspecialchars($d['dept'] ?? '') ?>">
                        🏛️ <?= htmlspecialchars($d['dept'] ?? '-') ?>
                    </div>
                    <span class="sinta-badge">✦ SINTA Author</span>
                </div>
            </div>

            <!-- Score Chips (4 columns) -->
            <div class="score-row">
                <div class="score-chip highlight">
                    <span class="chip-label">Score All</span>
                    <span class="chip-value"><?= number_format($score_all, 0) ?></span>
                </div>
                <div class="score-chip">
                    <span class="chip-label">3yr</span>
                    <span class="chip-value"><?= number_format($score_3yr, 0) ?></span>
                </div>
                <div class="score-chip">
                    <span class="chip-label">Artikel</span>
                    <span class="chip-value"><?= $total_articles ?></span>
                </div>
                <div class="score-chip">
                    <span class="chip-label">Sitasi</span>
                    <span class="chip-value"><?= $total_citations >= 1000 ? round($total_citations/1000,1).'k' : $total_citations ?></span>
                </div>
            </div>

            <!-- Articles by source -->
            <div class="metric-section">
                <span class="metric-title">📄 Artikel per Sumber</span>
                <div class="metric-grid">
                    <div class="metric-item source-scholar">
                        <span class="mi-source">Scholar</span>
                        <span class="mi-value"><?= $art_scholar ?></span>
                    </div>
                    <div class="metric-item source-scopus">
                        <span class="mi-source">Scopus</span>
                        <span class="mi-value"><?= $art_scopus ?></span>
                    </div>
                    <div class="metric-item source-wos">
                        <span class="mi-source">WoS</span>
                        <span class="mi-value"><?= $art_wos ?></span>
                    </div>
                </div>
            </div>

            <!-- Citations by source -->
            <div class="metric-section">
                <span class="metric-title">💬 Sitasi per Sumber</span>
                <div class="metric-grid">
                    <div class="metric-item source-scholar">
                        <span class="mi-source">Scholar</span>
                        <span class="mi-value"><?= number_format($cit_scholar) ?></span>
                    </div>
                    <div class="metric-item source-scopus">
                        <span class="mi-source">Scopus</span>
                        <span class="mi-value"><?= number_format($cit_scopus) ?></span>
                    </div>
                    <div class="metric-item source-wos">
                        <span class="mi-source">WoS</span>
                        <span class="mi-value"><?= number_format($cit_wos) ?></span>
                    </div>
                </div>
            </div>

            <!-- Progress bars -->
            <div class="progress-section">
                <div class="progress-row">
                    <div class="progress-head">
                        <span class="progress-name">📊 Score Overall</span>
                        <span class="progress-val"><?= number_format($score_all, 0) ?></span>
                    </div>
                    <div class="pbar-track">
                        <div class="pbar-fill overall" style="--val:<?= $pct_all ?>%"></div>
                    </div>
                </div>
                <div class="progress-row">
                    <div class="progress-head">
                        <span class="progress-name">📅 Score 3 Tahun</span>
                        <span class="progress-val"><?= number_format($score_3yr, 0) ?></span>
                    </div>
                    <div class="pbar-track">
                        <div class="pbar-fill three-yr" style="--val:<?= $pct_3yr ?>%"></div>
                    </div>
                </div>
            </div>

            <!-- Subject badges -->
            <?php if (!empty($subjects_show)): ?>
            <div class="subject-section">
                <?php foreach($subjects_show as $sub): ?>
                <span class="subject-badge" title="<?= htmlspecialchars($sub) ?>"><?= htmlspecialchars($sub) ?></span>
                <?php endforeach; ?>
                <?php if ($subjects_more > 0): ?>
                <span class="subject-badge more-badge">+<?= $subjects_more ?> lainnya</span>
                <?php endif; ?>
            </div>
            <?php endif; ?>

        </div>
    </a>
    <?php endforeach; ?>

</div>

<!-- ========== PAGINATION ========== -->
<div class="pagination-container">
    <?= $pagination ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Trigger progress bar animation via IntersectionObserver
    const cards = document.querySelectorAll('.profile-card');

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('progress-animate');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        cards.forEach(card => {
            card.classList.remove('progress-animate');
            observer.observe(card);
        });
    }
    // Fallback: animate all immediately
    else {
        cards.forEach(card => card.classList.add('progress-animate'));
    }
});
</script>