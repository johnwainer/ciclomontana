<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('client_model');
        $this->load->helper(array('url'));
        $this->load->library(['session']);
		$this->load->database();
		
		if (!$this->session->userdata('email'))
			redirect('user/login');
    }

	public function index()
	{
		$data['clients'] = $this->client_model->clients_list();

		$this->load->view('dashboard', $data);
	}
}
