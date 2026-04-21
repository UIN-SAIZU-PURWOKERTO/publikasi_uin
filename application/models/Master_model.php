<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getFakultas()
    {
        $this->db->where('is_delete', '0');
        return $this->db->get('mst_fakultas')->result_array();
    }

    public function getProdi()
    {
        $this->db->where('is_delete', '0');
        return $this->db->get('mst_prodi')->result_array();
    }

    public function getAuthor()
    {
        $this->db->where('is_deleted', '0');
        return $this->db->get('sinta_authors')->result_array();
    }

    public function getBulan()
    {
        return $this->db->get('l_bulan')->result_array();
    }

    public function getTahun()
    {
        return $this->db->get('l_tahun')->result_array();
    }

    public function getKaryawan()
    {
        $this->db->select('id,name,email,password,role_id');
        return $this->db->get('users')->result_array();
    }

    public function add_fakultas($input)
    {
        $data["fakultas_name"]       = $input['name'];
        $data["singkatan"]       = $input['singkatan'];
        $data["is_delete"]        = 0;

        $this->db->insert('mst_fakultas',$data);
    }

    public function deleteauthor($id)
    {
        $data["is_deleted"]        = 1;

        $this->db->where('id', $id);
        $this->db->update('sinta_authors',$data);
    }

}