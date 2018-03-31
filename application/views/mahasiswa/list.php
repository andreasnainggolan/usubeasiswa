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
            <table style="text-align: center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Prestasi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Prestasi</th>
                </tr>
              </tfoot>              
              <tbody>
              <?php
              $no = 1;
              foreach($mhs->result() as $mahasiswa){
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $mahasiswa->nim;?></td>
                  <td><?php echo $mahasiswa->nama_mahasiswa;?></td>
                  <td><?php echo $mahasiswa->jurusan;?></td>
                  <td>
                  <?php 
                  if($mahasiswa->JK == 'L')
                    echo 'Laki-laki';
                  else
                    echo 'Perempuan';
                    ?></td>
                  <td><?php echo $mahasiswa->tempat_lahir;?></td>
                  <td><?php echo $mahasiswa->tanggal_lahir;?></td>
                  <td><?php echo $mahasiswa->alamat;?></td>
                  <td><?php echo anchor('mahasiswa/lihatprestasi/'.$mahasiswa->nim,'<i class="fa fa-eye"></i>','class="btn btn-sm btn-teal tooltips" data-placement="top" data-original-title="Lihat"');?>
                 </td>

                </tr>
              <?php
              $no++;
            }?>
              </table>
              </div>
            </table>
          </div>   
        </div>
    </div>
</div>