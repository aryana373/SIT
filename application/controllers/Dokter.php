<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->load->model('M_admin');
        // $this->load->model('M_dashboard');
         //$this->load->library('pdf');
         $this->load->model('M_dokter');

        if (!$this->session->userdata('isLoggedIn')){
            $this->load->view('v_redirect_login');
            return;
        }
    }

    public function index(){
        // $data['jml_user']=$this->M_dashboard->jmlUser();
        // $data['jml_aset']=$this->M_dashboard->jmlAset();
        // //$data['grafik']=$this->M_dashboard->grafik();
        // $data['total_perbaikan']=$this->M_dashboard->jmlTiket();
        // $data['perbaikan_selesai']=$this->M_dashboard->jmlTiketSelesai();
        $this->load->view('v_dashboard');


 
    
    }

    public function select_dokter(){

        $data['dokter']=$this->M_dokter->select_dokter();
        if ($data['dokter']!=0) {
            $this->load->view('dropdown/v_dropdown_dokter',$data);
        }
        
    
    }

    public function select_perawat(){

        $data['perawat']=$this->M_dokter->select_perawat();
        if ($data['perawat']!=0) {
            $this->load->view('dropdown/v_dropdown_perawat',$data);
        }
        
    
    }
    
      public function select_merk(){

        $data['merk']=$this->M_dokter->select_merk();
        if ($data['merk']!=0) {
            $this->load->view('dropdown/v_dropdown_merk',$data);
        }
        
    
    }



}




