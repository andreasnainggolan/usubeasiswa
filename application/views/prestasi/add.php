<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> JENIS PRESTASI
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>

                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart('users/add','role="form" class="form-horizontal"');?>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        JENIS PRESTASI
                    </label>
                    <div class="col-sm-9">
                        <?php echo cmb_dinamis('id_prestasi','jenis_kompetisi','jenis_prestasi','id_prestasi','',"id='prestasi' onchange='loadData()'");?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> JENIS PRESTASI
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>

                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div id="table">

            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
$(document).ready(function(){ 
    loadData();
})
</script>

<script type='text/javascript'>
function loadData(){
    var prestasi = $("#prestasi").val();
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url();?>index.php/Prestasi/dataPrestasi',
        data:  'prestasi='+prestasi,
        success: function(html){
            $("#table").html(html);
        }
    })
}



</script>

