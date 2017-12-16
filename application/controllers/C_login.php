<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
    }

        public function index()
	{
           if(isset($_POST['btn_login'])){
               
               
               redirect('C_menu');
           }else{
            
		$this->load->view('V_login');
	}
     }
}