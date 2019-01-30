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
        <h2 style="margin-top:0px">Mk_kampus_asal Read</h2>
        <table class="table">
	    <tr><td>Id Jurusan</td><td><?php echo $id_jurusan; ?></td></tr>
	    <tr><td>Nama Indo</td><td><?php echo $nama_indo; ?></td></tr>
	    <tr><td>Nama Inggris</td><td><?php echo $nama_inggris; ?></td></tr>
	    <tr><td>Jml Sks</td><td><?php echo $jml_sks; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mk_kampus_asal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>