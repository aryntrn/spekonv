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
        <h2 style="margin-top:0px">Kampus_asal Read</h2>
        <table class="table">
	    <tr><td>Nama Univ</td><td><?php echo $nama_univ; ?></td></tr>
	    <tr><td>Nama Jurusan</td><td><?php echo $nama_jurusan; ?></td></tr>
	    <tr><td>Th Angkatan</td><td><?php echo $th_angkatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kampus_asal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>