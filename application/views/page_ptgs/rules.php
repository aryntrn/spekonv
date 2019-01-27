<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2>Aturan Parameter</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th>Jenis</th>
                            <th>Aturan</th>
                            <th>Nilai skala AHP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($rules as $r):
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $r->nama ?></td>
                            <td><?php echo $r->jenis_param ?></td>
                            <td>
                                <?php 
                                    if($r->jenis_param == 'text'){
                                        echo "kemiripan: ".$r->batas_min."% - ".$r->batas_max."%";
                                    }else{
                                        echo $r->param_angka;
                                    }
                                ?>
                            </td>
                            <td><?php echo $r->nilai_skala_ahp ?></td>
                            <td>
                                <a type="button" class="btn bg-yellow" data-toggle="modal" data-target="#edit<?php echo $r->id_rules?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $r->id_rules?>"><i class="fa fa-trash"></i> Hapus Data</a>
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