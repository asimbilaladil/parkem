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
    public function add(){
        
      $data['data'] = $this->AdminModel->getLotNames();
      $this->loadView('register_number_plates/add', $data);
    } 
    public function saveNumberPlate() { 



        if($this->input->post()){

            $id = $this->input->post('id');
            $number_plate = $this->input->post('number_plate');
            $unit_name =  ( empty( $this->input->post('unit_name') ) ) ? 0 : $this->input->post('unit_name')  ;
            $lotData = $this->AdminModel->getfromTableById('lot', $id);


            if( count($lotData) > 0){
                
                $numberPlate_data = $this->AdminModel->getNumberPlateById($number_plate);
                
                if(count($numberPlate_data) == 0 ){
                    $newNumberPlateData = array(
                        'number_plate' =>  $number_plate
                    );                    
                    $numberPlate_id = $this->AdminModel->insert('number_plates', $newNumberPlateData); 
                } else {
                    $numberPlate_id = $numberPlate_data[0]->id;
                }
                
                date_default_timezone_set("Canada/Central");

                $register_time =  date("d-m-Y h:i:s");
                $additional_time = "+".$lotData[0]->hour. "hours";
                $data = array(
                   'lot' => $id, 
                   'number_plate' =>  $numberPlate_id, 
                   'time_in' => strtotime($register_time), 
                   'time_out' => strtotime($register_time .$additional_time),
                   'unit' =>  $unit_name
                );


                $this->AdminModel->insert('register_plates', $data);   
                redirect('Register_Number_Plates'); 

            } 


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
