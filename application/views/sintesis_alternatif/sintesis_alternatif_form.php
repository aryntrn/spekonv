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
        <h2 style="margin-top:0px">Sintesis_alternatif <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Mk Amikom <?php echo form_error('id_mk_amikom') ?></label>
            <input type="text" class="form-control" name="id_mk_amikom" id="id_mk_amikom" placeholder="Id Mk Amikom" value="<?php echo $id_mk_amikom; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Mk Asal <?php echo form_error('id_mk_asal') ?></label>
            <input type="text" class="form-control" name="id_mk_asal" id="id_mk_asal" placeholder="Id Mk Asal" value="<?php echo $id_mk_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nilai Asli <?php echo form_error('nilai_asli') ?></label>
            <input type="text" class="form-control" name="nilai_asli" id="nilai_asli" placeholder="Nilai Asli" value="<?php echo $nilai_asli; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Rules <?php echo form_error('id_rules') ?></label>
            <input type="text" class="form-control" name="id_rules" id="id_rules" placeholder="Id Rules" value="<?php echo $id_rules; ?>" />
        </div>
	    <input type="hidden" name="id_sintesis" value="<?php echo $id_sintesis; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sintesis_alternatif') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>