<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');

class Api extends REST_Controller  {

    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');

    }	

    function operatorLogin_post(){

        if($this->post()){

            $username = $this->post('username');
            $password = $this->post('password');
            if(!empty($username) && !empty($password)){

                $loginData = array (
                    'username' => $username,
                    'password' => md5($password)
                );
                $result = $this->AdminModel->operator_login_check_info($loginData);
                if(count($result) != 0){
                    $data['data'] = $result[0];
                    $data['status'] = "success"; 
                    $data['message']  = "Login Successfully";
                } else{
                    $data['data'] = [];
                    $data['status'] = "fail"; 
                    $data['message']  = "Wrong username or password";

                }
            } else {
                $data['data'] = [];
                $data['status'] = "fail";  
                $data['message']  ="one field username or password missing";
            }
        }          

        $this->response($data);
    } 
    function getAllLots_get(){

        $result = $this->AdminModel->getLotNames();
        if(count($result) != 0){
            $data['data'] = $result;
            $data['status'] = "success"; 
            $data['message']  = "Data available";
        } else{
            $data['data'] = [];
            $data['status'] = "fail"; 
            $data['message']  = "No data available";

        }

        $this->response($data);
    }
    function verifyNumberPlate_post(){

        if($this->post()){

            $number_plate = $this->post('number_plate');
            $lot = $this->post('lot');
            $current_time = strtotime(date("d-m-Y h:i:s"));
            $blacklistData = $this->AdminModel->checkBlacklistNumber($number_plate);
            if(count($blacklistData) == 0){

                $result = $this->AdminModel->verifyNumberPlate($number_plate, $lot, $current_time);
                if(count($result) != 0){
                    $data['data'] = $result;
                    $data['status'] = "success"; 
                    $data['message']  = "License Plate Verified Successfully";
                } else{
                    $data['data'] = [];
                    $data['status'] = "fail"; 
                    $data['message']  = "No data available";

                }
            } else {
                $data['data'] = [];
                $data['status'] = "success"; 
                $data['message']  = "License Plate is Black Listed";
            }

            $this->response($data);
        }     
    } 
    function getNumberPlatesbyLot_post(){
        if($this->post()){

            $lot = $this->post('lot');
            $current_time = strtotime(date("d-m-Y h:i:s"));
            $result = $this->AdminModel->getNumberPlatesByLot($lot, $current_time);
            if(count($result) != 0){
                $data['data'] = $result;
                $data['status'] = "success"; 
                $data['message']  = "Data available";
            } else{
                $data['data'] = [];
                $data['status'] = "success"; 
                $data['message']  = "No data available";

            }
            $this->response($data);
        }
    }
    function makeCitation_post(){
        if($this->post()){

            $lot = $this->post('lot_id');
            $current_time = strtotime(date("d-m-Y h:i:s"));
            $createdOn = date("d-m-Y h:i:s");
            $number_plate = $this->post('number_plate');
            $image = $this->post('image');
            $operator = $this->post('operator_id');
           
            $numberPlate_data = $this->AdminModel->getNumberPlateById($number_plate);
                
            if(count($numberPlate_data) == 0 ){
                $newNumberPlateData = array(
                    'number_plate' =>  $number_plate
                );                    
                $numberPlate_id = $this->AdminModel->insert('number_plates', $newNumberPlateData); 
            } else {
                $numberPlate_id = $numberPlate_data[0]->id;
            }

            $citation_data = array(
               'lot' => $lot, 
               'number_plate' =>  $numberPlate_id, 
               'createdOn' => $createdOn, 
               'timestamp' => $current_time, 
               'image' => $image,
               'payment_status' => 'unpaid',
               'operator' => $operator
            );
            $citation_id = $this->AdminModel->insert('citation', $citation_data);   


            if($citation_id > 0){

                $lotData = $this->AdminModel->getfromTableById('lot', $lot);
                if(count($lotData) > 0) {

                    $result = array(
                       'lat' => $lotData[0]->lat,
                       'lng' => $lotData[0]->lng,
                       'lot_name' => $lotData[0]->name,
                       'citation' => $citation_id,
                       'lot_id' => $lot, 
                       'number_plate' =>  $numberPlate_id, 
                       'timestamp' => $current_time, 
                       'createdOn' => $createdOn, 
                       'image' => $image,
                       'payment_status' => 'unpaid',
                       'operator' => $operator                       
                    );
                    $data['data'][0] = $result;
                    $data['status'] = "success"; 
                    $data['message']  = "Data available";
                } else {
                    $data['data'] = [];
                    $data['status'] = "success"; 
                    $data['message']  = "Lot not found";
                }
        

            } else{
                $data['data'] = [];
                $data['status'] = "fail"; 
                $data['message']  = "Error while creating citation";

            }
            $this->response($data);
        }
    }    
        

   
}
