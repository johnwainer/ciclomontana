<?php
class City_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function cities_list()
    {
        $query = $this->db->get('cities');
        return $query->result();
    }
     
    public function get_cities_by_id($id)
    {
        $query = $this->db->get_where('cities', array('id' => $id));
        return $query->row_array();
    }
     
}