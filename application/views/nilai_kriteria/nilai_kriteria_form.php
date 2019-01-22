<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Nilai_kriteria <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Kriteria Asal <?php echo form_error('id_kriteria_asal') ?></label>
            <input type="text" class="form-control" name="id_kriteria_asal" id="id_kriteria_asal" placeholder="Id Kriteria Asal" value="<?php echo $id_kriteria_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kriteria Tujuan <?php echo form_error('id_kriteria_tujuan') ?></label>
            <input type="text" class="form-control" name="id_kriteria_tujuan" id="id_kriteria_tujuan" placeholder="Id Kriteria Tujuan" value="<?php echo $id_kriteria_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Nilai Prioritas Kriteria <?php echo form_error('nilai_prioritas_kriteria') ?></label>
            <input type="text" class="form-control" name="nilai_prioritas_kriteria" id="nilai_prioritas_kriteria" placeholder="Nilai Prioritas Kriteria" value="<?php echo $nilai_prioritas_kriteria; ?>" />
        </div>
	    <input type="hidden" name="id_nilai_kriteria" value="<?php echo $id_nilai_kriteria; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nilai_kriteria') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>