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
        <h2 style="margin-top:0px">Nilai_ratings <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Ratings Asal <?php echo form_error('id_ratings_asal') ?></label>
            <input type="text" class="form-control" name="id_ratings_asal" id="id_ratings_asal" placeholder="Id Ratings Asal" value="<?php echo $id_ratings_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Ratings Tujuan <?php echo form_error('id_ratings_tujuan') ?></label>
            <input type="text" class="form-control" name="id_ratings_tujuan" id="id_ratings_tujuan" placeholder="Id Ratings Tujuan" value="<?php echo $id_ratings_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Kepentingan Ratings <?php echo form_error('kepentingan_ratings') ?></label>
            <input type="text" class="form-control" name="kepentingan_ratings" id="kepentingan_ratings" placeholder="Kepentingan Ratings" value="<?php echo $kepentingan_ratings; ?>" />
        </div>
	    <input type="hidden" name="id_nilai_ratings" value="<?php echo $id_nilai_ratings; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nilai_ratings') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>