<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getKepribadian()
    {
        $this->db->select('a.*');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get('t_tes_kepribadian a')->result_array();
    }


    public function getKepribadianById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('t_tes_kepribadian')->row_array();
    }

    public function getKepribadianRange($tgl_awal, $tgl_akhir)
    {
        $this->db->where('DATE(created_at) >=', $tgl_awal);
        $this->db->where('DATE(created_at) <=', $tgl_akhir);
        return $this->db->get('t_tes_kepribadian')->result_array();
    }


    public function getEmosional()
    {
        $this->db->select('a.*');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get('t_tes_ewmt a')->result_array();
    }

    public function getEmosionalById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('t_tes_ewmt')->row_array();
    }

    public function getEmosionalRange($tgl_awal, $tgl_akhir)
    {
        $this->db->where('DATE(created_at) >=', $tgl_awal);
        $this->db->where('DATE(created_at) <=', $tgl_akhir);
        return $this->db->get('t_tes_ewmt')->result_array();
    }

    public function getLvi()
    {
        $this->db->select('a.*');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get('t_tes_lvih a')->result_array();
    }

    public function getLviById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('t_tes_lvih')->row_array();
    }

    public function getLviRange($tgl_awal, $tgl_akhir)
    {
        $this->db->where('DATE(created_at) >=', $tgl_awal);
        $this->db->where('DATE(created_at) <=', $tgl_akhir);
        return $this->db->get('t_tes_lvih')->result_array();
    }

    public function getKesiapankerja()
    {
        $this->db->select('a.*');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get('t_tes_kesiapankerja a')->result_array();
    }

    public function getKesiapankerjaRange($tgl_awal, $tgl_akhir)
    {
        $this->db->where('DATE(completed_at) >=', $tgl_awal);
        $this->db->where('DATE(completed_at) <=', $tgl_akhir);
        return $this->db->get('t_tes_kesiapankerja')->result_array();
    }

    public function getKepribadiankarirRange($tgl_awal, $tgl_akhir)
    {
        $this->db->where('DATE(created_at) >=', $tgl_awal);
        $this->db->where('DATE(created_at) <=', $tgl_akhir);
        return $this->db->get('t_tes_minatkepribadiankarir')->result_array();
    }

    public function getMinatkepribadiankarir()
    {
        $this->db->select('a.*');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get('t_tes_minatkepribadiankarir a')->result_array();
    }

    public function getKeterampilandankemampuankerjaRange($tgl_awal, $tgl_akhir)
    {
        $this->db->where('DATE(created_at) >=', $tgl_awal);
        $this->db->where('DATE(created_at) <=', $tgl_akhir);
        return $this->db->get('t_tes_keterampilandankemampuankerja')->result_array();
    }

    public function getKeterampilandankemampuankerja()
    {
        $this->db->select('a.*');
        $this->db->order_by('a.id', 'desc');
        return $this->db->get('t_tes_keterampilandankemampuankerja a')->result_array();
    }

    public function getDetailJaspel($kode)
    {
        $this->db->where('id_jasa_pelayanan', $kode);
        return $this->db->get('jasa_pelayanan_detail')->result_array();
    }

    public function getToTttdJaspel($kode)
    {
        $this->db->select('count(*) as jumlah');
        $this->db->where('id_jasa_pelayanan', $kode);
        $this->db->where('konfirmasi', 1);
        return $this->db->get('jasa_pelayanan_detail')->row_array();
    }

    public function getJenisJaspel()
    {
        return $this->db->get('l_jenis_jaspel')->result_array();
    }

    public function insertjaspel($input)
    {
        $data["id_jenis_jaspel"]= $input['id_jenis_jaspel'];
        $data["nama"]           = getJenisJaspel($data["id_jenis_jaspel"], 'nama');
        $data["warna"]          = getJenisJaspel($data["id_jenis_jaspel"], 'warna');

        $data["keterangan"]     = $input['keterangan'];
        $data["bulan"]          = $input['bulan'];
        $data["tahun"]          = $input['tahun'];
        $data["aktif"]          = $input['status'];

        $data["jaspel_bulan"]          = $input['jaspel_bulan'];
        $data["jaspel_tahun"]          = $input['jaspel_tahun'];

        $this->db->insert('jasa_pelayanan',$data);
    }

    public function updatejaspel($input)
    {
        $data["id_jenis_jaspel"]= $input['id_jenis_jaspel'];
        $data["nama"]           = getJenisJaspel($data["id_jenis_jaspel"], 'nama');
        $data["warna"]          = getJenisJaspel($data["id_jenis_jaspel"], 'warna');

        $data["keterangan"]     = $input['keterangan'];
        $data["bulan"]          = $input['bulan'];
        $data["tahun"]          = $input['tahun'];

        $data["jaspel_bulan"]          = $input['jaspel_bulan'];
        $data["jaspel_tahun"]          = $input['jaspel_tahun'];

        $data["aktif"]          = $input['status'];

        $this->db->where('id', $input['id']);
        $this->db->update('jasa_pelayanan',$data);
    }

    public function insertJaspelDetail($data){
		// $insert = $this->db->insert_batch('jasa_pelayanan_detail', $data);
		// if($insert){
		// 	return true;
		// }
        $this->db->insert_batch('jasa_pelayanan_detail', $data);

        // Cek apakah data berhasil di-insert
        if ($this->db->affected_rows() > 0) {
            return true; // Jika berhasil
        } else {
            return false; // Jika gagal
        }
	}

    public function deletejaspel($kode)
    {
        $this->db->delete('jasa_pelayanan', ['id' => $kode]);
    }

    public function deletedetailjaspel($kode)
    {
        $this->db->delete('jasa_pelayanan_detail', ['id_jasa_pelayanan' => $kode]);
    }

    public function getJaspelCetakPNS($kode)
    {
        $where = "id_jasa_pelayanan=$kode and (pns='PNS' or pns='CPNS' or pns='PPPK')";
        $this->db->where($where);
        return $this->db->get('jasa_pelayanan_detail')->result_array();
    }

    public function getJaspelCetakTotalPNS($kode)
    {
                            $query = "SELECT 
									SUM(jaspel) AS total_jaspel,
									SUM(pph21) AS total_pph,
									SUM(jaspel - pph21) AS total,
                                    COUNT(*) as totalkaryawan
								FROM
									jasa_pelayanan_detail
								WHERE
									id_jasa_pelayanan = $kode
										AND (pns = 'PNS' or pns='CPNS' or pns='PPPK')";
        return $this->db->query($query)->row_array();
    }

    public function getPejabat()
    {
        return $this->db->get('m_pejabat')->result_array();
    }

    public function getJaspelCetakPNP($kode)
    {
        $where = "id_jasa_pelayanan=$kode and (pns='PNP' or pns='DT' or pns='TAMU' or pns='WKDS')";
        $this->db->where($where);
        return $this->db->get('jasa_pelayanan_detail')->result_array();
    }

    public function getJaspelCetakTotalPNP($kode)
    {
                            $query = "SELECT 
									SUM(jaspel) AS total_jaspel,
									SUM(pph21) AS total_pph,
									SUM(jaspel - pph21) AS total,
                                    COUNT(*) AS totalkaryawan
								FROM
									jasa_pelayanan_detail
								WHERE
									id_jasa_pelayanan = $kode
										AND (pns='PNP' or pns='DT' or pns='TAMU' or pns='WKDS')";
        return $this->db->query($query)->row_array();
    }

    public function updateResignJaspel($id)
    {
        $data["tanda_tangan"]        = '';
        $data["konfirmasi"]          = '';

        $this->db->where('id', $id);
        $this->db->update('jasa_pelayanan_detail',$data);
    }

    public function updateDetailJaspel($input)
    {
        $data["uid"]            = $input['uid'];
        $data["nama_karyawan"]  = $input['nama_karyawan'];
        $data["nip"]            = $input['nip'];
        $data["ruang"]          = $input['ruang'];
        $data["pns"]            = $input['pns'];
        $data["bank"]           = $input['bank'];
        $data["rekening"]       = $input['rekening'];

        $data["jaspel_bruto"]       = $input['jaspel_bruto'];
        $data["reward"]             = $input['reward'];
        $data["pph21"]              = $input['pph21'];
        $data["potongan_bank"]      = $input['potongan_bank'];
        $data["upz"]                = $input['upz'];
        $data["ppni"]               = $input['ppni'];
        $data["potongan"]           = $input['potongan'];

        $data["jaspel"]             = $input['jaspel'];
        $data["reward_umum"]        = $input['reward_umum'];
        $data["dansos"]             = $input['dansos'];
        $data["ksuceria"]           = $input['ksuceria'];
        $data["idi"]                = $input['idi'];
        $data["bpjs"]               = $input['bpjs'];
        $data["potongan_komed"]     = $input['potongan_komed'];

        $data["netto"]              = $input['netto'];
        $data["reward_kegiatan"]    = $input['reward_kegiatan'];
        $data["bruto"]              = $input['bruto'];
        $data["lain"]               = $input['lain'];
        $data["ibi"]                = $input['ibi'];
        $data["pmi"]                = $input['pmi'];
        $data["minus"]              = $input['minus'];

        $this->db->where('id', $input['id']);
        $this->db->update('jasa_pelayanan_detail',$data);
    }

    public function getKomplain($id = null)
    {
        if($id){
            $this->db->select("a.*,b.no_telp");
            $where = "a.id_jasa_pelayanan = $id and (a.alasan is not null or a.alasan <> '')";
            $this->db->where($where);
            $this->db->join('simrs.master_login b', 'a.uid=b.uid', 'left');
            return $this->db->get('eoffice.jasa_pelayanan_detail a')->result_array();
        }
        
    }

}