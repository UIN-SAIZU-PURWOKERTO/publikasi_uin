<style>
    .aff-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-top: 25px;
    }

    @media (max-width: 992px) {
        .aff-grid {
            grid-template-columns: 1fr;
        }
    }

    .aff-grid-full {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 20px;
    margin-top: 25px;
    }

    @media (max-width: 992px) {
        .aff-grid-full {
            grid-template-columns: 1fr;
        }
    }

</style>
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

    <div class="aff-grid-full">

        <!-- Fakultas -->
        <div class="stat-card">
            <div class="stat-title">Sitasi Scopus Fakultas per Tahun</div>
            <canvas id="chart_faculty" height="180"></canvas>
        </div>
        
    </div>

    <div class="aff-grid">

        <!-- FTIK -->
        <div class="stat-card">
            <div class="stat-title">Sitasi Scopus FTIK per Tahun</div>
            <canvas id="chart_ftik" height="180"></canvas>
        </div>

        <!-- DAKWAH -->
        <div class="stat-card">
            <div class="stat-title">Sitasi Scopus Dakwah per Tahun</div>
            <canvas id="chart_dakwah" height="180"></canvas>
        </div>

        <!-- SYARIAH -->
        <div class="stat-card">
            <div class="stat-title">Sitasi Scopus Syariah per Tahun</div>
            <canvas id="chart_syariah" height="180"></canvas>
        </div>

        <!-- FUAD -->
        <div class="stat-card">
            <div class="stat-title">Sitasi Scopus FUAH per Tahun</div>
            <canvas id="chart_fuah" height="180"></canvas>
        </div>

        <!-- FEBI -->
        <div class="stat-card">
            <div class="stat-title">Sitasi Scopus FEBI per Tahun</div>
            <canvas id="chart_febi" height="180"></canvas>
        </div>

        <!-- PASCA -->
        <div class="stat-card">
            <div class="stat-title">Sitasi Scopus Pascasarjana per Tahun</div>
            <canvas id="chart_pasca" height="180"></canvas>
        </div>

    </div>

    <!-- INI UNTUK JUMLAH PUBLIKASI SCHOLAR -->
    <div class="aff-grid-full">

        <!-- Fakultas -->
        <div class="stat-card">
            <div class="stat-title">Publikasi Scholar Fakultas per Tahun</div>
            <canvas id="chart_faculty_pub" height="180"></canvas>
        </div>
        
    </div>

    <div class="aff-grid">

        <!-- FTIK -->
        <div class="stat-card">
            <div class="stat-title">Publikasi FTIK per Tahun</div>
            <canvas id="chart_ftik_pub" height="180"></canvas>
        </div>

        <!-- DAKWAH -->
        <div class="stat-card">
            <div class="stat-title">Publikasi Dakwah per Tahun</div>
            <canvas id="chart_dakwah_pub" height="180"></canvas>
        </div>

        <!-- SYARIAH -->
        <div class="stat-card">
            <div class="stat-title">Publikasi Syariah per Tahun</div>
            <canvas id="chart_syariah_pub" height="180"></canvas>
        </div>

        <!-- FUAD -->
        <div class="stat-card">
            <div class="stat-title">Publikasi FUAH per Tahun</div>
            <canvas id="chart_fuah_pub" height="180"></canvas>
        </div>

        <!-- FEBI -->
        <div class="stat-card">
            <div class="stat-title">Publikasi FEBI per Tahun</div>
            <canvas id="chart_febi_pub" height="180"></canvas>
        </div>

        <!-- PASCA -->
        <div class="stat-card">
            <div class="stat-title">Publikasi Pascasarjana per Tahun</div>
            <canvas id="chart_pasca_pub" height="180"></canvas>
        </div>

    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    function buildLineChart(canvasId, rawData, label, color) {

        if (!rawData || rawData.length === 0) {
            console.warn(label + " kosong");
            return;
        }

        const labels = rawData.map(x => x.tahun);
        const values = rawData.map(x => Number(x.jumlah_sitasi));

        new Chart(document.getElementById(canvasId), {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: values,
                    borderColor: color,
                    backgroundColor: color + "33",
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Jumlah Sitasi"
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Tahun"
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    function buildLineChartPublikasi(canvasId, rawData, label, color) {

        if (!rawData || rawData.length === 0) {
            console.warn(label + " kosong");
            return;
        }

        const labels = rawData.map(x => x.tahun);
        const values = rawData.map(x => Number(x.jumlah_sitasi));

        new Chart(document.getElementById(canvasId), {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: values,
                    borderColor: color,
                    backgroundColor: color + "33",
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Jumlah Publikasi"
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Tahun"
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    function buildBarChart(canvasId, rawData) {

        if (!rawData || rawData.length === 0) {
            console.warn("Data kosong");
            return;
        }

        // Ambil daftar tahun unik
        const years = [...new Set(rawData.map(x => x.tahun))].sort();

        // Ambil daftar fakultas unik
        const faculties = [...new Set(rawData.map(x => x.fakultas_name))];

        // Warna otomatis
        const colors = [
            "#36eb5d",
            "#4287f5",
            "#f54291",
            "#f5a142",
            "#8e44ad",
            "#16a085",
            "#e74c3c"
        ];

        // Buat dataset per fakultas
        const datasets = faculties.map((faculty, index) => {

            const dataPerFaculty = years.map(year => {
                const found = rawData.find(x => x.tahun == year && x.fakultas_name == faculty);
                return found ? Number(found.jumlah_sitasi) : 0;
            });

            return {
                label: faculty,
                data: dataPerFaculty,
                backgroundColor: colors[index % colors.length],
                borderColor: colors[index % colors.length],
                borderWidth: 1
            };
        });

        new Chart(document.getElementById(canvasId), {
            type: "bar",
            data: {
                labels: years,
                datasets: datasets
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Jumlah Sitasi"
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Tahun"
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    }

    function buildBarChartPublikasi(canvasId, rawData) {

        if (!rawData || rawData.length === 0) {
            console.warn("Data kosong");
            return;
        }

        // Ambil daftar tahun unik
        const years = [...new Set(rawData.map(x => x.tahun))].sort();

        // Ambil daftar fakultas unik
        const faculties = [...new Set(rawData.map(x => x.fakultas_name))];

        // Warna otomatis
        const colors = [
            "#36eb5d",
            "#4287f5",
            "#f54291",
            "#f5a142",
            "#8e44ad",
            "#16a085",
            "#e74c3c"
        ];

        // Buat dataset per fakultas
        const datasets = faculties.map((faculty, index) => {

            const dataPerFaculty = years.map(year => {
                const found = rawData.find(x => x.tahun == year && x.fakultas_name == faculty);
                return found ? Number(found.jumlah_sitasi) : 0;
            });

            return {
                label: faculty,
                data: dataPerFaculty,
                backgroundColor: colors[index % colors.length],
                borderColor: colors[index % colors.length],
                borderWidth: 1
            };
        });

        new Chart(document.getElementById(canvasId), {
            type: "bar",
            data: {
                labels: years,
                datasets: datasets
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Jumlah Publikasi"
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Tahun"
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    }

    // =====================
    // DATA DARI CONTROLLER
    // =====================
    buildBarChart(
    "chart_faculty",
        <?= json_encode($scopus_faculty) ?>
    );


    buildLineChart(
        "chart_ftik",
        <?= json_encode($scopus_ftik) ?>,
        "FTIK",
        "#36A2EB"
    );

    buildLineChart(
        "chart_dakwah",
        <?= json_encode($scopus_dakwah) ?>,
        "Dakwah",
        "#FF9F40"
    );

    buildLineChart(
        "chart_syariah",
        <?= json_encode($scopus_syariah) ?>,
        "Syariah",
        "#4BC0C0"
    );

    buildLineChart(
        "chart_fuah",
        <?= json_encode($scopus_fuah) ?>,
        "FUAD",
        "#9966FF"
    );

    buildLineChart(
        "chart_febi",
        <?= json_encode($scopus_febi) ?>,
        "FEBI",
        "#FF6384"
    );

    buildLineChart(
        "chart_pasca",
        <?= json_encode($scopus_pasca) ?>,
        "Pascasarjana",
        "#2ECC71"
    );

    // INI UNTUK JUMLAH PUBLIKASI SCHOLAR

    buildBarChartPublikasi(
    "chart_faculty_pub",
        <?= json_encode($scopus_faculty_pub) ?>
    );


    buildLineChartPublikasi(
        "chart_ftik_pub",
        <?= json_encode($scopus_ftik_pub) ?>,
        "FTIK",
        "#36A2EB"
    );

    buildLineChartPublikasi(
        "chart_dakwah_pub",
        <?= json_encode($scopus_dakwah_pub) ?>,
        "Dakwah",
        "#FF9F40"
    );

    buildLineChartPublikasi(
        "chart_syariah_pub",
        <?= json_encode($scopus_syariah_pub) ?>,
        "Syariah",
        "#4BC0C0"
    );

    buildLineChartPublikasi(
        "chart_fuah_pub",
        <?= json_encode($scopus_fuah_pub) ?>,
        "FUAD",
        "#9966FF"
    );

    buildLineChartPublikasi(
        "chart_febi_pub",
        <?= json_encode($scopus_febi_pub) ?>,
        "FEBI",
        "#FF6384"
    );

    buildLineChartPublikasi(
        "chart_pasca_pub",
        <?= json_encode($scopus_pasca_pub) ?>,
        "Pascasarjana",
        "#2ECC71"
    );
});
</script>