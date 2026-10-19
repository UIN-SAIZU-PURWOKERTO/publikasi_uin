</div>
</section>
</div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#">LPPM Uin Saizu Purwokerto @ UPT TIPD</a>.</strong> All rights reserved.
</footer>


</div>

<!-- jQuery & Bootstrap Core (Must load before any jQuery plugins) -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets/') ?>controllers/my.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

<!-- Vendor Plugins (DataTables, Select2, SweetAlert2, etc.) -->
<?php if (!empty($javascript_vendors)) : ?>
<?php foreach ($javascript_vendors as $jsv) : ?>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/') . $jsv;  ?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<!-- App Scripts -->
<?php if (!empty($javascript)) : ?>
<?php foreach ($javascript as $js) : ?>
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/') . $js;  ?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<!-- Controller Specific Scripts -->
<?php if (!empty($javascript_controllers)) : ?>
<?php foreach ($javascript_controllers as $jsc) : ?>
<script type="text/javascript" src="<?php echo base_url('assets/controllers/') . $jsc;  ?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<script>
$(function() {
    if ($('#tableScholar').length) {
        $('#tableScholar').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url('scholar/ajax_publication') ?>",
                type: "POST",
                data: function(d) {
                    d['<?= $this->security->get_csrf_token_name(); ?>'] =
                        '<?= $this->security->get_csrf_hash(); ?>';
                }
            },
            columns: [{
                    data: 0
                },
                {
                    data: 1
                },
                {
                    data: 2
                },
                {
                    data: 3
                },
                {
                    data: 4
                },
                {
                    data: 5
                },
                {
                    data: 6
                },
                {
                    data: 7
                }
            ]
        });
    }
});
</script>

<?php if (!empty($author)) : ?>
<script>
const ctx = document.getElementById('metricRadar');
if (ctx) {
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
                    <?= (int)($author['articles_scholar'] ?? 0) ?>,
                    <?= (int)($author['citations_scholar'] ?? 0) ?>,
                    <?= (int)($author['h_index_scholar'] ?? 0) ?>,
                    <?= (int)($author['i10_index_scholar'] ?? 0) ?>,
                    <?= (float)($author['score_overall'] ?? 0) ?>,
                    <?= (float)($author['score_3_years'] ?? 0) ?>
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
}
</script>
<?php endif; ?>

</body>

</html>