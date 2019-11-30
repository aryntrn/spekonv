<!-- <?php $konv=array();?>
<script>
    window.addEventListener('DOMContentLoaded', function(){
        // $("#detail_konv").hide();
        $("#btnhit").click(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url();?>ptgs_c/hitung_konv", 
                data: {id: $("#kampasal").val()},
                dataType: "JSON",  
                cache:false,
                success: {
                    var response = .parseJSON(response);
                    $(function() {
                        $.each(response, function(i, item) {
                            var $tr = $('<tr>').append(
                                $('<td>').text(item.nama),
                                $('<td>').text(item.nama_indo),
                                $('<td>').text(item.total_hitung_ahp)
                            ); //.appendTo('#records_table');
                            console.log($tr.wrap('<p>').html());
                        });
                    });
                }
            });
        });
    });
    function show_konv(){
        $("#detail_konv").show();
    }
</script> -->
 
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h4><?php echo $univ->nama_univ." - ".$univ->th_angkatan; ?></h4>
            </div>
            <!-- /.box-header -->

            <div id="detail_konv" class="box-body">
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
                        <?php                        
                            $rank=0;
                            if (is_array($konv) || is_object($konv)){
                                foreach ($konv as $k) {
                                    $rank+=1;
                                    echo '<tr>';
                                        if($rank==1){echo '<td>'.$k['nama'].'</td>';}else{echo '<td></td>';}
                                        
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
                            }
                            
                        ?>
                    </tbody>
                </table> 
            </div> 
        </div>
    </div>
</div> 
