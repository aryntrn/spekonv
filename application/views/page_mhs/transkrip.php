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
                            foreach ($mk as $matkul){
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $matkul->nama ?></td>
                            <td><?php echo $matkul->sks ?></td>
                            <td>
                                <?php 
                                    if($matkul->rps=='') echo "<i>RPS belum diisi<i>";
                                    else echo $matkul->rps;
                                ?>
                            </td>
                            <td width="350px">
                                <!-- bedain nama button : Isi RPS (ijo) dan Ubah RPS (kuning) -->
                                <a type="button" class="btn bg-green" data-toggle="modal" data-target="#ubahrps"><i class="fa fa-pencil"></i> Isi RPS</a>
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

<div class="modal fade" id="ubahrps">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Input RPS</h4>
            </div>
            <div class="modal-body">
                <p>Mata Kuliah : <?php echo $matkul->nama ; ?></p>
                <!-- nama matkul blm dinamis. why? -->
                <textarea class="form-control" rows="3" placeholder="Masukan gambaran materi mata kuliah ini"></textarea>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('Mhs_c/update_rps'); ?>"  type="button" class="btn btn-danger">Simpan</a>
                <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>