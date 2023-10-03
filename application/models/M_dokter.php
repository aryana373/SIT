<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Model {

	public function select_dokter()
	{
		$this->db->select('*');
		$this->db->where('profesi','dokter');
		return $this->db->get('nakes');
	}

	public function select_perawat()
	{
		$this->db->select('*');
		$this->db->where('profesi','perawat');
		return $this->db->get('nakes');
	} 

	public function select_merk()
	{
		$this->db->select('*');
		return $this->db->get('merk');
	} 
	public function merk_select()
	{
		$this->db->select('*');
		$this->db->where('id_merk','1');
		return $this->db->get('merk');
	} 

	public function create($nama, $profesi){
		$data = array(
			'nama' => $nama,
			'profesi' => $profesi,
		);
		$this->db->insert('nakes', $data);
		//return ($this->db->affected_rows() != 1) ? 'failed' : 'success';
	}

	public function add_merk($merk){
		$data = array(
			'merk' => $merk,
		);
		$this->db->insert('merk', $data);
		//return ($this->db->affected_rows() != 1) ? 'failed' : 'success';
	}

	public function ttd($dokter){
		$this->db->select('ttd');
		$this->db->where('nama',$dokter);
		return $this->db->get('nakes');	
	}

	public function insert($data){
			$this->db->insert('nakes',$data);
		}
	// public function select_all(){
	// 	$this->db->select('*');
	// 	$this->db->where('hak_akses','Teknisi');
	// 	//$this->db->where('aktif', 'ya');
	// 	return $this->db->get('tb_user');
	// }
	// public function select($id){
	// 	$this->db->select('*');
	// 	$this->db->where('id_user',$id);
	// 	return $this->db->get('tb_user');
	// }

	// public function create($username, $fullname, $pass, $email, $phone, $lokasi, $aktif){
	// 	$password = md5($pass);
	// 	$data = array(
	// 		'username' => $username,
	// 		'fullname' => $fullname,
	// 		'password' => $password,
	// 		'email' => $email,
	// 		'phone' => $phone,
	// 		'lokasi'=> $lokasi,
	// 		'aktif'=> $aktif,
	// 		'hak_akses'=> 'Teknisi'
	// 	);
	// 	$this->db->insert('tb_user', $data);
	// 	//return ($this->db->affected_rows() != 1) ? 'failed' : 'success';
	// }
	// public function update($id, $username, $fullname, $email, $phone, $lokasi, $aktif){
	// 	$data=array(
	// 		'username' => $username,
	// 		'fullname' => $fullname,
	// 		'email' => $email,
	// 		'phone' => $phone,
	// 		'lokasi'=> $lokasi,
	// 		'aktif'=> $aktif

	// 	);
	// 	$this->db->where('id_user',$id);
	// 	$this->db->update('tb_user',$data);

	// }
	

}

