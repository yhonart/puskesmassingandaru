<?php
include("dbconnect.php");
$diagnosa = $_POST['diagnosa'];
$keterangan = $_POST['keterangan'];
$idproses = $_POST['idproses'];
$resep1 = $_POST['resep'];
$tindakan = $_POST['tindakan'];

$resep = "";
if ($resep1 <> "") {
	foreach ($resep1 as $rsp) {
        $resep .= $rsp."; ";
        // echo $mfcinsert;
    }
}
else{
	$resep = "";
}

$noreg = $_POST['dokternip'];
$catatan = $_POST['keterangan'];
$dokter = $_POST['doktername'];

// if ($tindakan == "LAB") {
// 	$tindakandokter = "Dilakukan Pemeriksaan Laboratorium";
// }
// else{
// 	$tindakandokter = "Pemberian Obat Kepada Pasien Sesuai Dengan Resep";
// }

if ($tindakan == "LAB")
{
	$status = "3";
}
elseif ($tindakan == "NEBU")
{
	$status = "21";
}
else{
	$status = "4";
}

$sqlupdateprosesdetail = $con->prepare("UPDATE `detailproses` SET `diagnosa`='$diagnosa', `tindakan`='$tindakan',`resep`='$resep',`dokter`='$dokter',`status`='3' WHERE `pasienproses_id`='$idproses'");
$sqlupdateprosesdetail->execute();


$sqlupdateproses = $con->prepare("UPDATE `pasienproses` SET `catatan`='$catatan', `status`='$status' WHERE `id_proses`='$idproses'");
$sqlupdateproses->execute();

if ($sqlupdateprosesdetail) {
	echo "SUKSES";
}

?>