<?php
include("dbconnect.php");
$idproses = $_POST['idproses'];

$sqlupdateproses = $con->prepare("UPDATE `pasienproses` SET `status`='3', `updated_date`=now() WHERE id_proses='$idproses'");
$sqlupdateproses->execute();

if ($sqlupdateproses) {
	echo "SUKSES";
}

?>