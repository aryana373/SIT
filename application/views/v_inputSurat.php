


<div id="editor-wrapper" class="col-xs-12" >
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tambah Data Pasien</h3>
          
        </div>

          


        <!-- /.box-header -->
        <div class="box-body" id="add-pasien">
            <div class="form-group">

                <div id="tomboljenis" style="text-align:center;">
                         <div class="form-group">
                          <label>Jenis Layanan</label><i style="color:red"> ( klik salah satu )</i> <br> 
                          <button type="button" class="btn btn-danger" data-loading-text="Loading..." id="oncall">On Call</button>      
                          <button type="button" class="btn btn-success" data-loading-text="Loading..." id="walkin">Walk-In Clinic</button>
                          </div>
                        </div>
                <div id="tampilanform" style="display:none;">

               <form role="form" method="post" action="" id="form-create-pasien">
                <div class="col-xs-6">
                        <?php 
                      

                        $b= date('m');
                        $y= date('Y');
                        $nosurat = 'BHM/LAB.I/OC/'.$b.'.'.$y.'/'.$no_surat; 
                        $nosurat1 = 'BHM/LAB.I/'.$b.'.'.$y.'/'.$no_surat; 
                        ?>

                        <input name="nosurat" id="nosurat" type="text" value="<?php echo $no_surat_tanpa_nol; ?>" hidden>
                         <!--  <input type="text" value="<?php echo $nosurat; ?>" >
 -->
                        <div class="form-group">
                          <label>Nama</label>
                          <input name="nama" id="nama" type="text" class="form-control"   placeholder="Enter ..." autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>Kewarganegaraan</label>
                          <input name="kwn" id="kwn" type="text" class="form-control"   placeholder="Enter ..." autocomplete="off">
                        </div>
                        
                        <div id="1" class="form-group">
                          <label>Nomor Hasil</label> <i style="color:red"> ( cek nomor hasil sebelum disimpan )</i> 
                          <input name="nohasil" id="nohasil" type="text" class="form-control"   value="<?php echo $nosurat; ?>" >
                        </div>
                        <div id="12" class="form-group">
                          <label>Nomor Hasil</label> <i style="color:red"> ( cek nomor hasil sebelum disimpan )</i> 
                          <input name="nohasil2" id="nohasil2" type="text" class="form-control"  value="<?php echo $nosurat1; ?>">
                        </div>
                        <div id="2" class="form-group">
                          <label>Tanggal Tes</label>
                          <input name="tgltes" id="tgltes" type="date" class="form-control"  placeholder="Enter ...">
                        </div>
                        <div id="3" class="form-group">

                          <label>Jam Tes</label><i style="color:red"> ( tanpa WITA contoh 14:30 )</i> 
                          <input name="jam" id="jam" type="text" class="form-control"  placeholder="Enter ...">
                        </div>

                         <div class="form-group">
                          <label>Nomor Induk Kependudukan</label>
                          <input name="NIK" id="NIK" type="text" class="form-control"  placeholder="Enter ..." autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <select name="JK" id="JK" class="form-control " >
                               <option value="" ></option>
                               <option value="Laki-Laki" >Laki-Laki</option>
                              <option value="Perempuan" >Perempuan</option>
                          </select>  
                        </div>
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input name="tgllahir" id="tgllahir" type="text" class="form-control"  placeholder="Enter ..." autocomplete="off">
                        </div>  
                         <div class="form-group">
                          <label>Alamat</label>
                          <input name="alamat" id="alamat" type="text" class="form-control"  placeholder="Enter ... " autocomplete="off">
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
                        
                         <div class="form-group">
                          <label>Merk Rapid</label>
                          <select name="merk" id="merk" class="form-control " >
                              <option value="" ></option>

                             
                          </select>  
                        </div>


                      
                        <div class="btn-group pull-right">
                            <button id="btn-cancel" class="btn btn-default btn-flat">Batal</button>
                            <button type="button" class="btn btn-primary" data-loading-text="Loading..." id="btn-add-pasien">Tambah</button>                  
                        </div>
                </div>
                
              </form>
              </div>
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

<script type="text/javascript">




    

  //$('#modalWarning-user').appendTo('body');



  //$('#btn-add-pasien').one('click',function(event) 
   $('#btn-add-pasien').click(function(event) {
           
            
            var nama = $('#add-pasien').find('#nama').val();
            var kwn = $('#add-pasien').find('#kwn').val();

            var nohasil = $('#add-pasien').find('#nohasil').val();
            if (nohasil=='') {
               var nohasilx=$('#add-pasien').find('#nohasil2').val();
            } else {
               var nohasilx= $('#add-pasien').find('#nohasil').val();
            }

            
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

            var tgltes = $('#add-pasien').find('#tgltes').val();
            var jam = $('#add-pasien').find('#jam').val();
             var merk = $('#add-pasien').find('#merk').val();
            
            // if (NIK.length != 16){
            //   $("#eror").html('NIK harus berjumlah 16 angka!!!');
            //    $('#modalWarning-user').modal();
            // }
            // else

             if (nama==''|| kwn==''|| NIK==''|| JK==''|| tgllahir==''|| alamat==''|| namapemeriksaan==''|| hasil==''|| rujukan==''|| dokter==''|| perawat=='') {
                $("#eror").html('Data belum lengkap !!!');
               $('#modalWarning-user').modal();
            } 

             else {

                $('#preloader').css('display','block');
                $('#editor-wrapper').css('display', 'none');
               $.post(base_url+"Surat/create/", {nama: nama, kwn:kwn, nohasilx: nohasilx, NIK: NIK,JK:JK, tgllahir: tgllahir, alamat: alamat, namapemeriksaan: namapemeriksaan, hasil: hasil, rujukan: rujukan, admin: admin, dokter: dokter, perawat:perawat, nosurat:nosurat, tgltes:tgltes, jam:jam, merk:merk }, function(data) {
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
    
     //dropdown merk
  $.ajax({
         url:"<?php echo base_url();?>Dokter/select_merk",
         success: function(response){
         $("#merk").html(response);
         
         },
         dataType:"html"
       });



  $('#oncall').click(function(event) {
        $('#tampilanform').css('display','block');

         // var nohasiotomatis = 'BHM/LAB.I/OC/'+<?php echo $no_surat; ?>;
         //     $('#nohasil').val(nohasiotomatis);
             $('#nohasil2').val('');
             $('#12').css('display','none');
             $('#tomboljenis').css('display','none');

      });
  $('#walkin').click(function(event) {
        $('#tampilanform').css('display','block');

       // var nohasiotomatis = 'BHM/LAB.I/'+<?php echo $nosurat; ?>+'/'+<?php echo $no_surat; ?>;
        // $('#nohasil').val(nohasiotomatis);
        $('#nohasil').val('');
        $('#2').css('display','none');
        $('#1').css('display','none');
        $('#3').css('display','none');
        $('#tomboljenis').css('display','none');


      });





   

</script>

