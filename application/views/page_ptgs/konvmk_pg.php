<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h4>Pilih Mata Kuliah yang Dikonversi</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>D3 Asal</th>
                            <th>Jurusan</th>
                            <th>Tahun Angkatan</th>
                            <!-- <th>Status Kelengkapan</th>
                            <th>Status Pilih MK</th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($univ as $u){
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $u->nama_univ ?></td>
                            <td><?php echo $u->nama_jurusan ?></td>
                            <td><?php echo $u->th_angkatan ?></td>
                            <!-- <td><?php //echo "belum lengkap"?></td>
                            <td><?php //echo "0 %"?></td> -->
                            <td>
                                <!-- if(status_kelengkapan != null) {
                                <a type="button" class="btn bg-yellow" data-toggle="modal" data-target="#edit<?php //echo $start ?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php //echo $start ?>"><i class="fa fa-trash"></i> Hapus Data</a>

                                btn lihat & btn ubah
                                } else... -->

                                
                                <?php 
                                // if($start==2){
                                echo anchor(site_url('pmk/'.$u->id_jurusan),'<small class="btn bg-green"><i class="fa fa-check"></i> Pilih Mata Kuliah</small>'); 
                                // }
                                ?>
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