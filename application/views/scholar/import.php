<div class="card">
    <div class="card-header">
        <h3>Import Scholar Publications</h3>
    </div>

    <div class="card-body">
        <?php if ($this->session->flashdata('msg')): ?>
        <div class="alert alert-info">
            <?= $this->session->flashdata('msg') ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('scholar/import_process') ?>" method="post" enctype="multipart/form-data">
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
                        <h4 class="mb-3 mb-md-0">Data Scholar Publication</h4>
                    </div>
                </div>


                <div class="card-body">
                    <table id="tableScholar" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Author Sinta</th>
                                <th>accreditation</th>
                                <th>title</th>
                                <th>journal</th>
                                <th>author</th>
                                <th>year</th>
                                <th>citation</th>
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
                                <td><?= $data['accreditation']; ?></td>
                                <td><?= $data['title']; ?></td>
                                <td><?= $data['journal']; ?></td>
                                <td><?= $data['author']; ?></td>
                                <td><?= $data['year']; ?></td>
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
                                <td><?= $data['accreditation']; ?></td>
                                <td><?= $data['title']; ?></td>
                                <td><?= $data['journal']; ?></td>
                                <td><?= $data['author']; ?></td>
                                <td><?= $data['year']; ?></td>
                                <td><?= $data['citation']; ?></td>
                            </tr>
                            <?php endforeach; ?>

