<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> DATA MAHASISWA
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>

                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered">
              <tr>
                <td>NIM</td>
                <td><?php echo $mahasiswa['nim'];?></td>
              </td>

              <tr>
                <td>Nama Mahasiswa</td>
                <td><?php echo $mahasiswa['nama_mahasiswa'];?></td>
              </tr>

              <tr>
                <td>Jurusan</td>
                <td><?php echo $mahasiswa['jurusan'];?></td>
              </tr>

              <tr>
                <td>Jenis Kelamin</td>
                <td>
                <?php 
                if($mahasiswa['JK'] == 'L')
                  echo 'Laki-laki';
                else
                  echo 'Perempuan';
                  ?></td>
              </tr>

              <tr>
                <td>Tempat Lahir</td>
                <td><?php echo $mahasiswa['tempat_lahir'];?></td>
              </tr>

              <tr>
                <td>Tanggal Lahir</td>
                <td><?php echo $mahasiswa['tanggal_lahir'];?></td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td><?php echo $mahasiswa['alamat'];?></td>
              </tr>
            </table>
          </div>         
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> DATA PRESTASI
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>

                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <?php
        if($id_prestasi == '1' || $id_prestasi == '2'){
        ?>
        <div class="panel-body">
          <div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered">
              <tr>
                <td>Nama Kompetisi</td>
                <td><?php echo $kompetisi['nama_kompetisi'];?></td>
              </td>

              <tr>
                <td>Waktu Pelaksanaan</td>
                <td><?php echo $prestasi['waktu_pelaksanaan'];?></td>
              </tr>


              <tr>
                <td>Lokasi</td>
                <td><?php echo $prestasi['lokasi'];?></td>
              </tr>

              <tr>
                <td>Institusi</td>
                <td><?php echo $prestasi['institusi'];?></td>
              </td>

              <tr>
                <td>URL</td>
                <td><?php echo $prestasi['url'];?></td>
              </tr>

              <tr>
                <td>Keterangan</td>
                <td><?php echo $prestasi['keterangan'];?></td>
              </tr>

              <tr>
                <td>Status Verifikasi</td>
                <td><?php echo $prestasi['status'];?></td>
              </tr>

              <tr>
                <td>lampiran</td>
                <td><?php echo anchor(base_url().'uploads/prestasi/'.$prestasi['lampiran'],'<i class="fa fa-file fa fa-red"></i>','class="btn btn-sm btn-success tooltips" data-placement="top" data-original-title="Files Berkas"');?>
                  </td>
              </tr>
            </table>
          </div>         
        </div>
        <?php
        }else if($id_prestasi == '3' || $id_prestasi == '4'){
        ?>
        <div class="panel-body">
          <div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered">
              <tr>
                <td>Jenis Kompetisi</td>
                <td><?php echo $kompetisi['jenis_prestasi'];?></td>
              </td>

              <tr>
                <td>Judul Penelitian</td>
                <td><?php echo $prestasi['judul_penelitian'];?></td>
              </td>

              <tr>
                <td>Waktu Pelaksanaan</td>
                <td><?php echo $prestasi['waktu_pelaksanaan'];?></td>
              </tr>

              <tr>
                <td>Lokasi</td>
                <td><?php echo $prestasi['lokasi'];?></td>
              </tr>

              <tr>
                <td>Institusi</td>
                <td><?php echo $prestasi['institusi'];?></td>
              </tr>

              <tr>
                <td>Ketua Pelaksana</td>
                <td><?php echo $prestasi['ketua_pelaksana'];?></td>
              </tr>

              <tr>
                <td>Keterangan</td>
                <td><?php echo $prestasi['keterangan'];?></td>
              </tr>

              <tr>
                <td>Status</td>
                <td><?php echo $prestasi['status'];?></td>
              </tr>

              <tr>
                <td>Lampiarn</td>
                <td><?php echo anchor(base_url().'uploads/prestasi/'.$prestasi['lampiran'],'<i class="fa fa-file fa fa-red"></i>','class="btn btn-sm btn-success tooltips" data-placement="top" data-original-title="Files Berkas"');?>
                  </td>
              </tr>
            </table>
          </div>         
        </div>
        <?php
        }else{
        ?>  
        <div class="panel-body">
          <div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered">
              <tr>
                <td>Jenis Kompetisi</td>
                <td><?php echo $kompetisi['jenis_prestasi'];?></td>
              </td>

              <tr>
                <td>Nama Jabatan</td>
                <td><?php echo $prestasi['nama_jabatan'];?></td>
              </td>

              <tr>
                <td>Nama Organisasi</td>
                <td><?php echo $prestasi['nama_organisasi'];?></td>
              </td>

              <tr>
                <td>Nama Institusi</td>
                <td><?php echo $prestasi['nama_institusi'];?></td>
              </tr>

              <tr>
                <td>Ketua Organisasi</td>
                <td><?php echo $prestasi['ketua_organisasi'];?></td>
              </tr>

              <tr>
                <td>Waktu Jabatan</td>
                <td><?php echo $prestasi['waktu_jabatan'];?></td>
              </tr>

              <tr>
                <td>Lokasi</td>
                <td><?php echo $prestasi['lokasi'];?></td>
              </tr>

              <tr>
                <td>URL</td>
                <td><?php echo $prestasi['url'];?></td>
              </tr>

              <tr>
                <td>Keterangan</td>
                <td><?php echo $prestasi['keterangan'];?></td>
              </tr>

              <tr>
                <td>Status Verifikasi</td>
                <td><?php echo $prestasi['status'];?></td>
              </tr>

              <tr>
                <td>Lampiarn</td>
                <td><?php echo anchor(base_url().'uploads/prestasi/'.$prestasi['lampiran'],'<i class="fa fa-file fa fa-red"></i>','class="btn btn-sm btn-success tooltips" data-placement="top" data-original-title="Files Berkas"');?>
                  </td>
              </tr>
            </table>
          </div>         
        </div>
        <?php
        }
        ?>
    </div>
</div>