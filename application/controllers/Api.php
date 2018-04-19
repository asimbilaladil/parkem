<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');

class Api extends REST_Controller  {

    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');

    }	
	public function index(){
      
    }
    // public function operatorLogin(){
    //     if($this->input->post()){
    //         var_dump($);
    //         $username = $this->input->post('username');
    //         $password = $this->input->post('password');
    //         if(!empty($username) && !empty($password)){
    //             echo "HERE";
    //             $loginData = array (
    //                 'username' => $username,
    //                 'password' => md5($password)
    //             );
    //             $result = $this->AdminModel->operator_login_check_info($loginData);
    //             if(count($result) != 0){
    //                 return $result[0];
    //             } else{
    //                 echo "Wrong username or password";
    //             }
    //         } else {
    //              echo "one field username or password missing";
    //         }
    //     }  
    // }

   
}
