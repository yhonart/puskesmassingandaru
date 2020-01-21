<?php
include("dbconnect.php");
$iddel = $_POST['iddel'];

$deleteuser = $con->prepare("DELETE FROM `users_acc` WHERE `IDUSERS`='$iddel'");
$deleteuser->execute();
?>