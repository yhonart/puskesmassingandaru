
<?php
    include('../exe/dbconnect.php');
    $anamnesa = $con->prepare("SELECT `id_proses`,`nomor`,`id_pasien`,`tujuan` FROM `pasienproses` WHERE `status`='1'");
    $anamnesa->execute();
    $rowpas = $anamnesa->fetchAll();
?>
<div class="row">        
    <div class="col-lg-4">
        
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
            $("#InputInfo").load('anamnesashow.php',{iduser:username});
            //$('#adminform').hide('fast');
        });
    });
</script>
