<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getJurnal()
    {
        $this->db->where('is_delete', '0');
        return $this->db->get('jurnal')->result_array();
    }

    public function add_jurnal($input)
    {
        $data["identitas"]       = $input['identitas'];
        $data["nama"]       = $input['nama'];
        $data["issn"]       = $input['issn'];
        $data["penerbit"]   = $input['penerbit'];
        $data["sinta"]      = $input['sinta'];
        $data["link"]       = $input['link'];
        $data["is_delete"]        = 0;

        $this->db->insert('jurnal',$data);
    }

    public function deletejurnal($id)
    {
        $data["is_deleted"]        = 1;

        $this->db->where('jurnal_id', $id);
        $this->db->update('jurnal',$data);
    }

}