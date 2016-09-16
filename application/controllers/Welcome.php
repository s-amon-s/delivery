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
		$query = $this->delivery_model->create_order_table($Order_Table_Name);
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
		$query = $this->delivery_model->delete_table($Order_Table_Name);
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
		$query = $this->delivery_model->create_corporate_table($Corporate_Table_Name);
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
		$query = $this->delivery_model->delete_table($Corporate_Table_Name);
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
		$query = $this->delivery_model->create_order_items_table($OI_Table_Name);
	}

	public function insert_into_corporate_table(){
		try{

			$data = array(
				'c_name' => $this->input->post('c_name'),
				'c_address'=>$this->input->post('c_address'),
				'contact_person'=>$this->input->post('contact_person'),
				'c_phone'=>$this->input->post('c_phone'),
				'c_status' => $this->input->post('c_status'),
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
	
	public function set_max_day(){
		try{
			$query = $this->delivery_model->set_max_day($this->input->post('id'),$this->input->post('number'));
			$response = $query;
			}catch (Exception $e){
				$response = array('status'=>'failed', 'info'=>$e->__toString());
			}
			echo json_encode($query);
}   

	public function set_max_rent(){
		try{
			$query = $this->delivery_model->set_max_rent($this->input->post('id'),$this->input->post('number'));
			$response = $query;
			}catch (Exception $e){
				$response = array('status'=>'failed', 'info'=>$e->__toString());
			}
			echo json_encode($query);
} 

	public function submit_order(){
		try{
		$data = array(
			'o_status' => $this->input->post('o_status'),
			'o_code'=>$this->input->post('o_code'),
			'o_count' => $this->input->post('o_count'),
			'o_description' => $this->input->post('o_description'),
			'c_id' => $this->input->post('c_id'),
			);
		
		$query = $this->delivery_model->submit_order($data,$this->input->post('i_list'));

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

public function get_all_corporates(){
	try {
		  	$query = $this->delivery_model->get_all_corporate();
			$response = array(
				'status'=>'ok',
				'info'=>$query
			);		  	
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($response);
}

public function get_corporate_info_by_id(){
	try{
		$query = $this->delivery_model->get_corporate_info_by_id($this->input->get('id'));
		$response = array(
			'status'=>'ok',
			'info'=>$query
		);		  	
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($response);
}
public function get_corporate_info_by_name(){
	try{
		$query = $this->delivery_model->get_corporate_info_by_name($this->input->get('name'));
		$response = array(
			'status'=>'ok',
			'info'=>$query
		);		  	
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($response);
}

public function get_items_by_orderid(){
	try{
		$query = $this->delivery_model->get_items_by_orderid($this->input->get('id'));
		$response = array(
			'status'=>'ok',
			'info'=>$query
		);		  	
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($response);
}

public function get_orders_by_corporateid(){
	try{
		$query = $this->delivery_model->get_orders_by_corporateid($this->input->get('id'));
		$response = array(
			'status'=>'ok',
			'info'=>$query
		);		  	
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($response);
}

public function get_corporate_history(){
	try{
		$query = $this->delivery_model->get_corporate_history($this->input->get('id'));
		$response = $query;
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($query);
}

public function confirm_order(){
	try{
		$query = $this->delivery_model->confirm_order($this->input->post('id'));
		$response = $query;
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($query);
}

public function decline_order(){
	try{
		$query = $this->delivery_model->decline_order($this->input->post('id'));
		$response = $query;
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($query);
}

public function ship_order(){
	try{
		$query = $this->delivery_model->ship_order($this->input->post('id'));
		$response = $query;
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($query);
}

public function deliver_order(){
	try{
		$query = $this->delivery_model->deliver_order($this->input->post('id'));
		$response = $query;
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($query);
}

public function complete_order(){
	try{
		$query = $this->delivery_model->complete_order($this->input->post('id'));
		$response = $query;
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($query);
}

public function cancle_order(){
	try{
		$query = $this->delivery_model->cancle_order($this->input->post('id'));
		$response = $query;
		}catch (Exception $e){
			$response = array('status'=>'failed', 'info'=>$e->__toString());
		}
		echo json_encode($query);
}

public function execute_sql_file(){
	$query = $this->delivery_model->execute_sql_file($this->input->post('file_name'));
	if($query){
		echo("Executed");	
	}else{
		echo("Error Executing");
	}
}

	// function _seed_corporate($limit){
 //        // create a bunch of base buyer accounts
 //        for ($i = 0; $i < $limit; $i++){
 //            $data = array(
 //                'c_name' => $this->faker->unique()->userName, // get a unique 
 //                'c_status' => echo rand(0, 1),
 //                'c_maxRent' => echo rand(3, 18),
 //                'c_address' => $this->faker->streetAddress,
 //            );
 
 //            $query = $this->delivery_model->insert_into_corporate_table($data);
 //        }
 
 //        echo PHP_EOL;
 //    }

 //    function _seed_order($limit){
 //        for ($i = 0; $i < $limit; $i++){
 //            $data = array(
 //                'o_status' => echo rand(0, 1),
 //                'o_code' => echo rand(3, 18),
 //                'o_count' => ,
 //                'o_return_date' => ,
	// 			'o_delivery_date' => ,
	// 			'o_description' => ,
 //                'c_id' => $this->faker->streetAddress,
 //            );
 //            $query = $this->delivery_model->submit_order($data,);
 //        }
 //        echo PHP_EOL;
 //    }
}