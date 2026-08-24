<?php
$subjects = array_filter(array_map('trim', explode(',', $author['subjects'] ?? '')));

// Computed metrics
$total_articles  = (int)($author['articles_scholar']??0) + (int)($author['articles_scopus']??0) + (int)($author['articles_wos']??0);
$total_citations = (int)($author['citations_scholar']??0) + (int)($author['citations_scopus']??0) + (int)($author['citations_wos']??0);
$score_all  = (float)($author['score_overall']??0);
$score_3yr  = (float)($author['score_3_years']??0);
$score_aff  = (float)($author['score_affiliation']??0);
$max_score  = 5000;
?>
<style>
/* =========================================================
   DETAIL AUTHOR PAGE — Premium Design
   ========================================================= */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

.da-wrapper { font-family: 'Inter', sans-serif; }

/* ---- Hero Banner ---- */
.da-hero {
    background: linear-gradient(135deg, #1e3a8a 0%, #312e81 50%, #1e293b 100%);
    border-radius: 20px;
    padding: 32px 36px;
    display: flex;
    gap: 28px;
    align-items: flex-start;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(30,58,138,0.35);
}

/* Decorative blobs */
.da-hero::before {
    content: '';
    position: absolute;
    top: -60px; right: -60px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: rgba(99,102,241,0.25);
    pointer-events: none;
}
.da-hero::after {
    content: '';
    position: absolute;
    bottom: -40px; left: 200px;
    width: 140px; height: 140px;
    border-radius: 50%;
    background: rgba(14,165,233,0.18);
    pointer-events: none;
}

.da-hero-avatar {
    flex-shrink: 0;
    position: relative;
    z-index: 1;
}

.da-hero-avatar img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid rgba(255,255,255,0.3);
    box-shadow: 0 6px 24px rgba(0,0,0,0.3);
    background: #334155;
}

.da-hero-info {
    flex: 1;
    min-width: 0;
    z-index: 1;
}

.da-hero-name {
    font-size: 24px;
    font-weight: 800;
    color: #fff;
    line-height: 1.2;
    margin-bottom: 6px;
}

.da-hero-dept, .da-hero-aff {
    font-size: 13px;
    color: rgba(255,255,255,0.72);
    margin-bottom: 3px;
}

.da-hero-dept { font-weight: 600; color: rgba(255,255,255,0.9); }

.da-hero-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 14px;
}

.da-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 11.5px;
    font-weight: 600;
    border: 1px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.12);
    color: #fff;
    backdrop-filter: blur(4px);
}

.da-badge.link-badge {
    background: rgba(255,255,255,0.18);
    text-decoration: none;
    transition: background 0.2s;
}

.da-badge.link-badge:hover {
    background: rgba(255,255,255,0.30);
    color: #fff;
    text-decoration: none;
}

.da-hero-totals {
    display: flex;
    flex-direction: column;
    gap: 10px;
    flex-shrink: 0;
    z-index: 1;
    min-width: 140px;
}

.da-hero-stat {
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.18);
    border-radius: 12px;
    padding: 10px 16px;
    backdrop-filter: blur(4px);
}

.da-hero-stat .hs-val {
    font-size: 22px;
    font-weight: 800;
    color: #fff;
    line-height: 1;
    display: block;
}

.da-hero-stat .hs-lab {
    font-size: 10px;
    font-weight: 600;
    color: rgba(255,255,255,0.6);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: block;
    margin-top: 2px;
}

/* ---- Section Label ---- */
.da-section-label {
    font-size: 11px;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.da-section-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #e2e8f0;
}

/* ---- Metric Cards Row ---- */
.da-metrics-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-bottom: 24px;
}

.da-metric-card {
    background: #fff;
    border-radius: 16px;
    padding: 20px;
    border: 1px solid #edf2f7;
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    position: relative;
    overflow: hidden;
}

.da-metric-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
}

.da-metric-card.scholar::before { background: linear-gradient(90deg, #2563eb, #3b82f6); }
.da-metric-card.scopus::before  { background: linear-gradient(90deg, #d97706, #f59e0b); }
.da-metric-card.wos::before     { background: linear-gradient(90deg, #16a34a, #22c55e); }

.da-source-label {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.da-metric-card.scholar .da-source-label { color: #2563eb; }
.da-metric-card.scopus  .da-source-label { color: #d97706; }
.da-metric-card.wos     .da-source-label { color: #16a34a; }

.da-source-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    display: inline-block;
}

.scholar .da-source-dot { background: #2563eb; }
.scopus  .da-source-dot { background: #d97706; }
.wos     .da-source-dot { background: #16a34a; }

.da-metric-stat-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.da-stat-item { }

.da-stat-val {
    font-size: 22px;
    font-weight: 800;
    color: #1e293b;
    line-height: 1;
    display: block;
}

.da-stat-lab {
    font-size: 10.5px;
    font-weight: 500;
    color: #94a3b8;
    display: block;
    margin-top: 3px;
}

/* ---- Score & Info Grid ---- */
.da-bottom-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 24px;
}

.da-card {
    background: #fff;
    border-radius: 16px;
    padding: 20px;
    border: 1px solid #edf2f7;
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
}

/* Score bars */
.da-score-row { margin-bottom: 14px; }
.da-score-row:last-child { margin-bottom: 0; }

.da-score-head {
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
}

.da-score-name { font-size: 12px; font-weight: 600; color: #475569; }
.da-score-val  { font-size: 12px; font-weight: 800; color: #1e293b; }

.da-pbar-track {
    width: 100%;
    height: 8px;
    background: #e9eef5;
    border-radius: 20px;
    overflow: hidden;
}

.da-pbar-fill {
    height: 100%;
    border-radius: 20px;
    width: 0;
    transition: width 1.4s cubic-bezier(.4,0,.2,1);
}

.da-pbar-fill.overall  { background: linear-gradient(90deg, #4f8ef7, #6366f1); }
.da-pbar-fill.three-yr { background: linear-gradient(90deg, #0ea5e9, #06b6d4); }
.da-pbar-fill.affil    { background: linear-gradient(90deg, #10b981, #34d399); }

.da-score-loaded .da-pbar-fill { width: var(--val); }

/* Subject Pills */
.da-subject-pill {
    display: inline-block;
    background: #eef4ff;
    border: 1px solid #c7d9ff;
    color: #2f54c4;
    padding: 4px 12px;
    margin: 3px 3px 0 0;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
}

/* ---- Publications Section ---- */
.da-pub-section {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #edf2f7;
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    overflow: hidden;
    margin-bottom: 24px;
}

.da-tab-nav {
    display: flex;
    border-bottom: 2px solid #edf2f7;
    background: #f8fafc;
    padding: 0 20px;
    gap: 0;
}

.da-tab-btn {
    padding: 14px 20px;
    font-size: 13px;
    font-weight: 600;
    color: #64748b;
    border: none;
    background: none;
    cursor: pointer;
    border-bottom: 2px solid transparent;
    margin-bottom: -2px;
    display: flex;
    align-items: center;
    gap: 7px;
    transition: all 0.2s;
    font-family: 'Inter', sans-serif;
}

.da-tab-btn:hover { color: #1e293b; }

.da-tab-btn.active {
    color: #3b6fe0;
    border-bottom-color: #3b6fe0;
    background: #fff;
    border-radius: 8px 8px 0 0;
}

.da-tab-count {
    background: #eef4ff;
    color: #3b6fe0;
    border-radius: 10px;
    padding: 1px 7px;
    font-size: 10.5px;
    font-weight: 700;
}

.da-tab-btn.active .da-tab-count { background: #3b6fe0; color: #fff; }

.da-tab-btn.scopus-btn.active { color: #d97706; border-bottom-color: #d97706; }
.da-tab-btn.scopus-btn.active .da-tab-count { background: #d97706; color: #fff; }
.da-tab-btn.scopus-btn .da-tab-count { background: #fef3c7; color: #d97706; }

.da-tab-pane { display: none; padding: 20px; }
.da-tab-pane.active { display: block; }

/* Publication Table */
.da-pub-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

.da-pub-table thead th {
    padding: 10px 12px;
    text-align: left;
    font-size: 10.5px;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: #f8fafc;
    border-bottom: 2px solid #edf2f7;
}

.da-pub-table tbody tr {
    border-bottom: 1px solid #f1f5f9;
    transition: background 0.15s;
}

.da-pub-table tbody tr:last-child { border-bottom: none; }
.da-pub-table tbody tr:hover { background: #f8fafc; }

.da-pub-table td {
    padding: 12px 12px;
    vertical-align: top;
    color: #334155;
    line-height: 1.45;
}

.da-pub-table td.no-col { color: #94a3b8; font-weight: 600; width: 36px; }
.da-pub-table td.year-col { font-weight: 700; color: #1e293b; white-space: nowrap; width: 54px; }
.da-pub-table td.title-col { font-weight: 600; color: #1e293b; }
.da-pub-table td.journal-col { color: #475569; font-style: italic; }
.da-pub-table td.author-col { color: #64748b; font-size: 12px; }

.da-cit-badge {
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

.da-cit-badge.zero { background: #f8fafc; color: #94a3b8; border-color: #e2e8f0; }

.da-empty-state {
    text-align: center;
    padding: 48px 20px;
    color: #94a3b8;
}

.da-empty-state .empty-icon { font-size: 40px; margin-bottom: 10px; }
.da-empty-state p { font-size: 14px; }

/* Responsive */
@media (max-width: 900px) {
    .da-hero { flex-direction: column; }
    .da-hero-totals { flex-direction: row; }
    .da-metrics-row { grid-template-columns: 1fr; }
    .da-bottom-grid { grid-template-columns: 1fr; }
}

@media (max-width: 600px) {
    .da-hero { padding: 20px; }
    .da-hero-name { font-size: 18px; }
    .da-hero-totals { flex-wrap: wrap; }
}
</style>

<div class="da-wrapper">

<!-- ======================== HERO BANNER ======================== -->
<div class="da-hero">
    <div class="da-hero-avatar">
        <img src="<?= htmlspecialchars($author['photo'] ?? '') ?>"
             alt="<?= htmlspecialchars($author['name']) ?>"
             onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($author['name']) ?>&background=4f8ef7&color=fff&size=100'">
    </div>

    <div class="da-hero-info">
        <div class="da-hero-name"><?= htmlspecialchars($author['name']) ?></div>
        <div class="da-hero-dept">🏛️ <?= htmlspecialchars($author['department'] ?? '') ?></div>
        <div class="da-hero-aff">🏫 <?= htmlspecialchars($author['affiliation_name'] ?? '') ?></div>

        <div class="da-hero-badges">
            <?php if (!empty($author['sinta_id'])): ?>
            <span class="da-badge">✦ SINTA ID: <?= htmlspecialchars($author['sinta_id']) ?></span>
            <?php endif; ?>
            <?php if (!empty($author['url'])): ?>
            <a href="<?= htmlspecialchars($author['url']) ?>" target="_blank" class="da-badge link-badge">
                🔗 Lihat Profil SINTA ↗
            </a>
            <?php endif; ?>
            <?php if (!empty($author['url_scopus'])): ?>
            <a href="<?= htmlspecialchars($author['url_scopus']) ?>" target="_blank" class="da-badge link-badge">
                📄 Profil Scopus ↗
            </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="da-hero-totals">
        <div class="da-hero-stat">
            <span class="hs-val"><?= $total_articles >= 1000 ? round($total_articles/1000,1).'k' : $total_articles ?></span>
            <span class="hs-lab">Total Artikel</span>
        </div>
        <div class="da-hero-stat">
            <span class="hs-val"><?= $total_citations >= 1000 ? round($total_citations/1000,1).'k' : $total_citations ?></span>
            <span class="hs-lab">Total Sitasi</span>
        </div>
    </div>
</div>

<!-- ======================== METRIC CARDS ======================== -->
<div class="da-section-label">📊 Metrik Publikasi per Sumber</div>
<div class="da-metrics-row">

    <!-- Scholar -->
    <div class="da-metric-card scholar">
        <div class="da-source-label">
            <span class="da-source-dot"></span> Google Scholar
        </div>
        <div class="da-metric-stat-grid">
            <div class="da-stat-item">
                <span class="da-stat-val"><?= number_format((int)($author['citations_scholar']??0)) ?></span>
                <span class="da-stat-lab">Sitasi</span>
            </div>
            <div class="da-stat-item">
                <span class="da-stat-val"><?= number_format((int)($author['articles_scholar']??0)) ?></span>
                <span class="da-stat-lab">Artikel</span>
            </div>
            <div class="da-stat-item">
                <span class="da-stat-val"><?= $author['h_index_scholar'] ?? '—' ?></span>
                <span class="da-stat-lab">H-Index</span>
            </div>
            <div class="da-stat-item">
                <span class="da-stat-val"><?= $author['i10_index_scholar'] ?? '—' ?></span>
                <span class="da-stat-lab">i10-Index</span>
            </div>
        </div>
    </div>

    <!-- Scopus -->
    <div class="da-metric-card scopus">
        <div class="da-source-label">
            <span class="da-source-dot"></span> Scopus
        </div>
        <div class="da-metric-stat-grid">
            <div class="da-stat-item">
                <span class="da-stat-val"><?= number_format((int)($author['citations_scopus']??0)) ?></span>
                <span class="da-stat-lab">Sitasi</span>
            </div>
            <div class="da-stat-item">
                <span class="da-stat-val"><?= number_format((int)($author['articles_scopus']??0)) ?></span>
                <span class="da-stat-lab">Artikel</span>
            </div>
            <div class="da-stat-item">
                <span class="da-stat-val"><?= $author['h_index_scopus'] ?? '—' ?></span>
                <span class="da-stat-lab">H-Index</span>
            </div>
            <div class="da-stat-item">
                <span class="da-stat-val"><?= $author['i10_index_scopus'] ?? '—' ?></span>
                <span class="da-stat-lab">i10-Index</span>
            </div>
        </div>
    </div>

    <!-- WoS -->
    <div class="da-metric-card wos">
        <div class="da-source-label">
            <span class="da-source-dot"></span> Web of Science (WoS)
        </div>
        <div class="da-metric-stat-grid">
            <div class="da-stat-item">
                <span class="da-stat-val"><?= number_format((int)($author['citations_wos']??0)) ?></span>
                <span class="da-stat-lab">Sitasi</span>
            </div>
            <div class="da-stat-item">
                <span class="da-stat-val"><?= number_format((int)($author['articles_wos']??0)) ?></span>
                <span class="da-stat-lab">Artikel</span>
            </div>
            <div class="da-stat-item">
                <span class="da-stat-val"><?= $author['h_index_wos'] ?? '—' ?></span>
                <span class="da-stat-lab">H-Index</span>
            </div>
            <div class="da-stat-item">
                <span class="da-stat-val">—</span>
                <span class="da-stat-lab">i10-Index</span>
            </div>
        </div>
    </div>

</div>

<!-- ======================== SCORE + SUBJECTS ======================== -->
<div class="da-bottom-grid">

    <!-- Score Bars -->
    <div class="da-card da-score-loaded">
        <div class="da-section-label" style="margin-bottom:18px;">🏆 SINTA Score</div>

        <?php
            $scores = [
                ['label' => 'Score Overall',     'class' => 'overall',  'val' => $score_all,  'pct' => min(round(($score_all/$max_score)*100),100)],
                ['label' => 'Score 3 Tahun',     'class' => 'three-yr', 'val' => $score_3yr,  'pct' => min(round(($score_3yr/$max_score)*100),100)],
                ['label' => 'Score Affiliasi',   'class' => 'affil',    'val' => $score_aff,  'pct' => min(round(($score_aff/$max_score)*100),100)],
            ];
            foreach ($scores as $sc):
        ?>
        <div class="da-score-row">
            <div class="da-score-head">
                <span class="da-score-name"><?= $sc['label'] ?></span>
                <span class="da-score-val"><?= number_format($sc['val'], 0) ?></span>
            </div>
            <div class="da-pbar-track">
                <div class="da-pbar-fill <?= $sc['class'] ?>" style="--val:<?= $sc['pct'] ?>%"></div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if (!empty($author['score_affiliation_3_years'])): ?>
        <div class="da-score-row" style="margin-top:6px;">
            <div class="da-score-head">
                <span class="da-score-name">Score Affiliasi 3 Thn</span>
                <span class="da-score-val"><?= number_format($author['score_affiliation_3_years'], 0) ?></span>
            </div>
            <div class="da-pbar-track">
                <div class="da-pbar-fill affil" style="--val:<?= min(round(($author['score_affiliation_3_years']/$max_score)*100),100) ?>%"></div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Subject Areas -->
    <div class="da-card">
        <div class="da-section-label" style="margin-bottom:14px;">🔬 Bidang Studi</div>
        <?php if (!empty($subjects)): ?>
            <?php foreach ($subjects as $s): ?>
            <span class="da-subject-pill"><?= htmlspecialchars(trim($s)) ?></span>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="color:#94a3b8; font-size:13px;">Data subjek belum tersedia.</div>
        <?php endif; ?>

        <!-- Quick stat summary -->
        <div style="margin-top: 20px; padding-top: 16px; border-top: 1px solid #f1f5f9;">
            <div class="da-section-label" style="margin-bottom:12px;">📋 Ringkasan Publikasi</div>
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                <div style="background:#f8fafc; border-radius:8px; padding:10px; text-align:center; border:1px solid #e2e8f0;">
                    <div style="font-size:18px; font-weight:800; color:#1e293b;"><?= count($result ?? []) ?></div>
                    <div style="font-size:10px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Scopus</div>
                </div>
                <div style="background:#f8fafc; border-radius:8px; padding:10px; text-align:center; border:1px solid #e2e8f0;">
                    <div style="font-size:18px; font-weight:800; color:#1e293b;"><?= count($result2 ?? []) ?></div>
                    <div style="font-size:10px; font-weight:600; color:#94a3b8; text-transform:uppercase;">Scholar</div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ======================== PUBLICATIONS ======================== -->
<div class="da-section-label">📚 Daftar Publikasi</div>
<div class="da-pub-section">

    <!-- Custom Tab Nav -->
    <div class="da-tab-nav">
        <button class="da-tab-btn scopus-btn active" onclick="switchTab('scopus', this)">
            🟠 Scopus
            <span class="da-tab-count"><?= count($result ?? []) ?></span>
        </button>
        <button class="da-tab-btn" onclick="switchTab('scholar', this)">
            🔵 Google Scholar
            <span class="da-tab-count"><?= count($result2 ?? []) ?></span>
        </button>
    </div>

    <!-- TAB SCOPUS -->
    <div class="da-tab-pane active" id="tab-scopus">
        <?php if (!empty($result)): ?>
        <div class="table-responsive">
            <table class="da-pub-table">
                <thead>
                    <tr>
                        <th class="no-col">#</th>
                        <th class="year-col">Tahun</th>
                        <th>Judul</th>
                        <th>Jurnal / Konferensi</th>
                        <th>Penulis</th>
                        <th>Sitasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($result as $d): ?>
                    <tr>
                        <td class="no-col"><?= $no++ ?></td>
                        <td class="year-col"><?= htmlspecialchars($d['year'] ?? '') ?></td>
                        <td class="title-col"><?= htmlspecialchars($d['title'] ?? '') ?></td>
                        <td class="journal-col"><?= htmlspecialchars($d['publication_name'] ?? '') ?></td>
                        <td class="author-col"><?= htmlspecialchars($d['creator'] ?? '') ?></td>
                        <td>
                            <span class="da-cit-badge <?= ($d['citation']??0) == 0 ? 'zero' : '' ?>">
                                💬 <?= number_format((int)($d['citation']??0)) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="da-empty-state">
            <div class="empty-icon">📭</div>
            <p>Belum ada data publikasi Scopus untuk dosen ini.</p>
        </div>
        <?php endif; ?>
    </div>

    <!-- TAB GOOGLE SCHOLAR -->
    <div class="da-tab-pane" id="tab-scholar">
        <?php if (!empty($result2)): ?>
        <div class="table-responsive">
            <table class="da-pub-table">
                <thead>
                    <tr>
                        <th class="no-col">#</th>
                        <th class="year-col">Tahun</th>
                        <th>Judul</th>
                        <th>Jurnal</th>
                        <th>Penulis</th>
                        <th>Sitasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($result2 as $d): ?>
                    <tr>
                        <td class="no-col"><?= $no++ ?></td>
                        <td class="year-col"><?= htmlspecialchars($d['year'] ?? '') ?></td>
                        <td class="title-col"><?= htmlspecialchars($d['title'] ?? '') ?></td>
                        <td class="journal-col"><?= htmlspecialchars($d['journal'] ?? '') ?></td>
                        <td class="author-col"><?= htmlspecialchars($d['author'] ?? '') ?></td>
                        <td>
                            <span class="da-cit-badge <?= ($d['citation']??0) == 0 ? 'zero' : '' ?>">
                                💬 <?= number_format((int)($d['citation']??0)) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="da-empty-state">
            <div class="empty-icon">📭</div>
            <p>Belum ada data publikasi Google Scholar untuk dosen ini.</p>
        </div>
        <?php endif; ?>
    </div>

</div>

</div><!-- end .da-wrapper -->

<script>
function switchTab(name, btn) {
    // Deactivate all panes and buttons
    document.querySelectorAll('.da-tab-pane').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.da-tab-btn').forEach(b => b.classList.remove('active'));
    // Activate selected
    document.getElementById('tab-' + name).classList.add('active');
    btn.classList.add('active');
}

// Animate score bars on load
document.addEventListener('DOMContentLoaded', function () {
    const scoreCard = document.querySelector('.da-score-loaded');
    if (!scoreCard) return;

    if ('IntersectionObserver' in window) {
        const obs = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('da-score-loaded');
                    obs.unobserve(e.target);
                }
            });
        }, { threshold: 0.2 });
        scoreCard.classList.remove('da-score-loaded');
        obs.observe(scoreCard);
    }
});
</script>