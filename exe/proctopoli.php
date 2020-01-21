<?php
include("dbconnect.php");
$idpasien = $_POST['idpasien'];
$keluhan = ucwords($_POST['keluhan']);
$tujuan = $_POST['poli'];

// Search Identitas Pasien
$qpasienid = $con->prepare("SELECT * FROM `pasien` WHERE `id`='$idpasien'");
$qpasienid->execute();
$rowid = $qpasienid->fetch();

$today = date("Y-m-d");
//Search nomor terakhir
$sqlnomor = $con->prepare("SELECT nomor FROM pasienproses WHERE DATE_FORMAT(created_date,'%Y-%m-%d')='$today'");
$sqlnomor->execute();
$row_count = $sqlnomor->rowCount();
if($row_count==0){
	$nomor = 1;
}
else{
	// $row_no = $sqlnomor->fetch();
	$nomor = $row_count+1;
}
$splpendataranpasien = $con->prepare("INSERT INTO `pasienproses`(`nomor`, `id_pasien`, `keluhan_pasien`, `tujuan`, `status`) VALUES ('$nomor', '$idpasien', '$keluhan', '$tujuan','1')");
$splpendataranpasien->execute();

if ($splpendataranpasien) {
	echo "SUKSES PASIEN TELAH DIDAFTARKAN KE POLI ".$tujuan;
}

?>