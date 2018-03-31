<?php

class M_Admin extends CI_Model{

	public $table = 'tbl_user';

	function check_login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$user = $this->db->get('tbl_user')->row_array();
		return $user;
	}
}