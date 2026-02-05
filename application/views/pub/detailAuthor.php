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
<div class="sc-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <!-- NAV TABS -->
                    <ul class="nav nav-tabs mb-3" id="publicationTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="scopus-tab" data-toggle="tab" href="#scopus" role="tab">
                                Scopus Publication
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="scholar-tab" data-toggle="tab" href="#scholar" role="tab">
                                Google Scholar
                            </a>
                        </li>
                    </ul>

                    <!-- TAB CONTENT -->
                    <div class="tab-content" id="publicationTabContent">

                        <!-- TAB SCOPUS -->
                        <div class="tab-pane fade show active" id="scopus" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Jurnal/Conference</th>
                                            <th>Publication Name</th>
                                            <th>Creator</th>
                                            <th>Citation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($result as $data) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['year']; ?></td>
                                            <td><?= $data['title']; ?></td>
                                            <td><?= $data['publication_name']; ?></td>
                                            <td><?= $data['creator']; ?></td>
                                            <td><?= $data['citation']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- TAB GOOGLE SCHOLAR -->
                        <div class="tab-pane fade" id="scholar" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Title</th>
                                            <th>Journal</th>
                                            <th>Creator</th>
                                            <th>Citation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($result2 as $data) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['year']; ?></td>
                                            <td><?= $data['title']; ?></td>
                                            <td><?= $data['journal']; ?></td>
                                            <td><?= $data['author']; ?></td>
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
        </div>
    </div>
</div>