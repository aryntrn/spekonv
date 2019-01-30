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
        <h2 style="margin-top:0px">Det_transkrip Read</h2>
        <table class="table">
	    <tr><td>Id Transkrip</td><td><?php echo $id_transkrip; ?></td></tr>
	    <tr><td>Id Mk Asal</td><td><?php echo $id_mk_asal; ?></td></tr>
	    <tr><td>Rps</td><td><?php echo $rps; ?></td></tr>
	    <tr><td>Nilai</td><td><?php echo $nilai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('det_transkrip') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>