<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> DATA DOSEN
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>

                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
        <div id="table2">
          <div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Dosen</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Handphone</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Dosen</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Handphone</th>
                  <th></th>
                </tr>
              </tfoot>              
              <tbody>
              <?php
              $no = 1;
              foreach($dosen as $d){
              ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $d->nip;?></td>
                <td><?php echo $d->nama_dosen;?></td>
                <td><?php 
                if($d->jk == 'L')
                  echo "Laki-Laki";
                else
                  echo "Perempuan";
                ;?>
                </td>
                <td><?php echo $d->alamat;?></td>
                <td><?php echo $d->no_hp;?></td>
                <td>
                <?php echo anchor('dosen/editDosen/'.$d->nip,'<i class="fa fa-edit fa fa-red"></i>','class="btn btn-sm btn-success tooltips" data-placement="top" data-original-title="Edit Data"').' '.anchor('dosen/deleteDosen/'.$d->nip,'<i class="fa fa-times fa fa-red"></i>','class="btn btn-sm btn-success tooltips" data-placement="top" data-original-title="Hapus Data"');
              ?></td>

              </tr>
              <?php
              $no++;
              }
              ?>
              </tbody>
            </table>  
          </div>         
        </div>   
        </div>
    </div>
</div>



