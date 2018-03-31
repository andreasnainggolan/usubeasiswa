<?php

class M_General extends CI_Model{

	function showMahasiswa($nim){
		return $this->db->get_where('tbl_mahasiswa',array('nim'=>$nim))->row_array();
	}

	function showPrestasi($id_prestasi){
		return $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
	}

	function showLomba($id_prestasi,$id_lomba){
		if($id_prestasi == 1 || $id_prestasi == 2){
	        $query = $this->db->get_where('tbl_lomba',array('id_lomba'=>$id_lomba))->row_array();
	        return $query;
		}else if($id_prestasi == 3 || $id_prestasi == 4){
	        $query = $this->db->get_where('tbl_penelitian',array('id_penelitian'=>$id_lomba))->row_array();
	        return $query;
		}else{
	        $query = $this->db->get_where('tbl_organisasi',array('id_kepanitiaan'=>$id_lomba))->row_array();
	        return $query;
		}
	}


}