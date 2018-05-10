<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blacklist extends CI_Controller {

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
        $data['blacklist'] = $this->AdminModel->getBlacklistNumberPlates();
        $this->loadView('blacklist/index', $data);
    }
    public function removeBlacklist(){

        if( $this->input->get() ){
            $id = $this->input->get('id');
            $this->AdminModel->deleteBlacklistNumberPlate( $id );
            redirect('Blacklist');
        }
        
    
    } 
    public function blacklistNumber(){

        if( $this->input->post() ){
            $number_plate = $this->input->post('number_plate');
            $numberPlate_data = $this->AdminModel->getNumberPlateById($number_plate);
            
            if(count($numberPlate_data) == 0 ){
                $newNumberPlateData = array(
                    'number_plate' =>  $number_plate
                );                    
                $numberPlate_id = $this->AdminModel->insert('number_plates', $newNumberPlateData); 
            } else {
                $numberPlate_id = $numberPlate_data[0]->id;
            }
            $data = array(
                'register_plates_id' =>  $numberPlate_id,
                'createdOn' =>  date("d-m-Y h:i:s") 
            );    
            $blacklistData = $this->AdminModel->getBlacklistNumberById('blacklist', $numberPlate_id); 
            if(count($blacklistData) == 0 ){

              $this->AdminModel->insert('blacklist', $data);
            }    
            redirect('Blacklist');         
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
        $this->load->view('common/sidebar');

        $this->load->view($view, array('data' => $data));
        $this->load->view('common/footer');

    }   	
}
