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

$id = $_POST['iduser'];
$akses = $_POST['hakakses'];
// echo $idnik;
$queryproc = $con->prepare("SELECT * FROM pasienproses WHERE id_proses = '".$id."'");
$queryproc->execute();
$rowproc=$queryproc->fetch();
$idnik = $rowproc['id_pasien']; 

$queryuser = $con->prepare("SELECT * FROM pasien WHERE id = '".$idnik."'");
$queryuser->execute();
$row=$queryuser->fetch();
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
                    <div class="profile-info-name"> Jenis Kelamin</div>

                    <div class="profile-info-value">
                        <span class="editable" id="username"><?=$row['jeniskelamin']?></span>
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
                <div class="profile-info-row">
                    <div class="profile-info-name"> Keluhan Pasien</div>

                    <div class="profile-info-value">
                        <span class="editable" id="username"><?=$rowproc['keluhan_pasien']?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Poli</div>

                    <div class="profile-info-value">
                        <span class="editable" id="username"><?=$rowproc['tujuan']?></span>
                    </div>
                </div>
            </div>
            <hr>
        <form action="" id="formanamnesa" method="post" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="idproses" id="idproses" value="<?=$rowproc['id_proses']?>"></input>        
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Tindakan</label>
            </div>
            <div class="col-12 col-md-4">
                <select name="tindakan" id="tindakan" class="form-control">
                    <option value='0'>Pilih Tindakan Pasien</option>
                    <option value='LAB'>Cek Laboratorium</option>
                    <option value='P3K'>P3K</option>
                    <option value='NEBU'>NEBU</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Keterangan</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="keterangan" name="keterangan" class="form-control" required=""> 
            </div>
        </div>
        
        <div class="form-group text-center">
            <button type="submit" onkeypress="return isNumberKey(event)" name="submit" id="submit" class="btn btn-success btn-sm"><i class="ace-icon fa fa-check"></i> SUBMIT</button>            
        </div>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $("form#formanamnesa").submit(function(event){    
    document.getElementById("submit").disabled='true';
    event.preventDefault();
    $.ajax({
      url: '../exe/procpoli.php',
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

