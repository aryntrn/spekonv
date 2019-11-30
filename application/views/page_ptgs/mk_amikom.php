<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2>Mata Kuliah TA : <?php echo $ta; ?></h2>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMk"><i class="fa fa-pencil"></i> Tambah Mata Kuliah Amikom</a>
                <a type="button" class="btn btn-success" data-toggle="modal" data-target="#importMk"><i class="fa fa-upload"></i> Import Mata Kuliah Amikom</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>SKS</th>
                            <th>Jenis</th>
                            <th>RPS</th>
                            <th>Prasyarat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($matkul as $mk):
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $mk->nama ?></td>
                            <td><?php echo $mk->jml_sks ?></td>
                            <td><?php echo $mk->jenis ?></td>
                            <td>
                                <?php 
                                    if($mk->rps==NULL) echo "<i>RPS belum diisi</i>";
                                    else echo $mk->rps;
                                ?>
                            </td>
                            <td><?php echo $mk->prasyarat ?></td>
                            
                            <td>
                                <a type="button" class="btn bg-yellow" data-toggle="modal" data-target="#edit<?php echo $start?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $start?>"><i class="fa fa-trash"></i> Hapus Data</a>
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

<div class="modal fade" id="tambahMk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Tambah Mata Kuliah Amikom</h4>
            </div>
            <form action="<?php echo base_url('tambah_mk')?>" method="post">
                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="varchar">Kode Mata Kuliah : </label>
                        <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukan kode mata kuliah, misal : SI001" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Nama Mata Kuliah : </label>
                        <input type="text" class="form-control" name="nm" id="nm" placeholder="Masukan nama mata kuliah" />
                    </div>
                    
                    <div class="form-group">
                        <label for="varchar">Jumlah SKS : </label>
                        <input type="number" class="form-control" name="sks" id="sks" placeholder="Masukan jumlah sks" />
                    </div>

                    <div class="form-group">
                        <label for="varchar">RPS : </label>
                        <textarea name="rps" class="form-control" rows="3" placeholder="Masukan gambaran materi mata kuliah ini"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="varchar">Jenis : </label>
                        <select class="form-control" name="jenis" id="jenis">
                            <option value="">Pilih Jenis</option>
                            <option value="wajib">Wajib</option>
                            <option value="pilihan">Pilihan</option>
                            <option value="konsentrasi">Konsentrasi</option>
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

<div class="modal fade" id="importMk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Import Mata Kuliah Amikom</h4>
            </div>
            <?= form_open_multipart(); ?>
                <div class="modal-body"> 
                    <input type="file" name="excel" />
                    <p class="help">* Gunakan file dengan extensi .xlsx</p>
                    <button type="submit" name="submit" value="upload">Upload... </button>
                </div>
            <?= form_close(); ?>
        </div>
    
</div>

<?php
    $start = 0;
    foreach($matkul as $mk){
        ++$start;
        $id_ = $mk->id_mk_amikom;
        $kode = $mk->kode_mk;
        $nama = $mk->nama;
        $sks = $mk->jml_sks;
        $jenis = $mk->jenis;
        $rps = $mk->rps;
?>

<div class="modal fade" id="edit<?php echo $start?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Edit Tahun Ajaran</h4>
            </div>
            <form action="<?php echo base_url('ubah_mk')?>" method="post">
                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="varchar">Kode Mata Kuliah : </label>
                        <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukan kode mata kuliah, misal : SI001" value="<?php echo $kode?>"/>
                    </div>

                    <div class="form-group">
                        <label for="varchar">Nama Mata Kuliah : </label>
                        <input type="text" class="form-control" name="nm" id="nm" placeholder="Masukan nama mata kuliah" value="<?php echo $nama?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="varchar">Jumlah SKS : </label>
                        <input type="number" class="form-control" name="sks" id="sks" placeholder="Masukan jumlah sks" value="<?php echo $sks?>"/>
                    </div>

                    <div class="form-group">
                        <label for="varchar">RPS : </label>
                        <textarea name="rps" class="form-control" rows="3" placeholder="Masukan gambaran materi mata kuliah ini"><?php echo $rps?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="varchar">Jenis : </label>
                        <select class="form-control" name="jenis" id="jenis">
                            <option value="">Pilih Jenis</option>
                            <option value="wajib" <?php if($jenis=="wajib") echo "selected";?>>Wajib</option>
                            <option value="pilihan" <?php if($jenis=="pilihan") echo "selected";?>>Pilihan</option>
                            <option value="konsentrasi" <?php if($jenis=="konsentrasi") echo "selected";?>>Konsentrasi</option>
                        </select>
                    </div>

                    <input type="hidden" name="id_" value="<?php echo $id_?>" /> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</a>
                    <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
            </form>
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
                <p>Yakin ingin menghapus data mata kuliah <?php echo $nama." (".$kode.")" ?> ini?</p>
                <!-- <input type="hidden" name="id_" value="<?php //echo $id_?>"/> -->
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('hapus_mk/'.$id_); ?>"  type="button" class="btn btn-danger">Ya, Hapus</a>
                <button type="button" class="btn btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

<?php } ?>