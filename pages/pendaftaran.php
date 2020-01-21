
<?php
    include('../exe/dbconnect.php');
    $namepasien = $con->prepare('SELECT id, nama FROM pasien');
    $namepasien->execute();
    $rowpas = $namepasien->fetchAll();
?>
<div class="row">        
    <div class="col-lg-4">
        
        <label for="form-field-select-1">Pilih Nama Pasien</label>
        <select name="username" id="username" class="form-control" size="10">
            <?php                                            
                echo "<option value='0'>TAMBAH PASIEN BARU</option>";                                            
                foreach($rowpas as $rowpasien){
                    echo "<option value='".$rowpasien['id']."'>".$rowpasien['nama']."</option>";
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
            $("#InputInfo").load('pendaftaranshow.php',{iduser:username});
            //$('#adminform').hide('fast');
        });
    });
</script>
