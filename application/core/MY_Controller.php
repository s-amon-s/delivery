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
   //Load layout    
   public function layout(){
     // making temlate and send data to view.
     $this->template['header'] = $this->load->view('layout/header', $this->data, true);
     $this->template['left']   = $this->load->view('layout/left', $this->data, true);
     $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
     $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);   
     $this->load->view('layout/index', $this->template);

   }

}