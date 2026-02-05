</div>
</div>
</div>



<?php if ($javascript) : ?>
<?php foreach ($javascript as $js) : ?>
<script type="text/javascript" src="<?php echo base_url('assets/dist/') . $js;  ?>"></script>
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