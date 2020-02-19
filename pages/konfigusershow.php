<style type="text/css">
#reloader {
    display:none;
}
</style>
<?php
include('../exe/dbconnect.php');
$idnik = $_POST['iduser'];
// echo $idnik;
$queryuser = $con->prepare("SELECT * FROM users_acc WHERE IDUSERS = '".$idnik."'");
$queryuser->execute();
$row=$queryuser->fetch();

$userakses = array(
    '1' => "ADMINISTRATOR",
    '2' => "PENDAFTARAN",
    '3' => "UMUM",
    '4' => "LANSIA",
    '5' => "GIGI",
    '6' => "MTBS",
    '7' => "KIA",
    '8' => "APOTIK",
    '9' => "LABORATURIUM",
    '10' => "KASIR",
    '11' => "ANAMNESIA",

);


if ($idnik==0) {
?>
<div class="widget-box widget-color-dark light-border">
    <div class="widget-header">
        <h5 class="widget-title">Tambah User Baru.</h5>
    </div>
    <div class="widget-body">
        <div class="widget-main">
        <form action="" id="formaddpetugas" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input name="action" id="action" value="0" type="hidden"></input>        
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-email" class=" form-control-label">Username</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="username" name="username" placeholder="Enter Username..." class="form-control">
                    <small class="form-text text-muted">Masukkan Username Tanpa Menggunakan Space.</small>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-email" class=" form-control-label">Nama Lengkap</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="fullname" name="fullname" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-email" class=" form-control-label">NIP / NIK</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nip" name="nip" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-email" class=" form-control-label">Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="email" id="email" name="email" class="form-control">
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-email" class=" form-control-label">Penugasan</label>
                </div>
                <div class="col-12 col-md-9">                
                    <select name="penugasan" id="penugasan" class="form-control">
                        <option value="0">Tidak Ada Akses</option>
                        <option value="1">Administrator</option>
                        <option value="2">Pendaftaran</option>
                        <option value="11">Anamnesa</option>                        
                        <option value="3">Poli Umum</option>
                        <option value="4">Poli Lansia</option>
                        <option value="5">Poli Gigi</option>
                        <option value="6">Poli MTBS</option>
                        <option value="7">Poli KAI</option>
                        <option value="8">Apotik</option>
                        <option value="9">Laboraturium</option>
                        <option value="10">Kasir</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-email" class=" form-control-label">Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="password" name="password" class="form-control">
                </div>
            </div>

            <div class="row form-group text-center">
                <button type="submit" name="submit" id="submit" class="btn btn-success btn-sm"><i class="ace-icon fa fa-check"></i> SUBMIT</button>            
            </div>
        </form>
        </div>
    </div>
</div>
<?php
} else {
?>
<div class="widget-box widget-color-blue light-border">
    <div class="widget-header">
        <h5 class="widget-title">Edit Nama <?=$row['FULLNAME']?>.</h5>
    </div>
    <div class="widget-body">
        <div class="widget-main">
            <form action="" id="formaddpetugas" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input name="action" id="action" value="<?=$row['IDUSERS']?>" type="hidden"></input>        
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Username</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="username" name="username" value="<?=$row['USERNAME']?>" class="form-control">
                        <small class="form-text text-muted">Masukkan Username Tanpa Menggunakan Space.</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Nama Lengkap</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="fullname" name="fullname" class="form-control" value="<?=$row['FULLNAME']?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">NIP / NIK</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nip" name="nip" class="form-control" value="<?=$row['NIP']?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email" name="email" class="form-control" value="<?=$row['EMAIL']?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Penugasan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <span><?=$userakses[$row['HAKACC']]?></span> 
                        <select name="penugasan" id="penugasan" class="form-control">
                            <option value="0">Ganti Hak Akses</option>
                            <option value="1">Administrator</option>
                            <option value="2">Pendaftaran</option>
                            <option value="11">Anamnesa</option>
                            <option value="3">Poli Umum</option>
                            <option value="4">Poli Lansia</option>
                            <option value="5">Poli Gigi</option>
                            <option value="6">Poli MTBS</option>
                            <option value="7">Poli KAI</option>
                            <option value="8">Apotik</option>
                            <option value="9">Laboraturium</option>
                            <option value="10">Kasir</option>
                        </select>
                    </div>
                </div>

                <!-- <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                </div> -->

                <div class="row form-group text-center">
                    <a href="#" class="btn btn-danger btn-sm delete" id_del='<?=$row['IDUSERS']?>'><i class="fa fa-trash"></i>  DELETE USER</a>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm"><i class="ace-icon fa fa-check"></i> UPDATE DATA</button>            
                    <button type="button" class="btn btn-success btn-sm" id="reloader" onclick="myReload()">RELOAD</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
}
?>
<script type="text/javascript">
    $(document).ready(function(){
      $("form#formaddpetugas").submit(function(event){    
        document.getElementById("submit").disabled='true';
        event.preventDefault();
        $.ajax({
          url: '../exe/procadminpetugas.php',
          type: 'POST',
          data: new FormData(this),
          async: true,
          cache: true,
          contentType: false,
          processData: false,
          success: function (status) {
            $("#loading").hide('slow');
            document.getElementById("submit").removeAttribute('disabled');        
            alertify.success(status);
            document.getElementById("submit").disabled = 'true';
            $("#submit").hide('slow');
            $("#reloader").show('slow'); 
          }
        });
        return false;
      });
    });

    $(function() {
        $(".delete").click(function(){
                var element = $(this) ;
                var app_id = element.attr("id_del"); 
                var info =  'iddel=' + app_id;                              
                if(confirm("APAKAH ANDA YAKIN AKAN MENGHAPUS USER TERSEBUT ?")){
                        $.ajax({
                                type: "POST",
                                url: "../exe/procadminpetugasdelete.php",
                                data: info,
                                success: function() {
                                    location.reload();
                                }
                        }); 
                }
                // location.reload();
                return false;
        });
    });
    function myReload() {
        location.reload();
    }
    
</script>

