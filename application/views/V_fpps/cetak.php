<?php ob_start();?>
<!DOCTYPE html>
<html>
<head>
  <style>
    @page { margin: 100px 25px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    p { page-break-after: always; }
    p:last-child { page-break-after: never; }
  </style>
</head>
<body>
    <header><img  src="<?php echo base_url('assets/white_logo.png');?>"</header>
  <footer>footer on each page</footer>
 <?php 
 
 foreach($query->result_array() as $cetak);{
     
    echo $cetak['data_sample'];
    echo $cetak['jumlah_sample'];
    echo $cetak['bentuk'];
    echo $cetak['tgl_penerimaan'];
    echo $cetak['tgl_sampling'];
    echo $cetak['deskripsi_sample'];
    echo $cetak['kesiapan_personel'];
    echo $cetak['kondisi_akomodasi'];
    echo $cetak['beban_pekerjaan'];
    echo $cetak['kondisi_peralatan'];
    echo $cetak['kesesuaian_metode'];
    echo $cetak['kesesuaian_biaya'];
    echo $cetak['nama_lab_subkontrak'];
    echo $cetak['kesimpulan'];
    echo $cetak['parameter_penyakit_ikan'];
    echo $cetak['diberikan_oleh'];
    echo $cetak['diterima_oleh'];
    


    
}
   
foreach ($data_customer->result_array() as $data_cs){
       
    echo $data_cs['nama_customer'];
    echo $data_cs['alamat'];
    echo $data_cs['telp'];
   }
       
       

 
 ?>

</body>
</html>