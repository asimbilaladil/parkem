<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment  extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');
        $this->load->library('session');

        
      
    }	
	   public function index(){
        $data['payment'] = $this->AdminModel->getAllCitations();
        $this->loadView('website/payment', $data);
    }
    public function findCitation(){
        if($this->input->post()) {
            $id = $this->input->post('id');
            $data['citation'] = $this->AdminModel->findCitation( $id );
            
            return $this->load->view('website/payment-find-citation', array('data' => $data));
        }
    }
   
    /**
     * Load view 
     * @param 1 : view name
     * @param 2 : data to be render on view. If no data pass null
     */
    function loadView($view, $data) {
        //error_reporting(0);
        $this->load->view('common/header');


        $this->load->view($view, array('data' => $data));
        $this->load->view('common/footer');

    }   	
}
