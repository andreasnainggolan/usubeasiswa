<?php

class M_Dosen extends CI_Model{

	public $table = "tbl_mahasiswa";

	function save($foto){
		$data = array(
		'nim' 			=> $this->input->post('nim',TRUE),
		'kd_agama'		=> $this->input->post('agama',TRUE),
		'nama' 			=> $this->input->post('nama',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'tempat_lahir' 	=> $this->input->post('tempat_lahir',TRUE),
		'gender' 		=> $this->input->post('gender',TRUE),
		'foto'			=> $foto,
		'id_rombel'		=> $this->input->post('rombel',TRUE)
		);

		// print_r($data);
		$this->db->insert($this->table,$data);
	}

	function update(){
		$data = array(
		'nim' 			=> $this->input->post('nim',TRUE),
		'kd_agama'		=> $this->input->post('agama',TRUE),
		'nama' 			=> $this->input->post('nama',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'tempat_lahir' 	=> $this->input->post('tempat_lahir',TRUE),
		'gender' 		=> $this->input->post('gender',TRUE),
		'foto'			=> $foto,
		'id_rombel'		=> $this->input->post('rombel',TRUE)

		);

		$id = $this->input->post('nim');
		$this->db->where('nim',$id);
		$this->db->update($this->table,$data);
	
	}
}