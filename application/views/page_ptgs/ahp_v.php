<script>
    function konfirmasiDulu(){
        alert("Selamat Datang Di Website Kami");
    }

    window.addEventListener('DOMContentLoaded', function(){
        hitung();
        $(".inputnumber").each(function(){
            $(this).change(function(){      
                hitung();
            });
        });
    });

    function hitung()
    {
        $(".inputnumber").each(function(){
                var dtarget=$(this).attr('data-target');
                var dkolom=$(this).attr('data-kolom');
                var jumlah=$(this).val();
                var rumus=1/parseFloat(jumlah);
                var fx=rumus;
                $("#"+dtarget).val(fx);
                total();            
                mnk();
                // mptb();
                // rk();
        }); 
    }

    function total()
    {
        for(i=1;i<=<?=$jumlah;?>;i++)
        {
            var sum=0;
            $(".kolom"+i).each(function(){
                sum+=parseFloat($(this).val());
            });
            var fx=sum;
            $("#total"+i).val(fx);
        }   
    }

    function mnk()
    {   
        for(i=1;i<=<?=$jumlah;?>;i++)
        {
            var jml=0;
            for(x=1;x<=<?=$jumlah;?>;x++)
            {           
                var vtarget=$("#b"+i+"k"+x).val();
                var vkolom=$("#total"+x).val();
                var rumus=parseFloat(vtarget)/parseFloat(vkolom);
                var fx=rumus;           
                jml+=parseFloat(rumus);
                $("#mn-b"+i+"k"+x).val(fx);                      
            }
            var jumlahmnk=jml;
            var prio=parseFloat(jml)/parseFloat(<?=$jumlah;?>);
            var totprio=prio;
            $("#jml-b"+i).val(jumlahmnk);
            $("#pri-b"+i).val(totprio);     
            
        }
    }

</script>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3>1. Kriteria Utama</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kriteria</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($kriteria as $k):
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $k->nama ?></td>
                            <td><?php echo $k->deskripsi ?></td>
                            <td>
                                <a type="button" class="btn bg-yellow" data-toggle="modal" data-target="#edit<?php echo $k->id_kriteria?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $k->id_kriteria?>"><i class="fa fa-trash"></i> Hapus Data</a>
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

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3>2.Nilai Prioritas Kriteria Utama</h3>
            </div>
            <!-- matriks inputan kriteria utama -->
            <div class="box-body">
                <form action="<?php echo base_url('simpan_kriteria')?>" method="post">
                    <?php $jumlah = 3; ?>
                    <table class="table table-bordered">
                        <thead>
                            <th>Kriteria</th>
                            <?php
                                foreach ($kriteria as $k) {
                                    echo '<th>'.$k->nama.'</th>';
                                }
                            ?>
                        </thead>
                        
                        <tbody>
                            <?php
                                $baris=0;

                                foreach($kriteria as $k2)
                                {
                                    $baris+=1;
                                    echo '<tr>';
                                    echo '<td>'.$k2->nama.'</td>';
                                    $kolom=0;
                                    for($i=1;$i<=$jumlah;$i++)
                                    {
                                        $kolom+=1;
                                        if($baris==$kolom){
                                            echo '<td><input type="number" id="b'.$baris.'k'.$kolom.'" class = "form-control kolom'.$kolom.'" value="1" readonly="true"/></td>';
                                        }else if($baris>$kolom){
                                            echo '<td><input type="number" id="b'.$baris.'k'.$kolom.'" class = "form-control kolom'.$kolom.'" value="0" readonly="true"/></td>';
                                        }else{
                                            echo '<td><select name="input'.$baris.$kolom.'" id="b'.$baris.'k'.$kolom.'" data-target="b'.$kolom.'k'.$baris.'" data-kolom="'.$kolom.'" class="form-control inputnumber kolom'.$kolom.'">';

                                            for($skala=1;$skala<=9;$skala++){
                                                $nilai=ambil_nilai_kriteria($baris,$kolom);
                                                $sl='';
                                                if($nilai==$skala)
                                                {
                                                    $sl='selected="selected"';
                                                }
                                                echo '<option value="'.$skala.'" '.$sl.'>'.$skala.'</option>';
                                            }
                                            echo '</select></td>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                            
                        </tbody>
                    
                        <tfoot>
                            <tr>
                                <td>Jumlah</td>
                                <?php
                                for($h=1;$h<=$jumlah;$h++)
                                {
                                ?>
                                <td><input type="text" id="total<?=$h;?>" class="form-control" value="0" title="total<?=$h;?>"  readonly=""/></td>
                                <?php
                                }
                                ?>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Simpan Kriteria</button>
                        <!-- <a href="javascript:;" onclick="hitung()" id="btn_htg" class="btn btn-success">Hitung</a> -->
                    </div>
                </form>
            </div>

            <!-- mnk -->            
            <div class="box-body">

                <!-- <div class="table-responsive"> -->
                    <table class="table table-bordered">
                        <thead>
                            <th colspan="6" class="text-center">Matrik Nilai Kriteria</th>
                        </thead>
                        <thead>
                            <th>Kriteria</th>
                            <?php
                                foreach ($kriteria as $k) {
                                    echo '<th>'.$k->nama.'</th>';
                                }
                            ?>
                            <th>Jumlah</th>
                            <th>Prioritas</th>
                        </thead>
                        <tbody>
                            <?php
                                $baris2=0;
                                foreach($kriteria as $k2){
                                    $baris2+=1;
                                    echo '<tr>';
                                    echo '<td>'.$k2->nama.'</td>';
                                    $kolom2=0;
                                    for($i=1;$i<=$jumlah;$i++){
                                        $kolom2+=1;
                                        echo '<td><input type="text" id="mn-b'.$baris2.'k'.$kolom2.'" class="form-control" value="0" readonly=""/></td>';
                                    }
                                    echo '<td><input type="text" class="form-control" id="jml-b'.$baris2.'" value="0" readonly=""/></td>';
                                    echo '<td><input type="text" class="form-control" id="pri-b'.$baris2.'" value="0" readonly=""/></td>';
                                    echo '</tr>';
                                }
                            ?>  
                        </tbody>
                    </table>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
