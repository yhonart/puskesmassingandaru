<?php
include("dbconnect.php");
$tinggi = $_POST['tinggi'];
$berat = $_POST['berat'];
$tensi = $_POST['tensi'];
$suhu = $_POST['suhu'];
$idproses = $_POST['idproses'];

$sqlinsertdetail = $con->prepare("INSERT INTO `detailproses`(`pasienproses_id`, `tinggi_badan`, `berat_badan`, `tensi`, `suhu`, `status`) VALUES ('$idproses','$tinggi','$berat','$tensi','$suhu','1')");
$sqlinsertdetail->execute();
$updateproses = $con->prepare("UPDATE `pasienproses` SET `status`='2' WHERE `id_proses`='$idproses'");
$updateproses->execute();

if ($sqlinsertdetail) {
	echo "SUKSES";
}

// echo $notlp;

?>