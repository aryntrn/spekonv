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
        <h2 style="margin-top:0px">Transkrip <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nim <?php echo form_error('nim') ?></label>
            <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim" value="<?php echo $nim; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jurusan <?php echo form_error('id_jurusan') ?></label>
            <input type="text" class="form-control" name="id_jurusan" id="id_jurusan" placeholder="Id Jurusan" value="<?php echo $id_jurusan; ?>" />
        </div>
	    <input type="hidden" name="id_transkrip" value="<?php echo $id_transkrip; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transkrip') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>