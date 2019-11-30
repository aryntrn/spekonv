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
        <h2 style="margin-top:0px">Nilai_kriteria Read</h2>
        <table class="table">
	    <tr><td>Id Kriteria Asal</td><td><?php echo $id_kriteria_asal; ?></td></tr>
	    <tr><td>Id Kriteria Tujuan</td><td><?php echo $id_kriteria_tujuan; ?></td></tr>
	    <tr><td>Nilai Prioritas Kriteria</td><td><?php echo $nilai_prioritas_kriteria; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nilai_kriteria') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>