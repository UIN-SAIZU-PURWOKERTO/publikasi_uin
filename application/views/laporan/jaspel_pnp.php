<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?= $title ?></title>
	<style type="text/css">
	@page {
            margin-top: 2 cm;
            margin-left: 1 cm;
			margin-right: 1 cm;
			margin-bottom: 2 cm;
			font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
	}
	
	.tabel {
		border-collapse:collapse;
		font-size: 11px;
	}
		
	table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
	
	
	</style>
</head>

<body>
<?php $this->load->view('templates/kop') ?>
<center>
  <span style="font-size: 14px">JASA PELAYANAN PNP</span>
</center>
	
	
	
<table width="100%" border="0" cellpadding="1" cellspacing="0">
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
</table>
	
	<br><br>
	
	<table width="100%" border="1" class="tabel">
  <tbody>
    <tr>
      <td width="2%">No</td>
      <td width="31%">Nama</td>
      <td width="10%">Ruang</td>
      <td width="10%">NIP</td>
      <td width="10%">Total</td>
      <td width="10%">PPH</td>
      <td width="10%">Terima</td>
      <td width="17%">Tanda Tangan</td>
    </tr>
        <?php $no = 1; foreach ($result as $data) : ?>
            <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nama_karyawan'] ?></td>
            <td><?= $data['ruang'] ?></td>
            <td><?= $data['nip'] ?></td>
            <td align="right"><?= getRupiah($data['jaspel']) ?></td>
            <td align="right"><?= getRupiah($data['pph21']) ?></td>
            <td align="right"><?= getRupiah($data['jaspel']-$data['pph21']) ?></td>
            <td valign="top" align="center"><img src="<?= $data['tanda_tangan'] ?>" height="50px" /></td>
            </tr>
        <?php endforeach; ?>

	  <tr>
      <td colspan="4" align="center"><strong>TOTAL</strong></td>
      <td align="right" style="font-size: 14px"><strong>
        <?= number_format($total['total_jaspel'], 0,",","."); ?>
      </strong></td>
      <td align="right" style="font-size: 14px"><strong>
        <?= number_format($total['total_pph'], 0,",","."); ?>
      </strong></td>
      <td align="right" style="font-size: 14px"><strong>
        <?= number_format($total['total'], 0,",","."); ?>
      </strong></td>
      <td>&nbsp;</td>
    </tr>
    
  </tbody>
</table>
	
	<table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center">&nbsp;</td>
      <td colspan="2" align="right">Ajibarang, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= date('Y') ?></td>
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