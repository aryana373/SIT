<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_dokter');
		$this->load->model('M_admin');
		

		if (!$this->session->userdata('isLoggedIn')){
			$this->load->view('v_redirect_login');
			return;
		}
	}
	
	public function index(){

		//$this->session->unset_userdata('msg');
	

		$data['admin']=$this->M_admin->select_all();
		$data['dokter']=$this->M_dokter->select_dokter();
		$data['perawat']=$this->M_dokter->select_perawat();
		$data['merk']=$this->M_dokter->select_merk();
		$this->load->view('v_user',$data);

	}

	public function create_admin(){

		 $nama = $this->input->post('nama');
          $username = $this->input->post('username');
          $pass = md5($this->input->post('pass'));
      
        
         
          
          $this->M_admin->create($nama, $username, $pass);
      
          
          $this->index();

	}

	public function create_nakes(){

		 $nama = $this->input->post('nama');
         $profesi = $this->input->post('profesi');
  
          
          $this->M_dokter->create($nama, $profesi);
      
          
          $this->index();

	}

	public function create_dokter(){


			//tampung data dari form
            $nama = $this->input->post('nama');

            $cek = $this->db->query("SELECT * FROM nakes where nama='".$nama."'")->num_rows();


           if ($cek<=0) {

           		$gambar = preg_replace('/[^a-zA-Z]/', '', $nama).rand(1,100);
	           	$ttd = $gambar.'.jpg';

			  	$config['upload_path']         = './assets/ttd/';  // folder upload 
	            $config['allowed_types']        = 'gif|jpg|png'; // jenis file
	            $config['max_size']             = 1500;
	            $config['file_name'] = $gambar.'.jpg';
	            // $config['max_width']            = 1024;
	            // $config['max_height']           = 768;
	 
	            $this->load->library('upload', $config);
	 
	            if ( ! $this->upload->do_upload('ttd')) //sesuai dengan name pada form 
	            {
	                   echo 'anda gagal upload';
	            }
	            else
	            {
	            	$file = $this->upload->data();
	 
	                $this->M_dokter->insert(array(
				        'nama' => $nama,
				        'profesi' => 'dokter',
				        'ttd' => $ttd
					));
					//$this->session->set_flashdata('msg','data berhasil di upload');
					//redirect('product');
					 
					 $data['currUser']=$this->session->userdata('fullname');
			

					$this->load->view('v_metadata');
					$this->load->view('v_header');
					$this->load->view('v_sidebar',$data);
					$this->load->view('v_content');
					$this->load->view('v_footer');
				}
				
			} else{

				$this->session->set_flashdata('msg','nama dokter sudah terdaftar');
				redirect($this->agent->referrer(),'refresh');
		 
            }
	}

	public function edit_merk(){

		 $merk = $this->input->post('merk');
         //$id_merk = $this->input->post('id_merk');
  
          
          $this->M_dokter->add_merk($merk);
      
          
          $this->index();

	}

	 public function hapus_admin($id)
        {
            $this->db->where('id_admin', $id);
            $this->db->delete('admin');
            $this->index();
        }
     public function hapus_nakes($id)
        {
            $this->db->where('id_nakes', $id);
            $this->db->delete('nakes');
            $this->index();
        }
     public function hapus_merk($id)
        {
            $this->db->where('id_merk', $id);
            $this->db->delete('merk');
            $this->index();
        }
}
