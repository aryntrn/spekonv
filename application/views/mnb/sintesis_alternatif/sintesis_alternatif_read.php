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
        <h2 style="margin-top:0px">Sintesis_alternatif Read</h2>
        <table class="table">
	    <tr><td>Id Mk Amikom</td><td><?php echo $id_mk_amikom; ?></td></tr>
	    <tr><td>Id Mk Asal</td><td><?php echo $id_mk_asal; ?></td></tr>
	    <tr><td>Nilai Asli</td><td><?php echo $nilai_asli; ?></td></tr>
	    <tr><td>Id Rules</td><td><?php echo $id_rules; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sintesis_alternatif') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>