<?php

class Mahasiswa extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Mahasiswa');
	}

	function index(){
		// $username = $this->session->userdata('username');
		// $data['mahasiswa'] = $this->db->get_where('tbl_user',array('username'=>$username))->row_array();
		$data['mhs'] = $this->M_Mahasiswa->showMahasiswa();
		$this->template->load('template','mahasiswa/list',$data);

	}

}