<?php
include("dbconnect.php");
$diagnosa = $_POST['tindakan'];
$keterangan = $_POST['keterangan'];
$idproses = $_POST['idproses'];
$resep = $_POST['resep'];

// if ($tindakan == "APOTIK") {
// 	$resep1 = $_POST['resep'];
// 	foreach ($resep1 as $rsp) {
//         $resep .= $rsp."; ";
//         // echo $mfcinsert;
//     }
// }
// else{
// 	$resep = "";
// }

$noreg = $_POST['dokternip'];
$catatan = $_POST['keterangan'];
$dokter = $_POST['doktername'];

// if ($tindakan == "LAB") {
// 	$tindakandokter = "Dilakukan Pemeriksaan Laboratorium";
// }
// else{
// 	$tindakandokter = "Pemberian Obat Kepada Pasien Sesuai Dengan Resep";
// }

$sqlupdateprosesdetail = $con->prepare("UPDATE `detailproses` SET `diagnosa`='$diagnosa', `tindakan`='$tindakan',`dokter`='$dokter',`status`='3' WHERE `pasienproses_id`='$idproses'");
$sqlupdateprosesdetail->execute();


$sqlupdateproses = $con->prepare("");
if ($sqlupdateproses) {
	echo "SUKSES";
}

?>