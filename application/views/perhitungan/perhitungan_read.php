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
        <h2 style="margin-top:0px">Perhitungan Read</h2>
        <table class="table">
	    <tr><td>Id Mk Amikom</td><td><?php echo $id_mk_amikom; ?></td></tr>
	    <tr><td>Id Mk Asal</td><td><?php echo $id_mk_asal; ?></td></tr>
	    <tr><td>Total Hitung Ahp</td><td><?php echo $total_hitung_ahp; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('perhitungan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>