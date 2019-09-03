<?php
class Client extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['client_model', 'city_model']);
        $this->load->helper('url_helper');
        $this->load->library(['session']);
        $this->load->helper('form');
        $this->load->library('form_validation');

        if (!$this->session->userdata('email'))
			redirect('user/login');
    }
  
    public function index()
    {
        $data['clients'] = $this->client_model->clients_list();
 
        $this->load->view('clients/list', $data);
    }

    public function clients_list()
    {
        $query = $this->db->get('clients');
        return $query->result();
    }
  
    public function create()
    {
        $data['cities'] =  $this->city_model->cities_list();
        if($this->input->post('name')){
            $this->form_validation->set_rules('nit', 'NIT', 'required');
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('quota', 'Cupo', 'required');
            $this->form_validation->set_rules('visits_percentage', 'Porcentaje visitas', 'required');
            if ($this->form_validation->run() === FALSE){  
                $data['message'] = 'Algunos campos son obligatorios.';    
            } else {
                $data['message'] = $this->client_model->createOrUpdate();
            }
        }else{
            $data['message'] = '';
        }
        $this->load->view('clients/create', $data);
    }

    public function client_visits_percentage($id)
    {
        $query = $this->db->get('clients');
        echo $this->client_model->get_clients_visits_percentage_by_id($id);
    }
      
    public function edit($id)
    {
        if (empty($id))
        { 
         show_404();
        }else{
            $data['cities'] =  $this->city_model->cities_list();
            if($this->input->post('name')){
                $this->form_validation->set_rules('name', 'Nombre', 'required');
                $this->form_validation->set_rules('quota', 'Cupo', 'required');
                $this->form_validation->set_rules('visits_percentage', 'Porcentaje visitas', 'required');
                if ($this->form_validation->run() === FALSE){  
                    $data['message'] = 'Algunos campos son obligatorios.';    
                } else {
                    $data['message'] = $this->client_model->createOrUpdate();
                }
            }else{
                $data['message'] = '';
            }
            $data['client'] = $this->client_model->get_clients_by_id($id);
            $this->load->view('clients/edit', $data);
        }
    }     
     
    public function delete()
    {
        $id = $this->uri->segment(3);
         
        if (empty($id))
        {
            show_404();
        }
                 
        $visits = $this->client_model->delete($id);
         
        redirect( base_url('client') );        
    }
}