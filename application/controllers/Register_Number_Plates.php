<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Number_Plates extends CI_Controller {

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
        $data['lotData'] = $this->AdminModel->getLotNames();
        $data['register_number_plates'] = $this->AdminModel->getRegisterNumberPlates();
        $this->loadView('register_number_plates/index', $data);
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
