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
        <h2 style="margin-top:0px">Det_transkrip <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Transkrip <?php echo form_error('id_transkrip') ?></label>
            <input type="text" class="form-control" name="id_transkrip" id="id_transkrip" placeholder="Id Transkrip" value="<?php echo $id_transkrip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Mk Asal <?php echo form_error('id_mk_asal') ?></label>
            <input type="text" class="form-control" name="id_mk_asal" id="id_mk_asal" placeholder="Id Mk Asal" value="<?php echo $id_mk_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="rps">Rps <?php echo form_error('rps') ?></label>
            <textarea class="form-control" rows="3" name="rps" id="rps" placeholder="Rps"><?php echo $rps; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="enum">Nilai <?php echo form_error('nilai') ?></label>
            <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
        </div>
	    <input type="hidden" name="id_det_transkrip" value="<?php echo $id_det_transkrip; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('det_transkrip') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>