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
        <h2 style="margin-top:0px">Kampus_asal <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Univ <?php echo form_error('nama_univ') ?></label>
            <input type="text" class="form-control" name="nama_univ" id="nama_univ" placeholder="Nama Univ" value="<?php echo $nama_univ; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Jurusan <?php echo form_error('nama_jurusan') ?></label>
            <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan" placeholder="Nama Jurusan" value="<?php echo $nama_jurusan; ?>" />
        </div>
	    <div class="form-group">
            <label for="year">Th Angkatan <?php echo form_error('th_angkatan') ?></label>
            <input type="text" class="form-control" name="th_angkatan" id="th_angkatan" placeholder="Th Angkatan" value="<?php echo $th_angkatan; ?>" />
        </div>
	    <input type="hidden" name="id_jurusan" value="<?php echo $id_jurusan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kampus_asal') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>