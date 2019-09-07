<?php
header('Access-Control-Allow-Origin: *');
class Client extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['client_model', 'city_model']);
        $this->load->helper('url_helper');
        $this->load->library(['session']);
        $this->load->helper('form');
        $this->load->library('form_validation');

        /* if (!$this->session->userdata('email'))
			redirect('user/login'); */
    }
  
    public function index()
    {
        if (!$this->session->userdata('email'))
            redirect('user/login');
        $data['clients'] = $this->client_model->clients_list();
 
        $this->load->view('clients/list', $data);
    }

    public function clients_list()
    {
        if (!$this->session->userdata('email'))
            redirect('user/login');
        $query = $this->db->get('clients');
        return $query->result();
    }
  
    public function create()
    {
        if (!$this->session->userdata('email'))
            redirect('user/login');
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
        if (!$this->session->userdata('email'))
            redirect('user/login');
        $query = $this->db->get('clients');
        echo $this->client_model->get_clients_visits_percentage_by_id($id);
    }
      
    public function edit($id)
    {
        if (!$this->session->userdata('email'))
            redirect('user/login');
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
        if (!$this->session->userdata('email'))
            redirect('user/login');
        $id = $this->uri->segment(3);
         
        if (empty($id))
        {
            show_404();
        }
                 
        $visits = $this->client_model->delete($id);
         
        redirect( base_url('client') );        
    }


    /***** Services *******/

    public function clients_list_service()
    {
        $query = $this->client_model->clients_list();
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function cities_list_service()
    {
        $query = $this->city_model->cities_list();
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function clients_create_service()
    {
        $query = $this->client_model->createOrUpdate();
        $this->output->set_content_type('application/json')->set_output(json_encode($query));

    }

}