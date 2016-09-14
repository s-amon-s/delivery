<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_CONTROLLER{


	public function index(){
		$this->middle = 'delivery_index'; // passing middle to function. change this for different views.
	    $this->layout();
	}

	public function create_db(){
		if(!$this->delivery_model->does_database_exist($this->database_name)){
			$this->delivery_model->create_db($this->database_name);				
		}

		$response = array(
		  				'status'=>"Database exists",
		  				'logo'=> "glyphicon glyphicon-trash",
		  				'code' => 'Delete Database',
		  				'log' => 'Database Created',
		  				'url' => 'delete_db'
		 );	
			
		echo(json_encode($response));
	}

	
	public function delete_db(){
	   
	   if($this->delivery_model->does_database_exist($this->database_name)){
			$this->delivery_model->delete_db($this->database_name);				
		}

		$response = array(
		  				'status'=>"Database doesn't exists",
		  				'logo'=> "glyphicon glyphicon-new-window",
		  				'code' => 'Create Database',
		  				'log' => 'Database Deleted',
		  				'url' => 'create_db'
		 );	
			
		echo(json_encode($response));
	}


	public function create_tbO(){
		$Order_Table_Name = "Orders";
		$query = $this->delivery_model->create_Order_Table($Order_Table_Name);
		$response = array(
				  				'status'=>"Order Table Exists",
				  				'logo'=> "glyphicon glyphicon-trash",
				  				'code' => 'Delete Order Table',
		  						'log' => 'Order Table Created',
		  						'url' => 'delete_tbO'
				 );	
			
		echo(json_encode($response));
	}


	public function delete_tbO(){
		$Order_Table_Name = "Orders";
		$query = $this->delivery_model->delete_Order_Table($Order_Table_Name);
		$response = array(
			'status'=>"Order Table Doesn't Exists",
			'logo'=> "glyphicon glyphicon-new-window",
			'code' => 'Create Order Table',
			'log' => 'Order table Deleted',
			'url' => 'create_tbO'
				 );	
			
		echo(json_encode($response));
	}



	public function create_tbC(){
		$Corporate_Table_Name = "Corporate";
		$query = $this->delivery_model->create_Corporate_Table($Corporate_Table_Name);
		$response = array(
				  				'status'=>"Corporate Table Exists",
				  				'logo'=> "glyphicon glyphicon-trash",
				  				'code' => 'Delete Corporate Table',
				  				'log' => 'Corporate Table Created',
				  				'url' => 'delete_tbC'
				 );	
			
		echo(json_encode($response));
	}


	public function delete_tbC(){
		$Corporate_Table_Name = "Corporate";
		$query = $this->delivery_model->delete_Corporate_Table($Corporate_Table_Name);
		$response = array(
				  				'status'=>"Corporate Table Doesn't Exists",
				  				'logo'=> "glyphicon glyphicon-new-window",
				  				'code' => 'Create Corporate Table',
		  						'log' => 'Corporate Table Deleted',
		  						'url' => 'create_tbC'
				 );	
		echo(json_encode($response));
	}

	public function create_oi_table(){
		$OI_Table_Name = "orders_items";
		$query = $this->delivery_model->create_Order_Items_Table($OI_Table_Name);
	}

	public function insert_into_corporate_table(){
		try{

			$data = array(
				'c_name' => $this->input->post('c_name'),
				'c_address'=>$this->input->post('c_address'),
				'c_status' => $this->input->post('c_status'),
				'c_maxRent' => $this->input->post('c_maxRent'),
				);
			
			$query = $this->delivery_model->insert_into_corporate_table($data);

			if($query){
				$response = array(
				'log' => $this->input->post('c_name')."'s profile has been inserted into Corporate Table"
				);	
				
			}else{
				$response = array(
				'log' => 'Error inserting '.$this->input->post('c_name')."'s profile",
				);	
			}

		}catch (Exception $e){
			$response = array('log'=>'failed', 'error'=>$e->__toString());
		}
		echo(json_encode($response));
	}
	
   


	public function insert_into_order_table(){
		try{
		$data = array(
			'o_status' => $this->input->post('o_status'),
			'o_code'=>$this->input->post('o_code'),
			'o_count' => $this->input->post('o_count'),
			'o_return_date' => $this->input->post('o_return_date'),
			'o_delivery_date' => $this->input->post('o_delivery_date'),
			'o_description' => $this->input->post('o_description'),
			'c_id' => $this->input->post('c_id'),
			);
		
		$query = $this->delivery_model->insert_into_order_table($data,$this->input->post('i_list'));

		if($query){
			$response = array(
			'log' => $this->input->post('c_name')." just made an order"
			);	
			
		}else{
			$response = array(
			'log' => 'Error making order for '.$this->input->post('c_name'),
			);	
		}

	} catch (Exception $e) {
		$response = array('log'=>'failed', 'error'=>$e->__toString());
	}
	echo(json_encode($response));

	}

public function get_corporates(){
	try {
		  	$query = $this->delivery_model->get_corporate();
			$response = array(
				'status'=>'ok',
				'info'=>$query
			);		  	
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($response);
}

public function execute_sql_file(){
	$query = $this->delivery_model->execute_sql_file($this->input->post('file_name'));
	if($query){
		echo("Executed");	
	}else{
		echo("Error Executing");
	}
}

}