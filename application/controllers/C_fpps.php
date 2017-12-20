<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_fpps extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
     //   require_once (APPPATH.'third_party/dompdf/dompdf_config.inc.php');
          $this->load->helper('form');
        $this->load->library('session');
         $this->load->model('M_customer');
           
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('html');
        $this->load->helper('url');
        
        $this->load->library('datatables');
        $this->load->model('World_model');
        
    }

        public function index()
	{
           
            redirect('C_fpps/form_fpps');
           
	}
    public function form_fpps(){
        
        $query=$this->db->get('record_number');
       $record = $query->num_rows();
        
            $this->load->view('V_fpps/umum/V_header');
            $this->load->view('V_fpps/umum/V_sidebar');
            $this->load->view('V_fpps/umum/V_top_navigasi');
            $this->load->view('V_fpps/V_form',['record'=>$record]);
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

   public function simpan_fpps(){
 if(isset($_POST['btn_fpps'])){
     
     $record_number = array(
            'project_id'    => $this->input->post('record_number'),
        );
         
        $this->db->insert('record_number',$record_number);
     
     $customer_fpps = array(
            'id_customer_fpps_customer'               => $this->input->post('id_customer'),
            'record_number_customer'    => $this->input->post('record_number'),
        );
         
        $this->db->insert('customer_fpps',$customer_fpps);
        
      $jenis_sample = array(
            'record_number_sample'  => $this->input->post('record_number'),
            'data_sample'           => $this->input->post('data_sample'),
            'jumlah_sample'         => $this->input->post('jumlah_sample'),
            'bentuk'                => $this->input->post('bentuk'),
            'deskripsi_sample'      => $this->input->post('deskripsi_sample'),
            'berat_isi'             => $this->input->post('berat_isi'),
            'tgl_penerimaan'        => $this->input->post('tgl_penerimaan'),
            'tgl_sampling'          => $this->input->post('tgl_sampling'),
        );
         
        $this->db->insert('jenis_sample',$jenis_sample); 
        
        $kaji_ulang_permintaan = array(
            'record_number_kaji_ulang'      => $this->input->post('record_number'),
            'kesiapan_personel'             => $this->input->post('kesiapan_personel'),
            'kondisi_akomodasi'             => $this->input->post('kondisi_akomodasi'),
            'beban_pekerjaan'               => $this->input->post('beban_pekerjaan'),
            'kondisi_peralatan'             => $this->input->post('kondisi_peralatan'),
            'kesesuaian_metode'             => $this->input->post('kesesuaian_metode'),
            'kesesuaian_biaya'              => $this->input->post('kesesuaian_biaya'),
        );
         
        $this->db->insert('kaji_ulang_permintaan',$kaji_ulang_permintaan);
        
          $penguji_subkontrak = array(
            'record_number_penguji_subkontrak' => $this->input->post('record_number'),
            'nama_lab_subkontrak'              => $this->input->post('nama_lab_subkontrak'),
            'kesimpulan'                       => $this->input->post('kesimpulan'),
            'parameter_penyakit_ikan'          => $this->input->post('parameter_penyakit_ikan'),
           
        );
         
        $this->db->insert('penguji_subkontrak',$penguji_subkontrak);
        
        $penjelasan_penerimaan_fpps = array(
            'record_number_penjelasan'             => $this->input->post('record_number'),
            'diberikan_oleh'                       => $this->input->post('diberikan_oleh'),
            'diterima_oleh'                         => $this->input->post('diterima_oleh'),
           
        );
         
        $this->db->insert('penjelasan_penerimaan_fpps',$penjelasan_penerimaan_fpps);
        
    //$jenis_penyakit = $_POST['jenis_penyakit'];
      
      //foreach ($jenis_penyakit as $jenis_penyakit=>$value ){
          
        //  $jenis = array(
              
          //  'jenis_penyakit'=>$value  
         // );
          // $this->db->insert('parameter_penyakit',$jenis);
           
      //}
       
   //$bakteri = $_POST['bakteri'];
       
     //  foreach ($bakteri as $bakteri=>$value ){
          
       //   $bakteri = array(
          // /   
           // 'bakteri'=>$value  
         // /);
           //$this->db->insert('parameter_penyakit',$bakteri);
       
        
           redirect('C_fpps/daftar_fpps');
      }
      
     
 }
 
 public function daftar_fpps(){
     
     
     $this->load->view('V_fpps/umum/V_header');
            $this->load->view('V_fpps/umum/V_sidebar');
            $this->load->view('V_fpps/umum/V_top_navigasi');
            $this->load->view('V_fpps/V_daftar_fpps');
            $this->load->view('V_fpps/umum/V_footer');
     
 }
 

 public function json() {
        header('Content-Type: application/json');
        echo $this->World_model->json();
    
}
public function hapus_fpps(){
     
     $hapus = $this->uri->segment(3);
   
     
   
    
    $this->db->delete('record_number',['project_id'=>$hapus]);
    $this->db->delete('customer_fpps',['record_number_customer'=>$hapus]);
    $this->db->delete('jenis_sample',['record_number_sample'=>$hapus]);
    $this->db->delete('kaji_ulang_permintaan',['record_number_kaji_ulang'=>$hapus]);
    $this->db->delete('penguji_subkontrak',['record_number_penguji_subkontrak'=>$hapus]);
    $this->db->delete('penjelasan_penerimaan_fpps',['record_number_penjelasan'=>$hapus]);
    
    
    redirect('C_fpps/daftar_fpps');
       
      
   
     
     
 }
 public function cetak_fpps(){
$this->load->library('Mypdf');

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);     
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetTitle('SILABKARIMUTU SYSTEM');

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

<<<<<<< HEAD
$pdf->SetFont('times', '', 12);
=======
$pdf->SetFont('times', 'BI', 12);
>>>>>>> 512ac358cef03a36d62ac5ded422978f44367711

$pdf->AddPage();

$html ='<hr>';
<<<<<<< HEAD
$html.= "<p align ='center'>PERMINTAAN PENGAJUAN SAMPEL DAN KAJI ULANG PERMINTAAN</p>";
$html.= "<p align ='left'>{alamat}</p>";
$html.= "<p align ='left'>{data_sample}</p>";
$html.= "<p align ='left'>{jumlah_sample}</p>";
$html.= "<p align ='left'>Dalam bentuuk : {bentuk}</p>";
$html.= "<p align ='left'>{tgl_penerimaan}</p>";
$html.= "<p align ='left'>{deskripsi_sample}</p>";
$html.= "<p align ='right'>{tgl_sampling}</p>";
=======
$html.= "<p align ='left'>{alamat}</p>";
$html.= "<p align ='left'>{data_sample}</p>";
$html.= "<p align ='left'>{jumlah_sample}</p>";
$html.= "<p align ='left'>{bentuk}</p>";
$html.= "<p align ='left'>{tgl_penerimaan}</p>";
$html.= "<p align ='left'>{deskripsi_sample}</p>";
$html.= "<p align ='left'>{tgl_sampling}</p>";
>>>>>>> 512ac358cef03a36d62ac5ded422978f44367711
$html.= "<p align ='left'>{kesiapan_personel}</p>";
$html.= "<p align ='left'>{kondisi_akomodasi}</p>";
$html.= "<p align ='left'>{beban_pekerjaan}</p>";
$html.= "<p align ='left'>{kondisi_peralatan}</p>";
$html.= "<p align ='left'>{kesesuaian_metode}</p>";
$html.= "<p align ='left'>{kesesuaian_biaya}</p>";
$html.= "<p align ='left'>{nama_lab_subkontrak}</p>";
$html.= "<p align ='left'>{kesimpulan}</p>";
$html.= "<p align ='left'>{parameter_penyakit_ikan}</p>";
$html.= "<p align ='left'>{diberikan_oleh}</p>";
$html.= "<p align ='left'>{diterima_oleh}</p>";
$html.= "<p align ='left'>{nama_customer}</p>";
$html.= "<p align ='left'>{alamat}</p>";
$html.= "<p align ='left'>{telp}</p>";














$ambil = $this->uri->segment(3);    
$this->db->select('*');
$this->db->from('customer_fpps');
$this->db->where('record_number_customer',$ambil);
$this->db->join('jenis_sample','record_number_sample = record_number_customer');
$this->db->join('record_number','project_id = record_number_customer');
$this->db->join('kaji_ulang_permintaan','record_number_kaji_ulang = record_number_customer');
$this->db->join('penguji_subkontrak','record_number_penguji_subkontrak = record_number_customer');
$this->db->join('penjelasan_penerimaan_fpps','record_number_penjelasan = record_number_customer');
    
$query = $this->db->get();
foreach($query->result_array() as $cetak);{
$id_customer = $cetak['id_customer_fpps_customer'];
}
$customer_id = $id_customer;
$data_customer = $this->db->get_where('customer',['id_customer'=>$customer_id]);
foreach($query->result_array() as $cetak);{
     $html = str_replace('{data_sample}',$cetak['data_sample'],$html);
     $html = str_replace('{jumlah_sample}',$cetak['jumlah_sample'],$html);
     $html = str_replace('{bentuk}',$cetak['bentuk'],$html);
     $html = str_replace('{tgl_penerimaan}',$cetak['tgl_penerimaan'],$html);
     $html = str_replace('{tgl_sampling}',$cetak['tgl_sampling'],$html);
     $html = str_replace('{deskripsi_sample}',$cetak['deskripsi_sample'],$html);
     $html = str_replace('{kesiapan_personel}',$cetak['kesiapan_personel'],$html);
     $html = str_replace('{kondisi_akomodasi}',$cetak['kondisi_akomodasi'],$html);
     $html = str_replace('{beban_pekerjaan}',$cetak['beban_pekerjaan'],$html);
     $html = str_replace('{kondisi_peralatan}',$cetak['kondisi_peralatan'],$html);
     $html = str_replace('{kesesuaian_metode}',$cetak['kesesuaian_metode'],$html);
     $html = str_replace('{kesesuaian_biaya}',$cetak['kesesuaian_biaya'],$html);
     $html = str_replace('{nama_lab_subkontrak}',$cetak['nama_lab_subkontrak'],$html);
     $html = str_replace('{kesimpulan}',$cetak['kesimpulan'],$html);
     $html = str_replace('{parameter_penyakit_ikan}',$cetak['parameter_penyakit_ikan'],$html);
     $html = str_replace('{diberikan_oleh}',$cetak['diberikan_oleh'],$html);
     $html = str_replace('{diterima_oleh}',$cetak['diterima_oleh'],$html);
}
foreach ($data_customer->result_array() as $data_cs){
     $html = str_replace('{nama_customer}',$data_cs['nama_customer'],$html);
     $html = str_replace('{alamat}',$data_cs['alamat'],$html);
      $html = str_replace('{telp}',$data_cs['telp'],$html);
     
   }
$pdf->writeHTML($html, true, false, true, false, '');
   

$pdf->Output('example_003.pdf', 'I');


 }

}