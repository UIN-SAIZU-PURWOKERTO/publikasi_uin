<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style type="text/css">
    @page {
        margin-top: 2cm;
        margin-left: 1cm;
        margin-right: 1cm;
        margin-bottom: 2cm;
        font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
    }

    .tabel {
        border-collapse: collapse;
        font-size: 11px;
        width: 100%;
    }

    .tabel th,
    .tabel td {
        border: 1px solid #000;
        padding: 4px;
    }

    table {
        page-break-inside: auto
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto
    }

    thead {
        display: table-header-group
    }

    tfoot {
        display: table-footer-group
    }
    </style>
</head>

<body>
    <?php $this->load->view('templates/kop') ?>
    <center>
        <b><span style="font-size: 18px"><?= $title ?></span></b>
    </center>

    <br>

    <table width="100%" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <td width="15%">Tanggal Cetak</td>
            <td>: <?= date('d-m-Y') ?></td>
            <td width="15%">Jumlah Data</td>
            <td>: <?= count($result) ?></td>
        </tr>
        <tr>
            <td width="15%">Dari Tanggal</td>
            <td>: <?= $tgl_awal ?></td>
            <td width="15%"></td>
            <td></td>
        </tr>
        <tr>
            <td width="15%">Sampai Tanggal</td>
            <td>: <?= $tgl_akhir ?></td>
            <td width="15%"></td>
            <td></td>
        </tr>
    </table>

    <br><br>

    <table class="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Total Score</th>
                <th>Readiness Level</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($result as $data): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nim'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= getProdi($data['prodi_id'],'nama_program_studi'); ?></td>
                <td><?= $data['tanggal_lahir'] ?></td>
                <td><?= $data['kota_asal'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['total_score'] ?></td>
                <td><?= $data['readiness_level'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><br>

    <table width="100%" border="0">
        <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td colspan="2" align="left">Purwokerto, <?= date('d-m-Y') ?></td>
        </tr>
        <tr>
            <td width="34%" align="center"></td>
            <td width="33%" align="center">&nbsp;</td>
            <td width="33%" align="left">Kepala UPT Pengembangan Karir</td>
        </tr>
        <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td align="center"></td>
            <td align="center">&nbsp;</td>
            <td align="left">Aris Nurohman</td>
        </tr>
        <tr>
            <td align="center"></td>
            <td align="center">&nbsp;</td>
            <td align="left"></td>
        </tr>
    </table>

</body>

</html>