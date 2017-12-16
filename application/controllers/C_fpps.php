<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_fpps extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
          $this->load->helper('form');
        $this->load->library('session');
         $this->load->model('M_customer');
           
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('html');
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
    public function form_fpps(){
            $this->load->view('V_fpps/umum/V_header');
            $this->load->view('V_fpps/umum/V_sidebar');
            $this->load->view('V_fpps/umum/V_top_navigasi');
            $this->load->view('V_fpps/V_form');
            $this->load->view('V_fpps/umum/V_footer');
        
        
        
    }
    public function simpan_customer(){
        
        if(isset($_POST['simpan_customer'])){
            
            $daftar = array(
            'nama_customer'      => $this->input->post('nama_customer'),
            'alamat'             => $this->input->post('alamat'),
            'telp'               => $this->input->post('telp'),
            'project_id'         => $this->input->post('project_id'),
            'contact_person'     => $this->input->post('contact_person'),
            'telp_fax'           => $this->input->post('telp_fax')
           );
            $this->db->insert('customer',$daftar);
            
            redirect('C_fpps/form_fpps');
        }else{
            redirect('C_fpps/form_fpps');
        }
        
    }
    public function get_allcustomer(){
   

        $kode = $this->input->post('customer',TRUE); //variabel kunci yang di bawa dari input text id kode
        
        ///$term = strtolower($_GET['term']); // tambahan baris untuk filtering data
        //$query = $this->db->get('customer')->result(); //query model
        $term =strtolower ($_GET['term']); // tambahan baris untuk filtering data
        $query =$this->M_customer->get_allcustomer($term); //query model
 
        $customer    =  array();
        foreach ($query as $d) {
            $json[]     = array(
                'label'                 => $d->nama_customer, //variabel array yg dibawa ke label ketikan kunci
                'id_customer'           => $d->id_customer , //variabel yg dibawa ke id nama
                'nama_customer'         => $d->nama_customer , //variabel yg dibawa ke id nama
                'contact_person'        => $d->contact_person , //variabel yg dibawa ke id nama
                'alamat'                => $d->alamat, //variabel yang dibawa ke id ibukota
                'telp'                  => $d->telp, //variabel yang dibawa ke id ibukota
                'project_id'            => $d->project_id, //variabel yang dibawa ke id ibukota
                'telp_fax'              => $d->telp_fax, //variabel yang dibawa ke id ibukota
            );
        }
        echo json_encode($json);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }
     
}