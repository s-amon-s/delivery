<?php 

class MY_Controller extends CI_Controller{ 

  public  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->dbforge();
    $this->load->dbutil();
    $this->load->model('delivery_model');
  }
  
   //set the class variable.
  var $template  = array();
  var $data      = array();
  var $database_name = "delivery_tcdc";
   //Load layout    
  public function layout(){

    if(!$this->delivery_model->does_database_exist($this->database_name)){
      $this->data['db_code'] = 'Create Database';  
      $this->data['db_url'] = 'create_db';  
    }else{
      $this->data['db_code'] = 'Delete Database';  
      $this->data['db_url'] = 'delete_db';  
    }
    
    if (!$this->delivery_model->does_table_exist('Corporate')){
      $this->data['tbC_code'] = 'Create Corporate Table';  
      $this->data['tbC_url'] = 'create_tbC';  
    }else{
      $this->data['tbC_code'] = 'Delete Corporate Table';  
      $this->data['tbC_url'] = 'delete_tbC';  
    }

    if (!$this->delivery_model->does_table_exist('Orders')){
      $this->data['tbO_code'] = 'Create Order Table';  
      $this->data['tbO_url'] = 'create_tbO';  
    }else{
      $this->data['tbO_code'] = 'Delete Order Table';  
      $this->data['tbO_url'] = 'delete_tbO';  
    }
    
     // making temlate and send data to view.
    $this->template['header'] = $this->load->view('layout/header', $this->data, true);
    $this->template['left']   = $this->load->view('layout/left', $this->data, true);
    $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
    $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);   
    $this->load->view('layout/index', $this->template);

   }

}