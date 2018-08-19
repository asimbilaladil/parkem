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

    public function deleteBlacklistNumberPlate($id) {
      
       $this->db->where('id', $id);
       $this->db->delete('blacklist'); 

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

    public function getBlacklistNumberById( $tableName, $id ) {
        $this->db->select('*');
        $this->db->from( $tableName );
        $this->db->where( 'register_plates_id', $id );

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

    public function getRegisterNumberPlates(){

        $query = $this->db->query("SELECT np.id as number_plates_id , rp.id as register_plates_id , b.id as blacklist_id, u.name as unitName, u.pin as unitPin, np.number_plate as numberPlate, l.name as lotName, rp.time_in as timeIn , rp.time_out as timeOut FROM `register_plates` as rp left join lot as l on rp.lot = l.id left join number_plates as np on rp.`number_plate` = np.id left join unit as u on rp.unit = u.id left join blacklist as b on b.`register_plates_id` = np.id where  np.is_delete != 1 AND l.is_delete != 1");

        $query->result();

        return $query->result();

    }

    public function getBlacklistNumberPlates(){

        $query = $this->db->query("SELECT np.number_plate, np.id as number_plate_id, b.id as blacklist_id FROM `blacklist` as b left join number_plates as np on b.register_plates_id = np.id where np.is_delete != 1");

        $query->result();

        return $query->result();

    }

    public function checkBlacklistNumber($number_plate){
        $query = $this->db->query("SELECT * FROM `blacklist` WHERE `register_plates_id` in (select id from number_plates where number_plate = '$number_plate' )");

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

    public function getNumberPlatesByLot($lot, $time){
        
        $query = $this->db->query(" select *   from number_plates  where id in ( SELECT number_plate FROM `register_plates` where $time >= time_in and $time <= time_out and lot = $lot)");

        $query->result();

        return $query->result();        
       
    } 


    public function getAllCitations(){
        
        $query = $this->db->query("SELECT c.id, c.timestamp as timestamp, o.fullname as operatorName, np.number_plate as numberPlate, c.image as carImage, l.name as lotName, c.payment_status as paymentStatus FROM `citation` as c left join operator as o on c.operator = o.id LEFT join number_plates as np on np.id = c.number_plate LEFT join lot as l on l.id = c.lot where np.is_delete = 0 and c.is_delete = 0 and o.is_delete = 0 and l.is_delete = 0");

        $query->result();

        return $query->result();        
       
    } 
    public function findCitation($id){
        
        $query = $this->db->query("SELECT c.id, c.timestamp as timestamp, o.fullname as operatorName, np.number_plate as numberPlate, c.image as carImage, l.name as lotName, c.payment_status as paymentStatus FROM `citation` as c left join operator as o on c.operator = o.id LEFT join number_plates as np on np.id = c.number_plate LEFT join lot as l on l.id = c.lot where np.is_delete = 0 and c.is_delete = 0 and o.is_delete = 0 and l.is_delete = 0 and c.id = $id");

        $query->result();

        return $query->result();        
       
    } 
    public function verifyPaypalTxnID($id, $txn_id){

        $this->db->select('*');
        $this->db->from( 'citation' );
        $this->db->where( 'id', intval($id) );
        $this->db->where( 'txn_id', $txn_id );
        $quary_result=$this->db->get();
        $result = $quary_result->num_rows();
        return $result; 
    }

    public function verifyCitationBeforeCreate($lot_id, $numberPlate_id){

        $this->db->select('*');
        $this->db->from( 'citation' );
        $this->db->where( 'lot', intval($lot_id) );
        $this->db->where( 'number_plate', intval($numberPlate_id) );
        $this->db->order_by('id',"desc");
        $this->db->limit(1);
        
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result; 
    }    





}