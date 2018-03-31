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

	function lihatPrestasi(){
		$username = $this->uri->segment(3);
		$data['mahasiswa'] = $this->db->get_where('tbl_user',array('username'=>$username))->row_array();
		$data['records'] 	= $this->db->get_where('tbl_history_lomba',array('nim'=>$username,'status'=>'Belum Terverifikasi'))->result();
		$data['username'] = $username;
		$this->template->load('template','mahasiswa/listprestasi',$data);
	}

	function dataVerifikasi()
	{
		$status		= $_GET['status'];
		$nim 		= $_GET['nim'];
		// $prestasi 			= $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
		// echo $prestasi['jenis_prestasi'];
		echo $this->formVerifikasi($status,$nim);
	}


	function formVerifikasi($status,$username){
        echo '<div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Mahasiswa</th>
                  <th>NIM</th>
                  <th>Nama Perlombaan</th>
                  <th>Jenis Prestasi</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Mahasiswa</th>
                  <th>NIM</th>
                  <th>Nama Perlombaan</th>
                  <th>Jenis Prestasi</th>
                  <th>Tanggal</th>
                </tr>
              </tfoot>              
				<tbody>';
        $mhs = $this->db->get_where('tbl_mahasiswa',array('nim'=>$username))->row_array();
		if($status == 0){
		$records 	= $this->db->get_where('tbl_history_lomba',array('nim'=>$username,'status'=>'Belum Terverifikasi'))->result();
		$no = 1;
      	foreach ($records as $r) {
        $id_prestasi 	= $r->id_prestasi;
        $id_lomba 		= $r->id_lomba;
        if($r->id_prestasi == 1 || $r->id_prestasi == 2)
        {
	        $query = $this->db->get_where('tbl_lomba',array('id_lomba'=>$id_lomba))->row_array();
	        $lomba = $query['nama_kompetisi'];
	    }
	    else if($r->id_prestasi == 3 || $r->id_prestasi == 4)
	    {
	    	$query = $this->db->get_where('tbl_penelitian',array('id_penelitian'=>$id_lomba))->row_array();
	        $lomba = $query['judul_penelitian'];
	    }
	    else
	    {
	    	$query = $this->db->get_where('tbl_organisasi',array('id_kepanitiaan'=>$id_lomba))->row_array();
	        $lomba = $query['nama_organisasi'];
		}

	    $query = $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
	    $prestasi = $query['jenis_prestasi'];
	        
      	echo"
        <tr>
          <td>$no</td>
          <td>".$mhs['nama_mahasiswa']."</td>
          <td>".$r->nim."</td>
          <td>$lomba</td>
          <td>$prestasi</td>
          <td>".$r->tanggal."</td>
		</tr>";
		$no++;
       	}
       	echo "</tbody>
       		</table>
       		</div>";
       }else{
		$records 	= $this->db->get_where('tbl_history_lomba',array('nim'=>$username,'status'=>'Sudah Terverifikasi'))->result();


		$no = 1;
      	foreach ($records as $r) {
        $id_prestasi = $r->id_prestasi;
        
        if($r->id_prestasi == 1 || $r->id_prestasi == 2)
        {
	        $query = $this->db->get_where('tbl_lomba',array('id_prestasi'=>$id_prestasi))->row_array();
	        $lomba = $query['nama_kompetisi'];
	    }
	    else if($r->id_prestasi == 3 || $r->id_prestasi == 4)
	    {
	    	$query = $this->db->get_where('tbl_penelitian',array('id_prestasi'=>$id_prestasi))->row_array();
	        $lomba = $query['judul_penelitian'];
	    }
	    else
	    {
	    	$query = $this->db->get_where('tbl_organisasi',array('id_prestasi'=>$id_prestasi))->row_array();
	        $lomba = $query['nama_organisasi'];
		}

	    $query = $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
	    $prestasi = $query['jenis_prestasi'];
	        
      	echo"
        <tr>
          <td>$no</td>
          <td>$lomba</td>
          <td>$prestasi</td>
          <td>".$r->tanggal."</td>
          <td>".$r->nim."</td>
          <td>".anchor('prestasi/lihat/'.$r->id_history,'Lihat Hasil',"class='btn btn-primary btn-sm'")."</td>
		</tr>";$no++;
       	}
       	echo "</tbody>
       		</table>
       		</div>";
       }
	}
}