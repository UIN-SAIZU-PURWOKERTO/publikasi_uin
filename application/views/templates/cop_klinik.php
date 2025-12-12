<style type="text/css">
	@page {
            margin-top: 1 cm;
            margin-left: 1 cm;
			margin-right: 1 cm;
			margin-bottom: 1 cm;
		font-family: Arial, Helvetica, sans-serif;
	}
</style>
		<?php
            $data = $this->db->get_where('m_instansi', ['id' => '1'])->row_array();
		?>

		<table width="100%" border="0" cellpadding="-3px" cellspacing="0px">
			<tr>
			  <td width="12%" align="center"></td>
				<td width="88%" align="center"></td>
			</tr>
			<tr>
			  <td width="12%" rowspan="4" align="center" style="font-size: 14px"><img src="<?= base_url('assets/images/').$data['logo'] ?>" height="70px" /></td>
				<td width="88%" align="center" style="font-size: 14px"><strong><?php echo $data['jenis_instansi']; ?> <br><?php echo $data['nama_instansi']; ?></strong></td>
			</tr>
			<tr>
			  <td align="center" style="padding-top: 3px; font-size: 12px"><?php echo $data['alamat'];?></td>
			</tr>
			<tr>
			  <td align="center" style="font-size: 12px;padding-top: 3px">
				  Telp. <?php echo $data['no_telp'];?></td>
			</tr>
			<tr>
			  <td align="center" style="font-size: 12px;padding-top: 3px">
				  e-Mail: <?php echo $data['email'];?></td>
			</tr>
		</table>