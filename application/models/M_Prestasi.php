<?php

class M_Prestasi extends CI_Model{

    function savePerlombaan($foto) {
        $table = "tbl_lomba";
        $nim = $this->session->userdata('username');
        $id_prestasi = $this->input->post('id_prestasi');
        $data = array(
            'nim'               => $nim,
            'nama_kompetisi'    => $this->input->post('nama', TRUE),
            'waktu_pelaksanaan' => $this->input->post('waktu', TRUE),
            'lokasi'            => $this->input->post('lokasi', TRUE),
            'institusi'         => $this->input->post('institusi', TRUE),
            'url'               => $this->input->post('url', TRUE),
            'id_prestasi'       => $this->input->post('id_prestasi',TRUE),
            'keterangan'        => $this->input->post('keterangan', TRUE),
            'lampiran'          => $foto,
            'status'            => 'Belum Terverifikasi'
        );
        $this->db->insert($table,$data);

        $history = array(
            'id_lomba'      => $this->db->insert_id(),
            'id_prestasi'   => $id_prestasi,
            'tanggal'       => date('Y-m-h'),
            'nim'           => $nim,
            'status'            => 'Belum Terverifikasi'

            );

        $this->db->insert("tbl_history_lomba",$history);
    }
    

    function savePenelitian($foto) {
        $table = "tbl_penelitian";
        $nim = $this->session->userdata('username');
        $id_prestasi = $this->input->post('id_prestasi');
        $data = array(
            'nim'           => $nim,
            'judul_penelitian'  => $this->input->post('judul', TRUE),
            'waktu_pelaksanaan' => $this->input->post('waktu', TRUE),
            'lokasi'        => $this->input->post('lokasi', TRUE),
            'institusi'     => $this->input->post('institusi', TRUE),
            'ketua_pelaksana'   => $this->input->post('ketua', TRUE),
            'id_prestasi'   => $this->input->post('id_prestasi',TRUE),
            'keterangan'    => $this->input->post('keterangan', TRUE),
            'lampiran'      => $foto,
            'status'        => 'Belum Terverifikasi'
        );
        $this->db->insert($table,$data);

        $history = array(
            'id_lomba'      => $this->db->insert_id(),
            'id_prestasi'   => $id_prestasi,
            'tanggal'       => date('Y-m-h'),
            'nim'           => $nim,
            'status'            => 'Belum Terverifikasi'
            );

        $this->db->insert("tbl_history_lomba",$history);
    }

    function saveOrganisasi($foto) {
        $table = "tbl_organisasi";
        $nim = $this->session->userdata('username');
        $id_prestasi = $this->input->post('id_prestasi');
        $data = array(
            'nim'               => $nim,
            'nama_jabatan'      => $this->input->post('jabatan', TRUE),
            'nama_organisasi'   => $this->input->post('organisasi', TRUE),
            'nama_institusi'    => $this->input->post('institusi', TRUE),
            'ketua_organisasi'  => $this->input->post('ketua', TRUE),
            'waktu_jabatan'     => $this->input->post('waktu', TRUE),
            'lokasi'            => $this->input->post('lokasi',TRUE),
            'url'               => $this->input->post('url',TRUE),
            'id_prestasi'       => $this->input->post('id_prestasi',TRUE),
            'keterangan'        => $this->input->post('keterangan', TRUE),
            'lampiran'          => $foto,
            'status'            => 'Belum Terverifikasi'
        );

        $this->db->insert($table,$data);

        $history = array(
            'id_lomba'      => $this->db->insert_id(),
            'id_prestasi'   => $id_prestasi,
            'tanggal'       => date('Y-m-h'),
            'nim'           => $nim,
            'status'            => 'Belum Terverifikasi'
            );

        $this->db->insert("tbl_history_lomba",$history);
    }    

    function updateLomba($id){
        $data = $this->db->get_where('tbl_history_lomba',array('id_history'=>$id))->row_array();
        if($data['id_prestasi'] == '1' || $data['id_prestasi'] == '2'){
            $this->db->where('id_lomba',$data['id_lomba']);
            $this->db->update('tbl_lomba',array('status'=>'Terverifikasi'));

            $this->db->where('id_history',$data['id_history']);
            $this->db->update('tbl_history_lomba',array('status'=>'Sudah Terverifikasi'));

        }else if($data['id_prestasi'] == '3' || $data['id_prestasi'] == '4'){
            $this->db->where('id_penelitian',$data['id_lomba']);
            $this->db->update('tbl_penelitian',array('status'=>'Terverifikasi'));            

            $this->db->where('id_history',$data['id_history']);
            $this->db->update('tbl_history_lomba',array('status'=>'Sudah Terverifikasi'));

        }else{
            $this->db->where('id_kepanitiaan',$data['id_lomba']);
            $this->db->update('tbl_organisasi',array('status'=>'Terverifikasi'));                      

            $this->db->where('id_history',$data['id_history']);
            $this->db->update('tbl_history_lomba',array('status'=>'Sudah Terverifikasi'));
        }
    }
}