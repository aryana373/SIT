
  <!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url("assets/AdminLTE-2.3.11/plugins/select2/select2.min.css"); ?>">

<div id="main-content">
 <p class="login-box-msg text-red">
      
        <?php
      
        if ($this->session->flashdata('msg')) {
         ?>
               <div id="alert_login" style="display: none;" class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      
                     Nama Dokter sudah terdaftar!!
                </div> 
               <script type="text/javascript">
                  $("#alert_login").css("display","block");
                    $(window).load(function() { 
                        $("#alert_login").fadeOut(6300); 
                        setTimeout(function(){  <?php unset($_SESSION['msg']); ?> }, 8000);

                    })

                    
                  </script>
             <?php
            }
            ?>      
</p>
               
        

<div  class="col-md-6 col-sm-6 col-xs-12" >

    <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Admin</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
            <div class="form-group">
                <div id="tomboladmin"  class="btn-group pull-right">
                            <button type="button" class="btn btn-success" onclick="admin()" >Tambah Admin</button>   
                </div>

                <div id="admin" style="display: none;">
            

                   <div class="modal-body">
                       <div class="form-group" id="add-admin">
                          <form role="form" method="post" action="" id="form-create-admin" >
                           <div class="form-group">
                                    <label>Username</label>
                                    <input id="username" type="text" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                    <label>Nama Lengkap</label>
                                   <input id="namaAdmin" type="text" class="form-control" >
                                  </div>
                                   <div class="form-group">
                                    <label>Password</label>
                                    <input id="pass" type="text" class="form-control" >
                                  </div>

                          </form>
                        </div>
                   </div>
                         <div class="modal-footer">
                            <div class="btn-group">
                               <button type="button" class="btn btn-primary" data-loading-text="Loading..." id="btn-add-admin">Tambah</button>
                               <button type="button" onclick="cancel()" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                              
                            </div>
                         </div>
         
                </div>


                <br><br>
               <table style="font-size: 13px;" class="table  table-bordered table-striped">
                <thead>
                    <tr style="background:  #551E1E; color: white; text-align: center;">
                        <th style="width: 4%;">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $i=1; ?>
                 <?php foreach ($admin->result() as $row): ?>
                    <tr>
                       <td style="text-align: center;"><?php echo $i; $i++; ?></td>
                        <td><?php echo $row->fullname; ?></td>
                        <td><?php echo $row->username; ?></td>
                        <td>
                              <button onclick="deleteAdmin(<?php echo $row->id_admin; ?>);" class="btn btn-danger btn-flat" type="button" data-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                
            </table>
            </div>
            
           
        </div>


    </div>
</div>

<div  class="col-md-6 col-sm-6 col-xs-12"  >
    <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Dokter</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
            <div class="form-group">
                            <div  id="tomboldokter"  class="btn-group pull-right">
                            <a type="button" class="btn btn-info" onclick="dokter()" >Tambah Dokter</a>   
                            </div>

                    <div id="dokter" style="display: none;">
            

                       <div class="modal-body">
                           <div class="form-group" id="add-dokter">
                               <div class="form-group">
                                <?php echo form_open_multipart('User/create_dokter'); ?>
                                    <b>Nama Lengkap</b><i> ( tanpa titik contoh dr Medika )</i>
                                    <input type="text" name="nama" class="form-control" autocomplete="off" required>
                                    <label>Upload Tanda Tangan</label>
                                    <input type="file" name="ttd" class="form-control" required>
                                    <br><br>
                                    <input  class="btn btn-primary"  type="submit" value="Tambah">
                                     <button type="button" onclick="cancel2()" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                                <?php echo form_close() ?>
                                       <!--  <label>Nama Lengkap</label>
                                       <input id="namaDokter" type="text" class="form-control" >
                                        <label>Upload Tanda Tangan</label>
                                       <input id="ttd" type="file" class="form-control" > -->
                                      </div>

                             
                            </div>
                       </div>
                            <!--  <div class="modal-footer">
                                <div class="btn-group">
                                   <button type="button" class="btn btn-primary" data-loading-text="Loading..." id="btn-add-dokter">Tambah</button>
                                   <button type="button" onclick="cancel2()" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                                  
                                </div>
                             </div>
              -->
                    </div>



                <br><br>
               <table style="font-size: 13px;" class="table  table-bordered table-striped">
                <thead>
                    <tr style="background:  #551E1E; color: white; text-align: center;">
                        <th style="width: 4%;">No</th>
                        <th>Nama</th>
                         <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                 <?php $i=1; ?>
                 <?php foreach ($dokter->result() as $row): ?>
                    <tr>
                       <td style="text-align: center;"><?php echo $i; $i++; ?></td>
                        <td><?php echo $row->nama; ?></td>
                          <td>
                              <button onclick="deleteDokter(<?php echo $row->id_nakes; ?>);" class="btn btn-danger btn-flat" type="button" data-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i></button>
                        </td>
                       
                    </tr>
                <?php endforeach; ?>
                </tbody>
                
            </table>
            </div>
            
           
        </div>


    </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12"  >
    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Perawat</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
            <div class="form-group">
                            <div class="form-group">
                            <div  id="tombolperawat"  class="btn-group pull-right">
                            <a type="button" class="btn btn-primary" onclick="perawat()" >Tambah Perawat</a>   
                            </div>

                    <div id="perawat" style="display: none;">
            

                       <div class="modal-body">
                           <div class="form-group" id="add-perawat">
                              <form role="form" method="post" action="" id="form-create-perawat" >
                               <div class="form-group">
                                        <label>Nama Lengkap</label>
                                       <input id="namaPerawat" type="text" class="form-control" autocomplete="off" required>
                                      </div>

                              </form>
                            </div>
                       </div>
                             <div class="modal-footer">
                                <div class="btn-group">
                                   <button type="button" class="btn btn-primary" data-loading-text="Loading..." id="btn-add-perawat">Tambah</button>
                                   <button type="button" onclick="cancel3()" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                                  
                                </div>
                             </div>
             
                    </div>



                <br><br>
               <table style="font-size: 13px;" class="table  table-bordered table-striped">
                <thead>
                    <tr style="background:  #551E1E; color: white; text-align: center;">
                        <th style="width: 4%;">No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $i=1; ?>
                 <?php foreach ($perawat->result() as $row): ?>
                    <tr>
                       <td style="text-align: center;"><?php echo $i; $i++; ?></td>
                        <td><?php echo $row->nama; ?></td>
                         <td>
                              <button onclick="deletePerawat(<?php echo $row->id_nakes; ?>);" class="btn btn-danger btn-flat" type="button" data-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                
            </table>
            </div>
            
           
        </div>


    </div>
</div>

</div>
<div class="col-md-6 col-sm-6 col-xs-12"  >
    <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">Merk Rapid Tes Antigen</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
            <div class="form-group">
                            <div class="form-group">
                            <div  id="tombolmerk"  class="btn-group pull-right">
                            <a type="button" class="btn btn-danger" onclick="rapidtes()" >Tambah Merk Rapid Tes Antigen</a>   
                            </div>

                        <div id="merk" style="display: none;">
            

                       <div class="modal-body">
                           <div class="form-group" id="edit-merk">
                              <form role="form" method="post" action="" id="form-edit-merk" >
                               <div class="form-group">
                                        <label>Merk Rapid Tes Antigen</label>
                                       <input id="merk" type="text" class="form-control" >
                                      </div>

                              </form>
                            </div>
                       </div>
                             <div class="modal-footer">
                                <div class="btn-group">
                                   <button type="button" class="btn btn-primary" data-loading-text="Loading..." id="btn-edit-merk">Tambah</button>
                                   <button type="button" onclick="cancel4()" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                                  
                                </div>
                             </div>
             
                    </div>



                <br><br>
              <table style="font-size: 13px;" class="table  table-bordered table-striped">
                <thead>
                    <tr style="background:  #551E1E; color: white; text-align: center;">
                      
                        <th>Merk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
            
                 <?php foreach ($merk->result() as $row): ?>
                    <tr>

                        <td><?php echo $row->merk; ?></td>
                        <td>
                              <button onclick="deleteMerk(<?php echo $row->id_merk; ?>);" class="btn btn-danger btn-flat" type="button" data-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i></button>
                        </td>
                        <!-- <input id="id_merk" type="text" class="form-control" style="display: none;" value="<?php echo $row->id_merk; ?>"> -->
                         
                    </tr>
                <?php endforeach; ?>
                </tbody>
                
            </table>
            </div>
            
           
        </div>


    </div>
</div>

</div>
</div>

<!--modal warning menu!-->
<div id="modalWarning" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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



<!-- modal konfirmasi hapus -->
<div id="modalDelete" class="modal " tabindex="-1" role="dialog" >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
         </div>
         <div class="modal-body">
             Apakah anda ingin menghapus Data ini?
         </div> 
         <div class="modal-footer">
            <div class="btn-group">
               <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tidak</button>
               <button style="display: none;" id="btn-delete-admin" type="button" class="btn btn-danger btn-flat">Ya</button>
               <button style="display: none;" id="btn-delete-dokter" type="button" class="btn btn-danger btn-flat">Ya</button>
               <button style="display: none;" id="btn-delete-perawat" type="button" class="btn btn-danger btn-flat">Ya</button>
                <button style="display: none;" id="btn-delete-merk" type="button" class="btn btn-danger btn-flat">Ya</button>
            </div>
         </div>
      </div>
   </div>
</div>


<script type="text/javascript">
    

   

     function admin()
      {
              $("#admin").css('display','block');
              $("#tomboladmin").css('display','none');
      }

       function cancel()
      {
              $("#admin").css('display','none');
              $("#tomboladmin").css('display','block');
      }

        $('#btn-add-admin').click(function(event) {
           
            
            var username = $('#add-admin').find('#username').val();
            var nama = $('#add-admin').find('#namaAdmin').val();
            var pass = $('#add-admin').find('#pass').val();
                

            if (nama==''||username==''||pass=='') {
              $('#modalWarning').modal();
              $('#eror').html('Data belum lengkap !!');

            } else{
            
                $('#preloader').css('display','block');
                //$('#main-content').css('display', 'none');
               $.post(base_url+"User/create_admin/", {username:username, nama: nama, pass: pass }, function(data) {
                $('#form-create-admin').trigger("reset");
                $('#preloader').css('display','none');
                $('#main-content').html(data);
                //dataTable();
                //console.log(data);
            }); 
            }

        });

    function deleteAdmin(id) {
      $('#btn-delete-dokter').css('display','none');
      $('#btn-delete-perawat').css('display','none');      
      $('#btn-delete-admin').css('display','block');
      $('#modalDelete').modal();
      $('#btn-delete-admin').click(function(event) {
        $('#modalDelete').modal('hide');
        $('#preloader').css('display','block');
        //$('#list-table').html('');
        $.get(base_url+"User/hapus_admin/"+id, function(data) {
          $('#preloader').css('display','none');
          // dataTable();
          //$('#modalSukses').modal();
          $('#main-content').html(data);
          
        });
      });

    }
           
    

       function dokter()
      {
              $("#dokter").css('display','block');
              $("#tomboldokter").css('display','none');
      }

       function cancel2()
      {
              $("#dokter").css('display','none');
              $("#tomboldokter").css('display','block');
      }

        // $('#btn-add-dokter').click(function(event) {
           
        //     var nama = $('#add-dokter').find('#namaDokter').val();
        //     var profesi = 'dokter';


        //     if (nama=='') {
        //       $('#modalWarning').modal();
        //       $('#eror').html('Nama Dokter Kosong !!');

        //     } else{
        //        $('#preloader').css('display','block');
        //         //$('#main-content').css('display', 'none');
        //        $.post(base_url+"User/create_nakes/", { nama: nama, profesi: profesi }, function(data) {
        //         $('#form-create-dokter').trigger("reset");
        //         $('#preloader').css('display','none');
        //         $('#main-content').html(data);
        //         //dataTable();
        //         //console.log(data);
        //     }); 


        //     }
        
             
            
        // });

       function deleteDokter(id) {
        $('#btn-delete-admin').css('display','none');
        $('#btn-delete-perawat').css('display','none');   
        $('#btn-delete-dokter').css('display','block');
        $('#modalDelete').modal();
        $('#btn-delete-dokter').click(function(event) {
          $('#modalDelete').modal('hide');
          $('#preloader').css('display','block');
          //$('#list-table').html('');
          $.get(base_url+"User/hapus_nakes/"+id, function(data) {
            $('#preloader').css('display','none');
            // dataTable();
            //$('#modalSukses').modal();
            $('#main-content').html(data);
            
          });
        });

      }



      function perawat()
      {
              $("#perawat").css('display','block');
              $("#tombolperawat").css('display','none');
      }

       function cancel3()
      {
              $("#perawat").css('display','none');
              $("#tombolperawat").css('display','block');
      }

        $('#btn-add-perawat').click(function(event) {
           
            var nama = $('#add-perawat').find('#namaPerawat').val();
            var profesi = 'perawat';
        
             if (nama=='') {
              $('#modalWarning').modal();
              $('#eror').html('Nama Perawat Kosong !!');

            } else{
                $('#preloader').css('display','block');
                //$('#main-content').css('display', 'none');
               $.post(base_url+"User/create_nakes/", { nama: nama, profesi: profesi }, function(data) {
                $('#form-create-dokter').trigger("reset");
                $('#preloader').css('display','none');
                $('#main-content').html(data);
                //dataTable();
                //console.log(data);
            }); 
            }

           
            
        });

         function deletePerawat(id) {
        $('#btn-delete-dokter').css('display','none');
        $('#btn-delete-admin').css('display','none');   
        $('#btn-delete-perawat').css('display','block');
        $('#modalDelete').modal();
        $('#btn-delete-perawat').click(function(event) {
          $('#modalDelete').modal('hide');
          $('#preloader').css('display','block');
          //$('#list-table').html('');
          $.get(base_url+"User/hapus_nakes/"+id, function(data) {
            $('#main-content').html(data);
            $('#preloader').css('display','none');
            // dataTable();
            //$('#modalSukses').modal();
            

            
          });
        });

      }

       function rapidtes()
      {
              $("#merk").css('display','block');
              $("#tombolmerk").css('display','none');
      }

       function cancel4()
      {
              $("#merk").css('display','none');
              $("#tombolmerk").css('display','block');
      }

        $('#btn-edit-merk').click(function(event) {
           
            var merk = $('#edit-merk').find('#merk').val();
            //var id_merk = $('#id_merk').val();
            
        
             if (merk=='') {
              $('#modalWarning').modal();
              $('#eror').html('Data Kosong !!');

            } else{
                $('#preloader').css('display','block');
                //$('#main-content').css('display', 'none');
               $.post(base_url+"User/edit_merk/", { merk: merk}, function(data) {
                $('#form-edit-merk').trigger("reset");
                $('#preloader').css('display','none');
                $('#main-content').html(data);
                //dataTable();
                //console.log(data);
            }); 
            }
        });

        function deleteMerk(id) {
            $('#btn-delete-admin').css('display','none');
            $('#btn-delete-perawat').css('display','none');   
            $('#btn-delete-dokter').css('display','none');
            $('#btn-delete-merk').css('display','block');
            $('#modalDelete').modal();
            $('#btn-delete-merk').click(function(event) {
              $('#modalDelete').modal('hide');
              $('#preloader').css('display','block');
              //$('#list-table').html('');
              $.get(base_url+"User/hapus_merk/"+id, function(data) {
                $('#preloader').css('display','none');
                // dataTable();
                //$('#modalSukses').modal();
                $('#main-content').html(data);
                
              });
            });

        }
            
</script>