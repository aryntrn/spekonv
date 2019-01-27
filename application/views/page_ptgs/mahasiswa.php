<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2>Daftar Mahasiswa</h2>
                <a href="<?php //base_url('c_mahasiswa/create'); ?>"  type="button" class="btn btn-primary">Tambah Data Mahasiswa</a>
                <!-- <a href="<?php //echo base_url('c_mahasiswa/excel'); ?>"  type="button" class="btn btn-success">Export Data</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Asal Kampus D3</th>
                            <th>Nomor HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($mhs_data as $m){
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $m->nim ?></td>
                            <td><?php echo $m->nama ?></td>
                            <td><?php echo $m->nama_univ ?></td>
                            <td><?php echo $m->no_hp ?></td>
                            <td style="text-align:right" width="350px">
                                <?php echo anchor(site_url('transkrip/'.$m->nim),'<small class="btn bg-green"><i class="fa fa-search"></i> Detail Transkrip</small>'); 
                                echo ' '; 
                                ?>
                                <a type="button" class="btn bg-yellow" data-toggle="modal" data-target="#edit<?php echo $start ?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $start ?>"><i class="fa fa-trash"></i> Hapus Data</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    $start = 0;
    foreach ($mhs_data as $mhs){
        $no = ++$start;
        $id = $mhs->nim;
        $nm = $mhs->nama;
        $d3 = $mhs->id_jurusan_d3;
        $hp = $mhs->no_hp;
?>

<div class="modal fade" id="edit<?php echo $start?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Edit Tahun Ajaran</h4>
            </div>
            <div class="modal-body">
                <p>NIM : <?php echo $id ?></p>
                <form action="<?php echo base_url('ubah_mhs/'.$id); ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nm; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Id Jurusan D3 <?php echo form_error('id_jurusan_d3') ?></label>
                        <input type="text" class="form-control" name="d3" id="d3" placeholder="Id Jurusan D3" value="<?php echo $d3; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
                        <input type="text" class="form-control" name="hp" id="hp" placeholder="No Hp" value="<?php echo $hp; ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button> 
                        <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus<?php echo $start?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tunggu !</h4>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus data <?php echo $id ?> ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('hapus_mhs/'.$id); ?>"  type="button" class="btn btn-danger">Ya, Hapus</a>
                <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

<!-- 
<div class="modal fade" id="hapus<?php //echo $id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tunggu !</h4>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus data <?php //echo $id ?> ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?php //echo base_url('hapus_mhs/'.$id); ?>"  type="button" class="btn btn-danger">Ya, Hapus</a>
                <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit<?php //echo $id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Edit Data</h4>
            </div>
            <div class="modal-body">
                <p>NIM : <?php //echo $id ?></p>
                <form action="<?php //echo base_url('ubah_mhs/'.$id); ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Nama <?php //echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php //echo $nm; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Id Jurusan D3 <?php //echo form_error('id_jurusan_d3') ?></label>
                        <input type="text" class="form-control" name="d3" id="d3" placeholder="Id Jurusan D3" value="<?php //echo $d3; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">No Hp <?php //echo form_error('no_hp') ?></label>
                        <input type="text" class="form-control" name="hp" id="hp" placeholder="No Hp" value="<?php //echo $hp; ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button> 
                        <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<?php
    }
?>