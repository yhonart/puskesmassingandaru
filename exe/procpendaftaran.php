<?php
include("dbconnect.php");
$namapasien = strtoupper($_POST['fullname']);
$alamat = ucwords($_POST['alamat']);
$tempatlahir = strtoupper($_POST['tempatlahir']);
$tgllahir = $_POST['tgllahir'];
$gender = $_POST['jeniskelamin'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$alamatlengkap = $alamat." RT ".$rt." RW ".$rw;
$kepesertaan = $_POST['kepesertaan'];
if ($kepesertaan=="BPJS") {
	$nobpjs = $_POST['nobpjs'];
}
else{
	$nobpjs = "0";
}
$noreg = $_POST['noreg'];
$catatan = $_POST['catatan'];
$notlp = $_POST['notlp'];

$sqlinsertpasien = $con->prepare("INSERT INTO `pasien`(`noreg`, `nama`, `alamat`, `kotalahir`, `tgllahir`, `jeniskelamin`, `no_telp`, `kepesertaan`, `nobpjs`, `remarks`, `created_date`, `status`) VALUES 
('$noreg', '$namapasien', '$alamatlengkap', '$tempatlahir', '$tgllahir', '$gender', '$notlp', '$kepesertaan', '$nobpjs', '$catatan',now(),'1')");
$sqlinsertpasien->execute();

if ($sqlinsertpasien) {
	echo "SUKSES";
}

// echo $notlp;

?>