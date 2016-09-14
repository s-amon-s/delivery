<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_Schema{

	private $Corporate_Model = array(
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


	private $Order_Model = array(
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
        'o_delivery_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
        ),
        'c_id' => array(
                'type' => 'INT',
                'default' => 0,
        ),
    );

    private $Order_Items_Model = array(
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
                'type' => 'VARCHAR',
             	'constraint' => '100',
        ),
   
		);


		public function Corporate_Schema(){
			return $this->Corporate_Model;
		}

		public function Order_Schema(){
			return $this->Order_Model;
		}

		public function Order_Items_Schema(){
			return $this->Order_Items_Model;
		}
}

?>