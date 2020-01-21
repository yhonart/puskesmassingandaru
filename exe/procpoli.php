<?php
include("dbconnect.php");
$diagnosa = $_POST['diagnosa'];
$keterangan = $_POST['keterangan'];
$tindakan = $_POST['tindakan'];
$idproses = $_POST['idproses'];
$resep = "";
if ($tindakan == "APOTIK") {
	$resep1 = $_POST['resep'];
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

if ($tindakan == "LAB") {
	$tindakandokter = "Dilakukan Pemeriksaan Laboratorium";
}
else{
	$tindakandokter = "Pemberian Obat Kepada Pasien Sesuai Dengan Resep";
}
$sqlupdateproses = $con->prepare("UPDATE `pasienproses` SET `tujuan`='$tindakan',`status`='2',`diagnosa`='$diagnosa',`tindakan_dokter`='$tindakandokter',`resep`='$resep',`an_dokter`='$dokter',`catatan`='$catatan',`updated_date`=now() WHERE id_proses='$idproses'");
$sqlupdateproses->execute();

if ($sqlupdateproses) {
	echo "SUKSES";
}

?>