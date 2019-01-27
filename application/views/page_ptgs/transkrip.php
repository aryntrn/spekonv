<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2>Transkrip</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Sks</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($transkrip as $tr):
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $tr->nama_indo ?></td>
                            <td><?php echo $tr->jml_sks ?></td>
                            <td><?php echo $tr->nilai ?></td>
                            <td>
                                <a type="button" class="btn bg-yellow" data-toggle="modal" data-target="#edit<?php echo $tr->id_det_transkrip?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $tr->id_det_transkrip?>"><i class="fa fa-trash"></i> Hapus Data</a>
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