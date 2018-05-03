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

    public function getLotData( $id ){

        $query = $this->db->query(" SELECT lot.`id`, lot.`name`, lot.`hour`, lot.`day`, lot.`contact`, lot.`lat`, lot.`lng`, lot.`address`, lot.`admin_id`, lot.`is_delete`, GROUP_CONCAT(unit.name) as unit_name, GROUP_CONCAT(unit.id) as unit_id, GROUP_CONCAT(unit.pin) as unit_pin FROM `lot` left join unit on lot.id = unit.lot where lot.`is_delete` = 0  and unit.is_delete = 0 and lot.`id` = $id  and unit.is_delete is not null ");

                $query->result();

        return $query->result();
    }
    public function verifyNumberPlate($number_plate, $lot, $current_time){

        $query = $this->db->query("SELECT * from register_plates where time_out >= $current_time and lot = $lot and is_delete = 0 and number_plate = (select id from number_plates where number_plate = '$number_plate' and is_delete = 0) ");

        $query->result();

        return $query->result();

    }
    public function verifyUnitPin($id, $unit_id, $unit_pin){

        $this->db->select('*');
        $this->db->from( 'unit' );
        $this->db->where( 'lot', intval($id) );
        $this->db->where( 'id', intval($unit_id) );
        $this->db->where( 'pin', intval($unit_pin) );
        $this->db->where( 'is_delete', 0 );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result; 
    }


}