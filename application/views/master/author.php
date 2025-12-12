<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Form Data Author</h4>
                    </div>

                    <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <button type="button" class="btn btn-primary mb-2 mb-md-0" data-toggle="modal"
                            data-target="#modal-xl">
                            <i class="fa fa-plus-square"></i>
                            Tambah Data
                        </button>
                    </div> -->
                </div>


                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Sinta</th>
                                <th>Author</th>
                                <th>Department Sinta</th>
                                <th>Subjects</th>
                                <th>Program Studi</th>
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
                                <td><?= $data['id']; ?></td>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['department']; ?></td>
                                <td><?= $data['subjects']; ?></td>
                                <td data-author="<?= $data['id']; ?>">

                                    <b><?= getProdi($data['prodi_id'], 'nama_program_studi'); ?></b>
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalProdi"
                                        data-id="<?= $data['id']; ?>">
                                        Pilih Prodi
                                    </button>

                                    <!-- hidden input untuk menyimpan ID prodi -->
                                    <input type="hidden" id="prodi_id" name="prodi_id"
                                        value="<?= $data['prodi_id']; ?>">
                                    <input type="hidden" id="author_id" name="author_id" value="<?= $data['id']; ?>">
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ========== MODAL PILIH PRODI (BOOTSTRAP 4) ========== -->
<div class="modal fade" id="modalProdi" tabindex="-1" role="dialog" aria-labelledby="modalProdiLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalProdiLabel">Pilih Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body p-0">
                <ul class="list-group">
                    <?php foreach ($listProdi as $p): ?>
                    <li class="list-group-item pilih-prodi" data-id="<?= $p['id']; ?>"
                        data-nama="<?= $p['nama_program_studi']; ?>">
                        <?= $p['nama_program_studi']; ?> (<?= $p['nama_jenjang_pendidikan']; ?>)
                    </li>
                    <?php endforeach; ?>
                </ul>

                <input type="text" id="selected_author_id">
            </div>

        </div>
    </div>
</div>

<!-- <script>
$(document).ready(function() {

    $('#modalProdi').on('show.bs.modal', function(event) {
        let authorId = button.data('id'); // ambil data-id dari button
        console.log("Author ID:", authorId);
        // tampilkan ke judul modal
        $('#modalProdiLabel').text('Pilih Program Studi (ID: ' + authorId + ')');

        // atau tampilkan ke body modal
        $('#modalProdi .modal-body').prepend(
            '<div class="alert alert-info mb-2" id="infoId">Author ID: ' + authorId + '</div>'
        );
    });

    // supaya tidak dobel setiap buka modal
    // $('#modalProdi').on('hidden.bs.modal', function() {
    //     $('#infoId').remove();
    // });

});
</script> -->

<script>
$(document).on('click', '[data-target="#modalProdi"]', function() {
    currentAuthorId = $(this).data('id');
    console.log("Author ID dikirim:", currentAuthorId);
});
</script>
<script>
let currentAuthorId = null;

document.addEventListener("DOMContentLoaded", function() {

    // tangkap tombol klik
    $(document).on('click', '[data-target="#modalProdi"]', function() {
        currentAuthorId = $(this).data('id');
        console.log("Author aktif:", currentAuthorId);
    });

    // klik prodi
    $(document).on("click", ".pilih-prodi", function() {

        let prodiID = $(this).data("id");
        let prodiNama = $(this).data("nama");

        // update tampilan baris yang sesuai
        let row = $('td[data-author="' + currentAuthorId + '"]');

        row.html(`
            ${prodiNama}
            <button class="btn btn-sm btn-primary ml-2" data-toggle="modal" data-target="#modalProdi" data-id="${currentAuthorId}">
                Pilih Prodi
            </button>
            <input type="hidden" class="prodi_id" name="prodi_id" value="${prodiID}">
            <input type="hidden" class="author_id" name="author_id" value="${currentAuthorId}">
        `);

        $("#modalProdi").modal("hide");

        // AJAX kirim data yang BENAR
        $.ajax({
            url: "<?= base_url('master/update_prodau'); ?>",
            type: "POST",
            data: {
                author_id: currentAuthorId,
                prodi_id: prodiID
            },
            success: function(response) {
                console.log("Updated:", response);
            },
            error: function() {
                alert("Gagal update prodi!");
            }
        });

    });

});
</script>