<?php

function check_user_login(){
	if(!$_SESSION['logged_in'])
    {
        redirect('welcome');
    }
}

function check_session($name,$value,$destination){
    if($_SESSION[$name] != $value){
    	redirect($destination);
    }
}

function destroy_session(){
	session_destroy();
	redirect('welcome');
}

function checkUser($level){
	$ci = & get_instance();
	$data = $ci->db->get_where('tbl_user',array('id_level_user',$level))->row_array();
	if($data['id_level_user'] == '1')
		return "admin";
	else if($data['id_level_user'] == '2')
		return "dosen";
	else 
		return "mahasiswa";
}


function cmb_dinamis($name,$table,$field,$pk,$selected=null,$extra=null){
	$ci = & get_instance();
	$cmb = "<select name='$name' class='form-control', $extra>";
	$data = $ci->db->get($table)->result();
	foreach($data as $row){
		$cmb .= "<option value='".$row->$pk."'";
		$cmb .= $selected==$row->$pk?'selected':'';
		$cmb .= ">".$row->$field."</option>";
	}
	$cmb .= "</select>";

	return $cmb;
}