<div class="page-header">
    <h1>
        Konfigurasi Petugas
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Tambah dan Edit petugas pada setiap ruangan puskesmas.
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-sm-4">
        <?php
            $name = $con->prepare('SELECT IDUSERS, USERNAME,FULLNAME FROM users_acc WHERE STATUS = 1');
            $name->execute();
            
        ?>
        <label for="form-field-select-1">Pilih Nama Petugas</label>
        <select name="username" id="username" class="form-control" size="10">
            <?php                                            
                echo "<option value='0'>Tambah Anggota</option>";                                            
                foreach($name as $rowname){
                    echo "<option value='".$rowname['IDUSERS']."'>".$rowname['FULLNAME']."</option>";
                }
            ?>                                          
        </select>
    </div>
    <div class="col-sm-8">
        <div id="InputInfo"></div>                
    </div>
</div><!-- /.row -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#username").change(function(){
            var username = $(this).find(":selected").val();
            // load it in the userInfo div above
            $("#InputInfo").load('konfigusershow.php',{iduser:username});
            //$('#adminform').hide('fast');
        });
    });
</script>