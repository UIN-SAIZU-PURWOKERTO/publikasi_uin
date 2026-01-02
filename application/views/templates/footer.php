</div>
</section>
</div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#">UPT TIPD UIN SAIZU @ BSD</a>.</strong> All rights reserved.
</footer>


</div>

<?php if ($javascript) : ?>
<?php foreach ($javascript as $js) : ?>
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/') . $js;  ?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<?php if ($javascript_vendors) : ?>
<?php foreach ($javascript_vendors as $jsv) : ?>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/') . $jsv;  ?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<?php if ($javascript_controllers) : ?>
<?php foreach ($javascript_controllers as $jsc) : ?>
<script type="text/javascript" src="<?php echo base_url('assets/controllers/') . $jsc;  ?>"></script>
<?php endforeach; ?>
<?php endif; ?>
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets/') ?>controllers/my.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>


<script>
$(function() {
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

});
</script>

<script>
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
</script>



</body>

</html>