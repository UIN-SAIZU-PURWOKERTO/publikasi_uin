<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

const ctx = document.getElementById('metricRadar');

new Chart(ctx, {
    type: 'radar',
    data: {
        labels: [
            'Articles',
            'Citations',
            'h-index',
            'i10-index',
            'Score Overall',
            'Score 3 Years'
        ],
        datasets: [{
            data: [
                <?= $author['articles_scholar'] ?>,
                <?= $author['citations_scholar'] ?>,
                <?= $author['h_index_scholar'] ?>,
                <?= $author['i10_index_scholar'] ?>,
                <?= $author['score_overall'] ?>,
                <?= $author['score_3_years'] ?>
            ],
            backgroundColor: 'rgba(0, 17, 53, 0.25)',
            borderColor: '#007bff',
            borderWidth: 2,
            pointBackgroundColor: '#007bff'
        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            r: {
                ticks: {
                    display: false
                },
                grid: {
                    color: '#eee'
                },
                angleLines: {
                    color: '#ddd'
                }
            }
        }
    }
});