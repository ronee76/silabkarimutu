<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_fpps extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
    }

        public function index()
	{
           
            $this->load->view('V_fpps/umum/V_header');
            $this->load->view('V_fpps/umum/V_sidebar');
            $this->load->view('V_fpps/umum/V_top_navigasi');
            $this->load->view('V_fpps/V_content');
            $this->load->view('V_fpps/umum/V_footer');
           
	}
     
}