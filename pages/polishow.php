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
$drname = $_POST['drname'];
$drnip = $_POST['nipdr'];

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
            </div>
            <hr>
        <form action="" id="formanamnesa" method="post" enctype="multipart/form-data" class="form-horizontal">
        <input name="doktername" id="doktername" type="hidden" value="<?php echo $drname;?>"></input>
        <input name="dokternip" id="dokternip" type="hidden" value="<?php echo $drnip;?>"></input> 
        <input name="idproses" id="idproses" type="hidden" value="<?php echo $id;?>"></input>
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Diagnosa</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="diagnosa" name="diagnosa" class="form-control" required=""> 
            </div>
        </div>        
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label">Tindakan</label>
            </div>
            <div class="col-12 col-md-4">                
                <select name="tindakan" id="tindakan" class="form-control">
                    <option value="0">Pilih Tindakan</option>
                    <?php
                        if($akses=="5")
                        {
                            echo "<option value='SCALLING'>Scalling</option>";
                            echo "<option value='HELID'>Helid</option>";
                            echo "<option value='CATUTGIGI'>Ext(Catut Gigi)</option>";

                        }
                        elseif($akses=="7")
                        {
                            echo "<option value='USG'>USG</option>";
                            echo "<option value='DOPPLER'>DOPPLER</option>";
                            echo "<option value='KB'>KB</option>";
                            echo "<option value='IMPLAN'>PASANG IUD/IMPLAN</option>";
                            echo "<option value='UP IMPLAN'>UP IMPLAN</option>";
                            echo "<option value='BUKU KIA'>BUKU KIA</option>";
                            echo "<option value='NEBU'>NEBU</option>";                            
                        }
                        else
                        {
                            echo "<option value='LAB'>LAB</option>";
                            echo "<option value='P3K'>P3K</option>";
                            echo "<option value='NEBU'>NEBU</option>";
                        }
                    ?>
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
        <div class="form-group">
            <div class="col col-md-3">
                <label for="hf-email" class=" form-control-label"><b><u>Resep Dokter</u></b></label>
            </div>
            <!-- <div class="col-12 col-md-9">
                <input type="text" id="resep" name="resep" class="form-control" placeholder="Optional Masukkan Resep Apabila Ada"> 
            </div> -->
        </div>

        <div class="multi-field-wrapper" id="hidden_div">              
            <div class="multi-fields">            
                <div class="form-group multi-field"> 
                    <div class='col-md-6'>         
                    <input type="text" class="form-control" name="resep[]" id="resep" autocomplete="off">
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-field"><i class="fa fa-remove"></i></button>
                </div>
            </div>
          <button type="button" class="btn btn-primary btn-sm add-field"><i class="fa fa-plus"></i> Tambah Resep/Obat</button>
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
$('.multi-field-wrapper').each(function() {
      var $wrapper = $('.multi-fields', this);
      $(".add-field", $(this)).click(function(e) {
          $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('#resep').val('').focus();
      });
      $('.multi-field .remove-field', $wrapper).click(function() {
          if ($('.multi-field', $wrapper).length > 1)
              $(this).parent('.multi-field').remove();
      });
  }); 
// jQuery(function($) {
//     $('.input-mask-date').mask('99/99/9999');
// });
</script>

