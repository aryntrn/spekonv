<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2>Acc Hasil Konversi Mata Kuliah</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mata Kuliah Amikom</th>
                            <th>Nama Mata Kuliah D3</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($konversi as $konv):
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $konv->amikom ?></td>
                            <td><?php echo $konv->asal ?></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
                <?php if($acc_mhs=="blm_acc"){?>
                    <center>
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#acc">Setujui Hasil Konversi</a>
                    </center>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="acc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Peringatan!</h4>
            </div>
            <form action="<?php echo base_url('acc')?>" method="post">
                <div class="modal-body">   
                    <h4><b>Hasil konversi yang telah disetujui tidak dapat diubah lagi.</b></h4>
                    <p>Apakah anda yakin akan menyetujui hasil konversi ini? </p>
                    <input type="hidden" name="id" value="<?php echo $id?>" /> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Setujui</a>
                    <button type="button" class="btn btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>