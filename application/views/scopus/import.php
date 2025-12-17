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

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Data Scopus Publication</h4>
                    </div>
                </div>


                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>Creator Scopus</th>
                                <th>Citation</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
								foreach ($result as $data) : ?>
                            <tr>
                                <!-- <td>

                                    <a href="<?= base_url('master/hapususer/'); ?><?php echo $data['jadwal_id']; ?>"
                                        class="btn btn-outline-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i>
                                        Hapus
                                    </a>
                                </td> -->
                                <td><?= $no++; ?></td>
                                <td><?= getAuthor($data['author_id'], 'name'); ?></td>
                                <td><?= $data['year']; ?></td>
                                <td><?= $data['publication_name']; ?></td>
                                <td><?= $data['creator']; ?></td>
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