<?php
header('Access-Control-Allow-Origin: *');
class Visit extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['visit_model', 'client_model', 'seller_model']);
        $this->load->helper('url_helper');
        $this->load->library(['session']);
        $this->load->helper('form');
        $this->load->library('form_validation');

        /*if (!$this->session->userdata('email'))
			redirect('user/login');*/
    }
  
    public function index()
    {
        if (!$this->session->userdata('email'))
            redirect('user/login');
        $data['visits'] = $this->visit_model->visits_list();
 
        $this->load->view('visits/list', $data);
    }
  
    public function create()
    {
        if (!$this->session->userdata('email'))
            redirect('user/login');
        $data['clients'] =  $this->client_model->clients_list();
        $data['sellers'] =  $this->seller_model->sellers_list();
        if($this->input->post('price')){
            $this->form_validation->set_rules('price', 'Valor neto', 'required');
            $this->form_validation->set_rules('date', 'Fecha', 'required');
            if ($this->form_validation->run() === FALSE){  
                $data['message'] = 'Algunos campos son obligatorios.';    
            } else {
                $data['message'] = $this->visit_model->createOrUpdate() . ' ' . $this->client_model->update_quota_balance($this->input->post('clients_id'), $this->input->post('visit_price'));
            }
        }else{
            $data['message'] = '';
        }
        $this->load->view('visits/create', $data);
    }

    public function edit($id)
    {
        if (!$this->session->userdata('email'))
            redirect('user/login');
        if (empty($id)){ 
            show_404();
        }else{
            $data['clients'] =  $this->client_model->clients_list();
            $data['sellers'] =  $this->seller_model->sellers_list();
            if($this->input->post('price')){
                $data['message'] = $this->visit_model->createOrUpdate();
            }else{
                $data['message'] = '';
            }
            $data['visit'] = $this->visit_model->get_visits_by_id($id);
            $this->load->view('visits/edit', $data);
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
            
        $dataToRevert = $this->visit_model->get_data_before_delete($id);

        if($this->client_model->revert_quota_balance($dataToRevert->clients_id, $dataToRevert->visit_price))
            $visits = $this->visit_model->delete($id);
         
        redirect( base_url('visit') );
    }

    public function get_count_visits_by_city()
    {
        if (!$this->session->userdata('email'))
            redirect('user/login');
        echo json_encode($this->visit_model->get_count_visits_by_city());
    }

    public function get_visits_by_user_id($id)
    {
        if (!$this->session->userdata('email'))
            redirect('user/login');
        echo json_encode($this->visit_model->get_visits_by_user_id($id));
    }


    /***** Services *******/

    public function visits_list_service()
    {
        $query = $this->visit_model->visits_list();
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function sellers_list_service()
    {
        $query = $this->seller_model->sellers_list();
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function visits_list_by_id_service($id)
    {
        $query = $this->visit_model->get_visits_by_id($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function get_count_visits_by_city_service()
    {
        $query = $this->visit_model->get_count_visits_by_city();
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function visits_create_service()
    {        
        $query = $this->visit_model->createOrUpdate();
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function visits_update_service()
    {        
        $query = $this->visit_model->createOrUpdate();
        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }

    public function visits_delete_service()
    {        
        $dataToRevert = $this->visit_model->get_data_before_delete($_POST['id']);
        if($this->client_model->revert_quota_balance($dataToRevert->clients_id, $dataToRevert->visit_price))
            $query = $this->visit_model->delete($_POST['id']);

        $this->output->set_content_type('application/json')->set_output(json_encode($query));
    }
}