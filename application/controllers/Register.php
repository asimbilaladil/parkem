<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');
        $this->load->library('session');
    
   
    }   
	
	public function index() { 


        if($this->input->get()){
            $id = $this->input->get('id');
            $data['data'] = $this->AdminModel->getfromTableById('lot', $id);
            
            $this->loadView('website/register', $data);
        } 
	}
    
  
    public function saveNumberPlate() { 

        if($this->input->get()){

            


        }   
       
    } 
    
   

	/**
     * Load view 
     * @param 1 : view name
     * @param 2 : data to be render on view. If no data pass null
     */
    function loadView($view, $data) {

        $this->load->view('common/header');
        $this->load->view($view, array('data' => $data));
        $this->load->view('common/footer');

    }	
}
