<?php

class M_Mahasiswa extends CI_Model{

	public $table = "tbl_mahasiswa";

	function showMahasiswa(){
		return $this->db->get($this->table);	
	}

}