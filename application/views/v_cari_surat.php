 <div class="box-body table-responsive">
    
            <table style="font-size: 13px;" class="table table1 table-bordered table-striped">
                <thead>
                    <tr style="background:  #551E1E; color: white; text-align: center;">
                        <th style="width: 4%;">No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Nama Pemeriksaan</th>
                        <th>Tanggal</th>
                        <th>Hasil</th>
                        <th style="width: 170px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $i=1; ?>
                 <?php foreach ($surat->result() as $row): ?>
                    <tr>
                       <td style="text-align: center;"><?php echo $i; $i++; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->NIK; ?></td>
                        <td><?php echo $row->namapemeriksaan; ?></td>
                        <td><?php echo $row->tanggal; ?></td>
                        <td><?php echo  $row->hasil; ?></td>
                        <td style=" width: 100px;text-align: center;">
                            <div class="btn-group">
                                <button onclick="detail(<?php echo $row->id_pasien; ?>);" class="btn btn-primary btn-flat" type="button" data-toggle="tooltip" title="Detail"><i class="fa fa-search"></i></button>
                                 <a class="btn btn-warning btn-flat"  target="_blank"  href="<?php echo base_url().'Surat/tambahSurat/'.$row->id_pasien; ?>" type="button" class="btn"  title="Tambah Surat" ><i class="fa fa-plus"></i></a>     
                                 <a style="background:black; color:white;" target="_blank"  href="<?php echo base_url().'Surat/LihatSurat/'.$row->id_pasien; ?>" type="button" class="btn"  title="Cetak" ><i class="fa fa-print"></i></a>     
                                <button onclick="editSurat(<?php echo $row->id_pasien; ?>);" class="btn btn-success btn-flat" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button>
                                <button onclick="deleteSurat(<?php echo $row->id_pasien; ?>);" class="btn btn-danger btn-flat" type="button" data-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                
            </table>
        </div>