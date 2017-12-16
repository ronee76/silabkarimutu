<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('form');
        $this->load->model('M_login');
        $this->load->library('session');
        
        $this->load->helper('url');
        $this->load->database();

        $this->load->helper('url');
    }

        public function index()
	{
           
            
		$this->load->view('V_login');
	
     }
  public function login(){
    
 if(isset($_POST['btn_login'])){

 $email    =   $this->input->post('email');
 $password =   $this->input->post('password');
    
 $tampil = $this->M_login->login($email,$password);
 
 if($tampil==1 ){
     
     $setsesi = $this->db->get_where('user',['email'=>$email]);
     foreach ($setsesi->result() as $value) {
         
         $sess_data= array(
            'nama'              =>$value->nama,
            'level'                =>$value->level,
            'status'             =>$value->status,
            'tanggal_daftar'    =>$value->tanggal_daftar,
            'gambar'            =>$value->gambar,
                       );
     $ok =  $this->session->set_userdata($sess_data);
     }
    redirect('C_menu');
    }else{
      redirect('C_login');
     }
 
}

}
 public function keluar(){
        
        $this->session->sess_destroy();
        
        redirect('C_login');
        
    }

}