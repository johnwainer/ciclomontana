<?php
class Seller_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function sellers_list()
    {
        $query = $this->db->get('sellers');
        return $query->result();
    }
     
    public function get_sellers_by_id($id)
    {
        $query = $this->db->get_where('sellers', array('id' => $id));
        return $query->row_array();
    }
     
}