
<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#modal1").click(function(){
          $("#modal-info").show();
        });
   
    });
    </script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#close").click(function(){
          $("#modal-info").hide();
        });
   
    });
    </script>    
    
<div class="modal modal-info fade in" id="modal-info" style="display: block; display: none; ;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Input Customer</h4>
              </div>
                
              <div class="modal-body">
               <form action="<?php echo base_url('C_fpps/simpan_customer');?>" method="post" enctype="multipart/formdata">
                <input class="form-control"  placeholder="nama customer" name="nama_customer" type="text"><br>
                <input class="form-control"  name="alamat" placeholder="Alamat" type="text"><br>
                <input class="form-control"  name="telp" placeholder="Telp" type="text"><br>
                <input class="form-control"  name="project_id" placeholder="Project Id" type="text"><br>
                <input class="form-control"  name="contact_person" placeholder="Contact Person" type="text"><br>
                <input class="form-control"  name="telp_fax" placeholder="Telp/Fax" type="text">
    
              </div>
              <div class="modal-footer">
                  <button type="button" id="close"  class="btn btn-outline pull-left">close</button>
                 <button type="submit" name="simpan_customer" class="btn btn-outline">Simpan Customer</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
 <link href="<?php echo base_url()?>assets/jquery/jquery-ui.css" rel="stylesheet">
  <script>
     $(function () {
        $("#customer").autocomplete({
            minLength:0,
            delay:0,
            source:'<?php echo site_url('C_fpps/get_allcustomer'); ?>',   //nama source kita ambil langsung memangil fungsi get_allkota
             select:function(event, ui){
                $('#customer').val(ui.item.nama_customer);
                $('#id_customer').val(ui.item.id_customer);
                $('#nama_customer').val(ui.item.nama_customer);
                $('#alamat').val(ui.item.alamat);
                $('#telp').val(ui.item.telp);
                $('#project_id').val(ui.item.project_id);
                $('#contact_person').val(ui.item.contact_person);
                $('#telp_fax').val(ui.item.telp_fax);
                }
            }
                    );
        });
    </script>
<div class="x_panel">
<div class="x_title">
    <h2>Form FPPS</h2>
                
  <div class="clearfix"></div>
</div>
  <div class="col-md-6">
      <div class="input-group">
          <input class="form-control" id="id_customer"  placeholder="nama customer" name="id_customer" type="hidden">
          <input class="form-control" id="customer"  placeholder="nama customer" name="nama_customer" type="text">
              <span class="input-group-btn">
                 <button type="button" id="modal1" class="btn btn-primary"><span class="fa fa-plus"></span></button>
               </span>
        </div>
       <div class="form-group has-feedback">
          <input class="form-control" readonly="" id="alamat" name="alamat" placeholder="Alamat" type="text">
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control" readonly="" id="telp" name="telp" placeholder="Telp" type="text">
        <span class="fa fa-tty form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control" readonly="" id="project_id" name="project_id" placeholder="Project Id" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
       
  </div>
    
    <div class="col-md-6">
      <div class="form-group has-feedback">
          <input class="form-control" readonly="" id="contact_person" name="contact_person" placeholder="Contact Person" type="text">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
          <input class="form-control"readonly="" id="telp_fax" name="telp_fax" placeholder="Telp/Fax" type="text">
        <span class="fa fa-tty form-control-feedback"></span>
      </div>
  </div>
 
</div>
    
<!--------------jenis sample ---------------->
    <div class="x_panel">

    <div class="col-md-6">
      <div class="input-group">
          <input class="form-control" id="customer"  placeholder="Jenis Sample" name="jenis_sample" type="text">
              <span class="input-group-btn">
                 <button type="button" id="" class="btn btn-primary"><span class="fa fa-plus"></span></button>
               </span>
        </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="telp" name="tel" placeholder="Jumlah Sample" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="telp" name="telp" placeholder="Deskripi Sample" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="telp" name="telp" placeholder="Bentuk" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="telp" name="telp" placeholder="Berat isi" type="text">
        <span class="fa fa-book form-control-feedback"></span>
      </div>
     </div>
        <div class="col-xs-6">
      <div class="input-group date" id="myDatepicker">
                            <input class="form-control" type="text" placeholder="Tanggal penerimaan">
                            <span class="input-group-addon" style="">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
     </div>
        
     <div class="col-xs-6">
      <div class="input-group date" id="datetimepicker6">
                            <input class="form-control" type="text" placeholder="Tanggal sampling">
                            <span class="input-group-addon" style="">
                                    <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
     </div>
       
        
    </div> 
        
        <div class="col-md-6">
            <h4>Kaji ulang permintaan</h4>
         <div class="radio">
            <div class="col-xs-4">Kesiapan personel</div>
                   <div class="col-xs-3">
                         <input checked="" value="option1" id="optionsRadios1" name="optionsRadios1" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="option2" id="optionsRadios2" name="optionsRadios1" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kondisi Akomodasi</div>
                   <div class="col-xs-3">
                         <input checked="" value="option3" id="optionsRadios1" name="optionsRadios2" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="option4" id="optionsRadios2" name="optionsRadios2" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Beban pekerjaan</div>
                   <div class="col-xs-3">
                         <input checked="" value="option1" id="optionsRadios1" name="optionsRadios3" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="option2" id="optionsRadios2" name="optionsRadios3" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kondisi peralatan</div>
                   <div class="col-xs-3">
                         <input checked="" value="option1" id="optionsRadios1" name="optionsRadios4" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="option2" id="optionsRadios2" name="optionsRadios4" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kesesuaian metode</div>
                   <div class="col-xs-3">
                         <input checked="" value="option1" id="optionsRadios1" name="optionsRadios5" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="option2" id="optionsRadios2" name="optionsRadios5" type="radio"> Tidak Mampu
                   </div>
          </div>
            <div class="radio">
            <div class="col-xs-4">Kesesuaian biaya</div>
                   <div class="col-xs-3">
                         <input checked="" value="option1" id="optionsRadios1" name="optionsRadios6" type="radio"> Mampu 
                    </div>
                    <div class="col-xs-4">
                     <input value="option2" id="optionsRadios2" name="optionsRadios6" type="radio"> Tidak Mampu
                   </div>
          </div>
            
       </div>
 </div>


<!------------parameter penyakit--------->
<div class="x_panel">
    
 <div class="radio">
     <h4>Parameter penyakit</h4>
     <div class="col-md-1">
     <h4></h4>
       <div class="checkbox">
                <label>
                    <input value="" type="checkbox"> Klinis<br>
                </label>
           <label>
                    <input value="" type="checkbox"> TSV<br>
                </label>
                <label>
                    <input value="" type="checkbox"> IMNV<br>
                </label>
                <label>
                    <input value="" type="checkbox"> KHV<br>
                </label>
                <label>
                    <input value="" type="checkbox"> VNN<br>
                </label>
                <label>
                    <input value="" type="checkbox"> Iridoviru<br>
                </label>
                <label>
                    <input value="" type="checkbox"> Megalocity <br>
                </label>
                <label>
                    <input value="" type="checkbox"> Wsspv<br>
                </label>
                
                          </div>    
      </div> 
     <div class="col-md-2">
     <h4></h4>
       <div class="checkbox">
                <label>
                    <input value="" type="checkbox"> Identifikasi Bakteri
                </label>
           <label>
                    <input value="" type="checkbox"> BAKTERI HPI / HPIK
                </label>
                <label>
                    <input value="" type="checkbox"> E.Coli
                </label><br>
                <label>
                    <input value="" type="checkbox"> Salmonelia
                </label><br>
                <label>
                    <input value="" type="checkbox"> TPC
                </label>
               
                
                          </div>    
      </div> 
     <div class="col-md-2">
     <h4></h4>
       <div class="checkbox">
                <label>
                    <input value="" type="checkbox"> Identifikasi Parasit
                </label>
           <label>
                    <input value="" type="checkbox"> Identifikasi Jamur
                </label>
                
                
                          </div>    
      </div> 
      <div class="col-md-2">
     <h4></h4>
       <div class="checkbox">
                <label>
                    <input value="" type="checkbox"> Logam Berat (AAS)
                </label><br>
           <label>
                    <input value="" type="checkbox"> HG
                </label><br>
            <label>
                    <input value="" type="checkbox"> PB
                </label><br>
            <label>
                    <input value="" type="checkbox"> CD
                </label><br>
                
                 <label>
                    <input value="" type="checkbox"> ...
                </label>
                          </div>    
      </div> 
     
     <!-----pengujian sub kontrak---->
     <div class="col-md-5">
         <h4>Untuk pengujian yang di subkontrakan </h4>
         <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="telp" name="telp" placeholder="Nama lab" type="text">
        <span class="fa fa-pencil form-control-feedback"></span>
      </div>
     </div>
        
     <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="telp" name="telp" placeholder="Parameter penyakit" type="text">
        <span class="fa fa-pencil form-control-feedback"></span>
      </div>
     </div>
         <div class="col-xs-6">
       <div class="form-group  has-feedback">
          <input class="form-control"  id="telp" name="telp" placeholder="Kesimpulan" type="text">
        <span class="fa fa-pencil form-control-feedback"></span>
      </div>
     </div>
         
     </div>
    
</div>

</div>
</div>