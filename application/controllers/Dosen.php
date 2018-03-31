<?php

class Dosen extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Dosen');
	}

	function index(){
		$username = $this->session->userdata('username');
		$data['mahasiswa'] = $this->db->get_where('tbl_user',array('username'=>$username))->row_array();
		$this->template->load('template','mahasiswa/list',$data);

	}

	function dataVerifikasi()
	{
		$status		= $_GET['status'];
		// $prestasi 			= $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
		// echo $prestasi['jenis_prestasi'];
		echo $this->formVerifikasi($status);

	}

	function formVerifikasi($status){

        echo '<div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
	                <th width="20%">No</th>
		            <th width="20%">Nama Perlombaan</th>
	                <th width="20%">Jenis Prestasi</th>
	                <th width="20%">Tanggal</th>
	                <th width="10%"></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Perlombaan</th>
                  <th>Jenis Prestasi</th>
                  <th>Tanggal</th>
                  <th></th>
                </tr>
              </tfoot>              
				<tbody>';
		if($status == 0){
		$records 	= $this->db->get_where('tbl_history_lomba',array('status'=>'Belum Terverifikasi'))->result();
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
          <td>$lomba</td>
          <td>$prestasi</td>
          <td>".$r->tanggal."</td>
          <td>".anchor('prestasi/lihat/'.$r->id_history,'<i class="fa fa-eye"></i>','class="btn btn-sm btn-teal tooltips" data-placement="top" data-original-title="Lihat"').' '
			   .anchor('prestasi/verifikasi/'.$r->id_history,'<i class="fa fa-check fa fa-red"></i>','class="btn btn-sm btn-success tooltips" data-placement="top" data-original-title="Verifikasi"')."</td>
		 </tr>";
		$no++;
       	}
       	echo "</tbody>
       		</table>
       		</div>";
       }else{
		$username   = $this->session->userdata('username');
		$records 	= $this->db->get_where('tbl_history_lomba',array('status'=>'Sudah Terverifikasi'))->result();
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
          <td>".anchor('prestasi/lihat/'.$r->id_history,'<i class="fa fa-eye"></i>','class="btn btn-sm btn-teal tooltips" data-placement="top" data-original-title="Lihat"')."</td>
		</tr>";$no++;
       	}
       	echo "</tbody>
       		</table>
       		</div>";
       }

	}

}