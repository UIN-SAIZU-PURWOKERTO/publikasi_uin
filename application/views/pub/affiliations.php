<div class="aff-container progress-animate">

    <!-- HEADER -->
    <div class="aff-header">
        <div>
            <div class="aff-title"><?= $aff['name'] ?></div>
            <div class="aff-abbrev"><?= $aff['abbreviation'] ?></div>
            <div class="aff-location"><?= $aff['location'] ?></div>
        </div>

        <a href="https://sinta.kemdiktisaintek.go.id/affiliations/profile/184" target="_blank" class="aff-link">
            Buka Profil SINTA →
        </a>
    </div>

    <div class="stat-card" style="margin-top:25px;">
        <div class="stat-title">Combined Line Chart</div>
        <div class="chart-wrapper">
            <canvas id="combinedLineChart" height="200"></canvas>
        </div>
    </div>


    <!-- GRID -->
    <!-- <div class="stats-grid"> -->

    <!-- LEFT: SCORE -->
    <!-- CHART SINTA SCORE -->
    <!-- <div class="stat-card" style="margin-top:25px;">
            <div class="stat-title">SINTA Score Chart</div>
            <div class="chart-wrapper">
                <canvas id="sintaScoreChart" height="140"></canvas>
            </div>
        </div> -->


    <!-- CHART ARTIKEL -->
    <!-- <div class="stat-card" style="margin-top:25px;">
            <div class="stat-title">Articles Chart</div>
            <div class="chart-wrapper">
                <canvas id="articlesChart" height="140"></canvas>
            </div>
        </div> -->

    <!-- CHART AUTHORS & JOURNALS -->
    <!-- <div class="stat-card" style="margin-top:25px;">
            <div class="stat-title">Authors & Journals Chart</div>
            <div class="chart-wrapper">
                <canvas id="authorsJournalsChart" height="140"></canvas>
            </div>
        </div> -->


    <!-- CHART CITATIONS -->
    <!-- <div class="stat-card" style="margin-top:25px;">
            <div class="stat-title">Citations Chart</div>
            <div class="chart-wrapper">
                <canvas id="citationsChart" height="140"></canvas>
            </div>
        </div>

    </div> -->
    <br>
    <div class="stat-card" style="margin-top:25px;">
        <div class="stat-title">Total Sinta Artikel Program Studi</div>
        <div class="chart-wrapper">
            <canvas id="articlesStackedChart" height="180"></canvas>
        </div>
    </div>

    <br>
    <div class="stat-card" style="margin-top:25px;">
        <div class="stat-title">Total Sinta Artikel Fakultas</div>
        <div class="chart-wrapper">
            <canvas id="articlesStackedChartFakultas" height="180"></canvas>
        </div>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // ==========================
    // DATA DARI DATABASE
    // ==========================
    const aff = {
        sinta_overall: <?= $aff['sinta_overall'] ?>,
        sinta_3years: <?= $aff['sinta_3years'] ?>,
        sinta_productivity: <?= $aff['sinta_productivity'] ?>,
        sinta_productivity_3years: <?= $aff['sinta_productivity_3years'] ?>,

        articles_scopus: <?= $aff['articles_scopus'] ?>,
        articles_scholar: <?= $aff['articles_scholar'] ?>,
        articles_wos: <?= $aff['articles_wos'] ?>,
        articles_garuda: <?= $aff['articles_garuda'] ?>,

        authors: <?= $aff['authors'] ?>,
        departments: <?= $aff['departments'] ?>,
        journals: <?= $aff['journals'] ?>,

        citations_scopus: <?= $aff['citations_scopus'] ?>,
        citations_scholar: <?= $aff['citations_scholar'] ?>,
        citations_wos: <?= $aff['citations_wos'] ?>,
        citations_garuda: <?= $aff['citations_garuda'] ?>
    };

    // Warna garis
    const lineColor = "#36A2EB";


    // Style Line Chart
    const lineOptions = {
        responsive: true,
        tension: 0.4,
        borderWidth: 3,
        pointRadius: 5,
        pointHoverRadius: 7,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 10
                }
            }
        }
    };

    // =======================================================
    // 1. LINE CHART — SINTA SCORE
    // =======================================================
    new Chart(document.getElementById("sintaScoreChart"), {
        type: "line",
        data: {
            labels: ["Overall", "3 Years", "Productivity", "Productivity 3 Years"],
            datasets: [{
                label: "SINTA Score",
                data: [
                    aff.sinta_overall,
                    aff.sinta_3years,
                    aff.sinta_productivity,
                    aff.sinta_productivity_3years
                ],
                borderColor: lineColor,
                backgroundColor: lineColor + "33"
            }]
        },
        options: lineOptions
    });


    // =======================================================
    // 2. LINE CHART — ARTICLES
    // =======================================================
    new Chart(document.getElementById("articlesChart"), {
        type: "line",
        data: {
            labels: ["Scopus", "Scholar", "WoS", "Garuda"],
            datasets: [{
                label: "Articles",
                data: [
                    aff.articles_scopus,
                    aff.articles_scholar,
                    aff.articles_wos,
                    aff.articles_garuda
                ],
                borderColor: "#FF9F40",
                backgroundColor: "#FF9F4033"
            }]
        },
        options: lineOptions
    });


    // =======================================================
    // 3. LINE CHART — AUTHORS & JOURNALS
    // =======================================================
    new Chart(document.getElementById("authorsJournalsChart"), {
        type: "line",
        data: {
            labels: ["Authors", "Departments", "Journals"],
            datasets: [{
                label: "Count",
                data: [
                    aff.authors,
                    aff.departments,
                    aff.journals
                ],
                borderColor: "#4BC0C0",
                backgroundColor: "#4BC0C033"
            }]
        },
        options: lineOptions
    });


    // =======================================================
    // 4. LINE CHART — CITATIONS
    // =======================================================
    new Chart(document.getElementById("citationsChart"), {
        type: "line",
        data: {
            labels: ["Scopus", "Scholar", "WoS", "Garuda"],
            datasets: [{
                label: "Citations",
                data: [
                    aff.citations_scopus,
                    aff.citations_scholar,
                    aff.citations_wos,
                    aff.citations_garuda
                ],
                borderColor: "#9966FF",
                backgroundColor: "#9966FF33"
            }]
        },
        options: lineOptions
    });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {

    const aff = {
        sinta_overall: <?= $aff['sinta_overall'] ?>,
        sinta_3years: <?= $aff['sinta_3years'] ?>,
        sinta_productivity: <?= $aff['sinta_productivity'] ?>,
        sinta_productivity_3years: <?= $aff['sinta_productivity_3years'] ?>,

        articles_scopus: <?= $aff['articles_scopus'] ?>,
        articles_scholar: <?= $aff['articles_scholar'] ?>,
        articles_wos: <?= $aff['articles_wos'] ?>,
        articles_garuda: <?= $aff['articles_garuda'] ?>,

        authors: <?= $aff['authors'] ?>,
        departments: <?= $aff['departments'] ?>,
        journals: <?= $aff['journals'] ?>,

        citations_scopus: <?= $aff['citations_scopus'] ?>,
        citations_scholar: <?= $aff['citations_scholar'] ?>,
        citations_wos: <?= $aff['citations_wos'] ?>,
        citations_garuda: <?= $aff['citations_garuda'] ?>
    };

    const labels = [
        "Sinta Overall",
        "Sinta 3 Years",
        "Sinta Productivity",
        "Sinta Prod. 3Y",
        "Articles Scopus",
        "Articles Scholar",
        "Articles WoS",
        "Articles Garuda",
        "Authors",
        "Departments",
        "Journals",
        "Citations Scopus",
        "Citations Scholar",
        "Citations WoS",
        "Citations Garuda"
    ];

    // Dataset kategori dengan warna berbeda
    const datasets = [{
            label: "SINTA Score",
            borderColor: "#36A2EB",
            backgroundColor: "rgba(54,162,235,0.3)",
            tension: 0.4,
            borderWidth: 3,
            data: [
                aff.sinta_overall,
                aff.sinta_3years,
                aff.sinta_productivity,
                aff.sinta_productivity_3years,
                null, null, null, null,
                null, null, null,
                null, null, null, null
            ]
        },
        {
            label: "Articles",
            borderColor: "#FF9F40",
            backgroundColor: "rgba(255,159,64,0.3)",
            tension: 0.4,
            borderWidth: 3,
            data: [
                null, null, null, null,
                aff.articles_scopus,
                aff.articles_scholar,
                aff.articles_wos,
                aff.articles_garuda,
                null, null, null,
                null, null, null, null
            ]
        },
        {
            label: "Authors & Journals",
            borderColor: "#4BC0C0",
            backgroundColor: "rgba(75,192,192,0.3)",
            tension: 0.4,
            borderWidth: 3,
            data: [
                null, null, null, null,
                null, null, null, null,
                aff.authors,
                aff.departments,
                aff.journals,
                null, null, null, null
            ]
        },
        {
            label: "Citations",
            borderColor: "#9966FF",
            backgroundColor: "rgba(153,102,255,0.3)",
            tension: 0.4,
            borderWidth: 3,
            data: [
                null, null, null, null,
                null, null, null, null,
                null, null, null,
                aff.citations_scopus,
                aff.citations_scholar,
                aff.citations_wos,
                aff.citations_garuda
            ]
        }
    ];

    new Chart(document.getElementById("combinedLineChart"), {
        type: "line",
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            responsive: true,
            interaction: {
                mode: "index",
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true
                },
                x: {
                    ticks: {
                        maxRotation: 80,
                        minRotation: 40
                    }
                }
            }
        }
    });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {

    const d = <?= json_encode($prodi_articles) ?>;

    if (!d || d.length === 0) {
        console.warn("Data artikel per prodi kosong");
        return;
    }

    new Chart(document.getElementById("articlesStackedChart"), {
        type: "bar",
        data: {
            labels: d.map(x => `${x.prodi} (${x.jenjang_name})`),
            datasets: [{
                    label: "Scopus",
                    data: d.map(x => Number(x.scopus)),
                    backgroundColor: "#FF6384"
                },
                {
                    label: "Scholar",
                    data: d.map(x => Number(x.scholar)),
                    backgroundColor: "#36A2EB"
                },
                {
                    label: "WoS",
                    data: d.map(x => Number(x.wos)),
                    backgroundColor: "#FFCE56"
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true,
                    beginAtZero: true
                }
            }
        }
    });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {

    const d = <?= json_encode($fakultas_articles) ?>;

    if (!d || d.length === 0) {
        console.warn("Data artikel per fakultas kosong");
        return;
    }

    new Chart(document.getElementById("articlesStackedChartFakultas"), {
        type: "bar",
        data: {
            labels: d.map(x => `${x.fakultas}`),
            datasets: [{
                    label: "Scopus",
                    data: d.map(x => Number(x.scopus)),
                    backgroundColor: "#FF6384"
                },
                {
                    label: "Scholar",
                    data: d.map(x => Number(x.scholar)),
                    backgroundColor: "#36A2EB"
                },
                {
                    label: "WoS",
                    data: d.map(x => Number(x.wos)),
                    backgroundColor: "#FFCE56"
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true,
                    beginAtZero: true
                }
            },
            plugins: {
                datalabels: {
                    color: "#000",
                    anchor: "center",
                    align: "center",
                    font: {
                        weight: "bold",
                        size: 11
                    },
                    formatter: function(value) {
                        return value > 0 ? value : '';
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

});
</script>