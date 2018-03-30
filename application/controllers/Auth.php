<?php

class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Auth');
	}

	public function index(){
		$this->load->view('auth/login');			
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
				redirect('auth');
			}
		}else{
			redirect('auth');
		}
	}
}