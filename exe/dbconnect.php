<?php
/*
$con=mysqli_connect("localhost","root","","simo");
// Check connection
if (mysqli_connect_errno()) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
*/

//additional for using mysql_connect

$DB_Server = "localhost"; // MySQL Server
$DB_Username = "root"; // MySQL Username
$DB_Password = ""; // MySQL Password
$DB_DBName = "symaskes"; // MySQL Database Name

try {

	$con = new PDO ("mysql:host={$DB_Server};dbname={$DB_DBName}",$DB_Username,$DB_Password);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (PDOException $exception) {
	die("Connection error: " . $exception->getMessage());
}
?>
