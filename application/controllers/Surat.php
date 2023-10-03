<?php
class Surat extends CI_Controller {
 
    public function __construct()
        {
            parent::__construct();
            $this->load->library('pdf');
            $this->load->model('M_pasien');
             $this->load->model('M_dokter');
            

            
            if (!$this->session->userdata('isLoggedIn')){
          $this->load->view('v_redirect_login');
          return;
        }
        }
    public function index()
        {
         $data['currUser']=$this->session->userdata('fullname');
         

         $curr_nosurat=  $this->M_pasien->current_nosurat()->row();
         $bulan= date('m');
         $cur_bulan =$curr_nosurat->cur_bulan;

         if ($cur_bulan==$bulan) {
           
           $nosurat= $curr_nosurat->cur_nosurat+1;

           $jumlah_nol = strlen($nosurat);
           $angka_nol = 4 - $jumlah_nol;
           $nol = "";

           for($i=1;$i<=$angka_nol;$i++)
           {
              $nol .= '0';
           }

           $data['no_surat']= $nol.$nosurat;
           $data['no_surat_tanpa_nol']= $nosurat;
         } else {

           $this->M_pasien->update_bulan($bulan);
           $curr_nosurat2=  $this->M_pasien->current_nosurat()->row();

           $nosurat= $curr_nosurat2->cur_nosurat+1;

           $jumlah_nol = strlen($nosurat);
           $angka_nol = 4 - $jumlah_nol;
           $nol = "";

           for($i=1;$i<=$angka_nol;$i++)
           {
              $nol .= '0';
           }

           $data['no_surat']= $nol.$nosurat;
           $data['no_surat_tanpa_nol']= $nosurat;

         }



        

        $this->load->view('v_inputSurat',$data);
        }

    public function cari()
        {
            $data['currUser']=$this->session->userdata('fullname');
            $this->load->view('v_carisurat',$data);

        }

    public function carisurat()
        {
          $cariberdasarkan = $this->input->post('cariberdasarkan');
          $datainput = $this->input->post('data');
          $data['currUser']=$this->session->userdata('fullname');

           $data['surat']=$this->M_pasien->select_berdasarkan($cariberdasarkan,$datainput);
            $this->load->view('v_cari_surat',$data);

        }

    public function hapus($id)
        {
            $this->db->where('id_pasien', $id);
            $this->db->delete('pasien');
            $this->cari();
        }

    public function detail_pasien($id)
        {
            $detail=$this->M_pasien->select($id)->row();
            echo json_encode($detail);

        } 
    public function tambahSurat($id_pasien){

      $detail['detailpasien'] =  $this->M_pasien->select($id_pasien);
       $data['currUser']=$this->session->userdata('fullname');

       $curr_nosurat=  $this->M_pasien->current_nosurat()->row();
         $bulan= date('m');
         $cur_bulan =$curr_nosurat->cur_bulan;

         if ($cur_bulan==$bulan) {
           
           $nosurat= $curr_nosurat->cur_nosurat+1;

           $jumlah_nol = strlen($nosurat);
           $angka_nol = 4 - $jumlah_nol;
           $nol = "";

           for($i=1;$i<=$angka_nol;$i++)
           {
              $nol .= '0';
           }

           $data['no_surat']= $nol.$nosurat;
           $data['no_surat_tanpa_nol']= $nosurat;
         } else {

           $this->M_pasien->update_bulan($bulan);
           $curr_nosurat2=  $this->M_pasien->current_nosurat()->row();

           $nosurat= $curr_nosurat2->cur_nosurat+1;

           $jumlah_nol = strlen($nosurat);
           $angka_nol = 4 - $jumlah_nol;
           $nol = "";

           for($i=1;$i<=$angka_nol;$i++)
           {
              $nol .= '0';
           }

           $data['no_surat']= $nol.$nosurat;
           $data['no_surat_tanpa_nol']= $nosurat;

         }

          $this->load->view('v_metadata');
          $this->load->view('v_header');
          $this->load->view('v_sidebar',$data);
          $this->load->view('v_tambahSurat',$detail);
          $this->load->view('v_footer');

    }

    public function update(){
          $id_pasien = $this->input->post('id');
          $nama = $this->input->post('nama');
          $kwn = $this->input->post('kwn');
          $nohasil = $this->input->post('nohasil');
          $NIK = $this->input->post('NIK');
          $JK = $this->input->post('JK');
          $tgllahir = $this->input->post('tgllahir');
          $alamat = $this->input->post('alamat');
          $namapemeriksaan = $this->input->post('namapemeriksaan');
          $hasil = $this->input->post('hasil');
          $rujukan = $this->input->post('rujukan');
          $admin = $this->input->post('admin');
          $dokter = $this->input->post('dokter');
          $perawat = $this->input->post('perawat');

          $this->M_pasien->update($id_pasien,$nama,$kwn, $nohasil, $NIK, $JK, $tgllahir, $alamat,$namapemeriksaan,$hasil, $rujukan, $admin, $dokter, $perawat);
           $this->cari();
    }

    public function create()
        {
          $nama = $this->input->post('nama');
          $kwn = $this->input->post('kwn');
          $nohasil = $this->input->post('nohasilx');
          $NIK = $this->input->post('NIK');
          $JK = $this->input->post('JK');
          $tgllahir = $this->input->post('tgllahir');
          $alamat = $this->input->post('alamat');
          $namapemeriksaan = $this->input->post('namapemeriksaan');
          $hasil = $this->input->post('hasil');
          $rujukan = $this->input->post('rujukan');
          $admin = $this->input->post('admin');
          $dokter = $this->input->post('dokter');
          $perawat = $this->input->post('perawat');
          
        //   $merk =  $this->M_dokter->merk_select()->row();
        //   $merk_rapid= $merk->merk;
          $merk_rapid = $this->input->post('merk');
          $nosurat=$this->input->post('nosurat');
          

          $tgltes= $this->input->post('tgltes');
          $jamtes= $this->input->post('jam');

          $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );

          if ($jamtes=='') {
            $tanggal= date('Y-m-d');
            //$tanggal= $date->format('Y-m-d');
            
            // $jam=$date->format('G:i');
            $jam= date('G:i');
          } else {
            $tanggal = $tgltes;
            $jam= $jamtes;
          }
          

          $this->load->library('ciqrcode'); //pemanggilan library QR CODE
     
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/qr/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            

            $file= str_replace(' ', '', $nama).rand(1,1000);
            $qr_name=$file.'.jpg'; //buat name dari qr code sesuai dengan nim
            

            $params['data'] = 'https://cek.behealthmedika.com/index.php?qr='.$file; //data yang akan di jadikan QR CODE
            $params['level'] = 'M'; //H=High
            $params['size'] = 4;
            $params['savename'] = FCPATH.$config['imagedir'].$qr_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
     
            // $this->mahasiswa_model->simpan_mahasiswa($nim,$nama,$prodi,$image_name); //simpan ke database
            // redirect('mahasiswa'); //redirect ke mahasiswa usai simpan data
          
          $this->M_pasien->create($nama,$kwn, $nohasil, $NIK,$JK, $tgllahir, $alamat, $namapemeriksaan, $hasil, $rujukan, $tanggal, $jam, $file, $admin, $dokter,$perawat,$merk_rapid);



          $this->M_pasien->update_nosurat($nosurat);
          
          $this->detail();
          }

    public function detail()
        {
          $data['pasien_last']=$this->M_pasien->select_last();
          $this->load->view('v_detail_surat',$data);
          

        }

    public function tgl_indo($tgl)
      {
        $tanggal = substr($tgl,8,2);
        $bulan = $this->getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;     
      } 

    public function getBulan($bln){
        switch ($bln){
          case 1: 
            return "Januari";
            break;
          case 2:
            return "Februari";
            break;
          case 3:
            return "Maret";
            break;
          case 4:
            return "April";
            break;
          case 5:
            return "Mei";
            break;
          case 6:
            return "Juni";
            break;
          case 7:
            return "Juli";
            break;
          case 8:
            return "Agustus";
            break;
          case 9:
            return "September";
            break;
          case 10:
            return "Oktober";
            break;
          case 11:
            return "November";
            break;
          case 12:
            return "Desember";
            break;
        }
      }

      public function tgl_eng($tgl)
      {
        $tanggal = substr($tgl,8,2);
        $bulan = $this->getBulan_eng(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;     
      } 

    public function getBulan_eng($bln){
        switch ($bln){
          case 1: 
            return "January";
            break;
          case 2:
            return "February";
            break;
          case 3:
            return "March";
            break;
          case 4:
            return "April";
            break;
          case 5:
            return "May";
            break;
          case 6:
            return "June";
            break;
          case 7:
            return "July";
            break;
          case 8:
            return "August";
            break;
          case 9:
            return "September";
            break;
          case 10:
            return "October";
            break;
          case 11:
            return "November";
            break;
          case 12:
            return "December";
            break;
        }
      }


    public function LihatSurat($id_pasien)
      {

        $detailpasien =  $this->M_pasien->select($id_pasien)->row();

        $nohasil=$detailpasien->nohasil;
        $nama=$detailpasien->nama;
        $kwn=$detailpasien->kwn;
        $NIK=$detailpasien->NIK;
        $alamat=$detailpasien->alamat;
        // $JK= $detailpasien->JK;
        //$TanggalLahir=$this->tgl_indo($detailpasien->tgllahir);
        $TanggalLahir=$detailpasien->tgllahir;
        $date=$this->tgl_eng($detailpasien->tanggal);
        $tanggal=$this->tgl_indo($detailpasien->tanggal);
        $jam=$detailpasien->jam;
        $dokter= $detailpasien->dokter;


        if ($dokter=='dr. I Wayan Agus Ardika') {
          $namadokter=$dokter.'<br>SIP: 570/SIPD/0066/II/DPMPTSP/2021';
        } 
        elseif ($dokter=='dr. Vicky Kusuma Harmanie') {
           $namadokter=$dokter.'<br>SIP: 570/SIPD/0127/V/DPMPTSP/2021';
        }

          else{
          $namadokter=$dokter.'<br>a.n. dr. I Wayan Agus Ardika<br>SIP: 570/SIPD/0066/II/DPMPTSP/2021';
        }


        $merk_rapid= $detailpasien->merk_rapid;

        $ttd =  $this->M_dokter->ttd($dokter)->row();
        $ttd_dokter=$ttd->ttd;


       

        $namapemeriksaan=$detailpasien->namapemeriksaan;
        if ($detailpasien->hasil=='Positif') {
          $hasil= 'Positif';
          $hasil2= 'Positive';
        } else {
          $hasil= 'Negatif';
          $hasil2='Negative';
        }
        if ($detailpasien->rujukan=='Positif') {
          $rujukan= 'Positif';
          $rujukan2= 'Positive';
        } else {
          $rujukan= 'Negatif';
          $rujukan2= 'Negative';
        }

        if ($detailpasien->JK=='Laki-Laki') {
          $JK='Laki-Laki/Male';
        } else {
          $JK='Perempuan/Female';
        }
        


          $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $pdf->setPrintFooter(false);
          $pdf->setPrintHeader(false);
          $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
          $pdf->AddPage('');
         // $pdf->Write(0, 'Simpan ke PDF - Jaranguda.com', '', 0, 'L', true, 0, false, false, 0);
          $pdf->SetFont('');
          // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
          // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->SetMargins(10,  0, 12);
          $pdf->SetAutoPageBreak(TRUE, 0);


          $tabel = '
          
          
          
          <img style="width: 538px" src="'.base_url("assets/images/Capture.JPG").'" />
         
          
          <table border="0" >
                <tr>
                      <th style= "  width: 35%;" > </th>
                      <th style= "width: 65%;"></th>
                </tr>

               
          </table>

          <table style= "font-size:9; height: 32px; width: 100%;"  border="0.5" >
                <tr>
                      <th style= "height: 31px;width: 19%;" > <b>Izin Pengoperasian</b><br><i>Operating Permit</i></th>
                      <th style= "width: 22%;"><b>SR.03.04/1/1077/2021 <br>Tanggal 27 April 2021</b></th>
                      <th style= "width: 26%;"><b>No.registrasi</b><br><i>Registration Number</i></th>
                       <th style= "width: 33%;"><b><br>'.$nohasil.'</b></th>
                </tr>
   
                <tr style="height: 30px; ; font-size:10;">
                      <td style= "height: 30px;" ><b>Jenis Spesimen</b><br><i>Type of Specimen</i></td>
                      <td><b>Nasofaring</b><br><i>Nasopharyngeal</i></td>
                      <td><b>Tanggal dan Waktu<br>Tes Antigen</b><br><i>Antigen Test Date and Time</i></td>
                      <td><b>'.$tanggal.' ('.$jam.' WITA)</b><br><i>'.$date.' ('.$jam.' WITA)</i></td>
                </tr>
          </table>

          <table border="0" >
                <tr>
                      <th style= "  width: 35%;" > </th>
                      <th style= "width: 65%;"></th>
                </tr>

               
          </table>

          <table style="text-align: center; font-size:9  "><tr>

            <th> 
              RINCIAN INFORMASI LABORATORIUM / <i>LABORATORY INFORMATION</i> 
              <br> Keterangan ini adalah untuk menjelaskan hasil test Antigen dari:
              <br> <i>This is to report the Antigen Test of this following person:</i></th></tr></table>
         
          <table border="0" >
                <tr>
                      <th style= "  width: 35%;" > </th>
                      <th style= "width: 65%;"></th>
                </tr>

               
          </table>

          <table style= "height: 30px; font-size:10 "  border="0.2" >
                <tr>
                      <th style= "height: 18px;  width: 33.3%;" > Nama / <i>Name</i> </th>
                      <th style= "width: 66.7%;">'.$nama.'</th>
                </tr>
   
                <tr>
                      <td style= "height: 18px;" > Jenis Kelamin / <i>Gender</i> </td>
                      <td>'.$JK.'</td>
                </tr>
              
                <tr>
                      <td style= "height: 18px;" > Kewarganegaraan / <i>Nationality</i> </td>
                      <td>'.$kwn.'</td>
                </tr>
                <tr>
                      <td style= "height: 18px;" > Nomor KTP / <i>Passport Number</i>  </td>
                      <td>'.$NIK.'</td>
                </tr>
                <tr>
                      <td style= "height: 18px;" > Tanggal Lahir / <i>Date of Birth</i></td>
                      <td>'.$TanggalLahir.'</td>
                </tr>
                <tr>
                      <td style= "height: 27px;" > Alamat / Address </td>
                      <td>'.$alamat.'</td>
                </tr>
              
                
          </table>
           <table border="0" >
                <tr>
                      <th style= "  width: 35%;" > </th>
                      <th style= "width: 65%;"></th>
                </tr>

               
          </table>

           <table style= "font-size:10; height: 30px; "  border="0.5" >
                <tr style="text-align: center; ">
                      <th style= "height: 28px;" > <b>Nama Tes <br><i>Test Name</i></b> </th>
                      <th><b>HASIL <br><i>Result</i></b></th>
                       <th><b>RUJUKAN <br><i>Reference</i></b></th>
                </tr>
   
                <tr style="height: 30px; ; text-align: center; font-size:11;">
                      <td style= "height: 30px;" ><b>'.$namapemeriksaan.'</b></td>
                      <td><b style="text-transform: uppercase;" >'.$hasil.'</b> <br><b><i> '.$hasil2.' </i></b></td>
                       <td><b style="text-transform: uppercase;" >'.$rujukan.'</b> <br><b><i>'.$rujukan2.'</i></b> </td>
                </tr>
               
               
          </table>
          <table border="0" >
                <tr>
                      <th style= "width: 35%;" > </th>
                      <th style= "width: 65%;"></th>
                </tr>

               
          </table>
           <table style= "font-size:10; height: 30px; "  border="0.5" >
                <tr style="text-align: center; ">
                      <th style= "height: 30px; width: 33.3%;" > <b>Merk Kit Test Antigen</b><br><i>Antigen Test Kit Brand</i> </th>
                      <th style="width: 66.6%;"><b  style= "font-size:8;" ><br>'.$merk_rapid.'</b></th>            
                </tr>
               
          </table>
          <table border="0" >
                <tr>
                      <th style= "width: 35%;" > </th>
                      <th style= "width: 65%;"></th>
                </tr>

               
          </table>

          <table><tr>

            <th>Informasi Lebih Lanjut Bisa Menghubungi Kami di No.Telp: 0361-490423 / 08123828616
              <br><i>For More Information, Please Contact Us At Phone Number: 0361-490423 / 08123828616</i>
            </th></tr></table>
         
          <table border="0" >
                <tr>
                      <th style= "  width: 35%;" > </th>
                      <th style= "width: 65%;"></th>
                </tr>

               
          </table>

          <table style= "font-size:10;" border="0" >
                <tr>
                      <th style= "  width: 78%;" >Penanggung Jawab Klinik/<br>Dokter Yang Bertugas<br><i>Doctor in Charge</i><br>&nbsp; &nbsp;  <img style="height: 50px" src="'.base_url('assets/ttd/'.$ttd_dokter.'').'" /><br><b>'.$namadokter.'</b></th>
                      <th style= "width: 22%;"> <img style="width: 120px" src="'.base_url('assets/qr/'.$detailpasien->qr_name.'.jpg').'"/></th>
                </tr>

               
          </table>
           <table border="0" >
                <tr>
                      <th style= "width: 35%;height: 15px;" > </th>
                      <th style= "width: 65%;"></th>
                </tr>

               
          </table>

          
          ';
          // $filelocation = base_url("assets/images");
          // $filename='file-pdf-codeigniter.pdf';
          // $fileNL = $filelocation.'/'.$filename;
          $pdf->writeHTML($tabel);
          $pdf->Output('file', 'I');
      }

     public function export(){
      $data = $this->M_pasien->select_all();

      include_once APPPATH.'/third_party/PHPExcel/xlsxwriter.class.php';
      ini_set('display_errors', 0);
      ini_set('log_errors', 1);
      error_reporting(E_ALL & ~E_NOTICE);

      $filename = "report-".date('d-m-Y-H-i-s').".xlsx";
      header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
      header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
      header('Content-Transfer-Encoding: binary');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');

      $styles = array('widths'=>[3,15,20,25,30,15,15,50,25,15,15,30,30,30], 'font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'center', 'border'=>'left,right,top,bottom');
      $styles2 = array( ['font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'halign'=>'left', 'border'=>'left,right,top,bottom']);

      $header = array(
        'No'=>'integer',
        'tanggal'=> 'string',
        'Nama'=>'string',
        'NIK'=>'string',
        'No Hasil'=>'string',
        'JK' => 'string',
        'tgllahir' => 'string',
        'alamat' => 'string',
        'namapemeriksaan'=> 'string',
        'hasil'=> 'string',
        'rujukan'=> 'string',
        'admin'=> 'string',
        'dokter'=> 'string',
        'perawat'=> 'string',
      );

      $writer = new XLSXWriter();
      $writer->setAuthor('Be Healt Medika');

      $writer->writeSheetHeader('Sheet1', $header, $styles);
      $no = 1;
      foreach($data->result() as $row){
        $writer->writeSheetRow('Sheet1', [$no, $row->tanggal, $row->nama, $row->NIK, $row->nohasil, $row->JK, $row->tgllahir, $row->alamat, $row->namapemeriksaan, $row->hasil, $row->rujukan, $row->admin, $row->dokter, $row->perawat,], $styles2);
        $no++;
      }
      $writer->writeToStdOut();
  }
 
}