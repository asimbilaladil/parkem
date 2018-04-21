<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');
        $this->load->library('session');
    
   
        if ( empty($_SESSION['id']) ) {
           redirect('Login/');
        }      
    }   
	
	public function index()
	{
		$data['units'] = $this->AdminModel->getAllfromTable('unit');
        $this->loadView('unit/index', $data);
	}

    public function add()
    {
        $data['lots'] = $this->AdminModel->getAllfromTable('lot');
        $this->loadView('unit/add', $data);
    }

    public function save(){
        if($this->input->post()) {

            $unit = $this->input->post('unit');
            $lot = $this->input->post('lot');
            $pin = $this->input->post('pin');
            $admin_id = $this->session->userdata('id');
            $data = array(
               'name' => $unit, 
               'lot' =>  $lot, 
               'pin' => $pin, 
               'admin_id' => $admin_id               
             );
            $this->AdminModel->insert('unit', $data);      
        }
        redirect('Unit');        
    }

	/**
     * Load view 
     * @param 1 : view name
     * @param 2 : data to be render on view. If no data pass null
     */
    function loadView($view, $data) {
        //error_reporting(0);
        $this->load->view('common/header');
        $this->load->view('common/sidebar');

        $this->load->view($view, array('data' => $data));
        $this->load->view('common/footer');

    }	
}
