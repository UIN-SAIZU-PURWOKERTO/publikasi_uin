<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Form Data Jadwal Tes</h4>
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
                                <th></th>
                                <th>ID</th>
                                <th>tanggal_dari</th>
                                <th>tanggal_sampai</th>
                                <th>angkatan</th>
                                <th>jenis tes</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
								foreach ($result as $data) : ?>
                            <tr>
                                <td>

                                    <!-- <a data-toggle="modal" data-target="#modal-edit<?= $data['jadwal_id']; ?>"
                                        class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i>
                                        Ubah
                                    </a> -->

                                    <a href="<?= base_url('master/hapusjadwal/'); ?><?php echo $data['jadwal_id']; ?>"
                                        class="btn btn-outline-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i>
                                        Hapus
                                    </a>
                                </td>
                                <td><?= $no++; ?></td>
                                <td><?= $data['tanggal_dari']; ?></td>
                                <td><?= $data['tanggal_sampai']; ?></td>
                                <td><?= $data['angkatan']; ?></td>
                                <td><?= getJenistesName($data['jenistes_id']); ?></td>
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
                <h4 class="modal-title h4" id="myLargeModalLabel">Tambah Data Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="post" action="<?= base_url('master/simpanjadwal') ?>">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Tanggal Dari</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_dari" name="tanggal_dari"
                                placeholder="Tanggal Dari">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Tanggal Sampai</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_sampai" name="tanggal_sampai"
                                placeholder="Tanggal Sampai">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Angkatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="angkatan" name="angkatan"
                                placeholder="Angkatan">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Jenis Tes Yang Aktif</label>
                        <div class="col-sm-9">
                            <?php foreach ($jenistes as $tes): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jenistes[]"
                                    id="tes_<?= $tes->jenistes_id ?>" value="<?= $tes->jenistes_id ?>">
                                <label class="form-check-label" for="tes_<?= $tes->jenistes_id ?>">
                                    <?= $tes->jenistes_name ?>
                                </label>
                            </div>
                            <?php endforeach; ?>

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

<?php foreach($result as $loaddata): ?>
<div id="modal-edit<?= $loaddata['jadwal_id']; ?>" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Ubah Data Pejabat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="post" action="<?= base_url('master/ubahPejabat') ?>">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="id" name="id" value="<?= $loaddata['id']; ?>"
                                placeholder="ID Kelas" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= $loaddata['nama']; ?>" placeholder="Nama Jabatan">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="uid" id="uid">
                                <option value="">--Pilih--</option>
                                <?php if (!empty($pejabat)) : ?>
                                <?php foreach ($pejabat as $nilai) : ?>
                                <option value="<?= $nilai['uid']; ?>"
                                    <?= $nilai['uid'] == ''.$loaddata['uid'].'' ? ' selected="selected"' : '';?>>
                                    <?= $nilai['pd_nickname']; ?></option>
                                <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <div class="btn btn-secondary" data-dismiss="modal">Close</div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>