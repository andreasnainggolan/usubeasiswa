<?php

class M_Auth extends CI_Model{

	public $table = 'tbl_user';

	function check_login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$user = $this->db->get('tbl_user')->row_array();
		return $user;
	}

	function register(){

		$data = array(
		'username'		=> $this->input->post('username',TRUE),
		'password'	 	=> md5($this->input->post('password',TRUE)),
		'id_level_user' => 3
		);

		$this->db->insert($this->table,$data);
		return $data;
	}


	function register_biodata($nim){

		$data = array(
		'nama_mahasiswa'=> $this->input->post('nama',TRUE),
		'jurusan'	 	=> $this->input->post('jurusan',TRUE),
		'jk' 			=> $this->input->post('jk',TRUE),
		'tempat_lahir' 	=> $this->input->post('tempat',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal',TRUE),
		'alamat' 		=> $this->input->post('alamat',TRUE),
		);
		$user = $this->db->get_where('tbl_user',array('username'=>$nim))->row_array();
		return $user;
	}

}