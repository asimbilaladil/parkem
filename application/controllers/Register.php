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



        if($this->input->post()){

           echo $id = $this->input->post('id');
            $number_plate = $this->input->post('number_plate');
            $lotData = $this->AdminModel->getfromTableById('lot', $id);

            if( count($lotData) > 0){
                echo "Inside";
                $numberPlate_data = $this->AdminModel->getNumberPlateById($number_plate);
                
                if(count($numberPlate_data) == 0 ){
                    $newNumberPlateData = array(
                        'number_plate' =>  $number_plate
                    );                    
                    $numberPlate_id = $this->AdminModel->insert('number_plates', $newNumberPlateData); 
                } else {
                    $numberPlate_id = $numberPlate_data[0]->id;
                }
                $register_time =  date("d-m-Y h:i:s");
                $additional_time = "+".$lotData[0]->hour. "hours";
                $data = array(
                   'lot' => $id, 
                   'number_plate' =>  $numberPlate_id, 
                   'time_in' => strtotime($register_time), 
                   'time_out' => strtotime($register_time .$additional_time)
                );


                $this->AdminModel->insert('register_plates', $data);   
                redirect('', 'location'); 

            } 


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
