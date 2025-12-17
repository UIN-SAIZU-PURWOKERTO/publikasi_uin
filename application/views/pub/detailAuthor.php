<?php
$subjects = explode(',', $author['subjects']);
?>
<div class="sc-wrapper">

    <div class="sc-grid">

        <!-- LEFT CONTENT -->
        <div class="sc-card sc-beauty">

            <!-- HEADER -->
            <div class="sc-header sc-header-beauty">
                <div class="sc-avatar">
                    <img src="<?= $author['photo'] ?>">
                </div>

                <div>
                    <div class="sc-name"><?= $author['name'] ?></div>
                    <div class="sc-aff"><?= $author['department'] ?></div>
                    <div class="sc-aff"><?= $author['affiliation_name'] ?></div>

                    <div class="sc-link">
                        <a href="<?= $author['url'] ?>" target="_blank">View Author Profile ↗</a>
                    </div>
                </div>
            </div>

            <!-- METRICS -->
            <div class="sc-metrics sc-blue">
                <div class="sc-metric blue">
                    <small>Citations</small>
                    <b><?= number_format($author['citations_scholar']) ?></b>
                </div>
                <div class="sc-metric blue">
                    <small>Articles</small>
                    <b><?= number_format($author['articles_scholar']) ?></b>
                </div>
                <div class="sc-metric blue">
                    <small>h-index</small>
                    <b><?= $author['h_index_scholar'] ?></b>
                </div>
                <div class="sc-metric blue">
                    <small>i10-index</small>
                    <b><?= $author['i10_index_scholar'] ?></b>
                </div>
            </div>

            <!-- SCORE -->
            <div class="sc-section">
                <div class="sc-section-title">Score</div>

                <div class="score-item">
                    <span>Overall</span>
                    <span><?= $author['score_overall'] ?></span>
                </div>
                <div class="score-bar">
                    <div style="width:<?= min($author['score_overall'],100) ?>%"></div>
                </div>

                <div class="score-item mt">
                    <span>3 Years</span>
                    <span><?= $author['score_3_years'] ?></span>
                </div>
                <div class="score-bar">
                    <div style="width:<?= min($author['score_3_years'],100) ?>%"></div>
                </div>
            </div>

            <!-- SUBJECTS -->
            <div class="sc-section">
                <div class="sc-section-title">Subject Areas</div>
                <?php foreach ($subjects as $s): ?>
                <span class="subject-pill blue"><?= trim($s) ?></span>
                <?php endforeach; ?>
            </div>

        </div>


        <!-- RIGHT CONTENT -->
        <div class="sc-card sc-right-card">
            <h4>Research Metrics Overview</h4>
            <canvas id="metricRadar" height="260"></canvas>
            <div class="metric-note">
                Based on real author metrics
            </div>
        </div>

    </div>

</div>

<br><br>

<div class="row">
    <!-- TABEL KIRI -->
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-3">Data Scopus Publication</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>Creator</th>
                                <th>Citation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($result as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['year']; ?></td>
                                <td><?= $data['publication_name']; ?></td>
                                <td><?= $data['creator']; ?></td>
                                <td><?= $data['citation']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- TABEL KANAN -->
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-3">Data Google Scholar Publications</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>Creator</th>
                                <th>Citation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($result2 as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['year']; ?></td>
                                <td><?= $data['publication_name']; ?></td>
                                <td><?= $data['creator']; ?></td>
                                <td><?= $data['citation']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>