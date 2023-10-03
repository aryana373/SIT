<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->model('M_admin');
		// $this->load->model('M_dashboard');
		 //$this->load->library('pdf');

		if (!$this->session->userdata('isLoggedIn')){
			$this->load->view('v_redirect_login');
			return;
		}
	}

	public function index(){
	    $tanggal=date('Y-m-d');

		$data['jml_pasien']= $this->db->query('SELECT COUNT(DISTINCT nama) AS num FROM pasien')->row()->num;
		$data['jml_surat']=$this->db->query('SELECT COUNT( id_pasien) AS num FROM pasien')->row()->num;
		$data['jml_surat_hariini']=$this->db->query('SELECT COUNT( id_pasien) AS num FROM pasien where tanggal="'.$tanggal.'"')->row()->num;
		// //$data['grafik']=$this->M_dashboard->grafik();
		// $data['total_perbaikan']=$this->M_dashboard->jmlTiket();
		// $data['perbaikan_selesai']=$this->M_dashboard->jmlTiketSelesai();
		$this->load->view('v_dashboard',$data);


 
    
	}



}