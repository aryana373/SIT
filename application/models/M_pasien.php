<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model {

	public function create($nama,$kwn, $nohasil, $NIK,$JK, $tgllahir, $alamat, $namapemeriksaan, $hasil, $rujukan,$tanggal, $jam,$qr_name, $admin,$dokter,$perawat,$merk_rapid)
	{
		$data = array(
			'nama' => $nama,
			'kwn' => $kwn,
			'nohasil' => $nohasil,
			'NIK' => $NIK,
			'JK' => $JK,
			'tgllahir' => $tgllahir,
			'alamat' => $alamat,
			'namapemeriksaan'=> $namapemeriksaan,
			'hasil'=> $hasil,
			'rujukan'=> $rujukan,
			'tanggal'=> $tanggal,
			'jam'=> $jam,
			'qr_name'=> $qr_name,
			'admin'=> $admin,
			'dokter'=> $dokter,
			'perawat'=> $perawat,
			'merk_rapid'=>$merk_rapid,
		);

		$this->db->insert('pasien', $data);
	} 

	public function update($id_pasien,$nama,$kwn, $nohasil, $NIK, $JK, $tgllahir, $alamat,$namapemeriksaan,$hasil, $rujukan, $admin, $dokter, $perawat)
	{
		$data = array(
			'nama' => $nama,
			'kwn' => $kwn,
			'nohasil' => $nohasil,
			'NIK' => $NIK,
			'JK' => $JK,
			'tgllahir' => $tgllahir,
			'alamat' => $alamat,
			'namapemeriksaan'=> $namapemeriksaan,
			'hasil'=> $hasil,
			'rujukan'=> $rujukan,
			'admin'=> $admin,
			'dokter'=> $dokter,
			'perawat'=> $perawat,
		);

		$this->db->where('id_pasien',$id_pasien);
		$this->db->update('pasien', $data);
	} 

	public function select_all(){

      $this->db->select('*');
	  return $this->db->get('pasien');
	}

	public function select($id_pasien){

      $this->db->select('*');
	  $this->db->where('id_pasien',$id_pasien);
	  return $this->db->get('pasien');
	}

	public function select_last(){
	  $this->db->select('*');
      $this->db->order_by('id_pasien',"desc");
      $this->db->limit(1);
      return $this->db->get('pasien');
	}

	public function select_berdasarkan($cariberdasarkan,$data){
		$this->db->select('*');
		$this->db->order_by('id_pasien', 'DESC');
		$this->db->where($cariberdasarkan, $data);
		//$this->db->like($cariberdasarkan, $data, 'both'); 
		return $this->db->get('pasien');
	}

	public function current_nosurat(){
		 $this->db->select('*');
		 $this->db->where('id','1');
	  	 return $this->db->get('nosurat');
	}

	public function update_nosurat($nosurat){

		$data = array(
			'cur_nosurat' => $nosurat,
		);

		$this->db->where('id','1');
		$this->db->update('nosurat', $data);

	}
	public function update_bulan($bulan){

		$data = array(
			'cur_nosurat' => '0',
			'cur_bulan' => $bulan,
		);

		$this->db->where('id','1');
		$this->db->update('nosurat', $data);

	}

}