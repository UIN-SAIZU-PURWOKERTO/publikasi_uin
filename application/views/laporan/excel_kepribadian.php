<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Tgl Lahir</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Kepribadian 1</th>
            <th>Kepribadian 2</th>
            <th>Belajar 1</th>
            <th>Belajar 2</th>
            <th>Minat 1</th>
            <th>Minat 2</th>
            <th>Nilai Hidup 1</th>
            <th>Nilai Hidup 2</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($result as $data): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nim'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= getProdi($data['prodi_id'],'nama_program_studi') ?></td>
            <td><?= $data['tanggal_lahir'] ?></td>
            <td><?= $data['kota_asal'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['tipe_kepribadian_dominan_1'] ?></td>
            <td><?= $data['tipe_kepribadian_dominan_2'] ?></td>
            <td><?= $data['gaya_belajar_dominan_1'] ?></td>
            <td><?= $data['gaya_belajar_dominan_2'] ?></td>
            <td><?= $data['bidang_minat_1'] ?></td>
            <td><?= $data['bidang_minat_2'] ?></td>
            <td><?= $data['nilai_hidup_1'] ?></td>
            <td><?= $data['nilai_hidup_2'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>