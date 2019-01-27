<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2>Tahun Ajar Universitas Amikom Yogyakarta</h2>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#create"><i class="fa fa-pencil"></i> Tambah Data Tahun Ajar</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajar</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($ta as $t):
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $t->tahun ?></td>
                            <td><?php echo $t->deskripsi ?></td>
                            <td>
                                <?php 
                                    if($t->status=="tdk_aktif") echo "Tidak Aktif";
                                    else echo "Berjalan";
                                ?>
                            </td>
                            <td>
                                <a type="button" class="btn bg-yellow" data-toggle="modal" data-target="#edit<?php echo $t->id_ta?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $t->id_ta?>"><i class="fa fa-trash"></i> Hapus Data</a>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Input Tahun Ajaran</h4>
            </div>
            <form action="<?php echo base_url('tambah_ta')?>" method="post">
                <div class="modal-body">   
                    <div class="form-group">
                        <label for="varchar">Tahun Ajar : </label>
                        <input type="text" class="form-control" name="th" id="th" placeholder="Tahun Ajar, misal : 2018/2019" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Deskripsi : </label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Masukan keterangan tambahan"/>
                    </div>

                    <div class="form-group">
                        <label for="varchar">Status : </label>
                        <select class="form-control" name="stts" id="stts">
                            <option value="">Pilih Status</option>
                            <option value="berjalan">Berjalan</option>
                            <option value="tdk_aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</a>
                    <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    foreach($ta as $t){
        $id = $t->id_ta;
        $th=$t->tahun;
        $des=$t->deskripsi;
        $stts=$t->status;
?>

<div class="modal fade" id="edit<?php echo $id?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Edit Tahun Ajaran</h4>
            </div>
            <form action="<?php echo base_url('simpan_ta')?>" method="post">
                <div class="modal-body">   
                    <div class="form-group">
                        <label for="varchar">Tahun Ajar : </label>
                        <input type="text" class="form-control" name="th" id="th" placeholder="Tahun Ajar" value="<?php echo $th; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Deskripsi : </label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Masukan gambaran materi mata kuliah ini"><?php echo $des; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="varchar">Status : </label>
                        <select class="form-control" name="stts" id="stts">
                            <option value="">Pilih Status</option>
                            <option value="berjalan" <?php if($stts=="berjalan") echo "selected";?>>Berjalan</option>
                            <option value="tdk_aktif" <?php if($stts=="tdk_aktif") echo "selected";?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <input type="hidden" name="id_" value="<?php echo $id?>" /> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</a>
                    <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus<?php echo $id?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tunggu !</h4>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus data tahun ajaran <?php echo $th ?> ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('hapus_ta/'.$id); ?>"  type="button" class="btn btn-danger">Ya, Hapus</a>
                <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- gagal coba ajax modal show different page -->
<!-- <script>
    $(document).ready(function(e){
        $('#tambahTA').click(function(){
            $.post('<?php //echo site_url('modal')?>'){
                $('#create').modal('show');
            }
        )}
    });
</script> -->