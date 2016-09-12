<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_Model extends CI_Model{

	public function __construct(){
	    parent::__construct();
        $this->load->model('delivery_schema');
	}

	//Execute Create command for database and tables
	private function execute($model,$pk,$table){
		$attributes = array('ENGINE' => 'InnoDB');//InnoDB or MyISAM, set here
		$this->db->query('use delivery_tcdc');
		$this->dbforge->add_field($model);
        $this->dbforge->add_key($pk, TRUE);
		$this->dbforge->create_table($table,TRUE,$attributes);
	}
	
	//Relationship One:Many (Corporate:Orders), One:Many (Order:Items)
	public function create_Corporate_Table($corporateTable){
		 		
		$this->execute($this->delivery_schema->Corporate_Schema(),'c_id',$corporateTable);	
	}
	
	public function create_Order_Table($orderTable){
		$this->execute($this->delivery_schema->Order_Schema(),'o_id',$orderTable);	
	
	}

	public function create_Corporate_Order_Table($corelationTable){
		$this->execute($this->delivery_schema->Corporate_Order_Schema(),'co_id',$corelationTable);		
	}

	public function create_Order_Items_Table($oirelationTable){
		$this->execute($this->delivery_schema->Order_Items_Schema(),'oi_id',$oirelationTable);	
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
	}

}


?>