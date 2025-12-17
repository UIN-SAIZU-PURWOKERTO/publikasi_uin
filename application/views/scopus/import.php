<div class="card">
    <div class="card-header">
        <h3>Import Scopus Publications</h3>
    </div>

    <div class="card-body">
        <?php if ($this->session->flashdata('msg')): ?>
        <div class="alert alert-info">
            <?= $this->session->flashdata('msg') ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('scopus/import_process') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>File Excel (.xls / .xlsx)</label>
                <input type="file" name="file" class="form-control" required>
            </div>

            <button class="btn btn-primary">
                Import Data
            </button>
        </form>
    </div>
</div>