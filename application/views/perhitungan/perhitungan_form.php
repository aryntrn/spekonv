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
        <h2 style="margin-top:0px">Perhitungan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Mk Amikom <?php echo form_error('id_mk_amikom') ?></label>
            <input type="text" class="form-control" name="id_mk_amikom" id="id_mk_amikom" placeholder="Id Mk Amikom" value="<?php echo $id_mk_amikom; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Mk Asal <?php echo form_error('id_mk_asal') ?></label>
            <input type="text" class="form-control" name="id_mk_asal" id="id_mk_asal" placeholder="Id Mk Asal" value="<?php echo $id_mk_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Total Hitung Ahp <?php echo form_error('total_hitung_ahp') ?></label>
            <input type="text" class="form-control" name="total_hitung_ahp" id="total_hitung_ahp" placeholder="Total Hitung Ahp" value="<?php echo $total_hitung_ahp; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_phtg" value="<?php echo $id_phtg; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('perhitungan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>