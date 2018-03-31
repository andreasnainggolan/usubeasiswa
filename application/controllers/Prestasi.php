<?php

class Prestasi extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Prestasi');
		$this->load->model('M_General');
	}

	function index(){


		$username = $this->session->userdata('username');
		$level 		= $this->session->userdata('id_level_user');

		if($level == 3){
			$data['mahasiswa'] = $this->db->get_where('tbl_user',array('username'=>$username))->row_array();
			$data['records'] 	= $this->db->get_where('tbl_history_lomba',array('nim'=>$username,'status'=>'Belum Terverifikasi'))->result();
			$this->template->load('template','prestasi/list',$data);
		}else if($level == 1){
			$data['records'] 	= $this->db->get('tbl_history_lomba')->result();
			$this->template->load('template','admin/prestasi',$data);
		}else{
			$data['records'] 	= $this->db->get('tbl_history_lomba')->result();
			$this->template->load('template','dosen/prestasi',$data);			
		}
	}




	function add(){
		$username = $this->session->userdata('username');
		$data['mahasiswa'] = $this->db->get_where('tbl_user',array('username'=>$username))->row_array();
		$this->template->load('template','prestasi/add',$data);
	}


	function dataPrestasi()
	{
		$id_prestasi		= $_GET['prestasi'];
		// $prestasi 			= $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
		// echo $prestasi['jenis_prestasi'];
		echo $this->formPrestasi($id_prestasi);

	}

	function dataVerifikasi()
	{
		$status		= $_GET['status'];
		// $prestasi 			= $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
		// echo $prestasi['jenis_prestasi'];
		echo $this->formVerifikasi($status);
	}

	function addPerlombaan(){
	    if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            if($uploadFoto == 'error'){
            	die("error");
			}else{
	            $this->M_Prestasi->savePerlombaan($uploadFoto);
	        }
			redirect('prestasi');
        } else {
            $this->template->load('template','prestasi/add');
        }		
	}

	function addPenelitian(){
	    if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            if($uploadFoto == 'error'){
            	die("error");
			}else{
	            $this->M_Prestasi->savePenelitian($uploadFoto);
	        }
			redirect('prestasi');
        } else {
            $this->template->load('template','prestasi/add');
        }		
	}

	function addOrganisasi(){
	    if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            if($uploadFoto == 'error'){
            	die("error");
			}else{
	            $this->M_Prestasi->saveOrganisasi($uploadFoto);
	        }
			redirect('prestasi');
        } else {
            $this->template->load('template','prestasi/add');
        }		
	}

	function verifikasi(){
		$id = $this->uri->segment(3);
		$this->M_Prestasi->updateLomba($id);
		redirect('Prestasi');
	}

	function lihat()
	{
		$id_history = $this->uri->segment(3);
		$data = $this->db->get_where('tbl_history_lomba',array('id_history'=>$id_history))->row_array();
		$data['mahasiswa']  		= $this->M_General->showMahasiswa($data['nim']);
		$data['id_prestasi']  		= $data['id_prestasi'];
		$data['kompetisi'] 			= $this->M_General->showPrestasi($data['id_prestasi']);
		$data['prestasi'] 			= $this->M_General->showLomba($data['id_prestasi'],$data['id_lomba']);

        $this->template->load('template','prestasi/viewlist',$data);		
	}

	function formVerifikasi($status){

        echo '<div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Perlombaan</th>
                  <th>Jenis Prestasi</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Perlombaan</th>
                  <th>Jenis Prestasi</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </tfoot>              
				<tbody>';
		if($status == 0){
		$username   = $this->session->userdata('username');
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
          <td>$lomba</td>
          <td>$prestasi</td>
          <td>".$r->tanggal."</td>
          <td>".$r->nim."</td>
          <td>".anchor('pretasi/hasil/'.$r->id_history,'Lihat Hasil',"class='btn btn-primary btn-sm'")."</td>
		</tr>";
		$no++;
       	}
       	echo "</tbody>
       		</table>
       		</div>";
       }else{
		$username   = $this->session->userdata('username');
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
          <td>".anchor('pretasi/hasil/'.$r->id_history,'Lihat Hasil',"class='btn btn-primary btn-sm'")."</td>
		</tr>";$no++;
       	}
       	echo "</tbody>
       		</table>
       		</div>";
       }
	}

	function formPrestasi($id_prestasi){
		if($id_prestasi == '1' || $id_prestasi == '2')
		{	
  		$data = form_open_multipart('prestasi/addPerlombaan','role="form" class="form-horizontal"');
  		$data .= form_hidden('id_prestasi',$id_prestasi);
		$data .= '
		    <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Nama Perlombaan
                </label>
                <div class="col-sm-9">
                    <input type="text" name="nama" required placeholder="Masukan Nama Perlombaan" id="form-field-1" class="form-control">
                </div>
            </div>
		    <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Waktu Pelaksanaan
                </label>
                <div class="col-sm-9">
                    <input type="date" name="waktu" required placeholder="Waktu Acara Puncak/Dimulai" id="form-field-1" class="form-control">
                </div>
            </div>
		    <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Lokasi
                </label>
                <div class="col-sm-9">
                    <input type="text" name="lokasi" required placeholder="Masukan Lokasi Tempat Perlombaan" id="form-field-1" class="form-control">
                </div>
            </div>
		    <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Nama Institusi
                </label>
                <div class="col-sm-9">
                    <input type="text" name="institusi" required placeholder="Masukan Nama Institusi" id="form-field-1" class="form-control">
                </div>
            </div>
		    <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    URL
                </label>
                <div class="col-sm-9">
                    <input type="url" name="url" required placeholder="Masukan Link Url" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Keterangan Lain
                </label>
                <div class="col-sm-9">
                    <input type="text" name="keterangan" required placeholder="Masukan Keterangan Lain: Aktivitas, Output" id="form-field-1" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    Upload Foto
                </label>
                <div class="col-sm-9">
                    <input type="file" name="userfile">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1"></label>
                <div class="col-sm-1">
                    <button type="submbit" name="submit" class="btn btn-danger">Simpan</button>
                </div>
                <div class="col-sm-1">
                	<a href="prestasi" class="btn btn-primary">Kembali</a>
                </div>
            </div>
          	</form>
            ';		  
            return $data;
		}
		else if($id_prestasi == '3' || $id_prestasi == '4')
		{	
	  		$data = form_open_multipart('prestasi/addPenelitian','role="form" class="form-horizontal"');
	  		$data .= form_hidden('id_prestasi',$id_prestasi);
			$data .= '
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Judul Penelitian
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="judul" required placeholder="Masukan Judul Penelitian" id="form-field-1" class="form-control">
	                </div>
	            </div>
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Waktu Pelaksanaan
	                </label>
	                <div class="col-sm-9">
	                    <input type="date" name="waktu" required placeholder="Waktu Pelaksanaan" id="form-field-1" class="form-control">
	                </div>
	            </div>
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Lokasi
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="lokasi" required placeholder="Masukan Lokasi Tempat Perlombaan" id="form-field-1" class="form-control">
	                </div>
	            </div>
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Nama Institusi
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="institusi" required placeholder="Masukan Nama Institusi" id="form-field-1" class="form-control">
	                </div>
	            </div>
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Ketua Pelaksana
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="ketua" required placeholder="Masukan Ketua Pelaksana" id="form-field-1" class="form-control">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Keterangan Lain
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="keterangan" required placeholder="Surat keterangan dari ketua, karya ilmiah" id="form-field-1" class="form-control">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Upload Foto
	                </label>
	                <div class="col-sm-9">
	                    <input type="file" name="userfile">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1"></label>
	                <div class="col-sm-1">
	                    <button type="submbit" name="submit" class="btn btn-danger">Simpan</button>
	                </div>
	                <div class="col-sm-1">
	                	<a href="prestasi" class="btn btn-primary">Kembali</a>
	                </div>
	            </div>
	          	</form>
	            ';		  
	            return $data;			
		}
		else
		{
	  		$data = form_open_multipart('prestasi/addOrganisasi','role="form" class="form-horizontal"');
	  		$data .= form_hidden('id_prestasi',$id_prestasi);
			$data .= '
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Nama Jabatan
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="jabatan" required placeholder="Masukan Nama Jabatan" id="form-field-1" class="form-control">
	                </div>
	            </div>
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Nama Organisasi
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="waktu" required placeholder="Masukan Nama Organisasi" id="form-field-1" class="form-control">
	                </div>
	            </div>
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Nama Institusi
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="institusi" required placeholder="Masukan Nama Institusi" id="form-field-1" class="form-control">
	                </div>
	            </div>
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                   Ketua Organisasi / Penanggungjawab
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="ketua" required placeholder="Masukan Nama Ketua" id="form-field-1" class="form-control">
	                </div>
	            </div>
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                	Waktu Jabatan
	                </label>
	                <div class="col-sm-9">
	                    <input type="date" name="waktu" required placeholder="Masukan Nama Organisasi" id="form-field-1" class="form-control">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Lokasi
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="lokasi" required placeholder="Masukan Lokasi" id="form-field-1" class="form-control">
	                </div>
	            </div>
			    <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    URL
	                </label>
	                <div class="col-sm-9">
	                    <input type="url" name="url" placeholder="Masukan Link Url" id="form-field-1" class="form-control">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Keterangan Lain
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="keterangan" placeholder="Surat keterangan dari ketua, karya ilmiah" id="form-field-1" class="form-control">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    Upload Foto
	                </label>
	                <div class="col-sm-9">
	                    <input type="file" name="userfile">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1"></label>
	                <div class="col-sm-1">
	                    <button type="submbit" name="submit" class="btn btn-danger">Simpan</button>
	                </div>
	                <div class="col-sm-1">
	                	<a href="prestasi" class="btn btn-primary">Kembali</a>
	                </div>
	            </div>
	          	</form>
	            ';		  
	            return $data;	
		}

	}


    function upload_foto(){
        $config['upload_path']          = './uploads/prestasi';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile')){
			$error = array('error' => $this->upload->display_errors());
            return "error";
		}else{
	        $upload = $this->upload->data();
			return $upload['file_name'];
		}
    }

}