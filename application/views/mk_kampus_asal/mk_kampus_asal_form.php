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
        <h2 style="margin-top:0px">Mk_kampus_asal <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Jurusan <?php echo form_error('id_jurusan') ?></label>
            <input type="text" class="form-control" name="id_jurusan" id="id_jurusan" placeholder="Id Jurusan" value="<?php echo $id_jurusan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Indo <?php echo form_error('nama_indo') ?></label>
            <input type="text" class="form-control" name="nama_indo" id="nama_indo" placeholder="Nama Indo" value="<?php echo $nama_indo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Inggris <?php echo form_error('nama_inggris') ?></label>
            <input type="text" class="form-control" name="nama_inggris" id="nama_inggris" placeholder="Nama Inggris" value="<?php echo $nama_inggris; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jml Sks <?php echo form_error('jml_sks') ?></label>
            <input type="text" class="form-control" name="jml_sks" id="jml_sks" placeholder="Jml Sks" value="<?php echo $jml_sks; ?>" />
        </div>
	    <input type="hidden" name="id_mk_asal" value="<?php echo $id_mk_asal; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mk_kampus_asal') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>