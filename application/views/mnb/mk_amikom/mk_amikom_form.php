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
        <h2 style="margin-top:0px">Mk_amikom <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Ta <?php echo form_error('id_ta') ?></label>
            <input type="text" class="form-control" name="id_ta" id="id_ta" placeholder="Id Ta" value="<?php echo $id_ta; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jml Sks <?php echo form_error('jml_sks') ?></label>
            <input type="text" class="form-control" name="jml_sks" id="jml_sks" placeholder="Jml Sks" value="<?php echo $jml_sks; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis <?php echo form_error('jenis') ?></label>
            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="rps">Rps <?php echo form_error('rps') ?></label>
            <textarea class="form-control" rows="3" name="rps" id="rps" placeholder="Rps"><?php echo $rps; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Prasyarat <?php echo form_error('prasyarat') ?></label>
            <input type="text" class="form-control" name="prasyarat" id="prasyarat" placeholder="Prasyarat" value="<?php echo $prasyarat; ?>" />
        </div>
	    <input type="hidden" name="id_mk_amikom" value="<?php echo $id_mk_amikom; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mk_amikom') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>