<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_Model extends CI_Model{

	public function __construct(){
	    parent::__construct();
        $this->load->model('delivery_schema');
        $this->load->helper('file');
        $this->db->query('use delivery_tcdc');
	}

	//Execute Create command for database and tables
	private function execute($model,$pk,$table){
		$attributes = array('ENGINE' => 'InnoDB');//InnoDB or MyISAM, set here
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
		$this->dbforge->drop_table($corporateTable,TRUE);
	}
	
	public function delete_Order_Table($orderTable){
		$this->dbforge->drop_table($orderTable,TRUE);
	}

	public function delete_Item_Table($itemTable){
		// $this->dbforge->drop_table($itemTable,TRUE);
	}

	public function insert_into_corporate_table($data){
		$query = $this->db->insert('Corporate', $data);
		if($query){
			return True;
		}else{
			return False;
		}
	}

	public function insert_into_order_table($data,$items){
		$query = $this->db->insert('Orders', $data);
		$o_id  = $this->db->insert_id();
		if($query){
			if(count($items)>0){
				foreach ($items as $item) {
					$sql = "INSERT INTO orders_items (o_id, bib_id) VALUES ('$o_id', '$item')"; 
					$query = $this->db->query($sql);
				}
			}
			return True;
		}else{
			return False;
		}
	}

	//for updating order table	
	public function update_order_table($data){
		$this->db->replace('table', $data);
		// $sql = "SELECT c_name FROM Corporate WHERE username = ? AND password = ? "; 
		// $query = $this->db->query($sql, array($user,$pass));
	}

	//get all the corporates
	public function get_corporate(){
		$sql = "SELECT c_name,c_id,c_status,c_maxRent FROM Corporate"; 
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function does_table_exist($tb_name){
		$query = $this->db->query("SHOW TABLES LIKE '$tb_name'");
		$tableExists = count($query->result()) > 0;
		if ($tableExists){
	      return True;
    	}
    	return False;
	}

	public function does_database_exist($db_name){
		if ($this->dbutil->database_exists($db_name)){
	      return true;
    	}
    	return false;
	}

	public function create_db($database_name){
		if (!$this->dbutil->database_exists($database_name)){
			$this->dbforge->create_database($database_name,true);				
		}
	}

	public function delete_db($database_name){
		if ($this->dbutil->database_exists($database_name)){
			$this->dbforge->drop_database($database_name,true);				
		}
	}

// Ask P'rapee about curl command executing and 
	public function execute_sql_file($sql_file_name){

		// Name of the file
		$filename = $sql_file_name;

		// Temporary variable, used to store current query
		$templine = '';
		
		// Read in entire file
		$lines = read_file($this->load->model($filename));

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
		return true;
	}

}


?>