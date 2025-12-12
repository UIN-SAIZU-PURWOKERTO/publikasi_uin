<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function get_affiliations()
    {
        return $this->db->order_by('id', 'ASC')
                        ->get('sinta_affiliations')
                        ->result_array();
    }
    
    public function count_affiliations()
    {
        return $this->db->count_all('sinta_affiliations');
    }
    

}