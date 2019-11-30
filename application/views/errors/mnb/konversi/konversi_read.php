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
        <h2 style="margin-top:0px">Konversi Read</h2>
        <table class="table">
	    <tr><td>Nim</td><td><?php echo $nim; ?></td></tr>
	    <tr><td>Total Sks</td><td><?php echo $total_sks; ?></td></tr>
	    <tr><td>Ipk</td><td><?php echo $ipk; ?></td></tr>
	    <tr><td>Status Acc Mhs</td><td><?php echo $status_acc_mhs; ?></td></tr>
	    <tr><td>Status Acc Petugas</td><td><?php echo $status_acc_petugas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('konversi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>