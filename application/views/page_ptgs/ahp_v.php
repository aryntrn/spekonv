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
        $("#detail_hitung").hide();
        hitung();
        $(".inputnumber").each(function(){
            $(this).change(function(){      
                hitung();
            });
        });

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
                <h3>1. Kriteria Utama</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kriteria</th>
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
                            <td>
                                <a type="button" class="btn btn-success" href="<?php echo site_url('ratings/'.$k->id_kriteria) ?>"><i class="fa fa-level-down"></i> Ratings Kriteria</a>
                                <!-- <a type="button" class="btn bg-yellow" data-toggle="modal" data-target="#edit<?php echo $k->id_kriteria?>"><i class="fa fa-pencil"></i> Edit Data</a>
                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php echo $k->id_kriteria?>"><i class="fa fa-trash"></i> Hapus Data</a> -->
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
                    <?php $jumlah ; ?>
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
                        <button type="submit" class="btn btn-primary">Simpan Kriteria</button>
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
                            foreach($kriteria as $k3) {
                                $baris3+=1;
                                echo '<tr>';
                                    $kolom3=0;
                                    for($i=1;$i<=$jumlah;$i++){
                                        $kolom3+=1;
                                        if($baris3<=$kolom3){
                                            $nilai=ambil_nilai_kriteria($baris3,$kolom3);
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
