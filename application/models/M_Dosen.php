<?php

class M_Dosen extends CI_Model{

	public $table = "tbl_dosen";

	function save(){
		$data = array(
		'nip' 			=> $this->input->post('nip',TRUE),
		'nama_dosen'	=> $this->input->post('nama',TRUE),
		'jk' 			=> $this->input->post('jk',TRUE),
		'alamat' 		=> 	$this->input->post('alamat',TRUE),
		'no_hp' 		=> $this->input->post('handphone',TRUE),
		);
		// print_r($data);
		$this->db->insert($this->table,$data);
	}



	function update(){
		$data = array(
		'nip' 			=> $this->input->post('nip',TRUE),
		'nama_dosen'	=> $this->input->post('nama',TRUE),
		'jk' 			=> $this->input->post('jk',TRUE),
		'alamat' 		=> 	$this->input->post('alamat',TRUE),
		'no_hp' 		=> $this->input->post('handphone',TRUE),
		);

		$nip = $this->input->post('nip');
		$this->db->where('nip',$nip);
		$this->db->update($this->table,$data);
	
	}

}