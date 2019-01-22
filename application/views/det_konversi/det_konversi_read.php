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
        <h2 style="margin-top:0px">Det_konversi Read</h2>
        <table class="table">
	    <tr><td>Id Konversi</td><td><?php echo $id_konversi; ?></td></tr>
	    <tr><td>Id Sintesis</td><td><?php echo $id_sintesis; ?></td></tr>
	    <tr><td>Bobot Ahp</td><td><?php echo $bobot_ahp; ?></td></tr>
	    <tr><td>Status Dipilih</td><td><?php echo $status_dipilih; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('det_konversi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>