<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 private $data = array();
	 private function set_db_status($in){global $data; $data['db_status'] = $in;}
	 private function set_db_code($in){global $data; $data['db_code'] = $in;}
	 private function set_db_url($in){global $data; $data['db_url'] = $in;}
	 private function set_db_logo($in){global $data; $data['db_logo'] = $in;}
	 private function set_tbO_status($in){global $data; $data['tbO_status'] = $in;}
	 private function set_tbO_code($in){global $data; $data['tbO_code'] = $in;}
	 private function set_tbO_url($in){global $data; $data['tbO_url'] = $in;}
	 private function set_tbC_status($in){global $data; $data['tbC_status'] = $in;}
	 private function set_tbC_code($in){global $data; $data['tbC_code'] = $in;}
	 private function set_tbC_url($in){global $data; $data['tbC_url'] = $in;}

	 
	 public	function __construct(){
		 		parent::__construct();
		 		$this->load->helper('url');
		 		$this->load->dbforge();
		 		$this->load->dbutil();
				$this->load->model('delivery_model');

				// Set default Values
				$this->set_db_status("Database Doesn't Exist");
			    $this->set_db_code("Create Database");
 			    $this->set_db_url("index.php/Welcome");
 			    $this->set_db_logo("glyphicon-new-window");
				$this->set_tbO_status("Table Doesn't Exist");
			    $this->set_tbO_code("Seed Corporate Table");
 			    $this->set_tbO_url("index.php/Welcome/create_tbO");
			    $this->set_tbC_status("Table Doesn't Exist");
     			$this->set_tbC_code("Seed Order Table");
			    $this->set_tbC_url("index.php/Welcome/create_tbC");
	 	}

	
	public function index(){
		global $data;
		if (!$this->dbutil->database_exists('delivery_tcdc')){
				$this->dbforge->create_database('delivery_tcdc',true);				
	        	$data['db_status'] = "Database exists";
				$data['db_code'] = 'Delete Database';
				$data['db_url'] = 'index.php/Welcome/delete_db';
				$data['db_logo'] = 'glyphicon-trash';
			}

		$this->load->view('delivery_index',$data); 
	}


public function delete_db(){
	
	if ($this->dbutil->database_exists('delivery_tcdc')){
		$this->dbforge->drop_database('delivery_tcdc');
	}
		global $data; 
		$data['db_status'] = "Database doesn't exists";
		$data['db_url'] = 'index.php/Welcome/';
		$data['db_code'] = 'Create Database';
		$data['db_logo'] = 'glyphicon-new-window';
		$this->index();
}


	public function create_tbO(){
		global $data; 
		$Order_Table_Name = "Orders";
		$query = $this->delivery_model->create_Order_Table($Order_Table_Name);
		$data['tbO_status'] = "Order Table exists";
		$data['tbO_code'] = 'Delete Order Table';
		$data['tbO_url'] = 'index.php/Welcome/delete_tbO';
		$data['tbO_logo'] = 'glyphicon-trash';
		$this->index();
	}


public function delete_tbO(){
		global $data; 
		$Order_Table_Name = "Orders";
		$query = $this->delivery_model->delete_Order_Table($Order_Table_Name);
		$data['tbO_status'] = "Table Doesn't Exists";
		$data['tbO_code'] = 'Create Order Table';
		$data['tbO_url'] = 'index.php/Welcome/create_tbO';
		$data['tbO_logo'] = 'glyphicon-new-window';
		$this->index();
	}



	public function create_tbC(){
		global $data; 
		$Corporate_Table_Name = "Corporate";
		$query = $this->delivery_model->create_Corporate_Table($Corporate_Table_Name);
		$data['tbC_status'] = "Corporate Table exists";
		$data['tbC_code'] = 'Delete Corporate Table';
		$data['tbC_url'] = 'index.php/Welcome/delete_tbC';
		$data['tbC_logo'] = 'glyphicon-trash';
		$this->index();
	}


public function delete_tbC(){
		global $data; 
		$Corporate_Table_Name = "Corporate";
		$query = $this->delivery_model->delete_Corporate_Table($Corporate_Table_Name);
		$data['tbC_status'] = "Table Doesn't Exists";
		$data['tbC_code'] = 'Create Corporate Table';
		$data['tbC_url'] = 'index.php/Welcome/create_tbC';
		$data['tbC_logo'] = 'glyphicon-new-window';
		$this->index();
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