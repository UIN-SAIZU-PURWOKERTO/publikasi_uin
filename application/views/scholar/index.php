<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-3">
                    <div>
                        <h4 class="mb-3 mb-md-0">Data Scholar Publication</h4>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>Filter Tahun</label>
                        <select id="filter_year" class="form-control select2">
                            <option value="">Semua Tahun</option>
                            <?php foreach ($years as $y): ?>
                            <option value="<?= $y['year'] ?>"><?= $y['year'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Filter Akreditasi</label>
                        <select id="filter_acc" class="form-control select2">
                            <option value="">Semua Akreditasi</option>
                            <?php foreach ($accreditations as $a): ?>
                            <option value="<?= $a['accreditation'] ?>"><?= $a['accreditation'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="tableScholar" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Author Sinta</th>
                                <th>Accreditation</th>
                                <th>Title</th>
                                <th>Journal</th>
                                <th>Author</th>
                                <th>Year</th>
                                <th>Citation</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var table = $('#tableScholar').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?= base_url('scholar/ajax_publication') ?>",
            "type": "POST",
            "data": function(d) {
                d.year = $('#filter_year').val();
                d.accreditation = $('#filter_acc').val();
            }
        },
        "columnDefs": [
            {
                "targets": [0],
                "orderable": false,
            },
        ],
        "language": {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
            "infoFiltered": "(disaring dari _MAX_ total data)",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });

    $('#filter_year, #filter_acc').change(function() {
        table.ajax.reload();
    });
});
</script>