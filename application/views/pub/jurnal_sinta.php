<style>
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
    <div class="aff-header">
        <div>
            <div class="aff-title">Grafik Jurnal Berdasarkan Sinta</div>
            <div class="aff-location">Data Jurnal Terdaftar</div>
        </div>
    </div>

    <div class="aff-grid-full">
        <div class="stat-card">
            <div class="stat-title">Jumlah Jurnal per Level Sinta</div>
            <canvas id="chart_sinta" height="120"></canvas>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const rawData = <?= json_encode($jurnal_sinta) ?>;
    
    if (!rawData || rawData.length === 0) {
        console.warn("Data Sinta kosong");
        return;
    }

    const labels = rawData.map(x => "Sinta " + x.sinta);
    const values = rawData.map(x => Number(x.jumlah));

    new Chart(document.getElementById("chart_sinta"), {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Jumlah Jurnal",
                data: values,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    title: {
                        display: true,
                        text: "Jumlah Jurnal"
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: "Level Sinta"
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
});
</script>
