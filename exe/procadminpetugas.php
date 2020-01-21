<?php
include("dbconnect.php");
$action = $_POST['action'];

$username = $_POST['username'];
$fullname = strtoupper($_POST['fullname']);
$nip = $_POST['nip'];
$email = $_POST['email'];
$penugasan = $_POST['penugasan'];


if ($action=="0") {
	$password = md5($_POST['password']);
	$sqlinsertpegawai = $con->prepare("INSERT INTO `users_acc`(`USERNAME`, `FULLNAME`, `EMAIL`, `PASSWORD`, `HAKACC`, `NIP`, `STATUS`) VALUES ('$username','$fullname', '$email', '$password', '$penugasan', '$nip', '1')");
	$sqlinsertpegawai->execute();
}
else{
	$sqlinsertpegawai = $con->prepare("UPDATE `users_acc` SET `USERNAME`='$username',`FULLNAME`='$fullname',`EMAIL`='$email',`HAKACC`='$penugasan',`NIP`='$nip',`STATUS`='1' WHERE IDUSERS='$action'");
	$sqlinsertpegawai->execute();
}


if ($sqlinsertpegawai) {
	echo "SUKSES, Silahkan RELOAD Halaman";
}

?>