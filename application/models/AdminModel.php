<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminModel extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
 /**
     * Insert Method
     * @param tableName
     * @param dataObject
     */
    public function insert( $tableName ,$data ){
        if ($this->db->insert($tableName, $data) ) {
            return $insert_id = $this->db->insert_id();
        } 
        return false;
    }

    public function getAllfromTable( $tableName ) {
        $this->db->select('*');
        $this->db->from( $tableName );
        $this->db->where( 'is_delete', 0 );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;        
    } 
    public function admin_login_check_info( $data ){
        $this->db->select('*');
        $this->db->from( 'admin' );
        $this->db->where( 'email', $data['email'] );
        $this->db->where( 'password', $data['password'] );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;  
    }   
    public function operator_login_check_info( $data ){
        $this->db->select('*');
        $this->db->from( 'operator' );
        $this->db->where( 'username', $data['username'] );
        $this->db->where( 'password', $data['password'] );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;  
    }
    public function getLotNames() {
        $this->db->select('name');
        $this->db->select('id');
        $this->db->from( 'lot' );
        $this->db->where( 'is_delete', 0 );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;        
    } 

    public function delete($table, $id) {
      
        $this->db->where('id', $id);
        $this->db->update($table, array( 'is_delete' => 1 ));

    } 


    public function deleteUnit($table, $id){

        $this->db->where('lot', $id);
        $this->db->update($table, array( 'is_delete' => 1 ));
    }
    public function update($table, $id, $data) {
      
        $this->db->where('id', $id);
        $this->db->update($table, $data);

    }     

    public function getfromTableById( $tableName, $id ) {
        $this->db->select('*');
        $this->db->from( $tableName );
        $this->db->where( 'id', $id );
        $this->db->where( 'is_delete', 0 );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;        
    } 

    public function getNumberPlateById( $number_plate ) {
        $this->db->select('*');
        $this->db->from( 'number_plates' );
        $this->db->where( 'number_plate', $number_plate );
        $this->db->where( 'is_delete', 0 );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;        
    }     

    public function getUnitData( $tableName, $id ) {
        $this->db->select('*');
        $this->db->from( $tableName );
        $this->db->where( 'lot', intval($id) );
        $this->db->where( 'is_delete', 0 );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;        
    } 



}