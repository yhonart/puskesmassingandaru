<?php
include("dbconnect.php");
$idproses = $_POST['id'];

$sqlupdateproses = $con->prepare("UPDATE `detailproses` SET `status_kasir`='1' WHERE pasienproses_id='$idproses'");
$sqlupdateproses->execute();


?>