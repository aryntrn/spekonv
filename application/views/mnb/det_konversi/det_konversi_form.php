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
        <h2 style="margin-top:0px">Det_konversi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Konversi <?php echo form_error('id_konversi') ?></label>
            <input type="text" class="form-control" name="id_konversi" id="id_konversi" placeholder="Id Konversi" value="<?php echo $id_konversi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Sintesis <?php echo form_error('id_sintesis') ?></label>
            <input type="text" class="form-control" name="id_sintesis" id="id_sintesis" placeholder="Id Sintesis" value="<?php echo $id_sintesis; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Bobot Ahp <?php echo form_error('bobot_ahp') ?></label>
            <input type="text" class="form-control" name="bobot_ahp" id="bobot_ahp" placeholder="Bobot Ahp" value="<?php echo $bobot_ahp; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Dipilih <?php echo form_error('status_dipilih') ?></label>
            <input type="text" class="form-control" name="status_dipilih" id="status_dipilih" placeholder="Status Dipilih" value="<?php echo $status_dipilih; ?>" />
        </div>
	    <input type="hidden" name="id_det_konv" value="<?php echo $id_det_konv; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('det_konversi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>