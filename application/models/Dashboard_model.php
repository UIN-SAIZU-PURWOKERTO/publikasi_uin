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

    public function getDetailAuthor($id)
    {
        $author = $this->db
            ->where('id', $id)
            ->get('sinta_authors')
            ->row_array();

        if ($author) {
            $author['subject'] = explode(',', $author['subject']);
        }

        return $author;
    }

    public function getScopusArticlesByAuthor($id)
    {
        return $this->db
            ->where('author_id', $id)
            ->get('scopus_publications')
            ->result_array();
    }
}