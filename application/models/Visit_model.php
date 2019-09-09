<?php
class Visit_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function visits_list()
    {
        $this->db->select('vis.*,sel.name seller_name, cli.name client_name');
        $this->db->from('visits vis');
        $this->db->join('sellers sel', 'vis.sellers_id = sel.id');
        $this->db->join('clients cli', 'vis.clients_id = cli.id');
        $aResult = $this->db->get();
        if(!$aResult->num_rows() == 1){
            return false;
        }
        return $aResult->result();
    }
     
    public function get_visits_by_id($id)
    {
        $query = $this->db->get_where('visits', array('id' => $id));
        return $query->row();
    }

    /*public function get_visits_visits_percentage_by_id($id)
    {
        $this->db->select('vis.visits_percentage');
        $this->db->from('visits vis');
        $this->db->where('id', $id);
        $aResult = $this->db->get();
        if(!$aResult->num_rows() == 1){
            return false;
        }
        $aResult = $aResult->row();
        return $aResult->visits_percentage;
    }*/

    public function get_visits_by_user_id($id)
    {
        $this->db->select('vis.*');
        $this->db->from('visits vis');
        $this->db->where('clients_id', $id);
        $aResult = $this->db->get();
        if(!$aResult->num_rows() == 1){
            return false;
        }
        return $aResult->result();
    }

    public function get_count_visits_by_city()
    {
        $this->db->select('cit.name as name, COUNT(cit.name) as total');
        $this->db->group_by('cit.name');
        $this->db->from('visits vis');
        $this->db->join('clients cli', 'vis.clients_id = cli.id');
        $this->db->join('cities cit', 'cli.cities_id = cit.id');
        $aResult = $this->db->get();
        return $aResult->result();
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
        $data = array(
            'clients_id' => $this->input->post('clients_id'),
            'sellers_id' => $this->input->post('sellers_id'),
            'price' => $this->input->post('price'),
            'date' => $this->input->post('date'),
            'visit_price' => $this->input->post('visit_price'),
            'observations' => $this->input->post('observations'),
            'created' => date("d/m/Y")
        );
        if (empty($id)) {
            $this->db->insert('visits', $data);
            return 'Visita agregada correctamente.';
        } else {
            $this->db->where('id', $id);
            $this->db->update('visits', $data);
            return 'Visita editada correctamente.';
        }
    }

    public function get_data_before_delete($id)
    {
        $this->db->select('vis.clients_id, vis.visit_price');
        $this->db->from('visits vis');
        $this->db->where('id', $id);
        $aResult = $this->db->get();
        if(!$aResult->num_rows() == 1){
            return false;
        }
        return $aResult->row();
    }
     
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('visits');
        return 'Visita eliminada correctamente.';
    }
}