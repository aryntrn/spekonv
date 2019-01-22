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
        <h2 style="margin-top:0px">Parameter Read</h2>
        <table class="table">
	    <tr><td>Id Kriteria</td><td><?php echo $id_kriteria; ?></td></tr>
	    <tr><td>Nama Param</td><td><?php echo $nama_param; ?></td></tr>
	    <tr><td>Jenis Param</td><td><?php echo $jenis_param; ?></td></tr>
	    <tr><td>Param Angka</td><td><?php echo $param_angka; ?></td></tr>
	    <tr><td>Batas Min</td><td><?php echo $batas_min; ?></td></tr>
	    <tr><td>Batas Max</td><td><?php echo $batas_max; ?></td></tr>
	    <tr><td>Nilai Skala Ahp</td><td><?php echo $nilai_skala_ahp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('parameter') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>