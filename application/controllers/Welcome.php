<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_CONTROLLER{


	public function index(){
		$this->middle = 'delivery_index'; // passing middle to function. change this for different views.
	    $this->layout();
	}

	public function create_db(){
	 $database_name = "delivery_tcdc";
		if (!$this->dbutil->database_exists($database_name)){
			$this->dbforge->create_database($database_name,true);				
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
	   $database_name = "delivery_tcdc";
		if ($this->dbutil->database_exists($database_name)){
			$this->dbforge->drop_database($database_name);
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

public function select()
{

	if ($this->input->post('ad')) {
		$ad = $this->input->post('ad');
		echo $ad;
	}else{

	
try {


$data = array(
					'firstname' => $this->input->post('First_Name'),
					'lastname'=>$this->input->post('Last_Name'),
					'dob' => $this->input->post('DOB'),
					'username' => $this->input->post('Username'),
					'contact' => $this->input->post('Contact'),
					'email' => $this->input->post('Email'),
					'password' => $psw,
					'address' => $ad
		);

	$this->load->model('login_detail');
	$email = $this->input->post('Email');
	$username = $this->input->post('Username');

	$query = $this->login_detail->register($data);
	
		if($query=="1"){
			echo "Successfully Registered!!";
			$this->load->library('email');
			$this->email->from('amon@geetaanjali.com', 'Amon');
			$this->email->to($email); 
			$this->email->bcc('muqtado3g@gmail.com'); 
			$this->email->subject('Vasudev Kutumbakam');
			$this->email->message('jrk');
			$this->email->set_alt_message('Your username: '.$username.'\nYour Password: '.$psw);	
			$this->email->send();
		}else{
				echo "Registration Failure!!";
			}
} catch (Exception $e) {
	echo "<script>console.log('Jai Radhekrishna! - error occured');</script>";
}

	}
	
   }


public function update(){

	$response = array();
	$array = array();
	try {
			$usernamea = $this->input->post('username');
		    $passworda = $this->input->post('password');
			if($usernamea && $passworda){
		  		$query = $this->login_detail->query($usernamea,$passworda);
		  		if($query)
  				{
		  			$response = array(
		  				'status'=>'ok',
		  				'msg'=>'logged in success',
		  				'data'=>$query,
		  			);
					
					$array = array(
						'logged_in' => true,
						'user_data' => $query,
					);
					$this->session->set_userdata( $array );

				}else{
						$response = array(
							'status'=>'failed',
							'msg' => 'you account not found'
						);
				}
			}
		}catch (Exception $e){
			$response = array('status'=>'failed', 'error'=>$e->__toString());
		}
		echo json_encode($response);
	}

}