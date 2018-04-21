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
                    $data['status'] = "fail"; 
                    $data['message']  = "Wrong username or password";

                }
            } else {
                $data['status'] = "fail";  
                $data['message']  ="one field username or password missing";
            }
        }          

        $this->response($data);
    } 
 

   
}
