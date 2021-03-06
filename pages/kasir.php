
<?php
    include('../exe/dbconnect.php');
    $today = date("Y-m-d");
    $anamnesa = $con->prepare("SELECT pasienproses.id_proses as id_proses,pasienproses.nomor as nomor,pasienproses.keluhan_pasien as keluhan_pasien, pasienproses.id_pasien as id_pasien, detailproses.diagnosa as diagnosa, detailproses.tindakan as tindakan, detailproses.resep as resep, detailproses.status_kasir as kasir FROM pasienproses, detailproses WHERE pasienproses.status='4'  AND DATE_FORMAT(pasienproses.created_date, '%Y-%m-%d')='$today' AND pasienproses.id_proses = detailproses.pasienproses_id");
    $anamnesa->execute();
    $rowpas = $anamnesa->fetchAll();
?>
<div class="row">
    <div class="col-xs-12">
        <h3>Daftar Antrian <?=$hakakses?> <a href="#" id="id-btn-dialog1" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-warning"></i></a></h3>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Halaman Pengguna</h5>                
            </div>
            <div class="modal-body">
                <p>
                Tombol 
                <a href='' class='btn btn-xs btn-success'><i class='ace-icon fa fa-money bigger-120'></i> PAY</a>
                Untuk Proses Pembayaran Yang Di Lakukan Oleh Pasien.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        
        <table id="apoteker" class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th>No Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan Pasien</th>
                    <th>Diagnosa Dokter</th>
                    <th>Resep Dokter</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
            <?php                                           
                foreach($rowpas as $rowpasien){
                    $idpasien = $rowpasien['id_pasien'];
                    $resep = str_replace(";", " <input type='checkbox' class='form-check-input'><br>", $rowpasien['resep']);
                    $qpasien = $con->prepare("SELECT * FROM `pasien` WHERE id='$idpasien'");
                    $qpasien->execute();
                    $rownama = $qpasien->fetch();
                    echo "<tr>";
                        echo "<td>".sprintf("%03d",$rowpasien['nomor'])."</td>";
                        echo "<td>".$rownama['nama']."</td>";
                        echo "<td>".$rowpasien['keluhan_pasien']."</td>";
                        echo "<td>".$rowpasien['diagnosa']."</td>";
                        echo "<td>".$resep."</td>";
                        echo "<td>";
                            if($rowpasien['kasir']=="0")
                            {
                                echo "<div class='hidden-sm hidden-xs btn-group'>";
                                    echo "<a href='' class='btn btn-xs btn-primary PAY' id='pays' data-idP='".$rowpasien['id_proses']."'>";
                                        echo "<i class='ace-icon fa fa-money bigger-120'></i> PAY";
                                    echo "</a>";                                    
                                echo "</div>";
                            }
                            echo "<a href='../exe/printinvoice.php?id=".$rowpasien['id_proses']."' class='btn btn-xs btn-inverse' target='_blank'>";
                                echo "<i class='ace-icon fa fa-print bigger-120'></i> PRINT INVOICE";
                            echo "</a>";
                        echo "</td>";

                    echo "</tr>";
                }
            ?> 
            </tbody>
        </table>
    </div>        
    <div class="col-lg-4">
        
        
    </div>
    <div class="col-lg-8">
        <div id="InputInfo"></div>                
    </div>
</div>

<script type="text/javascript">
$(function() {
        $(".PAY").click(function(){
                var element = $(this) ;
                var app_id = element.attr("data-idP")
                var info = 'id=' + app_id;
                if(confirm("Pembayaran Telah Selesai, Silahkan Lakukan Proses Selanjutnya.")){
                        $.ajax({
                                type: "POST",
                                url: "../exe/procpayment.php",
                                data: info,
                                success: function() {
                                }
                        });
                                $(this).closest("tr").find("#pays").animate({ opacity: "hide" }, "fast");
                }
                return false;
        });
});  
</script>
