<!-- Content Header (Page header) -->
<section class="content-header">
    <h1></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Preloader -->
    <div id="preloader" style="display: none;">
        <div class="box" style="height: 80px;">
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>

    <div id="main-content" class="row">
      
      <div id="editor-wrapper" class="col-xs-12" >
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tambah Data Pasien</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="add-pasien">
            <div class="form-group">
                <?php foreach ($detailpasien->result() as $row): ?>
               <form role="form" method="post" action="" id="form-create-pasien">
                <div class="col-xs-6">
                      <?php 
                        $b= date('m');
                        $y= date('Y');
                        $nosurat = $b.'.'.$y; 
                        ?>

                         <input name="nosurat" id="nosurat" type="text" value="<?php echo $no_surat_tanpa_nol; ?>" hidden>
                        <div class="form-group">
                          <label>Nama</label>
                          <input name="nama" id="nama" type="text" class="form-control" value="<?php echo $row->nama; ?>"  readonly>
                        </div>
                        <div class="form-group">
                          <label>Nomor Hasil</label>
                          <input name="nohasil" id="nohasil" type="text" class="form-control"  value="BHM/LAB.I/<?php echo $nosurat; ?>/<?php echo $no_surat; ?>" placeholder="Enter ...">
                        </div>
                         <div class="form-group">
                          <label>Nomor Induk Kependudukan</label>
                          <input name="NIK" id="NIK" type="text" class="form-control" value="<?php echo $row->NIK; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <input name="JK" id="JK" type="text" class="form-control" value="<?php echo $row->JK; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input name="tgllahir" id="tgllahir" type="text" class="form-control" value="<?php echo $row->tgllahir; ?>" readonly>
                        </div>  
                         <div class="form-group">
                          <label>Alamat</label>
                          <input name="alamat" id="alamat" type="text" class="form-control"  value="<?php echo $row->alamat; ?>" readonly>
                        </div>                      
                       
                </div>
                <div class="col-xs-6">

                        <!--  <div class="form-group">
                          <label>Nama Pemeriksaan</label>
                          <select name="namapemeriksaan" id="namapemeriksaan" class="form-control " >
                              <option value="" ></option>
                               <option value="Rapid Test Antigen" >Rapid Test Antigen</option>
                              <option value="Rapid Test Antibodi" >Rapid Test Antibodi </option>
                              <option value="PCR Test" >PCR Test</option>
                          </select>  
                        </div> -->
                        <div class="form-group">
                          <label>Hasil</label>
                          <select name="hasil" id="hasil" class="form-control " >
                              <option value="" ></option>
                              <option value="Positif" >Positif</option>
                              <option value="Negatif" >Negatif</option>
                             
                          </select>  
                        </div>
                       <!--  <div class="form-group">
                          <label>Rujukan</label>
                          <select name="rujukan" id="rujukan" class="form-control " >
                              <option value="" ></option>
                              <option value="Positif" >Positif</option>
                              <option value="Negatif" >Negatif</option>
                             
                          </select>  
                        </div> -->
                         <div class="form-group">
                          <label>Admin</label>
                          <input name="admin" id="admin" type="text" class="form-control" value="<?php echo $currUser; ?>"  readonly>
                        </div>    
                        <div class="form-group">
                          <label>Perawat</label>
                          <select name="perawat" id="perawat" class="form-control " >
                              <option value="" ></option>

                             
                          </select>  
                        </div>
                        <div class="form-group">
                          <label>Dokter</label>
                          <select name="dokter" id="dokter" class="form-control " >
                              <option value="" ></option>

                             
                          </select>  
                        </div>


                      
                        <div class="btn-group pull-right">
                          <a class="btn btn-default btn-flat" href="javascript:close_window();">Batal</a>
                      
                            <button type="button" class="btn btn-primary" data-loading-text="Loading..." id="btn-add-pasien">Tambah</button>                  
                        </div>
                </div>
                
              </form>
               <?php endforeach; ?>
            </div>
            
           
        </div>


   </div>
 </div>

<!--modal warning menu!-->
<div id="modalWarning-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Gagal Menambahkan Data</h4>
         </div>
         <div id="eror" class="modal-body">
            
         </div>
         <div class="modal-footer">
          <div class="btn-group">
            <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">tutup</button>
          </div>
        </div>
      </div>
   </div>
</div>




    </div><!-- .row -->

</section><!-- /.content-->

<!-- Modals -->

<div id="modal-preloader" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box" style="height: 80px; box-shadow: none; border-width: 0px;">
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

  //$('#modalWarning-user').appendTo('body');



  //$('#btn-add-pasien').one('click',function(event) 
   $('#btn-add-pasien').click(function(event) {
           
            
            var nama = $('#add-pasien').find('#nama').val();
            var nohasil = $('#add-pasien').find('#nohasil').val();
            var NIK = $('#add-pasien').find('#NIK').val();
            var JK = $('#add-pasien').find('#JK ').val();
            var tgllahir = $('#add-pasien').find('#tgllahir').val();
            var alamat = $('#add-pasien').find('#alamat').val();
            var namapemeriksaan = 'Rapid Test Antigen';
            var hasil = $('#add-pasien').find('#hasil').val();
            var rujukan = 'Negatif';
            var admin = $('#add-pasien').find('#admin').val();
            var dokter = $('#add-pasien').find('#dokter').val();
            var perawat = $('#add-pasien').find('#perawat').val();
            var nosurat = $('#add-pasien').find('#nosurat').val();
            
            // if (NIK.length != 16){
            //   $("#eror").html('NIK harus berjumlah 16 angka!!!');
            //   $('#modalWarning-user').modal();
            // }
            // else 
            
            
            if (nama==''|| NIK==''|| JK==''|| tgllahir==''|| alamat==''|| namapemeriksaan==''|| hasil==''|| rujukan==''|| dokter==''|| perawat=='') {
                $("#eror").html('Data belum lengkap !!!');
               $('#modalWarning-user').modal();
            } 

             else {

                $('#preloader').css('display','block');
                $('#editor-wrapper').css('display', 'none');
               $.post(base_url+"Surat/create/", {nama: nama, nohasil: nohasil, NIK: NIK,JK:JK, tgllahir: tgllahir, alamat: alamat, namapemeriksaan: namapemeriksaan, hasil: hasil, rujukan: rujukan, admin: admin, dokter: dokter, perawat:perawat, nosurat:nosurat }, function(data) {
                $('#form-create-pasien').trigger("reset");
                $('#preloader').css('display','none');
                $('#main-content').html(data);
                //dataTable();
                //console.log(data);
            }); 
            }



           
            
        });



     //dropdown dokter
  $.ajax({
         url:"<?php echo base_url();?>Dokter/select_dokter",
         success: function(response){
         $("#dokter").html(response);
         
         },
         dataType:"html"
       });

  //dropdown perawat
  $.ajax({
         url:"<?php echo base_url();?>Dokter/select_perawat",
         success: function(response){
         $("#perawat").html(response);
         
         },
         dataType:"html"
       });

  function close_window() {
        close();
      }

// function close_window() {
//   if (confirm("Close Window?")) {
    
//   }

</script>
