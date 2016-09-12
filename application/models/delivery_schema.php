<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_Schema{

	 public function Corporate_Schema(){
	 	$Corporate_Model = array(
	        'c_id' => array(
	                'type' => 'INT',
	                'constraint' => 5,
	                'unsigned' => TRUE,
	                'auto_increment' => TRUE,
	        ),
	        'c_name' => array(
	                'type' => 'VARCHAR',
	                'constraint' => '100',
	                'unique' => TRUE,
	        ),
	        'c_address' => array(
	                'type' => 'VARCHAR',
	                'constraint' => '255',
	                'unique' => TRUE,
	        ),
	        'c_status' => array(
	                'type' =>'INT',
	                'constraint' => 1,
	                'unsigned' => TRUE,
	                'default' => 1,
	        ),
	        'c_maxRent' => array(
	                'type' => 'INT',
	                'unsigned' => TRUE,
	                'default' =>	 5,
	        ),
		);

	 	return $Corporate_Model;
	 }


	 public function Order_Schema(){

		$Order_Model = array(
        'o_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
        ),
        'o_status' => array(
                'type' => 'INT',
                'constraint' => 1,
                'default' => 1,
        ),
        'o_code' => array(
                'type' =>'VARCHAR',
                'constraint' => '100',
                'default' => 'QwErTy0123456789',
        ),
        'o_count' => array(
                'type' => 'INT',
                'default' => 0,
        ),
        'o_return_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_deliver_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
        ),
    );
		return $Order_Model;
	 }


	 public function Corporate_Order_Schema(){
		 $Corporate_Order_Model = array(
	        'co_id' => array(
	                'type' => 'INT',
	                'constraint' => 5,
	                'unsigned' => TRUE,
	                'auto_increment' => TRUE,
	        ),
	        'c_id' => array(
	                'type' => 'INT',
	                'unsigned' => TRUE,	                
	        ),
	        'o_id' => array(
	        	    'type' => 'INT',
	                'unsigned' => TRUE,	                
	        ),
		);
		
		return $Corporate_Order_Model;
	 }

	 public function Order_Items_Schema(){
	 	$Order_Items_Model = array(
	        'oi_id' => array(
	                'type' => 'INT',
	                'constraint' => 5,
	                'unsigned' => TRUE,
	                'auto_increment' => TRUE,
	        ),
	        'o_id' => array(
	                'type' => 'INT',
	                'unsigned' => TRUE,	                
	        ),
	        'bib_id' => array(
	                'type' => 'INT',
	                'unsigned' => TRUE,	                
	        ),
	   
		);
		
		return $Order_Items_Model;

	 }

}

?>