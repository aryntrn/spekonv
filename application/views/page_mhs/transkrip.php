<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2>Data RPS Mata Kuliah</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>RPS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($mk as $matkul):
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $matkul->nama?></td>
                            <td><?php echo $matkul->sks ?></td>
                            <td>
                                <?php 
                                    if($matkul->rps=='') echo "<i>RPS belum diisi<i>";
                                    else echo $matkul->rps;
                                ?>
                            </td>
                            <td>
                                <a type="button" class="btn bg-green" data-toggle="modal" data-target="#inputRps<?php echo $matkul->iddet?>">
                                    <i class="fa fa-pencil"></i>
                                    <?php 
                                        if($matkul->rps=='') echo "Isi RPS";
                                        else echo "Ubah RPS"; 
                                    ?>
                                </a>
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

<?php
    foreach($mk as $mkul){
        $id=$mkul->iddet;
        $nm=$mkul->nama;
        $rps=$mkul->rps;
?>

<div class="modal fade" id="inputRps<?php echo $id?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Input RPS</h4>
            </div>
            <form action="<?php echo base_url('save_rps')?>" method="post">
                <div class="modal-body">   
                    <p>Mata Kuliah : <?php echo $nm ; ?></p>
                    <textarea name="rps_input" class="form-control" rows="3" placeholder="Masukan gambaran materi mata kuliah ini"><?php echo $rps; ?></textarea>
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
<?php } ?>