<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_Schema{

//  Order Status (o_status)__________
    public $Canceled = 0;            //aka Canceled
    public $Waiting_Confirm = 1;    // aka Submitted
    public $Waiting_Ship = 2;      //  aka Confirmed 
    public $Waiting_Delivery = 3; //   aka Shipped 
    public $Waiting_Return = 4;  //    aka Delivered
    public $Completed = 5;      //     aka Returned
    public $Waiting_Update = 6;//      aka Declined
//____________________________//
    
	private $Corporate_Model = array(
	        'id' => array(
	                'type' => 'INT',
	                'constraint' => 5,
	                'unsigned' => TRUE,
	                'auto_increment' => TRUE,
	        ),
	        'c_name' => array(
	                'type' => 'VARCHAR',
	                'constraint' => '100',
	                'unique' => TRUE,
                    'default' => 'not mentioned',
	        ),
            'contact_person' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'default' => 'not mentioned',
            ),
            'c_phone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '18',
                    'default' => 'not mentioned',
            ),
	        'c_address' => array(
	                'type' => 'VARCHAR',
	                'constraint' => '255',
	                'unique' => TRUE,
                    'default' => 'not mentioned',
	        ),
	        'c_status' => array(
	                'type' =>'INT',
	                'constraint' => 1,
	                'unsigned' => TRUE,
	                'default' => 0,
	        ),
	        'c_maxRent' => array(
	                'type' => 'INT',
	                'unsigned' => TRUE,
	                'default' =>  5,
	        ),
            'c_maxDay' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'default' =>  5,
            ),
		);

    private $Order_Model = array(
        'id' => array(
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
        'o_cancle_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_submit_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_confirm_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_ship_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_deliver_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_return_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_complete_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_decline_date' => array(
                'type' => 'Date',
                'null' => TRUE,
        ),
        'o_description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
        ),
        'staff_note' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
        ),
        'user_note' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
        ),
        'c_id' => array(
                'type' => 'INT',
                'default' => 0,
        ),
    );

    private $Order_Items_Model = array(
	    'id' => array(
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