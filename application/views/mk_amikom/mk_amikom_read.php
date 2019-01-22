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
        <h2 style="margin-top:0px">Mk_amikom Read</h2>
        <table class="table">
	    <tr><td>Id Ta</td><td><?php echo $id_ta; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Jml Sks</td><td><?php echo $jml_sks; ?></td></tr>
	    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
	    <tr><td>Rps</td><td><?php echo $rps; ?></td></tr>
	    <tr><td>Prasyarat</td><td><?php echo $prasyarat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mk_amikom') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>