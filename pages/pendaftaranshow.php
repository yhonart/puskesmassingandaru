<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />
<script src="../assets/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/js/daterangepicker.min.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="../assets/js/jquery.maskedinput.min.js"></script>
<?php
include('../exe/dbconnect.php');

$idnik = $_POST['iduser'];
// echo $idnik;
$queryuser = $con->prepare("SELECT * FROM pasien WHERE id = '".$idnik."'");
$queryuser->execute();
$row=$queryuser->fetch();

if ($idnik==0) {
    function acak($panjang)
    {
        $karakter='1234567890';
        $string = '';
        for ($i=0; $i < $panjang; $i++) { 
            $pos = rand(0, strlen($karakter)-1);
            $string .= $karakter{$pos};
        }
        return $string;
    }

    $noreg = acak(4);
    $noreginput = "P".date("Ym").$noreg;
?>
<div class="widget-box widget-color-dark light-border">
    <div class="widget-header">
        <h5 class="widget-title">Tambah Pasien Baru.</h5>
    </div>
    <div class="widget-body">
        <div class="widget-main">
        <form action="" id="formadd" method="post" enctype="multipart/form-data" class="form-horizontal">        
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">No. Registration</label>
            </div>
            <div class="col-12 col-md-4">
                <input type="text" id="fnoreg" name="noreg" class="form-control" value="<?=$noreginput?>" readonly=""> 
            </div>
        </div>

        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Nama Lengkap</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="fullname" name="fullname" class="form-control" style="text-transform:uppercase" required=""> 
            </div>
        </div>

        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Tempat, Tgl. lahir</label>
            </div>
            <div class="col-12 col-md-5">
                <input type="text" id="tempatlahir" name="tempatlahir" class="form-control" style="text-transform:uppercase" placeholder="Kota Lahir">
            </div>
            <div class="col-12 col-md-4">
                <input class="form-control date-picker" id="tgllahir" name="tgllahir" type="text" data-date-format="yyyy-mm-dd" autocomplete="off"/>
                <!-- <input type="text" id="tgllahir" name="tgllahir" class="form-control input-mask-date" > -->
            </div>
        </div>

        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Jenis Kelamin</label>
            </div>
            <div class="col col-md-3">
                <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                    <option value="0"></option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">No. Telephone</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="notlp" name="notlp" class="form-control" onkeypress="return isNumberKey(event)">
            </div>
        </div>

        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Alamat</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="nalamat" name="alamat" class="form-control" style="text-transform:capitalize;" required="">
                <small class="form-text text-muted">Sesuai Dengan Yang Ada Di KTP.</small>
            </div>
        </div>
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">RT / RW</label>
            </div>
            <div class="col-12 col-md-3">
                <input type="text" id="rt" name="rt" class="form-control" placeholder="RT" required="">
            </div>
            <div class="col-12 col-md-3">
                <input type="text" id="rw" name="rw" class="form-control" placeholder="RW" required="">
            </div>
            <small class="form-text text-muted">Masukkan Apabila Ada.</small>

        </div>

        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Kepesertaan</label>
            </div>
            <div class="col-12 col-md-3">
                <select name="kepesertaan" id="kepesertaan" class="form-control">
                    <option value="0"></option>
                    <option value="UMUM">UMUM</option>
                    <option value="BPJS">BPJS</option>
                    <option value="GRATIS">GRATIS</option>                    
                </select>
            </div>
            <div class="col-12 col-md-6">
                <input type="text" id="nobpjs" name="nobpjs" class="form-control" placeholder="No. BPJS Apabila Kepersertaan BPJS">
            </div>
        </div>

        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Catatan</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="catatan" name="catatan" class="form-control">
            </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" name="submit" id="submit" class="btn btn-success btn-sm"><i class="ace-icon fa fa-check"></i> SUBMIT</button>            
        </div>
        </form>
        </div>
    </div>
</div>
<?php
} else {
?>
<div class="widget-box widget-color-green light-border">
    <div class="widget-header">
        <h5 class="widget-title">Tindakan Pasien a.n <?=$row['nama']?>.</h5>
    </div>
    <div class="widget-body">
        <div class="widget-main">            
            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Nama</div>

                    <div class="profile-info-value">
                        <span class="editable" id="username"><?=$row['nama']?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Umur</div>

                    <div class="profile-info-value">
                        <span class="editable" id="username">
                            <?php
                                $tgllahir = new DateTime($row['tgllahir']);
                                $today = new DateTime('today');
                                $y = $today->diff($tgllahir)->y;
                                $m = $today->diff($tgllahir)->m;
                                $d = $today->diff($tgllahir)->d;
                                if($y<2){
                                    if($y!=0){
                                        $tahun = $y. " Tahun";
                                    }
                                    else{
                                        $tahun = "";
                                    }
                                }
                                else{
                                    $tahun = $y. " Tahun";
                                }
                                echo $tahun." ".$m." Bulan ".$d." Hari";
                            ?>
                        </span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Alamat</div>

                    <div class="profile-info-value">
                        <span class="editable" id="username"><?=$row['alamat']?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Tempat Tgl. lahir</div>

                    <div class="profile-info-value">                        
                        <span class="editable" id="username"><?=$row['kotalahir']?>, <?=$row['tgllahir']?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Jenis Kelamin</div>

                    <div class="profile-info-value">
                        <span class="editable" id="username"><?=$row['jeniskelamin']?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> No. Telephone</div>

                    <div class="profile-info-value">
                        <span class="editable" id="username">+62 <?=$row['no_telp']?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Kepesertaan</div>

                    <div class="profile-info-value">
                        <span class="editable" id="username">
                            <?php
                                echo $row['kepesertaan'];
                                if($row['kepesertaan']=="BPJS"){
                                    echo ", <strong>No BPJS </strong> :".$row['nobpjs'];
                                }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <hr>
        <form action="" id="formregtopoli" method="post" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="idpasien" id="idpasien" value="<?=$row['id']?>"></input>        
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Keluhan Pasien</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="keluhan" name="keluhan" class="form-control" style="text-transform:capitalize;" required=""> 
            </div>
        </div>
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Pilih Poli</label>
            </div>
            <div class="col-12 col-md-4">
                <select name="poli" id="poli" class="form-control">
                    <option value="0"></option>
                    <option value="UMUM">Poli Umum</option>
                    <option value="KIA">Poli KIA</option>
                    <option value="MTBS">Poli MTBS</option>                    
                    <option value="GIGI">Poli Gigi</option>                    
                    <option value="LANSIA">Lansia</option>
                </select>
            </div>            
        </div>
        <div class="form-group">
            <button type="submit" name="submit" id="submit" class="btn btn-success btn-sm"><i class="ace-icon fa fa-check"></i> DAFTAR</button>            
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
  $("form#formadd").submit(function(event){    
    document.getElementById("submit").disabled='true';
    event.preventDefault();
    $.ajax({
      url: '../exe/procpendaftaran.php',
      type: 'POST',
      data: new FormData(this),
      async: true,
      cache: true,
      contentType: false,
      processData: false,
      success: function (status) {
        $("#loading").hide();
        document.getElementById("submit").removeAttribute('disabled');        
        alertify.success(status);
        document.getElementById("submit").disabled = 'true'; 
      }
    });
    return false;
  });

  $("form#formregtopoli").submit(function(event){    
    document.getElementById("submit").disabled='true';
    event.preventDefault();
    $.ajax({
      url: '../exe/proctopoli.php',
      type: 'POST',
      data: new FormData(this),
      async: true,
      cache: true,
      contentType: false,
      processData: false,
      success: function (status) {
        $("#loading").hide();
        document.getElementById("submit").removeAttribute('disabled');        
        alertify.success(status);
        document.getElementById("submit").disabled = 'true';
        location.reload(); 
      }
    });
    return false;
  });
  
});
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
} 
$('.date-picker').datepicker({
    autoclose: true,
    todayHighlight: true
})
// jQuery(function($) {
//     $('.input-mask-date').mask('99/99/9999');
// });
</script>

