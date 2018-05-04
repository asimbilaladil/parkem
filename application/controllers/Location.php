<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');
        $this->load->library('session');
    
   
    }   
	
	public function index() { 




            $data['data'] = $this->AdminModel->getLotNames();
            
            $this->loadView('website/location', $data);

	}
    
      
    public function getFormHTML(){
        
        if($this->input->post()){
            
            $id = $this->input->post('id');       
            $data['data'] = $this->AdminModel->getLotData( $id );   
            
            return $this->load->view('website/location-register-number-plate', array('data' => $data));
        }
    }
  
    public function getUnitFormHTML(){
        
        if($this->input->post()){
            
            $id = $this->input->post('id');       
            $data['data'] = $this->AdminModel->getLotData( $id );   
            
            return $this->load->view('website/location-unit-register-number-plate', array('data' => $data));
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
