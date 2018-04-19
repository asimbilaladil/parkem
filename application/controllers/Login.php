
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');
        $this->load->library('session');

      
    }   
	
	public function index()
	{
		   $this->loadView('login/index', null);

	}
    
    public function adminLogin(){
           
        if($this->input->post()) {
    //         echo "here";  
            $loginData = array (
                'email' => $this->input->post('email', true),
                'password' => md5($this->input->post('password', true) )
            );
            $result = $this->AdminModel->admin_login_check_info($loginData);
            $redirect = 'Login/';

             //if query found any result i.e userfound
                    if( count($result) != 0 ) {
      
                  $data  = $result[0];
                        $_SESSION['id'] = $result[0]->id;

                    //    $this->session->set_userdata($data);
                        $redirect = 'Admin/';          

                    }

                redirect($redirect);
              
        }
    }
    /**
     * logout
     */
    function logout() {
        $this->session->sess_destroy();
        redirect('Login/');
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
