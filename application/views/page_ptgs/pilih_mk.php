<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <!-- <h4>Pilih Mata Kuliah</h4> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo base_url('hitkonv')?>" method="post">
                    <div class="col-xs-3">
                        Kampus D3 Asal : 
                    </div>
                    <div class="col-xs-6">
                        <select class="form-control" name="kampasal">
                            <option value="">--Pilih D3 Asal--</option>
                            <?php
                                foreach ($univ as $u) {
                                   echo '<option value="'.$u->id_jurusan.'">'.$u->nama_univ." - ".$u->th_angkatan.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <button type="submit" class="btn btn-primary">Lihat hasil perhitungan</button>
                    </div>
                </form>
            </div>

            <div class="box-body">
                <h4>HASIL AKHIR PERHITUNGAN</h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td rowspan="2">Nama Mata Kuliah</td>
                            <td rowspan="2">Alternatif</td>
                            <td colspan="3">Kriteria</td>
                            <td rowspan="2">Total Nilai</td>
                            <td rowspan="2">Rank</td>
                            <td rowspan="2">Aksi</td>
                        </tr>
                        <tr>
                            <td>Nama Mata Kuliah</td>
                            <td>Jumlah SKS</td>
                            <td>Kesesuaian RPS</td>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Prioritas</td>
                            <?php
                                foreach($prio as $p){
                                    echo '<td>'.$p->priorities_kriteria.'</td>';
                                }
                            ?>
                            
                        </tr>

                        <!-- perulangan -->
                        <?php
                            $rank=0;
                            foreach ($konv as $k) {
                                $rank+=1;
                                echo '<tr>';
                                    if($rank==1){echo '<td>'.$k->nama.'</td>';}else{echo '<td></td>';}
                                    
                                    echo '<td>'.$k->nama_indo.'</td>';
                                    foreach($prio as $p){
                                        echo '<td>'.prio_ratings($k->id_mk_amikom,$k->id_mk_asal,$p->id_kriteria).'</td>';
                                    }
                                    
                                    echo '<td>'.get_tothit($k->id_mk_amikom,$k->id_mk_asal).'</td>';
                                    echo '<td>'.$rank.'</td>';
                                    if($k->status=="dipilih"){
                                        echo '<td>dipilih</td>';
                                    }else{
                                        echo '<td><input type="hidden" value="'.$k->id_phtg.'"/><a href="'.base_url('pmk/').$k->id_phtg.'" type="button" class="btn btn-success">pilih</a></td>';
                                    }
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>