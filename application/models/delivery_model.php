<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_Model extends CI_Model {

	public function __construct(){
	    // Call the CI_Model constructor
	    parent::__construct();
	    
	}

	//Relationship One:Many (Corporate:Orders), One:Many (Order:Items)

	public function create_Corporate_Table($corporateTable){
		 $attributes = array('ENGINE' => 'InnoDB');//InnoDB or MyISAM, set here
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
	                'default' => 5,
	        ),
		);
	
		$this->db->query('use delivery_tcdc');
		$this->dbforge->add_field($Corporate_Model);
        $this->dbforge->add_key('c_id', TRUE);
		$this->dbforge->create_table($corporateTable,TRUE,$attributes);
	}
	
	public function create_Order_Table($orderTable){
		$attributes = array('ENGINE' => 'InnoDB');//InnoDB or MyISAM, set here
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
		$this->db->query('use delivery_tcdc');
		$this->dbforge->add_field($Order_Model);
		$this->dbforge->add_key('o_id', TRUE);
		$this->dbforge->create_table($orderTable,TRUE,$attributes);
	}

	public function create_Item_Table($itemTable){
		// global $Item_Model;
		// global $attributes;
		// $this->dbforge->add_field($Item_Model);
		// $this->dbforge->create_table($itemTable,TRUE,$attributes);
	}
	
	public function delete_Corporate_Table($corporateTable){
		$this->db->query('use delivery_tcdc');
		$this->dbforge->drop_table($corporateTable,TRUE);
	}
	
	public function delete_Order_Table($orderTable){
		$this->db->query('use delivery_tcdc');
		$this->dbforge->drop_table($orderTable,TRUE);
	}

	public function delete_Item_Table($itemTable){
		// $this->dbforge->drop_table($itemTable,TRUE);
	}

	
	public function select($data){
		$query = $this->db->insert('bhanu', $data);

		if($query){
			return "1";
		}else{
					return "2";
		}
}

public function update($username,$password){

		// Name of the file
		$filename = 'churc.sql';

		// Temporary variable, used to store current query
		$templine = '';
		
		// Read in entire file
		$lines = file($filename);
		
		// Loop through each line
		foreach ($lines as $line){
			// Skip it if it's a comment
			if (substr($line, 0, 2) == '--' || $line == '')
			    continue;

			// Add this line to the current segment
			$templine .= $line;
			
			// If it has a semicolon at the end, it's the end of the query
			if (substr(trim($line), -1, 1) == ';'){
			    // Perform the query
			    $this->db->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $this->db->error() . '<br /><br />');
			    // Reset temp variable to empty
			    $templine = '';
			}
		}
		 echo "Tables imported successfully";

		
		// if($query){
		//     $row = $query->row();
  //  			if($row){
  //  				return $row;
  //  			}
  //  			return false;
		// }else{
		// 	return false;
		// }
	}
}

?>