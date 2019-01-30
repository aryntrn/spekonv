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
        <h2 style="margin-top:0px">Konversi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nim <?php echo form_error('nim') ?></label>
            <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim" value="<?php echo $nim; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Sks <?php echo form_error('total_sks') ?></label>
            <input type="text" class="form-control" name="total_sks" id="total_sks" placeholder="Total Sks" value="<?php echo $total_sks; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Ipk <?php echo form_error('ipk') ?></label>
            <input type="text" class="form-control" name="ipk" id="ipk" placeholder="Ipk" value="<?php echo $ipk; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Acc Mhs <?php echo form_error('status_acc_mhs') ?></label>
            <input type="text" class="form-control" name="status_acc_mhs" id="status_acc_mhs" placeholder="Status Acc Mhs" value="<?php echo $status_acc_mhs; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Acc Petugas <?php echo form_error('status_acc_petugas') ?></label>
            <input type="text" class="form-control" name="status_acc_petugas" id="status_acc_petugas" placeholder="Status Acc Petugas" value="<?php echo $status_acc_petugas; ?>" />
        </div>
	    <input type="hidden" name="id_konversi" value="<?php echo $id_konversi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('konversi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>