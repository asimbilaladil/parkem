<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lot extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');
        $this->load->library('session');
    
   
        if ( empty($_SESSION['id']) ) {
           redirect('Login/');
        }      
    }   
	
  public function view(){
      $id = $this->input->get('id');

      $data['lotData'] = $this->AdminModel->getfromTableById('lot', $id);
      $data['unitData'] = $this->AdminModel->getUnitData('unit', $id);

      $this->loadView('lot/view', $data);


    }  
  
  public function edit(){
      $id = $this->input->get('id');

      $data['lotData'] = $this->AdminModel->getfromTableById('lot', $id);
      $data['unitData'] = $this->AdminModel->getUnitData('unit', $id);

      $this->loadView('lot/edit', $data);


    }

    public function update(){

        if($this->input->post()){

            $id = $this->input->post('id');

            $name = $this->input->post('name');
            $hour = $this->input->post('hour');
            $day = $this->input->post('day');
            $contact = $this->input->post('contact');
            $address = $this->input->post('address');

            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');
            $admin_id = $this->session->userdata('id');

            $unit = $this->input->post('unit');
            $pin = $this->input->post('pin');


            $data = array(
               'name' => $name, 
               'hour' =>  $hour, 
               'day' => $day, 
               'contact' => $contact,
               'address' => $address,
               'lat' => $lat, 
               'lng' => $lng,
               'admin_id' => $admin_id               
             );
            $this->AdminModel->update('lot', $id, $data);    
           $this->AdminModel->deleteUnit('unit', $id); 
           if($id != false){
              
              for ($i=0; $i < count($unit); $i++) { 

                $unitData = array(
                  'name' => $unit[$i], 
                  'pin' => $pin[$i],
                  'lot' => $id,
                  'admin_id' => $admin_id 
                );

                $this->AdminModel->insert('unit', $unitData);
              }

            }            
            redirect('Lot');    
        }
    }

	public function index()
	{
		$data['lots'] = $this->AdminModel->getAllfromTable('lot');
        $this->loadView('lot/index', $data);
	}
    public function delete(){
        $id = $this->input->get('id');
        $this->AdminModel->delete('lot', $id);
        redirect('Lot');    
    }    
    public function add()
    {
          $this->loadView('lot/add', null);
    }

    public function save(){
        if($this->input->post()) {

            $name = $this->input->post('name');
            $hour = $this->input->post('hour');
            $day = $this->input->post('day');
            $contact = $this->input->post('contact');
            $address = $this->input->post('address');

            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');
            $admin_id = $this->session->userdata('id');

            $unit = $this->input->post('unit');
            $pin = $this->input->post('pin');
           
            

            $data = array(
               'name' => $name, 
               'hour' =>  $hour, 
               'day' => $day, 
               'contact' => $contact,
               'address' => $address,
               'lat' => $lat, 
               'lng' => $lng,
               'admin_id' => $admin_id               
             );

            $lot_id = $this->AdminModel->insert('lot', $data);      
           
            if($lot_id != false){
              
              for ($i=0; $i < count($unit); $i++) { 

                $unitData = array(
                  'name' => $unit[$i], 
                  'pin' => $pin[$i],
                  'lot' => $lot_id,
                  'admin_id' => $admin_id 
                );
                $this->AdminModel->insert('unit', $unitData);
              }

            }

        }
        redirect('Lot');        
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
