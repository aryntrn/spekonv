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
        <h2 style="margin-top:0px">Ratings List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('ratings/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('ratings/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ratings'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kriteria</th>
		<th>Nama</th>
		<th>Jenis Param</th>
		<th>Param Angka</th>
		<th>Batas Min</th>
		<th>Batas Max</th>
		<th>Priorities Ratings</th>
		<th>Action</th>
            </tr><?php
            foreach ($ratings_data as $ratings)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $ratings->id_kriteria ?></td>
			<td><?php echo $ratings->nama ?></td>
			<td><?php echo $ratings->jenis_param ?></td>
			<td><?php echo $ratings->param_angka ?></td>
			<td><?php echo $ratings->batas_min ?></td>
			<td><?php echo $ratings->batas_max ?></td>
			<td><?php echo $ratings->priorities_ratings ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('ratings/read/'.$ratings->id_ratings),'Read'); 
				echo ' | '; 
				echo anchor(site_url('ratings/update/'.$ratings->id_ratings),'Update'); 
				echo ' | '; 
				echo anchor(site_url('ratings/delete/'.$ratings->id_ratings),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>