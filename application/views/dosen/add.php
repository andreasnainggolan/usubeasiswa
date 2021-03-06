<div class="col-sm-12">
                        <!-- start: TEXT FIELDS PANEL -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-external-link-square"></i> Text Fields
                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                                    </a>
                                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-expand" href="#">
                                        <i class="fa fa-resize-full"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-close" href="#">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                            <?php echo form_open('dosen/addDosen','role="form" class="form-horizontal"');?>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            NIP
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nip" placeholder="Masukan NIP DOSEN" id="form-field-1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Nama Dosen
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama" placeholder="Masukan Nama Dosen" id="form-field-1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Jenis Kelamin
                                        </label>
                                        <div class="col-sm-9">
                                            <select name="jk" class='form-control'>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Alamat
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="alamat" placeholder="Masukan Alamat Dosen" id="form-field-1" class="form-control">
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Handphone
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="handphone" placeholder="Masukan Nomor Dosen" id="form-field-1" class="form-control">
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1"></label>
                                        <div class="col-sm-1">
                                            <button type="submbit" name="submit" class="btn btn-danger">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end: TEXT FIELDS PANEL -->
                    </div>