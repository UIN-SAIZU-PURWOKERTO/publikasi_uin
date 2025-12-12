<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>REKENING LHK PNP</title>
	<style type="text/css">
		@page {
			margin-top: 2 cm;
			margin-left: 1 cm;
			margin-right: 1 cm;
			margin-bottom: 2 cm;
			font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
		}

		.tabel {
			border-collapse: collapse;
			font-size: 11px;
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
	<div style="width:800px; margin:0 auto;">
        <?php $this->load->view('templates/kop') ?>
		<center>
			<span style="font-size: 14px">LHK PNP</span>
		</center>



		<table width="100%" border="0" cellpadding="1" cellspacing="0" class="header">
			<tr>
				<td width="13%" align="left">Nama</td>
				<td width="59%">: <?php echo $header['nama']; ?></td>
				<td width="12%" align="left">Bulan</td>
				<td width="16%">: <?php echo getBulan($header['bulan']); ?></td>
			</tr>
			<tr>
				<td align="left">Keterangan</td>
				<td>: <?php echo $header['keterangan']; ?></td>
				<td align="left">Tahun</td>
				<td>: <?php echo $header['tahun']; ?></td>
			</tr>
			<tr>
				<td align="left">Bagian</td>
				<td>: <?php echo $this->input->get('ruangan') ?></td>
			</tr>
		</table>

		<br><br>

		<table width="100%" border="1" class="tabel">
			<tbody>
				<tr>
					<td width="2%">No</td>
					<td width="31%">Nama</td>
					<td width="10%">Bagian</td>
					<td width="10%">Gaji Pokok</td>
					<td width="10%">Premi Pegawai</td>
					<td width="10%">Pph 21</td>
					<td width="10%">Gaji Diterima</td>
					<td width="17%">Tanda Tangan</td>
				</tr>
                <?php $no = 1; $sumGaji = 0; $sumPremi = 0; $sumPPH21 = 0; $total = 0; foreach ($result as $data) : ?>
                <?php $sumGaji  += $data['gaji'] ?>
                <?php $sumPremi += $data['premi_peg'] ?>
                <?php $sumPPH21 += $data['pph21'] ?>
                <?php $total    += $data['gaji']-$data['premi_peg']-$data['pph21'] ?>

                    <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_karyawan'] ?></td>
                    <td><?= $data['bagian'] ?></td>
                    <td align="right"><?= getRupiah($data['gaji']) ?></td>
                    <td align="right"><?= getRupiah($data['premi_peg']) ?></td>
                    <td align="right"><?= getRupiah($data['pph21']) ?></td>
                    <td align="right"><?= getRupiah($data['gaji']-$data['premi_peg']-$data['pph21']) ?></td>
                    <td valign="top" align="center"><img src="<?= $data['tanda_tangan'] ?>" height="50px" /></td>
                    </tr>
                <?php endforeach; ?>

            <tr>
                <td colspan="3" align="center"><strong>TOTAL</strong></td>
                <td align="right" style="font-size: 14px"><strong>
                    <?= getRupiah($sumGaji) ?>
                </strong></td>
                <td align="right" style="font-size: 14px"><strong>
                    <?= getRupiah($sumPremi) ?>
                </strong></td>
                <td align="right" style="font-size: 14px"><strong>
                    <?= getRupiah($sumPPH21) ?>
                </strong></td>
                <td align="right" style="font-size: 14px"><strong>
                    <?= getRupiah($total) ?>
                </strong></td>
                <td>&nbsp;</td>
            </tr>

			</tbody>
		</table>
		<table width="100%" border="0">
			<tbody>
				<tr>
					<td align="center">&nbsp;</td>
					<td colspan="2" align="right">Ajibarang,
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= date('Y') ?></td>
				</tr>
				<tr>
					<td width="34%" align="center">Pejabat Pelaksana Teknis Kegiatan</td>
					<td width="33%" align="center">&nbsp;</td>
					<td width="33%" align="center">Bendahara Pengeluaran</td>
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
					<td align="center">&nbsp;</td>
					<td align="center">&nbsp;</td>
					<td align="center">&nbsp;</td>
				</tr>
				<tr>
					<td align="center"><?= getKaryawan($pejabat[2]['uid'], 'pd_nickname') ?></td>
					<td align="center">&nbsp;</td>
					<td align="center"><?= getKaryawan($pejabat[3]['uid'], 'pd_nickname') ?></td>
				</tr>
				<tr>
					<td align="center">NIP: <?= getKaryawan($pejabat[2]['uid'], 'nip') ?></td>
					<td align="center">&nbsp;</td>
					<td align="center">NIP: <?= getKaryawan($pejabat[3]['uid'], 'nip') ?></td>
				</tr>
				<tr>
					<td align="center">&nbsp;</td>
					<td align="center">Menyetujui</td>
					<td align="center">&nbsp;</td>
				</tr>
				<tr>
					<td align="center">&nbsp;</td>
					<td align="center">Direktur RSUD Ajibarang</td>
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
					<td colspan="3" align="center"><?= getKaryawan($pejabat[0]['uid'], 'pd_nickname') ?></td>
				</tr>
				<tr>
					<td align="center">&nbsp;</td>
					<td align="center">NIP: <?= getKaryawan($pejabat[0]['uid'], 'nip') ?></td>
					<td align="center">&nbsp;</td>
				</tr>
			</tbody>
		</table>

	</div>
</body>
</html>