<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function getAdminLogin($user,$pass)
	{
		$this->db->select('id_admin,fullname,username,jenis');
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		return $this->db->get('admin');
	} 

	public function select_all()
	{
		$this->db->select('*');
		$this->db->where('jenis','admin');
		return $this->db->get('admin');
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

	public function create($nama, $username, $pass){
		$data = array(
			'username' => $username,
			'fullname' => $nama,
			'password' => $pass,
			'jenis' => 'admin',
		);
		$this->db->insert('admin', $data);
		//return ($this->db->affected_rows() != 1) ? 'failed' : 'success';
	}
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

