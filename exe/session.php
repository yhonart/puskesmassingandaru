<?php
    include('dbconnect.php');
    //$baseurl = 'http://localhost/eletter/';
    session_start();
    $user_check=$_SESSION['login_user'];
    
    $usersession = $con->prepare('SELECT * FROM users_acc WHERE USERNAME= :username');
    $usersession->execute(array(
        ':username' => $user_check
    ));
    
    $row = $usersession->fetch(PDO::FETCH_ASSOC);
    $login_session=$row['USERNAME'];
    $fullname=$row['FULLNAME'];
    $nip=$row['NIP'];
    $akses=$row['HAKACC'];
    $email=$row['EMAIL'];

    $hakaksesarray = array(
        '1' => "ADMINISTRATOR",
        '2' => "PENDAFTARAN",
        '3' => "UMUM",
        '4' => "LANSIA",
        '5' => "GIGI",
        '6' => "MTBS",
        '7' => "KIA",
        '8' => "APOTIK",
        '9' => "LAB",
        '10' => "KASIR",
    );
    $hakakses = $hakaksesarray[$row['HAKACC']];    
    $iduser=$row['IDUSERS'];

    if (!isset($login_session)) {
        header('location:../');
    }
    
?>