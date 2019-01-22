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
        <h2 style="margin-top:0px">Parameter <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Kriteria <?php echo form_error('id_kriteria') ?></label>
            <input type="text" class="form-control" name="id_kriteria" id="id_kriteria" placeholder="Id Kriteria" value="<?php echo $id_kriteria; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Param <?php echo form_error('nama_param') ?></label>
            <input type="text" class="form-control" name="nama_param" id="nama_param" placeholder="Nama Param" value="<?php echo $nama_param; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Param <?php echo form_error('jenis_param') ?></label>
            <input type="text" class="form-control" name="jenis_param" id="jenis_param" placeholder="Jenis Param" value="<?php echo $jenis_param; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Param Angka <?php echo form_error('param_angka') ?></label>
            <input type="text" class="form-control" name="param_angka" id="param_angka" placeholder="Param Angka" value="<?php echo $param_angka; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Batas Min <?php echo form_error('batas_min') ?></label>
            <input type="text" class="form-control" name="batas_min" id="batas_min" placeholder="Batas Min" value="<?php echo $batas_min; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Batas Max <?php echo form_error('batas_max') ?></label>
            <input type="text" class="form-control" name="batas_max" id="batas_max" placeholder="Batas Max" value="<?php echo $batas_max; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Nilai Skala Ahp <?php echo form_error('nilai_skala_ahp') ?></label>
            <input type="text" class="form-control" name="nilai_skala_ahp" id="nilai_skala_ahp" placeholder="Nilai Skala Ahp" value="<?php echo $nilai_skala_ahp; ?>" />
        </div>
	    <input type="hidden" name="id_rules" value="<?php echo $id_rules; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('parameter') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>