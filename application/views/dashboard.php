<style>
.profile-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 20px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    transition: .35s ease;
    border: 1px solid #f1f1f1;
    position: relative;
    overflow: hidden;
}

.profile-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
}

.profile-header {
    display: flex;
    align-items: center;
    gap: 14px;
}

.profile-header img {
    width: 64px;
    height: 64px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #4f8ef7;
    box-shadow: 0 2px 8px rgba(79, 142, 247, 0.35);
}

.name {
    font-size: 19px;
    font-weight: 700;
    color: #222;
}

.department {
    font-size: 14px;
    color: #5b5b5b;
    margin-top: -2px;
}

.info-box {
    margin-top: 15px;
    font-size: 13px;
    line-height: 1.5;
}

.label-icon {
    font-weight: 600;
    color: #444;
}

.subject-badge {
    background: #eef4ff;
    border: 1px solid #cddcff;
    color: #2f54c4;
    display: inline-block;
    padding: 4px 10px;
    margin: 4px 3px 0 0;
    border-radius: 40px;
    font-size: 12px;
    font-weight: 600;
}

.progress-box {
    margin-top: 16px;
}

.progress-title {
    font-size: 13px;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.progress-bar {
    width: 100%;
    background: #ececec;
    height: 10px;
    border-radius: 14px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #4f8ef7, #0ea5e9);
    width: 0;
    border-radius: 14px;
    transition: width 1.2s cubic-bezier(.4, 0, .2, 1);
}

/* efek animasi */
.progress-animate .progress-fill {
    width: var(--value);
}

/* Efek garis highlight lembut */
.profile-card::after {
    content: "";
    position: absolute;
    width: 140px;
    height: 140px;
    background: rgba(79, 142, 247, 0.15);
    top: -60px;
    right: -60px;
    border-radius: 50%;
    filter: blur(40px);
}
</style>


<!-- <?php 
// $lecturers = [
//     [
//         'foto' => 'https://scholar.googleusercontent.com/citations?view_op=view_photo&user=oYKgS4cAAAAJ&citpid=1',
//         'nama' => 'Warto',
//         'dept' => 'S1 - Informatika',
//         'score_all' => 298,
//         'score_3_years' => 158,
//         'artikel_scholar' => 35,
//         'artikel_scopus' => 5,
//         'artikel_wos' => 1,
//         'cit_scholar' => 338,
//         'cit_scopus' => 21,
//         'cit_wos' => 1,
//         'subject' => ['Artificial Intelligence', 'Machine Learning', 'Natural Language Processing', 'Communication Science', 'Media Studies']
//     ],
//     // Tambah data sampai 6
// ];
?> -->

<div style="margin-bottom:20px; text-align:center;">
    <input type="text" id="searchInput" placeholder="Cari nama dosen atau subject..." style="
            width: 60%; padding: 10px 16px; border-radius: 30px;
            border: 1px solid #ccc; font-size: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
        " onkeyup="filterLecturers()">
</div>

<div class="row">

    <div style="display:grid; grid-template-columns: repeat(3, 1fr); gap:20px;">

        <?php foreach($lecturers as $d): ?>
        <div class="profile-card progress-animate">

            <div class="profile-header">
                <img src="<?= $d['foto'] ?>">
                <div>
                    <div class="name"><?= $d['nama'] ?></div>
                    <div class="department"><?= $d['dept'] ?></div>
                </div>
            </div>

            <div class="info-box">
                <div><b>Artikel:</b> Scholar <?= $d['artikel_scholar'] ?> | Scopus <?= $d['artikel_scopus'] ?> | WoS
                    <?= $d['artikel_wos'] ?></div>
                <div><b>Citation:</b> Scholar <?= $d['cit_scholar'] ?> | Scopus <?= $d['cit_scopus'] ?> | WoS
                    <?= $d['cit_wos'] ?></div>
            </div>

            <div style="margin-top:10px;">
                <?php foreach($d['subject'] as $sub): ?>
                <span class="subject-badge"><?= trim($sub) ?></span>
                <?php endforeach; ?>
            </div>

            <div class="progress-box">
                <div class="progress-title">Score All: <?= $d['score_all'] ?></div>
                <div class="progress-bar">
                    <div class="progress-fill" style="--value:<?= min($d['score_all'],100) ?>%;"></div>
                </div>
            </div>

            <div class="progress-box">
                <div class="progress-title">Score 3 Years: <?= $d['score_3_years'] ?></div>
                <div class="progress-bar">
                    <div class="progress-fill" style="--value:<?= min($d['score_3_years'],100) ?>%;"></div>
                </div>
            </div>

        </div>
        <?php endforeach; ?>

    </div>

</div>