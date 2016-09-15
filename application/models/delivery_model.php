<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_Model extends CI_Model{

	public function __construct(){
	    parent::__construct();
        $this->load->model('delivery_schema');
        $this->load->helper('file');
        if ($this->does_database_exist('delivery_tcdc')){
        	$this->db->query('use delivery_tcdc');
        }
	}

	// Function to check if a table exists
	// Input = Table name 
	// Output = Boolean result True if exists else False
	public function does_table_exist($tb_name){
		$query = $this->db->query("SHOW TABLES LIKE '$tb_name'");
		$tableExists = count($query->result()) > 0;
		if ($tableExists){
	      return True;
    	}
    	return False;
	}

	// Function to check if a database exists
	// Input = Database name 
	// Output = Boolean result True if exists else False
	public function does_database_exist($db_name){
		if ($this->dbutil->database_exists($db_name)){
	      return true;
    	}
    	return false;
	}

	// Function to Execute Create command for tables
	// Input = Table Schema, Primary_Key, Table Name 
	// Output = No Output
	private function execute($model,$pk,$table){
		$attributes = array('ENGINE' => 'InnoDB');//InnoDB or MyISAM, set here
		$this->dbforge->add_field($model);
        $this->dbforge->add_key($pk, TRUE);
		$this->dbforge->create_table($table,TRUE,$attributes);
	}

	// Function to Create database if not exist
	// Input = Database Name
	public function create_db($database_name){
		if (!$this->dbutil->database_exists($database_name)){
			$this->dbforge->create_database($database_name,true);				
		}
	}
	
	// Function to Create Corporate Table if not exist
	// Input =  Corporate Table Name
	public function create_corporate_table($corporateTable){
		$this->execute($this->delivery_schema->Corporate_Schema(),'id',$corporateTable);	
	}

	// Function to Create Order Table if not exist
	// Input =  Order Table Name
	public function create_order_table($orderTable){
		$this->execute($this->delivery_schema->Order_Schema(),'id',$orderTable);	
	}

	// Function to Create Order Item Table if not exist
	// Input =  Order Item Table Name
	public function create_order_items_table($oirelationTable){
		$this->execute($this->delivery_schema->Order_Items_Schema(),'id',$oirelationTable);	
	}
	
	// Function to Delete a table if exists
	// Input =  Table Name
	public function delete_table($table_name){
		$this->dbforge->drop_table($table_name,TRUE);
	}

	public function insert_into_corporate_table($data){
		$query = $this->db->insert('Corporate', $data);
		if($query){
			return True;
		}else{
			return False;
		}
	}


	//Function submit order
	// Input order_information, item_information in php array form
	//	Output Boolean true or false
	public function submit_order($data,$items){
		$query = $this->db->insert('Orders', $data);
		$o_id  = $this->db->insert_id();
		$this->submit($o_id);
		if($query){
			if(count($items)>0){
				foreach ($items as $item) {
					$sql = "INSERT INTO orders_items (o_id, bib_id) VALUES ('$o_id', '$item')";
					$query = $this->db->query($sql);
					if(!$query){
						return False;
					}
				}
			}
			return True;
		}else{
			return False;
		}
	}

	//get List of all the corporates
	public function get_all_corporate(){
		$sql = "SELECT * FROM Corporate"; 
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_corporate_info_by_id($id){
		$sql = "SELECT * FROM Corporate WHERE id = ?"; 
		$query = $this->db->query($sql, array($id));
		return $query->result();
	}

	public function get_corporate_info_by_name($name){
		$sql = "SELECT * FROM Corporate WHERE c_name = ?"; 
		$query = $this->db->query($sql, array($name));
		return $query->result();
	}

	public function get_orders_by_corporateid($id){
		$sql = "SELECT * FROM Orders WHERE c_id = ?"; 
		$query = $this->db->query($sql, array($id));
		return $query->result();
	}
	
	public function get_items_by_orderid($order_id){
		$sql = "SELECT bib_id FROM orders_items WHERE o_id = ?"; 
		$query = $this->db->query($sql, array($order_id));
		return $query->result();
	}	

	// - List past orders of corporate + List containing items
	public function get_corporate_history($c_id){
		$orders = $this->get_orders_by_corporateid($c_id);
		foreach ($orders as $order){
			$items = $this->get_items_by_orderid($order->id);
			$order->items = $items;
		}
		return $orders;
	}
//   $Canceled = 0;             Canceled
//   $Waiting_Confirm = 1;      Submitted
//   $Waiting_Ship = 2;         Confirmed 
//   $Waiting_Delivery = 3;     Shipped 
//   $Waiting_Return = 4;       Delivered
//   $Completed = 5;            Returned
//   $Waiting_Update = 6        Declined

	public function submit($order_id){
		$data=array('o_status'=>$this->delivery_schema->Waiting_Confirm,'o_submit_date'=>date('Y-m-d'));
		$this->db->where('id',$order_id);
		$query = $this->db->update('Orders',$data);
		return $query;
	}

	public function confirm_order($order_id){
		$data=array('o_status'=>$this->delivery_schema->Waiting_Ship,'o_confirm_date'=>date('Y-m-d'));
		$this->db->where('id',$order_id);
		$query = $this->db->update('Orders',$data);
		return $query;
	}

	public function decline_order($order_id){
		$data=array('o_status'=>$this->delivery_schema->Waiting_Update,'o_decline_date'=>date('Y-m-d'));
		$this->db->where('id',$order_id);
		$query = $this->db->update('Orders',$data);
		return $query;
	}

	public function ship_order($order_id){
		$data=array('o_status'=>$this->delivery_schema->Waiting_Delivery,'o_ship_date'=>date('Y-m-d'));
		$this->db->where('id',$order_id);
		$query = $this->db->update('Orders',$data);
		return $query;
	}


	public function deliver_order($order_id){
		$data=array('o_status'=>$this->delivery_schema->Waiting_Return,'o_ship_date'=>date('Y-m-d'));
		$this->db->where('id',$order_id);
		$query = $this->db->update('Orders',$data);
		return $query;
	}

	public function complete_order($order_id){
		$data=array('o_status'=>$this->delivery_schema->Completed,'o_deliver_date'=>date('Y-m-d'));
		$this->db->where('id',$order_id);
		$query = $this->db->update('Orders',$data);
		return $query;
	}

	public function cancle_order($order_id){
		  // Cancle order code ??
		  $this->db->where('id', $order_id);
  		  $query = $this->db ->delete('Orders');
		  return $query;
	}

	//for updating order table	
	//update order 
	public function update_order_table($data){
		$this->db->replace('table', $data);
		// $sql = "SELECT c_name FROM Corporate WHERE username = ? AND password = ? "; 
		// $query = $this->db->query($sql, array($user,$pass));
	}

	public function delete_db($database_name){
		if ($this->dbutil->database_exists($database_name)){
			$this->dbforge->drop_database($database_name,true);				
		}
	}

}

// Ask P'rapee about curl command executing and 
	// public function execute_sql_file($sql_file_name){

	// 	// Name of the file
	// 	$filename = $sql_file_name;

	// 	// Temporary variable, used to store current query
	// 	$templine = '';
		
	// 	// Read in entire file
	// 	$lines = read_file($this->load->model($filename));

	// 	// Loop through each line
	// 	foreach ($lines as $line){
	// 		// Skip it if it's a comment
	// 		if (substr($line, 0, 2) == '--' || $line == '')
	// 		    continue;

	// 		// Add this line to the current segment
	// 		$templine .= $line;
			
	// 		// If it has a semicolon at the end, it's the end of the query
	// 		if (substr(trim($line), -1, 1) == ';'){
	// 		    // Perform the query
	// 		    $this->db->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $this->db->error() . '<br /><br />');
	// 		    // Reset temp variable to empty
	// 		    $templine = '';
	// 		}
	// 	}
	// 	return true;
	// }


?>


