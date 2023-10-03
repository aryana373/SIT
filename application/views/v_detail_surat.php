<?php
      foreach ($pasien_last->result() as $option): ?>
                    

 <div id="editor-wrapper" class="col-xs-12" >
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Detail Pasien</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="add-pasien">
            <div class="form-group">
               <form role="form" method="post" action="" id="form-create-pasien">
                <div class="col-xs-12">

                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" class="form-control" value="<?php echo $option->nama; ?>"  readonly>
                        </div>
                        <div class="form-group">
                          <label>Nomor Hasil</label>
                         <input type="text" class="form-control" value="<?php echo $option->nohasil; ?>"  readonly>
                        </div>
                         <div class="form-group">
                          <label>Nomor Induk Kependudukan</label>
                          <input type="text" class="form-control" value="<?php echo $option->NIK; ?>"  readonly>
                        </div>
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <input type="text" class="form-control" value="<?php echo $option->JK; ?>"  readonly>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="text" class="form-control" value="<?php echo $option->tgllahir; ?>"  readonly>
                        </div>  
                         <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" class="form-control" value="<?php echo $option->alamat; ?>"  readonly>
                        </div>                      
                       
               
                         <div class="form-group">
                          <label>Nama Pemeriksaan</label>
                         <input type="text" class="form-control" value="<?php echo $option->namapemeriksaan; ?>"  readonly>
                        </div>
                        <div class="form-group">
                          <label>Hasil</label>
                         <input type="text" class="form-control" value="<?php echo $option->hasil; ?>"  readonly>
                        </div>
                        <div class="form-group">
                          <label>Rujukan</label>
                         <input type="text" class="form-control" value="<?php echo $option->rujukan; ?>"  readonly>
                        </div>

                      
                        <div class="btn-group pull-right">
                            <button id="btn-cancel" class="btn btn-default btn-flat">Batal</button>  
                               <a target="_blank"  href="<?php echo base_url().'Surat/LihatSurat/'.$option->id_pasien; ?>" type="button" class="btn btn-warning" data-loading-text="Loading..." >Cetak</a>               
                        </div>
              
                 </div>
               
              </form>
            </div>
            
           
        </div>


    </div>
</div>
 <?php endforeach; ?>