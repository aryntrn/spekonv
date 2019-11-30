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
        <h2 style="margin-top:0px">Nilai_ratings Read</h2>
        <table class="table">
	    <tr><td>Id Ratings Asal</td><td><?php echo $id_ratings_asal; ?></td></tr>
	    <tr><td>Id Ratings Tujuan</td><td><?php echo $id_ratings_tujuan; ?></td></tr>
	    <tr><td>Kepentingan Ratings</td><td><?php echo $kepentingan_ratings; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nilai_ratings') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>