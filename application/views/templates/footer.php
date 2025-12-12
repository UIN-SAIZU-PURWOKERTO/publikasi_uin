</div>
</section>
</div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#">UPT TIPD UIN SAIZU @BINA</a>.</strong> All rights reserved.
</footer>


</div>
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets/') ?>controllers/my.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
<?php foreach ($javascript_controllers as $jsv) : ?>
<script type="text/javascript" src="<?php echo base_url('assets/controllers/') . $jsv;  ?>"></script>
<?php endforeach; ?>
<?php endif; ?>

</body>

</html>