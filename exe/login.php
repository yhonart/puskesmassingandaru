<?php
    include('dbconnect.php');
    session_start();    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $useractive = $con->prepare('SELECT * FROM users_acc WHERE USERNAME= :username AND PASSWORD= :password');

        $useractive->execute(array(
            ':username' => $_POST['username'],
            'password' => htmlentities(md5($_POST['password']))
        ));
        $row = $useractive->fetch(PDO::FETCH_ASSOC);        
        if (empty($row['USERNAME'])) {
        ?>
            <script language="JavaScript">
                alert('USERNAME ATAU PASSWORD YANG ANDA MASUKKAN SALAH, SILAHKAN MASUKKAN USERNAME ATAU PASSWORD DENGAN BENAR.');
                document.location='../';
            </script>
        <?php                                   
        }
        elseif (empty($row['NIP'])) {
        ?>
            <script language="JavaScript">
                alert('Anda Belum Terregister, Harap Hubungi Admin.');
                document.location='../';
            </script>
        <?php
        }
        else{
            $_SESSION['login_user'] = $_POST['username'];
            $_SESSION['hak_akses'] = $row['HAKACC'];
            $_SESSION['fullname'] = $row['FULLNAME'];
            header("location:../pages/");            
        }        
    }
    echo $_POST['username'];    
?>