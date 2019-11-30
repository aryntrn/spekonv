
<?php

    $irdata=array(
    1=>0.00,
    2=>0.00,
    3=>0.58,
    4=>0.90,
    5=>1.12,
    6=>1.24,
    7=>1.32,
    8=>1.41,
    9=>1.45,
    10=>1.49,
    11=>1.51,
    12=>1.48,
    13=>1.56,
    14=>1.57,
    15=>1.59,
    );

    $ir=0.00;
    foreach($irdata as $irk=>$irv)
    {
        if($irk==$jumlah)
        {
            $ir=$irv;
        }
    }
?>
<script>
    window.addEventListener('DOMContentLoaded', function(){
        var jml_ratings = parseFloat(<?=$jumlah?>);
        if(jml_ratings <= 2){
            $("#konsistensi_ratings").hide();
            $("#warning").show();
        }else{
            $("#detail_hitung").hide();
            hitung();
            $(".inputnumber").each(function(){
                $(this).change(function(){      
                    hitung();
                });
            });
        }

    });

    function show(){
        $("#detail_hitung").show();
    }

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
            setma();
            mhlm();
            lm();
            resume();
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
            $("#p-b"+i).val(totprio);     
            $("#pri-b"+i).val(totprio);     
            $("#wt-"+i).val(totprio);     
        }
    }

    function setma(){
        for(i=1;i<=<?=$jumlah;?>;i++){
            var jml=0;
            for(j=1;j<=<?=$jumlah;?>;j++){
                var ma=$("#b"+i+"k"+j).val();
                $("#a-b"+i+"k"+j).val(ma);
            }
        }
    }

    function mhlm()
    {   
        for(i=1;i<=<?=$jumlah;?>;i++){
            var jml=0;
            for(j=1;j<=<?=$jumlah;?>;j++){
                var prio=$("#wt-"+j).val();
                var nilai=$("#a-b"+i+"k"+j).val();
                var rumus=parseFloat(nilai)*parseFloat(prio);
                var fx=rumus;
                jml+=parseFloat(fx);
                
            }
            $("#awt-"+i).val(jml);
        }
    }

    function lm(){
        var sum=0;
        for(i=1;i<=<?=$jumlah;?>;i++)
        {   
            var wt=$("#wt-"+i).val();
            var awt=$("#awt-"+i).val();
            var rumus=parseFloat(awt)/parseFloat(wt);
            var fx=rumus;
            sum += parseFloat(fx);
        }   
        var lmax = parseFloat(sum)/3;
        $("#lmax").val(lmax);
    }

    function resume()
    {
        var total=0;
        
        var lm=$("#lmax").val();
        $("#lm").val(lm);

        var rumus_ci= (parseFloat(lm)-parseFloat(<?=$jumlah;?>))/(parseFloat(<?=$jumlah;?>)-1);
        var ci=rumus_ci;
        $("#ci").val(ci);

        var rumus_cr=parseFloat(ci)/parseFloat(<?=$ir;?>);
        var cr=rumus_cr;
        $("#cr").val(cr);

        if(cr < 0.1){
            $("#kesimpulan").val("konsisten");
            $("#p1").text("Konsisten...");
        }else{
            $("#kesimpulan").val("tidak konsisten");
            $("#p1").text("Tidak Konsisten!");
        }
       
    }
</script>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h2>Ratings (Kriteria <?php echo $nama;?>)</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ketentuan Ratings</th>
                            <th>Jenis</th>
                            <th>Aturan</th>
                            <th>Priorities</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $start = 0;
                            foreach ($ratings as $r):
                        ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $r->nama_ratings ?></td>
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
                            <td><?php echo $r->priorities_ratings ?></td>
                            <!-- <td>
                                <a type="button" class="btn bg-yellow" data-toggle="modal" data-target="#edit<?php echo $r->id_ratings?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $r->id_ratings?>"><i class="fa fa-trash"></i> Hapus Data</a>
                            </td> -->
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
                <h3>2.Nilai Prioritas Ratings (Kriteria <?php echo $nama;?>)</h3>
            </div>

            <div id="warning" class="box-body" hidden="true"><h4><b><center>Tidak bisa menghitung pairwise comparison karena jumlah data kurang.. pairwise comparison dapat dilakukan jika tersedia minimal 3 data ratings. <br> silakan tambah data ratings !</center></b></h4></div>

            <div id="konsistensi_ratings">
            <!-- matriks inputan kriteria utama -->
            <div class="box-body">
                <form action="<?php echo base_url('simpan_ratings/'.$idk)?>" method="post">
                    <?php $jumlah ; ?>
                    <table class="table table-bordered">
                        <thead>
                            <th>Kriteria</th>
                            <?php
                                foreach ($ratings as $k) {
                                    echo '<th>'.$k->nama_ratings.'</th>';
                                }
                            ?>
                        </thead>
                        
                        <tbody>
                            <?php
                                $baris=0;

                                foreach($ratings as $k2)
                                {
                                    $baris+=1;
                                    echo '<tr>';
                                    echo '<td>'.$k2->nama_ratings.'</td>';
                                    $dari=$k2->id_ratings;
                                    echo '<input type="hidden" name="dari'.$baris.'" class="form-control" value="'.$dari.'" readonly="true"/>';
                                    $kolom=0;
                                    foreach($ratings as $k3){
                                        $kolom+=1;
                                        $tujuan=$k3->id_ratings;
                                        echo '<input type="hidden" name="ke'.$kolom.'" class="form-control" value="'.$tujuan.'" readonly="true"/>';
                                        if($baris==$kolom){
                                            echo '<td><input type="number" id="b'.$baris.'k'.$kolom.'" class = "form-control kolom'.$kolom.'" value="1" readonly="true"/></td>';
                                        }else if($baris>$kolom){
                                            echo '<td><input type="number" id="b'.$baris.'k'.$kolom.'" class = "form-control kolom'.$kolom.'" value="0" readonly="true"/></td>';
                                        }else{
                                            echo '<td><select name="input'.$baris.$kolom.'" id="b'.$baris.'k'.$kolom.'" data-target="b'.$kolom.'k'.$baris.'" data-kolom="'.$kolom.'" class="form-control inputnumber kolom'.$kolom.'">';

                                            for($skala=1;$skala<=9;$skala++){
                                                $nilai=ambil_nilai_ratings($dari,$tujuan);
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
                                    echo '<td><input type="hidden" id="p-b'.$baris.'" name="p-b'.$baris.'" class="form-control" readonly="true"/></td>';
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

                    <div class="pull-left"><h3 id="p1"/></div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Simpan Ratings</button>
                        <a href="javascript:;" onclick="show()" id="btn_htg" class="btn btn-success">Lihat Perhitungan</a>
                    </div>
                </form>
            </div>

            <div id="detail_hitung">
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
                                foreach ($ratings as $k) {
                                    echo '<th>'.$k->nama_ratings.'</th>';
                                }
                            ?>
                            <th>Jumlah</th>
                            <th>Prioritas</th>
                        </thead>
                        <tbody>
                            <?php
                                $baris2=0;
                                foreach($ratings as $k2){
                                    $baris2+=1;
                                    echo '<tr>';
                                    echo '<td>'.$k2->nama_ratings.'</td>';
                                    $kolom2=0;
                                    for($i=1;$i<=$jumlah;$i++){
                                        $kolom2+=1;
                                        echo '<td><input type="text" id="mn-b'.$baris2.'k'.$kolom2.'" class="form-control" value="0" readonly=""/></td>';
                                    }
                                    echo '<td><input type="text" class="form-control" id="jml-b'.$baris2.'" value="0" readonly=""/></td>';
                                    echo '<td><input type="text" class="form-control" id="pri-b'.$baris2.'" readonly=""/></td>';
                                    echo '</tr>';
                                }
                            ?>  
                        </tbody>
                    </table>
                <!-- </div> -->
            </div>

            <!-- lambdamax -->
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <th colspan="<?=$jumlah+4;?>" class="text-center">Hitung Lambda Max</th>
                    </thead>
                    <thead>
                        <th colspan="<?=$jumlah;?>" class="text-center">Matriks A</th>
                        <th width="10px"></th>
                        <th class="text-center">W[T]</th>
                        <th width="10px"></th>
                        <th class="text-center">A W[T]</th>
                    </thead>
                    <tbody>
                        <?php
                            $baris3=0;    
                            foreach($ratings as $k2) {
                                $baris3+=1;
                                $dari=$k2->id_ratings;
                                echo '<tr>';
                                    $kolom3=0;
                                    foreach($ratings as $k3) {
                                        $tujuan=$k3->id_ratings;
                                        $kolom3+=1;
                                        if($baris3<=$kolom3){
                                            $nilai=ambil_nilai_ratings($dari,$tujuan);
                                            echo '<td width="175px"><input type="text" id="a-b'.$baris3.'k'.$kolom3.'" data-target="a-b'.$kolom3.'k'.$baris3.'" class="form-control inputnumber a-b'.$baris3.'k'.$kolom3.'" value="'.$nilai.'" readonly=""/></td>';
                                        }else{
                                            echo '<td><input type="number" id="a-b'.$baris3.'k'.$kolom3.'" class="form-control a-b'.$baris3.'k'.$kolom3.'" value="0" readonly=""/></td>';
                                        }
                                    }
                                    echo '<td></td>';
                                    echo '<td><input type="text" class="form-control wt-'.$baris3.'" id="wt-'.$baris3.'" value="0" readonly=""/></td>';
                                    echo '<td></td>';   
                                    echo '<td><input type="text" class="form-control" id="awt-'.$baris3.'" value="0" readonly=""/></td>';
                                echo '</tr>';
                            }
                        ?>  
                        <tr>
                            <td colspan="6" align="right"><b>Lambda Max</b></td>
                            <td>
                                <input type="text" class="form-control" id="lmax" value="0" readonly=""/>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <!-- resume -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th colspan="<?=$jumlah+1;?>" class="text-center">Rasio Konsistensi</th>
                        </thead>
                        <thead>
                            <th>Variabel</th>
                            <th>Keterangan</th>
                            <th>Nilai</th>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td width="200px">n </td>
                                <td width="200px">jumlah kriteria </td>
                                <td> <input type="text" class="form-control" id="n" value="<?=$jumlah?>" readonly=""/> </td>
                            </tr>

                            <tr>
                                <td width="200px">lambda max</td>
                                <td width="200px"> </td>
                                <td> <input type="text" class="form-control" id="lm" value="0" readonly=""/> </td>
                            </tr>


                            <tr>
                                <td width="200px">CI </td>
                                <td width="200px">(lamda max - n) / (n-1) </td>
                                <td> <input type="text" class="form-control" id="ci" value="0" readonly=""/> </td>
                            </tr>


                            <tr>
                                <td width="200px">RI </td>
                                <td width="200px">tabel index random sesuai jumlah kriteria </td>
                                <td> <input type="text" class="form-control" id="ri" value="<?=$ir?>" readonly=""/> </td>
                            </tr>


                            <tr>
                                <td width="200px">CR </td>
                                <td width="200px">CI/RI </td>
                                <td> <input type="text" class="form-control" id="cr" value="0" readonly=""/> </td>
                            </tr>

                            <tr>
                                <td colspan="2" align="right"><b>Kesimpulan</b> </td>
                                <td>
                                    <input type="text" class="form-control" id="kesimpulan" value="0" readonly=""/> 
                                </td>
                            </tr>

                    </table>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>