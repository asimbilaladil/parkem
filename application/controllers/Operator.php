<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

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
		$data['users'] = $this->AdminModel->getAllfromTable('operator');
        $this->loadView('operator/index', $data);
	}

    public function add()
    {
          $this->loadView('operator/add', null);
    }

    public function save(){
        if($this->input->post()) {

            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $username = $this->input->post('username');
            $admin_id = 1;//$this->session->userdata('user_id');
            $data = array(
               'fullname' => $fullname, 
               'email' =>  $email, 
               'password' => md5($password), 
               'username' => $username,
               'admin_id' => 1
             );
            $this->AdminModel->insert('operator', $data);      
        }
        redirect('Admin');        
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
