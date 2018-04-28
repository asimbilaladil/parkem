<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');
        $this->load->library('session');
    
   
    }   
	
	public function index() { 

        $data['lot'] = $this->AdminModel->getAllfromTable('lot');
        $html = "";
        foreach ($data['lot'] as $key => $value) {
            $title = $value->name;
            $html = $html . "placeMarker(map, $value->lat, $value->lng,  $value->id  ,'$title');";
        }
        $data['html'] = $html;
        $this->loadView('website/index', $data);
	}
    

	/**
     * Load view 
     * @param 1 : view name
     * @param 2 : data to be render on view. If no data pass null
     */
    function loadView($view, $data) {
        //error_reporting(0);
        $this->load->view('website/common/header');


        $this->load->view($view, array('data' => $data));
        $this->load->view('website/common/footer');

    }	
}
