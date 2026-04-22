<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Jurnal</h4>
                    </div>

                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <button type="button" class="btn btn-primary mb-2 mb-md-0" data-toggle="modal"
                            data-target="#modal-xl">
                            <i class="fa fa-plus-square"></i>
                            Tambah Data
                        </button>
                    </div>
                </div>


                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Identitas</th>
                                <th>Nama</th>
                                <th>ISSN</th>
                                <th>Penerbit</th>
                                <th>Sinta</th>
                                <th>Link</th>
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
                                <td><?= $data['identitas']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['issn']; ?></td>
                                <td><?= $data['penerbit']; ?></td>
                                <td><?= $data['sinta']; ?></td>
                                <td><?= $data['link']; ?></td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title h4" id="myLargeModalLabel">Tambah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="post" action="<?= base_url('jurnal/addJurnal') ?>">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Identitas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="identitas" name="identitas" placeholder="Identitas">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="nama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">ISSN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="issn" name="issn" placeholder="issn">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Penerbit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="penerbit" name="penerbit"
                                placeholder="penerbit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Sinta</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="sinta" name="sinta">
                                <option value="">-- Pilih Sinta --</option>
                                <option value="1">Sinta 1</option>
                                <option value="2">Sinta 2</option>
                                <option value="3">Sinta 3</option>
                                <option value="4">Sinta 4</option>
                                <option value="5">Sinta 5</option>
                                <option value="6">Sinta 6</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Link</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="link" name="link"
                                placeholder="link">
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer justify-content-between">
                    <div class="btn btn-secondary" data-dismiss="modal">Close</div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>