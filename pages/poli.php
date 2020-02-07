
<?php
    include('../exe/dbconnect.php');
    $today = date("Y-m-d");
    $anamnesa = $con->prepare("SELECT DATE_FORMAT(created_date, '%Y-%m-%d') AS datecreate, `id_proses`,`nomor`,`id_pasien`,`tujuan` FROM `pasienproses` WHERE `status`='2'  AND DATE_FORMAT(created_date, '%Y-%m-%d')='$today' AND tujuan='$hakakses'");
    $anamnesa->execute();
    $rowpas = $anamnesa->fetchAll();
?>
<div class="row">        
    <div class="col-lg-4">
        <h3>Daftar Paisen Poli <?=$hakakses?></h3>        
        <label for="form-field-select-1">Pilih Nama Pasien</label>
        <select name="username" id="username" class="form-control" size="10">
            <?php                                           
                foreach($rowpas as $rowpasien){
                    $idpasien = $rowpasien['id_pasien'];
                    $qpasien = $con->prepare("SELECT * FROM `pasien` WHERE id='$idpasien'");
                    $qpasien->execute();
                    $rownama = $qpasien->fetch();
                    echo "<option value='".$rowpasien['id_proses']."'>".sprintf("%03d",$rowpasien['nomor'])." | ".$rownama['nama']."</option>";
                }
            ?>                                          
        </select>
    </div>
    <div class="col-lg-8">
        <div id="InputInfo"></div>                
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#username").change(function(){
            var username = $(this).find(":selected").val();
            // load it in the userInfo div above
            $("#InputInfo").load('polishow.php',{iduser:username,hakakses:<?php echo $akses?>,drname:'<?php echo $fullname; ?>',nipdr:'<?php echo $nip; ?>'});
            //$('#adminform').hide('fast');
        });
    });
</script>
