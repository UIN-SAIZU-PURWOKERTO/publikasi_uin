<style>
/* --- CSS yang kamu buat, tetap sama --- */
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

.progress-animate .progress-fill {
    width: var(--value);
}

/* ============================
   RESPONSIVE GRID
============================ */
.lecturer-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

/* Tablet besar */
@media (max-width: 1200px) {
    .lecturer-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Tablet kecil */
@media (max-width: 900px) {
    .lecturer-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .profile-card {
        padding: 16px;
    }
}

/* HP */
@media (max-width: 600px) {
    .lecturer-grid {
        grid-template-columns: 1fr;
    }

    .profile-header img {
        width: 58px;
        height: 58px;
    }

    #searchInput {
        width: 90% !important;
    }
}

.pagination-container {
    margin-top: 40px;
    margin-bottom: 40px;
    display: flex;
    justify-content: center;
}

/* Styling link pagination CodeIgniter */
.pagination-container ul.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
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
    background-color: #4f8ef7;
    border-color: #4f8ef7;
    color: white;
}

.pagination-container .page-item .page-link:hover:not(.active) {
    background-color: #eef4ff;
}
</style>

<div style="margin-bottom:20px; text-align:center;">
    <!-- <input type="text" id="searchInput" placeholder="Cari nama dosen atau subject..." style="
            width: 60%; padding: 10px 16px; border-radius: 30px;
            border: 1px solid #ccc; font-size: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
        " onkeyup="filterLecturers()"> -->

    <form action="<?= site_url('dashboard/authors') ?>" method="GET">
        <input type="text" name="q" value="<?= $keyword ?>" placeholder="Cari nama dosen atau subject..." style="
            width: 40%; padding: 10px 16px; border-radius: 30px;
            border: 1px solid #ccc; font-size: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
        ">

        <!-- FAKULTAS -->
        <select name="fakultas" style="
                padding: 10px 16px;
                border-radius: 30px;
                border: 1px solid #ccc;
                font-size: 14px;
            ">
            <option value="">Semua Fakultas</option>
            <?php foreach ($fakultas_list as $f): ?>
            <option value="<?= $f['fakultas_id'] ?>" <?= ($selected_fakultas == $f['fakultas_id']) ? 'selected' : '' ?>>
                <?= $f['fakultas_name'] ?>
            </option>
            <?php endforeach; ?>
        </select>

        <!-- PRODI -->
        <select name="prodi" style="
                padding: 10px 16px;
                border-radius: 30px;
                border: 1px solid #ccc;
                font-size: 14px;
            ">
            <option value="">Semua Prodi</option>
            <?php foreach ($prodi_list as $p): ?>
            <option value="<?= $p['id'] ?>" <?= ($selected_prodi == $p['id']) ? 'selected' : '' ?>>
                <?= $p['nama_program_studi'] ?>
            </option>
            <?php endforeach; ?>
        </select>

        <br>
        <select name="sort" style="
            padding: 10px 16px;
            border-radius: 30px;
            border: 1px solid #ccc;
            font-size: 14px;
        ">
            <option value="">Sort By (Default)</option>
            <option value="score_overall" <?= ($sort=='score_overall')?'selected':'' ?>>Score Overall</option>
            <option value="score_3_years" <?= ($sort=='score_3_years')?'selected':'' ?>>Score 3 Years</option>
            <option value="score_affiliation" <?= ($sort=='score_affiliation')?'selected':'' ?>>Score Affiliation
            </option>
            <option value="score_affiliation_3_years" <?= ($sort=='score_affiliation_3_years')?'selected':'' ?>>Score
                Affiliation 3 Years</option>

            <option value="articles_scholar" <?= ($sort=='articles_scholar')?'selected':'' ?>>Articles Scholar</option>
            <option value="articles_scopus" <?= ($sort=='articles_scopus')?'selected':'' ?>>Articles Scopus</option>
            <option value="articles_wos" <?= ($sort=='articles_wos')?'selected':'' ?>>Articles WoS</option>

            <option value="citations_scholar" <?= ($sort=='citations_scholar')?'selected':'' ?>>Citations Scholar
            </option>
            <option value="citations_scopus" <?= ($sort=='citations_scopus')?'selected':'' ?>>Citations Scopus</option>
            <option value="citations_wos" <?= ($sort=='citations_wos')?'selected':'' ?>>Citations WoS</option>
        </select>

        <select name="order" style="
        padding: 10px 14px;
        border-radius: 30px;
        border: 1px solid #ccc;
        font-size: 14px;
    ">
            <option value="desc" <?= ($order=='desc')?'selected':'' ?>>Desc</option>
            <option value="asc" <?= ($order=='asc')?'selected':'' ?>>Asc</option>
        </select>

        <button style="
            width: 10%; padding: 10px 16px; border-radius: 30px;
            border: 1px solid #ccc; font-size: 15px;
            box-shadow: 0 4px 10px rgba(3, 196, 45, 0.87);
        ">Cari</button>
    </form>
</div>
<div class=" row">

    <!-- <div style="display:grid; grid-template-columns: repeat(4, 1fr); gap:20px;"> -->
    <div class="lecturer-grid">

        <?php foreach($lecturers as $d): ?>
        <a href="<?= base_url('dashboard/detail/'.$d['id']) ?>" style="text-decoration:none;color:inherit">

            <div class="profile-card progress-animate">

                <div class="profile-header">
                    <img src="<?= $d['photo'] ?>">
                    <div>
                        <div class="name"><?= $d['nama'] ?></div>
                        <div class="department"><?= $d['dept'] ?></div>
                    </div>
                </div>

                <div class="info-box">
                    <div><b>Artikel:</b> Scholar <?= $d['artikel_scholar'] ?> | Scopus <?= $d['artikel_scopus'] ?> |
                        WoS
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

<!-- PAGINATION -->
<div class="mt-4">
    <?= $pagination ?>
</div>

<script>
function filterLecturers() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let cards = document.querySelectorAll(".profile-card");

    cards.forEach(card => {
        let name = card.querySelector(".name").innerText.toLowerCase();
        let dept = card.querySelector(".department").innerText.toLowerCase();
        let subjects = card.innerText.toLowerCase();

        if (
            name.includes(input) ||
            dept.includes(input) ||
            subjects.includes(input)
        ) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
</script>