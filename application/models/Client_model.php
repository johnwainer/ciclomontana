<?php
class Client_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function clients_list()
    {
        $this->db->select('cli.*,cit.name city_name');
        $this->db->from('clients cli');
        $this->db->join('cities cit', 'cli.cities_id = cit.id');
        $aResult = $this->db->get();
        if(!$aResult->num_rows() == 1){
            return false;
        }
        return $aResult->result();
    }
     
    public function get_clients_by_id($id)
    {
        $query = $this->db->get_where('clients', array('id' => $id));
        return $query->row();
    }

    public function get_clients_visits_percentage_by_id($id)
    {
        $this->db->select('cli.visits_percentage');
        $this->db->from('clients cli');
        $this->db->where('id', $id);
        $aResult = $this->db->get();
        if(!$aResult->num_rows() == 1){
            return false;
        }
        $aResult = $aResult->row();
        return $aResult->visits_percentage;
    }

    public function update_quota_balance($idUser, $value){
        $this->db->select('cli.quota_balance');
        $this->db->from('clients cli');
        $this->db->where('id', $idUser);
        $aResult = $this->db->get();
        if(!$aResult->num_rows() == 1){
            return 'No se actualizó saldo de cliente.';
        }
        $aResult = $aResult->row();
        $quota_balance = $aResult->quota_balance;
        $diferenceValue = $quota_balance - $value;
        $data = array(
            'quota_balance' => $diferenceValue,
            'created' => time()
        );

        $this->db->where('id', $idUser);
        $this->db->update('clients', $data);

        return 'Saldo cupo anterior: ' . $quota_balance . ' Nuevo saldo  cupo: ' . $diferenceValue;
    }

    public function revert_quota_balance($idUser, $value){
        $this->db->select('cli.quota_balance');
        $this->db->from('clients cli');
        $this->db->where('id', $idUser);
        $aResult = $this->db->get();
        if(!$aResult->num_rows() == 1){
            return false;
        }
        $aResult = $aResult->row();
        $quota_balance = $aResult->quota_balance;
        $diferenceValue = $quota_balance + $value;
        $data = array(
            'quota_balance' => $diferenceValue,
            'created' => time()
        );

        $this->db->where('id', $idUser);
        $this->db->update('clients', $data);

        return true;
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        
        if (empty($id)) {
            $data = array(
                'nit' => md5($this->input->post('nit')),
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'cities_id' => $this->input->post('cities_id'),
                'created' => date("d/m/Y"),
                'quota' => $this->input->post('quota'),
                'quota_balance' => $this->input->post('quota'),
                'visits_percentage' => $this->input->post('visits_percentage')
            );
            $this->db->insert('clients', $data);
            return 'Cliente agregado correctamente.';
        } else {
            $data = array(
                'nit' => md5($this->input->post('nit')),
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'cities_id' => $this->input->post('cities_id'),
                'created' => date("d/m/Y")
            );
            $this->db->where('id', $id);
            $this->db->update('clients', $data);
            return 'Cliente editado correctamente.';
        }
    }
     
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('clients');
    }
}