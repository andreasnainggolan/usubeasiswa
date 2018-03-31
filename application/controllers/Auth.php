<?php

class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Auth');
	}

	public function index(){
		$this->load->view('auth/login');			
	}

	public function register(){
		$this->load->view('auth/register');					
	}


	function check_login(){
		if(isset($_POST['login'])){
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			$result 	= $this->M_Auth->check_login($username,$password);
			if(!empty($result)){
				$this->session->set_userdata($result);
				$level = $this->session->userdata('id_level_user');
				$direct = checkUser($level);
				redirect($direct);
			}else{
				$data['error'] = "Andreas";
				$this->load->view('auth/login',$data);
			}
		}else{
			redirect('auth');
		}
	}

	function check_register(){
		if(isset($_POST['register'])){
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			$result 	= $this->M_Auth->check_login($username,$password);
			if(!empty($result)){
				$data['error'] = "Username sudah terdaftar";
				$this->load->view('auth/register',$data);
			}else{
				$result = $this->M_Auth->register();
				$this->session->set_userdata($result);
				$data['mahasiswa'] = $result;
				$this->load->view('auth/mahasiswa',$data);
			}
		}else{
			redirect('auth');
		}
	}

	function biodata_register(){
		$data = $this->M_Auth->register_biodata($this->session->userdata('username'));
		print_r($data['username']);

		$data = $this->db->get_where('tbl_mahasiswa',array('nim'=>$data['username']))->row_array();
		$this->session->set_userdata(array(
			'nama_lengkap' => $data['nama_mahasiswa']
			));
		redirect('prestasi/add');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}
}